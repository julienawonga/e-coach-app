<?php 
    namespace App\Controllers;
    use \Twig\Loader\FilesystemLoader;
    use \Twig\Environment;


    abstract class Controller {
        private $loader;
        private $twig;

        public function __construct(){
            $this->loader = new FilesystemLoader(dirname(__DIR__).'/Views');
            $this->twig = new Environment($this->loader);
        }
       
        public function render(?string $view = null, $data = null){
            $this->twig->display($view, array('name'=> 'julien'));
        }

    }