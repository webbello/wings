<?php

namespace App\Repositories\Blog;

use App\Models\Blog\Post;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Auth\Post\PostCreated;
use App\Events\Backend\Auth\Post\PostUpdated;

/**
 * Class PostRepository.
 */
class PostRepository extends BaseRepository
{
    /**
     * PostRepository constructor.
     *
     * @param  Post  $model
     */
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return Post
     */
    public function create(array $data) : Post
    {
        // Make sure it doesn't already exist
        if ($this->roleExists($data['name'])) {
            throw new GeneralException('A role already exists with the name '.e($data['name']));
        }

        if (! isset($data['permissions']) || ! \count($data['permissions'])) {
            $data['permissions'] = [];
        }

        //See if the role must contain a permission as per config
        if (config('access.roles.role_must_contain_permission') && \count($data['permissions']) === 0) {
            throw new GeneralException(__('exceptions.backend.access.roles.needs_permission'));
        }

        return DB::transaction(function () use ($data) {
            $role = $this->model::create(['name' => strtolower($data['name'])]);

            if ($role) {
                $role->givePermissionTo($data['permissions']);

                event(new PostCreated($role));

                return $role;
            }

            throw new GeneralException(trans('exceptions.backend.access.roles.create_error'));
        });
    }

    /**
     * @param Post  $role
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function update(Post $role, array $data)
    {
        if ($role->isAdmin()) {
            throw new GeneralException('You can not edit the administrator role.');
        }

        // If the name is changing make sure it doesn't already exist
        if ($role->name !== strtolower($data['name'])) {
            if ($this->roleExists($data['name'])) {
                throw new GeneralException('A role already exists with the name '.$data['name']);
            }
        }

        if (! isset($data['permissions']) || ! \count($data['permissions'])) {
            $data['permissions'] = [];
        }

        //See if the role must contain a permission as per config
        if (config('access.roles.role_must_contain_permission') && \count($data['permissions']) === 0) {
            throw new GeneralException(__('exceptions.backend.access.roles.needs_permission'));
        }

        return DB::transaction(function () use ($role, $data) {
            if ($role->update([
                'name' => strtolower($data['name']),
            ])) {
                $role->syncPermissions($data['permissions']);

                event(new PostUpdated($role));

                return $role;
            }

            throw new GeneralException(trans('exceptions.backend.access.roles.update_error'));
        });
    }

    /**
     * @param $name
     *
     * @return bool
     */
    protected function roleExists($name) : bool
    {
        return $this->model
            ->where('name', strtolower($name))
            ->count() > 0;
    }
}
