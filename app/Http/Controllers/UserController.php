<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Faker\Factory as Faker;

class UserController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    private $formdata = [
        'numusers' => '',
        'phoneyes' => '',
        'birthdayyes' => '',
        'profileyes' => '',
        'photoyes' => '',
        'addressyes' => '',
        'birthdayyes' => '',
        'profileyes' => '',
        'photoyes' => '',
        ];

    /**
    * Responds to requests to GET /users
    */
    public function getIndex() {
        return view('users')->with('formdata',$this->formdata);
    }

    /**
     * Responds to requests to POST /users
     */
    public function postIndex(Request $request) {
        $faker = Faker::create();

        $this->validate($request, 
            ['numusers' => 'required|numeric|min:1|max:10']
        );

        $formdata['addressyes'] = '';
        $formdata['phoneyes'] = '';
        $formdata['birthdayyes'] = '';
        $formdata['profileyes'] = '';
        $formdata['photoyes'] = '';

        $numusers = $request->input('numusers');

        $formdata['numusers'] = $numusers;

        $address = $request->input('address');
        if ($address == 'on') {
            $formdata['addressyes'] = 'checked';   
        }
        $phone = $request->input('phone');
        if ($phone == 'on') {
            $formdata['phoneyes'] = 'checked';
        }
        $birthday = $request->input('birthday');
        if ($birthday == 'on') {
            $formdata['birthdayyes'] = 'checked';
        }
        $profile = $request->input('profile');
        if ($profile == 'on') {
            $formdata['profileyes'] = 'checked';
        }
        $photo = $request->input('photo');
        if ($photo == 'on') {
            $formdata['photoyes'] = 'checked';
        }

        for ($i = 0; $i < $numusers; $i++) {
            $users[$i]['name'] = $faker->name;
            $users[$i]['username'] = $faker->username;
            $users[$i]['email'] = $faker->email;
            if ($address == 'on') {
                $users[$i]['streetaddress'] = $faker->streetAddress;
                $users[$i]['city'] = $faker->city;
                $users[$i]['postcode'] = $faker->postcode;
                $users[$i]['state'] = $faker->stateAbbr;
            }
            if ($phone == 'on') {
                $users[$i]['phone'] = $faker->phoneNumber;
            }
            if ($birthday == 'on') {
                /*  
                    note: setting minimum age of fake users to 13
                    to avoid COPPA complications: http://www.coppa.org/
                */
                $users[$i]['birthday'] = $faker->date($format = 'Y-m-d', $max = '2002-10-21');
            }
            if ($profile == 'on') {
                $users[$i]['profile'] = $faker->text($maxNbChars = 140);
            }
            if ($photo == 'on') {
                $users[$i]['photo'] = $faker->imageUrl($width = 200, $height = 200, 'cats');
            }
        }
        
        $json = fopen('randomusers.json', 'w');
        fwrite($json, json_encode($users));
        fclose($json);

        $csv = new \SplFileObject('randomusers.csv', 'w');
        foreach ($users as $user) {
            $csv->fputcsv($user);
        }

        return view('users')->with('users', $users)->with('formdata', $formdata);
    }
}