<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Model;
use App\Models\User;
use App\Models\Author;
use App\Models\Book;
use Faker\Generator as Faker;

$factory->define(Book::class,function (Faker $faker){
    return [
        'user_id' => factory(User::class)->create()->id,
        'author_id' => factory(Author::class)->create()->id,
        'title' => $faker->text(20),
        'short_description' => $faker->text(500),
        'page_count' => $faker->numberBetween(30, 2000),
        'image' => null
    ];
});
