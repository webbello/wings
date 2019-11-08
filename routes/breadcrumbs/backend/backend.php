<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});
Breadcrumbs::for('admin.blog.posts.index', function ($trail) {
    $trail->push(__('All Post'), route('admin.blog.posts.index'));
});
Breadcrumbs::for('admin.blog.posts.create', function ($trail) {
    $trail->push(__('Create Post'), route('admin.blog.posts.create'));
});
Breadcrumbs::for('admin.blog.posts.edit', function ($trail) {
    $trail->push(__('Edit Post'), route('admin.blog.posts.create'));
});

Breadcrumbs::for('admin.categories.index', function ($trail) {
    $trail->push(__('Categories'), route('admin.categories.index'));
});
Breadcrumbs::for('admin.categories.create', function ($trail) {
    $trail->push(__('Categories / Create'), route('admin.categories.create'));
});
Breadcrumbs::for('admin.categories.edit', function ($trail, $id) {
    $trail->push(__('Categories / Edit'), route('admin.categories.edit', $id));
});

Breadcrumbs::for('admin.album.index', function ($trail) {
    $trail->push(__('Album'), route('admin.album.index'));
});
Breadcrumbs::for('admin.album.create', function ($trail) {
    $trail->push(__('Album / Create'), route('admin.album.create'));
});
Breadcrumbs::for('admin.album.edit', function ($trail, $id) {
    $trail->push(__('Album / Edit'), route('admin.album.edit', $id));
});

// Photo Gallery
Breadcrumbs::for('admin.gallery.index', function ($trail) {
    $trail->push(__('Photo Gallery'), route('admin.gallery.index'));
});
Breadcrumbs::for('admin.gallery.create', function ($trail) {
    $trail->push(__('Photo Gallery / Create'), route('admin.gallery.create'));
});
Breadcrumbs::for('admin.gallery.edit', function ($trail, $id) {
    $trail->push(__('Photo Gallery / Edit'), route('admin.gallery.edit', $id));
});

// Events
Breadcrumbs::for('admin.events.index', function ($trail) {
    $trail->push(__('Events'), route('admin.events.index'));
});
Breadcrumbs::for('admin.events.create', function ($trail) {
    $trail->push(__('Create'), route('admin.events.create'));
});
Breadcrumbs::for('admin.events.edit', function ($trail, $id) {
    $trail->push(__('Edit'), route('admin.events.edit', $id));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
