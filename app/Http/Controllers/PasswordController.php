<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use View;

class PasswordController extends Controller {

    private function scrape($json_file, $word_type) {
            $rawdata = file_get_contents($json_file);
            $object = json_decode($rawdata, true);
            return $object[$word_type];
    }

    private $separators = [' ', '-', '.', ''];
    private $symbols = array('!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '=');

    private $nouns;
    private $adverbs;
    private $adjectives;
    private $allverbs;
    private $dinos;
    private $verbs;
    private $words;

    private $formdata = [
        'numwords' => '',
        'numyes' => '',
        'symbolyes' => '',
        'memorable' => '',
        'separator_space' => '',
        'separator_dash' => '',
        'separator_dot' => '',
        'separator_none' => '',
        'separator_random' => '',
        'dino' => '',
    ];


    public function __construct() {
        # Put anything here that should happen before any of the other actions

        $this->nouns = $this->scrape('words/nouns.json', 'nouns');
        $this->adverbs = $this->scrape('words/adverbs.json', 'adverbs');
        $this->adjectives = $this->scrape('words/adjs.json', 'adjs');
        $this->allverbs = $this->scrape('words/verbs.json', 'verbs');
        $this->dinos = $this->scrape('words/dinosaurs.json', 'dinosaurs');

        $this->verbs = array();

        foreach ($this->allverbs as $verb) {
            array_push($this->verbs, $verb['past']);
        }

        $this->words = array_merge($this->nouns, $this->adverbs, $this->adjectives, $this->verbs);
    }

    /**
    * Responds to requests to GET /password
    */
    public function getIndex() {
        return view('password')->with('formdata',$this->formdata);
    }

    /**
     * Responds to requests to POST /password
     */
    public function postIndex(Request $request) {


        $this->validate($request, [
            'separator' => 'required'
            ]
        );

        $fancy = $request->input('fancy');

        if ($fancy != 'memorable') {
             $this->validate($request, [
                'numwords' => 'required|numeric|min:1|max:9',
                ]
            ); 
        }

        if ($fancy == 'memorable') {
            $this->formdata['memorable'] = 'checked';
        }
        else if ($fancy == 'dino') {
            $this->formdata['dino'] = 'checked';
        }

        $this->formdata['numwords'] = $request->input('numwords');
        
        $num = $request->input('num');
        if ($num == 'on') {
            $this->formdata['numyes'] = 'checked';   
        }

        $symbol = $request->input('symbol');
        if ($symbol == 'on') {
            $this->formdata['symbolyes'] = 'checked';   
        }

        $separator = $request->input('separator');
        if ($separator == 'space') {
            $this->formdata['separator_space'] = 'checked';
            $separator = $this->separators[0];
        }
        else if ($separator == 'dash') {
            $this->formdata['separator_dash'] = 'checked';
            $separator = $this->separators[1];
        }
        else if ($separator == 'dot') {
            $this->formdata['separator_space'] = 'checked';
            $separator = $this->separators[2];
        }
        else if ($separator == 'none') {
            $this->formdata['separator_none'] = 'checked';
            $separator = $this->separators[3];
        } 
        else if ($separator == 'random') {
            $this->formdata['separator_random'] = 'checked';
            $separator = $this->separators[rand(0, (count($this->separators) - 1))];
        }

        $password_string = '';

        if ($fancy == 'memorable') {
            $password_string = $this->adjectives[rand(0, (count($this->adjectives) - 1))] . $separator 
                . $this->nouns[rand(0, (count($this->nouns) - 1))] . $separator 
                . $this->verbs[rand(0, (count($this->verbs) - 1))] . $separator 
                . $this->adverbs[rand(0, (count($this->adverbs) - 1))];
        }
        else if ($fancy == 'dino') {
            $dino_place = rand(0, ($this->formdata['numwords'] - 1));

            for ($i = 0; $i < $this->formdata['numwords']; $i++) {
                if ($i == $dino_place) {
                    $password_string = $password_string . strtoupper($this->dinos[rand(0, (count($this->dinos) - 1))]);
                    if ($i < ($this->formdata['numwords'] - 1)) {
                        $password_string .= $separator;
                    }
                } else {
                    $password_string = $password_string . strtolower($this->words[rand(0, (count($this->words) - 1))]);
                    if ($i < ($this->formdata['numwords'] - 1)) {
                        $password_string .= $separator;
                    }
                }
            }
        }
        else {
            for ($i = 0; $i < $this->formdata['numwords']; $i++) {
                $password_string = $password_string . $this->words[rand(0, (count($this->words) - 1))];
                if ($i < ($this->formdata['numwords'] - 1)) {
                    $password_string .= $separator;
                }
                $password_string = strtolower($password_string);
            }
        }

        if ($num == 'on') {
            $password_string = $password_string . $separator . rand(0, 9);
        }

        if ($symbol == 'on') {
            $password_string = $password_string . $separator . $this->symbols[rand(0, (count($this->symbols) - 1))];
        }
        

        return view('password')->with('formdata', $this->formdata)->with('password_string', $password_string);
    }
}