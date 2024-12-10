<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('Show courses overview', function () {
    // Arrange (Lo que necesito para hacer el test)
    $firstCourse = Course::factory()->released()->create();
    $secondCourse = Course::factory()->released()->create();
    $thirdCourse = Course::factory()->released()->create();

    // Act (Accion que hara, lo que hago en el test)
    get(route('pages.home'))
        ->assertSeeText([
            $firstCourse->title,
            $firstCourse->description,
            $secondCourse->title,
            $secondCourse->description,
            $thirdCourse->title,
            $thirdCourse->description,
        ]);

    // Assert (Afirmar, lo que me permite verificar, comprobaciones)

});

it('shows only released courses', function () {
    // Arrange (Lo que necesito para hacer el test)
    $releasedCourse = Course::factory()->released()->create();
    $notReleasedCourse = Course::factory()->create();

    // Act (Accion que hara, lo que hago en el test)
    get(route('pages.home'))
        ->assertSeeText($releasedCourse->title)
        ->assertDontSeeText($notReleasedCourse->title);

    // Assert (Afirmar, lo que me permite verificar, comprobaciones)

});

it('shows courses by released date', function () {
    // Arrange (Lo que necesito para hacer el test)
    $releasedCourse = Course::factory()->released(Carbon::yesterday())->create();
    $newestReleasedCourse = Course::factory()->released()->create();

    // Act (Accion que hara, lo que hago en el test)
    get(route('pages.home'))
        ->assertSeeTextInOrder([
            $newestReleasedCourse->title,
            $releasedCourse->title,

        ]);

    // Assert (Afirmar, lo que me permite verificar, comprobaciones)

});
