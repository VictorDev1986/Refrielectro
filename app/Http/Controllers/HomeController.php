<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Muestra la página de inicio (landing page) de la empresa.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }
}
