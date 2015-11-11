<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Schema;
use App\Repositories\RepoBase;
use DB;
use Illuminate\Support\Facades\Hash;

class UsuariosRepository extends RepoBase {

    private $paginate = 10;

    public function getModel() {
        return new User();
    }

    /**
     * Returns all Usuarios
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all() {
        return $this->getModel()->paginate($this->paginate);
    }

    public function search($input) {
        $query = $this->getModel()
                ->query();

        $columns = Schema::getColumnListing('users');
        $attributes = array();

        foreach ($columns as $attribute) {
            if (isset($input[$attribute])) {

                $query->where(DB::raw($attribute . '::text'), 'ilike', $input[$attribute] . '%');

                $attributes[$attribute] = $input[$attribute];
            } else {
                $attributes[$attribute] = null;
            }
        }

        return [$query->orderBy('username', 'asc')->paginate($this->paginate)->appends($input), $attributes];
    }

    /**
     * Stores Usuarios into database
     *
     * @param array $input
     *
     * @return Usuarios
     */
    public function store($input) {
        if ($input['active'] == 'A') {
            $input['active'] = true;
        } else {
            $input['active'] = false;
        }
        if ($input['password'] == '') {
            $input['password'] = Hash::make(123456);
        } else {
            $input['password'] = Hash::make($input['password']);
        }
        return $this->getModel()->create($input);
    }

    /**
     * Find Usuarios by given id
     *
     * @param int $id
     *
     * @return \Illuminate\Support\Collection|null|static|Usuarios
     */
    public function findUsuariosById($id) {
        return $this->getModel()->find($id);
    }

    /**
     * Updates Usuarios into database
     *
     * @param Usuarios $usuarios
     * @param array $input
     *
     * @return Usuarios
     */
    public function update($usuarios, $input) {
        if ($input['password'] == '') {
            unset($input['password']);
        } else {
            $input['password'] = \Illuminate\Support\Facades\Hash::make($input['password']);
        }
        if ($input['active'] == 'A') {
            $input['active'] = true;
        } else {
            $input['active'] = false;
        }
        $usuarios->fill($input);
        $usuarios->save();

        return $usuarios;
    }

    /**
     * Lista todas las EPS para cargar los selects
     * @return array
     */
    public function libres() {
        $fuente = $this->getModel()->get();
        $salida = ['' => 'Seleccione el usuario'];
        foreach ($fuente as $key => $value) {
            if ($value->personas()->count() == 0) {
                $salida[$value->id] = '(' . $value->username . ') ' . $value->name;
            }
        }
        return $salida;
    }

    public function tieneRoles($usuario, array $roles) {
        if (count($roles)) {
            return $usuario->roles()->whereIn('id', $roles)->lists('id');
        }
        return [];
    }

}
