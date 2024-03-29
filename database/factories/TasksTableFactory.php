<?php

use Faker\Generator as Faker;
use App\Task;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'executed' => $faker->boolean()
    ];
});
