<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Faker\Factory as Faker;

class LoremIpsumController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /
    */
    public function getIndex() {
        // echo 'Display forms for Lorem Ipsum generator plus any generated text';
        $faker = Faker::create();
        return 'name is: ' . $faker->name;
    }

    /**
     * Responds to requests to POST /
     */
    public function postIndex() {
        return 'Process form for Lorem Ipsum generator';
    }
}