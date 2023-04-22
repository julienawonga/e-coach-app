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
            $this->twig = new Environment($this->loader, [
                'debug' => true,
            ]);
            $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        }
       
        public function render(?string $view = null, array $params = []){
            $view_path = $view.'.html.twig';
            $data = json_decode(json_encode($params));
            $assets_path = Assets::assets();
            $this->twig->display($view_path, ['assets_path' => $assets_path, 'data'=> $data]);
        }

    }