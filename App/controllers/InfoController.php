<?php

namespace App\controllers;

class InfoController{
    public function about() {
        loadView('about');
    }

    public function contact() {
        loadView('contact');
    }
}