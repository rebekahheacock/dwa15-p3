<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Faker\Factory as Faker;

class UserController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /users
    */
    public function getIndex() {
        $numusers = '';
        return view ('users')->with('numusers',$numusers);
    }

    /**
     * Responds to requests to POST /users
     */
    public function postIndex() {
        return 'Process random user generation';
        // $faker = Faker::create();
        // return 'name is: ' . $faker->name;
    }
}