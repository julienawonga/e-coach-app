<?php

namespace App\Controllers;

use App\Models\Coach;
use App\Models\Utilisateur;

class CoachController extends Controller
{

    public function index($params = [])
    {
        // get all users where type_utilisateur = coach
        $coachs = Utilisateur::where('type_utilisateur', 'coach')
            ->with('coach')
            ->get()
            ->toArray();
        $this->render('Coach/index', compact('coachs'));
    }

    /**
     *
     * Display the specified resource
     * @param array $params
     * @return void
     *
     */
    public function show(array $params)
    {
        //Seed::run();
        (int)$id = $params['id'];
        $coach = Coach::where('id_utilisateur', $id)->with('utilisateur')->first();

        if (!$coach) return header('Location: /coachs');

        $experiences = $coach->experiences()->get()->toArray();
        $langues = $coach->coachLangs()->get()->toArray();
        $coach = $coach->toArray();

        $this->render('Coach/show', compact('coach', 'experiences', 'langues'));
    }

    /**
     *
     * Display the specified resource
     * @param array $params
     * @return void
     *
     */
    public function clients()
    {
        $this->checkCoach();
        $coach = Coach::where('id_utilisateur', $_SESSION['coach_id'])->with('utilisateur')->first();
        $clients = $coach->clients()->with('utilisateur')->get()->toArray();
        $coach = $coach->toArray();
        $this->render('Coach/members', compact('coach', 'clients'));
    }

    /**
     *
     * Display the specified resource
     * @param array $params
     * @return void
     *
     */
    public function settings()
    {
        $this->checkCoach();
        $this->render('Coach/settings');
    }

    /**
     *
     * Display the specified resource
     * @param array $params
     * @return void
     *
     */
    public function seances()
    {
        $this->checkCoach();
        $coach = Coach::where('id_utilisateur', $_SESSION['coach_id'])->with('utilisateur')->first();
        $clients = $coach->clients()->with('utilisateur')->get()->toArray();
        $seances = $coach->seances()->with('client', 'client.utilisateur')->get()->toArray();
        $coach = $coach->toArray();
        $this->render('Coach/seances', compact('seances', 'coach', 'clients'));
    }

    /**
     *
     * Display the specified resource
     * @param array $params
     * @return void
     *
     */
    public function dashboard()
    {
        $this->checkCoach();
        $coach = Coach::where('id_utilisateur', $_SESSION['coach_id'])->with('utilisateur')->first();
        $experiences = $coach->experiences()->get()->toArray();
        $langues = $coach->coachLangs()->get()->toArray();
        $seances = $coach->seances()->get()->toArray();
        $clients = $coach->clients()->get()->toArray();
        $coach = $coach->toArray();
        $this->render('Coach/profile', compact('coach', 'experiences', 'langues', 'seances', 'clients'));
    }

}