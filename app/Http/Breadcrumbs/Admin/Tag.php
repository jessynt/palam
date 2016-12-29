<?php

Breadcrumbs::register('admin.tag.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('标签列表', route('admin.tag.index'));
});

Breadcrumbs::register('admin.tag.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.tag.index');
    $breadcrumbs->push('新增标签');
});
Breadcrumbs::register('admin.tag.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.tag.index');
    $breadcrumbs->push('编辑标签');
});
