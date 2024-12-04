<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use function \Pest\Laravel\get;

uses(RefreshDatabase::class);

it ('gives back succesful response for page' , function (){
    get(route('home'))
        ->assertOk(); // = a assertResponse(200);

});
