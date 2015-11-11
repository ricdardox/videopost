<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

/**
 * Description of RepoBase
 *
 * @author anonymous
 */
//use Illuminate\Support\Facades\Schema;

abstract class RepoBase {

    private $model;

    public function __construct() {
        $this->model = $this->getModel();
    }

    public abstract function getModel();

    //put your code here
    public function todosActivos($eloquen = false) {
        $fuente = $this->getModel()->where('estadoregistro', '=', 'A');
        if (!$eloquen) {
            $fuente = $fuente->get();
        }
        return $fuente;
    }

}
