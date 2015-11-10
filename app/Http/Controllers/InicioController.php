<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class InicioController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view('inicio');
    }
    
}
