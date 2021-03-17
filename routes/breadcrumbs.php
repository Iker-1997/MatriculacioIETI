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

// Inicio > alumne
Breadcrumbs::for('Students', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Students', route('Students'));
});

// Inicio > Terms > [Career]
Breadcrumbs::for('Career', function ($trail, $cycle) {
    $trail->parent('terms');
    $trail->push($cycle->name_terms, route('term_careers', $cycle));
});
// Inicio > Cursos > [Cycles] > [MPs]
Breadcrumbs::for('mps', function ($trail, $mps) {
    $trail->parent('Cycles', $mps->cycle);
    $trail->push($cycle->name, route('Cycles.show', $cycle));
});