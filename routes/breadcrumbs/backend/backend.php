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
Breadcrumbs::for('admin.categories.edit', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.categories.edit'));
});

Breadcrumbs::for('admin.album.index', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.album.index'));
});
Breadcrumbs::for('admin.album.create', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.album.create'));
});
Breadcrumbs::for('admin.album.edit', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.album.create'));
});

// Photo Gallery
Breadcrumbs::for('admin.gallery.index', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.gallery.index'));
});
Breadcrumbs::for('admin.gallery.create', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.gallery.create'));
});
Breadcrumbs::for('admin.gallery.edit', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.gallery.edit'));
});

// Events
Breadcrumbs::for('admin.events.index', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.events.index'));
});
Breadcrumbs::for('admin.events.create', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.events.create'));
});
Breadcrumbs::for('admin.events.edit', function ($trail) {
    $trail->push(__('strings.backend.blog.title'), route('admin.events.edit'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
