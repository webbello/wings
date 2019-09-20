<?php

namespace App\Events\Backend\Blog;

use Illuminate\Queue\SerializesModels;

/**
 * Class RoleDeleted.
 */
class PostDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $post;

    /**
     * @param $post
     */
    public function __construct($post)
    {
        $this->post = $post;
    }
}
