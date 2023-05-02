<?php

namespace App\Controllers;

use App\Models\Coach;
use App\Models\Utilisateur;

class CoachController extends Controller
{

    public function index($params = [])
    {
        $this->render('Coach/index');
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
        (int)$id = $params['id'];
        $coach = Coach::where('id_utilisateur', $id)->with('utilisateur')->first();
        if(!$coach) return header('Location: /coachs');
        $coach = $coach->toArray();
        $this->render('Coach/show', compact('coach'));
    }

    /**
     *
     * Display the specified resource
     * @param array $params
     * @return void
     *
     */
    public function client()
    {
        $this->checkCoach();
        $this->render('Coach/members');
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
    public function messages()
    {
        $this->checkCoach();
        $this->render('Coach/messages');
    }

    /**
     *
     * Display the specified resource
     * @param array $params
     * @return void
     *
     */
    public function chat()
    {
        $this->checkCoach();
        $this->render('Coach/chat');
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
        $coach = Utilisateur::where('id', $_SESSION['coach_id'])->with('coach')->first()->toArray();
        $this->render('Coach/profile', compact('coach'));
    }

}