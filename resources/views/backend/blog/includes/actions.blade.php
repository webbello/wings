
    <div class="btn-group btn-group-sm" post="group" aria-label="@lang('labels.backend.access.users.user_actions')">
        <a href="{{ route('admin.blog.posts.edit', $post) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.edit')">
            <i class="fas fa-edit"></i>
        </a>

        <a href="{{ route('admin.blog.posts.destroy', $post) }}"
           data-method="delete"
           data-trans-button-cancel="@lang('buttons.general.cancel')"
           data-trans-button-confirm="@lang('buttons.general.crud.delete')"
           data-trans-title="@lang('strings.backend.general.are_you_sure')"
           class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="@lang('buttons.general.crud.delete')">
            <i class="fas fa-trash"></i>
        </a>
    </div>

