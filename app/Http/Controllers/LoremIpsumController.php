<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LoremIpsumController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /
    */
    public function getIndex() {
        return 'Display forms for Lorem Ipsum generator plus any generated text';
    }

    /**
     * Responds to requests to POST /
     */
    public function postIndex() {
        return 'Process form for Lorem Ipsum generator';
    }
}