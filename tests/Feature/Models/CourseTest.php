<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\Models\Course;

uses(RefreshDatabase::class);

it('only returns released courses for released scope', function () {
    //Arrange
    Course::factory()->released()->create();
    Course::factory()->create();

    //Act
    expect(Course::released()->get())
    ->toHaveCount(1)
    ->first()->id->toEqual(1);

    //Assert


});
