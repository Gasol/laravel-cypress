<?php

use Faker\Generator as Faker;
use Laracasts\Cypress\Tests\Support\TestUser;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(TestUser::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->unique()->safeEmail(),
        'plan' => 'monthly',
        'password' => 'foopassword',
    ];
});

$factory->state(TestUser::class, 'guest', ['plan' => 'guest']);
