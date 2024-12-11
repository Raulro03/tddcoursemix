<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('gives back successful response for page', function () {
    get(route('pages.home'))
        ->assertOk(); // = a assertResponse(200);

});

it('gives back successful response for course details page', function () {
    // Arrange (Lo que necesito para hacer el test)
    $course = Course::factory()->released()->create();

    // Act (Accion que hara, lo que hago en el test)
    get(route('pages.course-details', $course))
        ->assertOk();

    // Assert (Afirmar, lo que me permite verificar, comprobaciones)

});
it('gives back successful for dashboard page', function () {
    $user = User::factory()->create();

    // Act
    $this->actingAs($user);
    get(route('dashboard'))
        ->assertOk();
});
