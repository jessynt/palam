<?php

Breadcrumbs::register('admin.post.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('文章列表', route('admin.post.index'));
});

Breadcrumbs::register('admin.post.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.post.index');
    $breadcrumbs->push('写文章');
});
Breadcrumbs::register('admin.post.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.post.index');
    $breadcrumbs->push('编辑文章');
});
