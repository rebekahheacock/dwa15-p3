<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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
        $addressyes = '';
        $phoneyes = '';
        $birthdayyes = '';
        $profileyes = '';
        $photoyes = '';
        return view(('users'), compact('numusers', 'addressyes', 'phoneyes', 'birthdayyes', 'profileyes', 'photoyes'));
    }

    /**
     * Responds to requests to POST /users
     */
    public function postIndex(Request $request) {
        $numusers = '';
        $addressyes = '';
        $phoneyes = '';
        $birthdayyes = '';
        $profileyes = '';
        $photoyes = '';

        $numusers = $request->input('numusers');
        $address = $request->input('address');
        \Debugbar::info($address);
        if ($address == 'on') {
            $addressyes = 'checked';
        }
        $phone = $request->input('phone');
        if ($phone == 'on') {
            $phoneyes = 'checked';
        }
        $birthday = $request->input('birthday');
        if ($birthday == 'on') {
            $birthdayyes = 'checked';
        }
        $profile = $request->input('profile');
        if ($profile == 'on') {
            $profileyes = 'checked';
        }
        $photo = $request->input('photo');
        if ($photo == 'on') {
            $photoyes = 'checked';
        }

        // $faker = Faker::create();
        // return 'name is: ' . $faker->name;
        return view(('users'), compact('numusers', 'addressyes', 'phoneyes', 'birthdayyes', 'profileyes', 'photoyes'));
    }
}