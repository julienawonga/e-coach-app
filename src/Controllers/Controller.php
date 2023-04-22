<?php 
    namespace App\Controllers;
    use \Twig\Loader\FilesystemLoader;
    use \Twig\Environment;
    use App\Helpers\Assets;

    abstract class Controller {
        private $loader;
        private $twig;

        public function __construct(){
            $this->loader = new FilesystemLoader(dirname(__DIR__).'/Views');
            $this->twig = new Environment($this->loader);
        }
       
        public function render(?string $view = null, $params = []){
            $view_path = $view.'.html.twig';
            $data = array(Assets::assets(), $params);
            $this->twig->display($view_path, $data);
        }

    }