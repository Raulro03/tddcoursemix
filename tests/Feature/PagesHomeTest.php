<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use function \Pest\Laravel\get;

uses(RefreshDatabase::class);

it('Show courses overview', function () {
    // Arrange (Lo que necesito para hacer el test)
    Course::factory()->create(['title' => 'Course A']);
    Course::factory()->create(['title' => 'Course B']);
    Course::factory()->create(['title' => 'Course C']);

    // Act (Accion que hara, lo que hago en el test)
    get(route('home'))
        ->assertSeeText([
            'Course A',
            'Course B',
        ]);

    // Assert (Afirmar, lo que me permite verificar, comprobaciones)


});

it('shows only released courses', function () {
    // Arrange (Lo que necesito para hacer el test)
    Course::factory()->create(['title' => 'Course A']);
    Course::factory()->create(['title' => 'Course B']);
    Course::factory()->create(['title' => 'Course C']);

    // Act (Accion que hara, lo que hago en el test)


    // Assert (Afirmar, lo que me permite verificar, comprobaciones)

});
