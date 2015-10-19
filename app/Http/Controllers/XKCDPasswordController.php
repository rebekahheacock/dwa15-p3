<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class XKCDPasswordController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /loremipsum
    */
    public function getIndex() {
        $formdata['numwords'] = '';
        $formdata['numyes'] = '';
        $formdata['symbolyes'] = '';
        $formdata['memorable'] = '';
        $formdata['separator_space'] = ''; 
        $formdata['separator_dash'] = ''; 
        $formdata['separator_dot'] = '';   
        $formdata['separator_none'] = '';
        $formdata['separator_random'] = ''; 
        $formdata['dino'] = ''; 
        $separators = [' ', '-', '.', ''];

        return view('password')->with('formdata',$formdata);
    }

    /**
     * Responds to requests to POST /loremipsum
     */
    public function postIndex(Request $request) {
        $this->validate($request, [
            'numwords' => 'required|numeric|min:1|max:9',
            'separator' => 'required'
            ]
        );
        
        $grafs = $request->input('grafs');
        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs($grafs);
        return view('password')->with('paragraphs', $paragraphs)->with('grafs', $grafs);
    }
}