<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
// Inicio
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('ControlPanel', route('dashboard'));
});
// Inicio > Cursos
Breadcrumbs::for('terms', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Terms', route('terms'));
});
// Inicio > Cursos > [Cycles]
Breadcrumbs::for('Cycles', function ($trail, $cycle) {
    $trail->parent('Cycles');
    $trail->push($cycle->name, route('Cycles.show', $cycle));
});
// Inicio > Cursos > [Cycles] > [MPs]
Breadcrumbs::for('mps', function ($trail, $mps) {
    $trail->parent('Cycles', $mps->cycle);
    $trail->push($cycle->name, route('Cycles.show', $cycle));
});