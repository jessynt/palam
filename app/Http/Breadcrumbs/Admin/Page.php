<?php

Breadcrumbs::register('admin.page.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('页面列表', route('admin.page.index'));
});

Breadcrumbs::register('admin.page.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.page.index');
    $breadcrumbs->push('新增页面');
});
Breadcrumbs::register('admin.page.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.page.index');
    $breadcrumbs->push('编辑页面');
});
