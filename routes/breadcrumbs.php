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

// admin user index
Breadcrumbs::register('admin.user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Users', route('admin.user.index'));
});
// admin user edit
Breadcrumbs::register('admin.user.edit', function ($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.user.index');
    $breadcrumbs->push($edit_name, route('admin.user.edit', $model->id));
});

// admin order index
Breadcrumbs::register('admin.order.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Orders', route('admin.order.index'));
});
// admin order edit
Breadcrumbs::register('admin.order.edit', function ($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.order.index');
    $breadcrumbs->push($edit_name, route('admin.order.edit', $model->id));
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

// dashboard > event
Breadcrumbs::register('admin.seo-manager.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('SEO manager', route('admin.seo-manager.index'));
});
// dashboard > event > edit
Breadcrumbs::register('admin.seo-manager.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.seo-manager.index');
    $breadcrumbs->push($edit_name, route('admin.seo-manager.edit', $model->id));
});

// dashboard > event
Breadcrumbs::register('admin.event.index', function($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Events', route('admin.event.index'));
});
// dashboard > event > edit
Breadcrumbs::register('admin.event.edit', function($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('admin.event.index');
    $breadcrumbs->push($edit_name, route('admin.event.edit', $model->id));
});
// dashboard > event > create
Breadcrumbs::register('admin.event.create', function($breadcrumbs) use ($create_name) {
    $breadcrumbs->parent('admin.event.index');
    $breadcrumbs->push($create_name, route('admin.event.create'));
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

//site breadcrumbs
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push("home", route('home'));
});

// site category index
Breadcrumbs::register('site.category.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Categorieën', route('site.category.index'));
});
// site category show
Breadcrumbs::register('site.category.show', function ($breadcrumbs, $model) use ($edit_name) {
    $breadcrumbs->parent('site.category.index');
    $breadcrumbs->push($model->value, route('site.category.show', $model->id));
});