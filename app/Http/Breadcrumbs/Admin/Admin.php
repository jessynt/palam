<?php
Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('主页', route('admin.dashboard'));
});

require __DIR__ . '/Post.php';
require __DIR__ . '/Tag.php';
require __DIR__ . '/Category.php';
require __DIR__ . '/Page.php';