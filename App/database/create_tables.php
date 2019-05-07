<?php

use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('email', 190)->unique();
    $table->timestamps();
});
