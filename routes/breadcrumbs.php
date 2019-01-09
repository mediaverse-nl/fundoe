<?php

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
Breadcrumbs::register('admin.editor.edit', function ($breadcrumbs, $text) {
    $breadcrumbs->parent('admin.editor.index');
    $breadcrumbs->push('Text', route('admin.editor.edit', $text->id));
});
