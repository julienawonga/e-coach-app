<?php

namespace App\Controllers;

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
    public function index($params = [])
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
     * Create a new resource
     * @param array $params
     * @param array $post
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

    public function aboutUs($params = [])
    {
        $this->render('Home/about-us');
    }

    public function cgu($params = [])
    {
        $this->render('Home/cgu');
    }

    public function faqs($params = [])
    {
        $this->render('Home/faqs');
    }

    public function passwordreset($params = [])
    {
        $this->render('Guest/passwordreset');
    }
}