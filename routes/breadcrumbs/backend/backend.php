<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});
Breadcrumbs::for('admin.blog.posts.index', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.blog.posts.index'));
});
Breadcrumbs::for('admin.blog.posts.create', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.blog.posts.create'));
});
Breadcrumbs::for('admin.blog.posts.edit', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.blog.posts.edit'));
});

Breadcrumbs::for('admin.categories.index', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.categories.index'));
});
Breadcrumbs::for('admin.categories.create', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.categories.create'));
});


require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
