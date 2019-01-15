<?php

$edit_name = 'Edit';
$create_name = 'Create';
$show_name = 'Show';

// admin dashboard
Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.dashboard'));
});

// admin text index
Breadcrumbs::register('admin.editor.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Text', route('admin.editor.index'));
});
// admin text edit
Breadcrumbs::register('admin.editor.edit', function ($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.editor.index');
    $breadcrumbs->push($edit_name, route('admin.editor.edit', $model->id));
});

// dashboard > faq
Breadcrumbs::register('admin.faq.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('FAQ', route('admin.faq.index'));
});
// dashboard > faq > edit
Breadcrumbs::register('admin.faq.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.faq.index');
    $breadcrumbs->push($edit_name, route('admin.faq.edit', $model->id));
});
// dashboard > faq > create
Breadcrumbs::register('admin.faq.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.faq.index');
    $breadcrumbs->push($create_name, route('admin.faq.create'));
});

// dashboard > activity
Breadcrumbs::register('admin.activity.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Activity', route('admin.activity.index'));
});
// dashboard > activity > edit
Breadcrumbs::register('admin.activity.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.activity.index');
    $breadcrumbs->push($edit_name, route('admin.activity.edit', $model->id));
});
// dashboard > activity > create
Breadcrumbs::register('admin.activity.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.activity.index');
    $breadcrumbs->push($create_name, route('admin.activity.create'));
});

// dashboard > category
Breadcrumbs::register('admin.category.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Category', route('admin.category.index'));
});
// dashboard > category > edit
Breadcrumbs::register('admin.category.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.category.index');
    $breadcrumbs->push($edit_name, route('admin.category.edit', $model->id));
});
// dashboard > category > create
Breadcrumbs::register('admin.category.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.category.index');
    $breadcrumbs->push($create_name, route('admin.category.create'));
});

// dashboard > images
Breadcrumbs::register('admin.image.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Images Library', route('admin.file-manager.index'));
});

// dashboard > notification
Breadcrumbs::register('admin.notification.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Notification', route('admin.notification.index'));
});
// dashboard > notification > show
Breadcrumbs::register('admin.notification.show', function($breadcrumbs, $model) use ($show_name) {
    $breadcrumbs->parent('admin.notification.index');
    $breadcrumbs->push($show_name, route('admin.notification.show', $model->id));
});