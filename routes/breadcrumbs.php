<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
// Inicio
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('ControlPanel', route('dashboard'));
});
// Inicio > Generos
Breadcrumbs::for('terms', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Terms', route('terms'));
});