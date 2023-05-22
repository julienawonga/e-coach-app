<?php

namespace App\Controllers;

use App\Helpers\Assets;
use App\Models\Avis;
use App\Models\Client;
use App\Models\Utilisateur;
use App\Seeders\Seed;

class MainController extends Controller
{

    /**
     *
     * Display a listing of the resource
     * @param array $params
     * @return void
     *
     */
    public function index(array $params = [])
    {
        //Seed::run();
        $coachs = Utilisateur::where('type_utilisateur', 'coach')
                            ->with('coach')
                            ->select('id', 'nom', 'prenom', 'sex', 'profil_image')
                            ->take(4)
                            ->get()
                            ->toArray();

        $this->render('Home/index', compact('coachs'));
    }

   /**
     *
     * Display a listing of the resource
     * @param array $params
     * @return void
     *
     */
    public function create($params = [], $post = [])
    {
        $this->render('Guest/register');
    }

    /**
     *
     * Store a newly created resource in storage
     * @param array $params
     * @param array $post
     * @return void
     *
     */
    public function login($params = [], $post = [])
    {
        $this->render('Guest/login');
    }

    /**
     *
     * Store a newly created resource in storage
     * @param array $params
     * @param array $post
     * @return void
     *
     */
    public function aboutUs($params = [])
    {
        $this->render('Home/about-us');
    }

    /**
     *
     * Store a newly created resource in storage
     * @param array $params
     * @param array $post
     * @return void
     *
     */
    public function cgu($params = [])
    {
        $this->render('Home/cgu');
    }

    /**
     *
     * Store a newly created resource in storage
     * @param array $params
     * @param array $post
     * @return void
     *
     */
    public function faqs(array $params= [], array $post = [])
    {
        $this->render('Home/faqs');
    }

    /**
     *
     * Store a newly created resource in storage
     * @param array $params
     * @param array $post
     * @return void
     *
     */
    public function passwordreset(array $params = [], array $post = [])
    {
        $this->render('Guest/passwordreset');
    }
}