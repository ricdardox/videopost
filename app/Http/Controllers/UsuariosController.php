<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;
use Illuminate\Http\Request;
use App\Repositories\UsuariosRepository;
use Response;
use Flash;
use Illuminate\Support\Facades\Input;
use App\Utils\Message;

class UsuariosController extends Controller {

    /** @var  usuariosRepository */
    private $usuariosRepository;

    function __construct(UsuariosRepository $usuariosRepo) {
        $this->middleware('auth');
        $this->usuariosRepository = $usuariosRepo;
    }

    /**
     * Display a listing of the Usuarios.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request) {
        $input = $request->all();

        $result = $this->usuariosRepository->search($input);

        $usuarios = $result[0];

        $attributes = $result[1];

        return view('usuarios.index')
                        ->with('usuarios', $usuarios)
                        ->with('attributes', $attributes);
        ;
    }

    /**
     * Show the form for creating a new Usuarios.
     *
     * @return Response
     */
    public function create() {
        return view('usuarios.create');
    }

    /**
     * Store a newly created Usuarios in storage.
     *
     * @param CreateUsuariosRequest $request
     *
     * @return Response
     */
    public function store(CreateUsuariosRequest $request) {
        $input = $request->all();

        $usuarios = $this->usuariosRepository->store($input);

        Flash::message('Usuario guardado correctamente.');

        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified Usuarios.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $usuarios = $this->usuariosRepository->findUsuariosById($id);

        if (empty($usuarios)) {
            Flash::error('Usuario no encontrado');
            return redirect(route('usuarios.index'));
        }

        return view('usuarios.show')->with('usuarios', $usuarios);
    }

    /*
     *  Muestra la información de usuario que inció sesión
     *
     *
     * @return Response
     */

    public function getMostrar() {
        $usuarios = auth()->user();
        if (empty($usuarios)) {
            Flash::error('Usuario no encontrado');
            return redirect(route('usuarios.index'));
        }

        return view('usuarios.showLogin')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for editing the specified Usuarios.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $usuarios = $this->usuariosRepository->findUsuariosById($id);

        if (empty($usuarios)) {
            Flash::error('Usuarios no encontrado');
            return redirect(route('usuarios.index'));
        }

        return view('usuarios.edit')->with('usuarios', $usuarios);
    }

    /**
     * Update the specified Usuarios in storage.
     *
     * @param  int    $id
     * @param CreateUsuariosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsuariosRequest $request) {
        $usuarios = $this->usuariosRepository->findUsuariosById($id);

        if (empty($usuarios)) {
            Flash::error('Usuario no encontrado');
            return redirect(route('usuarios.index'));
        }

        $usuarios = $this->usuariosRepository->update($usuarios, $request->all());

        Flash::message('Usuario actualizado correctamente.');

        return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified Usuarios from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $usuarios = $this->usuariosRepository->findUsuariosById($id);

        if (empty($usuarios)) {
            Flash::error('Usuario no encontrado');
            return redirect(route('usuarios.index'));
        }

        $usuarios->active = false;
        $usuarios->save();

        Flash::message('Usuario eliminado correctamente.');

        return redirect(route('usuarios.index'));
    }

    public function libres() {
        return $this->usuariosRepository->libres();
    }

    public function postAgregarroles() {
        $usuarioId = Input::get('usuario');
        $roles = Input::get('roles');
        $usuario = $this->usuariosRepository->findUsuariosById($usuarioId);
        if (empty($usuario)) {
            return response()->json(Message::show(Message::WARNING, 'No se ha encontrado ningún usuario para agrear los roles.'));
        }
        $rolesAux = [];
        if (!empty($roles)) {
            foreach ($roles as $key => $value) {
                $rolesAux[] = $value['codigo'];
            }
            try {
                $existentes = $this->usuariosRepository->tieneRoles($usuario, $rolesAux);
                $nuevos = array_diff($rolesAux, $existentes->all());
                if (!empty($nuevos)) {
                    $usuario->roles()->attach($nuevos);
                    return response()->json(Message::show(Message::SUCCESS, 'Roles relacionados correctamente.'));
                }
                return response()->json(Message::show(Message::INFO, 'No se ha asociado ningún rol al usuario por que ya fueron relacionados con anterioriodad.', ['recargar' => false]));
            } catch (Exception $exc) {
                
            }
        } else {
            return response()->json(Message::show(Message::INFO, 'No se ha seleccionado ningún rol para asociar.', ['recargar' => false]));
        }
        return response()->json(Message::show(Message::INFO, 'No se ha realizado ninguna acción.'));
    }

    public function postQuitarrol() {
        $usuarioId = Input::get('usuario');
        $rolId = Input::get('roles');
        $usuario = $this->usuariosRepository->findUsuariosById($usuarioId);
        $resultado = Message::show(Message::INFO, 'No se ha realizado ninguna acción.');
        if (!empty($usuario)) {
            $usuario->roles()->detach([$rolId]);
            $resultado = Message::show(Message::SUCCESS, 'Rol eliminado correctamente.');
        } else {
            $resultado = Message::show(Message::INFO, 'El usuario no ha sido encontrado.', ['recargar' => false]);
        }
        return response()->json($resultado);
    }

}
