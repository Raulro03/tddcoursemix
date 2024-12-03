<?php

use function \Pest\Laravel\get;

it ('gives back succesful response for page' , function (){
    get(route('home'))
        ->assertOk(); // = a assertResponse(200);

});
