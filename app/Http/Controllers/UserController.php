<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /
    */
    public function getIndex() {
        return 'Form for random user generator plus display for generated users';
    }

    /**
     * Responds to requests to POST /
     */
    public function postIndex() {
        return 'Process random user generation';
    }
}