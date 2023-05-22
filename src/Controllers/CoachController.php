<?php

namespace App\Controllers;

use App\Models\Coach;
use App\Models\Utilisateur;

class CoachController extends Controller
{


    public function index($params = [])
    {
        $results_per_page = 15;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $results_per_page;

        $number_of_coachs = Utilisateur::where('type_utilisateur', 'coach')->count();
        $total_pages = ceil($number_of_coachs / $results_per_page);

        $coachs = Utilisateur::where('type_utilisateur', 'coach')
            ->with('coach')
            ->skip($offset)
            ->take($results_per_page)
            ->latest()
            ->get()
            ->toArray();

        $this->render('Coach/index', compact('coachs', 'total_pages'));
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

        (int)$id = $_SESSION['coach_id'];

        $coach = Coach::where('id_utilisateur', $id)->with('utilisateur')->first();
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

        (int)$id = $_SESSION['coach_id'];

        $coach = Coach::where('id_utilisateur', $id)->with('utilisateur')->first();

        $this->render('Coach/settings', compact('coach'));
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

    /**
     *
     * Display the specified resource
     * @param array $params
     * @return void
     *
     */
    public function update(array $params, array $post){
        $this->checkCoach();
        $user = Utilisateur::where('id', $_SESSION['coach_id'])->first();
        $coach = Coach::where('id_utilisateur', $_SESSION['coach_id'])->first();

        $user->nom = $post['nom'];
        $user->prenom = $post['prenom'];
        $user->email = $post['email'];
        $user->est_complete = 1;

        $coach->specialite = $post['specialite'];
        $coach->description = $post['description'];
        $coach->tarif_horaire = $post['tarif'];
        $coach->disponibilite = $post['disponibilite'];

        $user->save();
        $coach->save();

        return header('Location: /coach/dashboard');
    }

}