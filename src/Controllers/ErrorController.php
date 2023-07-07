<?php
namespace App\Controllers;

class ErrorController extends Controller{

      /**
     *
     * Store a newly created resource in storage
     * @param array $params
     * @param array $post
     * @return void
     *
     */
    public function notFound(array $params = [], array $post = [])
    {
        $this->render('404');
    }


     /**
     *
     * Store a newly created resource in storage
     * @param array $params
     * @param array $post
     * @return void
     *
     */
    public function unauthorized(array $params = [], array $post = [])
    {
        $this->render('401');
    }

 /**
     *
     * Store a newly created resource in storage
     * @param array $params
     * @param array $post
     * @return void
     *
     */
    public function forbidden(array $params = [], array $post = [])
    {
        $this->render('403');
    }

}