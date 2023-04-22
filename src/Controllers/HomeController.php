<?php
    namespace App\Controllers;

    class HomeController extends Controller {

        /**
         * 
         * Display a listing of the resource
         * @param array $params
         * @return void
         * 
         */ 
        public function index($params = []) {
            $this->render('Home/index');
        }

        public function aboutUs($params = []) {
            $this->render('Home/about-us');
        }

        public function cgu($params = []) {
            $this->render('Home/cgu');
        }

        public function faqs($params = []) {
            $this->render('Home/faqs');
        }
    }