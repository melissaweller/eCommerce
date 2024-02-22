<?php
namespace app\controllers;

class Main {
    
    public function index() {
        this->view('Main/index');
    }

    public function about_us() {
        this->view('Main/about_us');
    }
}