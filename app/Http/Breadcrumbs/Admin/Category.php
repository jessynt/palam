<?php

Breadcrumbs::register('admin.category.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('分类列表', route('admin.category.index'));
});

Breadcrumbs::register('admin.category.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.category.index');
    $breadcrumbs->push('新增分类');
});
Breadcrumbs::register('admin.category.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.category.index');
    $breadcrumbs->push('编辑分类');
});
