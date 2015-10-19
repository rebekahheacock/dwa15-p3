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
        $grafs = '';
        return view('password')->with('grafs',$grafs);
    }

    /**
     * Responds to requests to POST /loremipsum
     */
    public function postIndex(Request $request) {
        $this->validate($request, 
            ['grafs' => 'required|numeric|min:1|max:10']
        );
        
        $grafs = $request->input('grafs');
        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs($grafs);
        return view('password')->with('paragraphs', $paragraphs)->with('grafs', $grafs);
    }
}