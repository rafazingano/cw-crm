<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Customer;
use App\Role;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->authorize('user-index');

        $data['users'] = Auth::user()->customers()->first()->users;
        $data['bgtitle'] = [
            'title' => 'USUÁRIOS',
            'buttons' => [
                    ['text' => 'Adicionar novo', 'btn' => 'primary', 'href' => route('users.create')]
            ],
            'breadcrumbs' => [
                    ['text' => 'Dashboard', 'href' => route('dashboard')],
                    ['text' => 'Usuários']
            ]
        ];
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $this->authorize('user-create');
        $data['bgtitle'] = [
            'title' => 'NOVO USUÁRIO',
            'breadcrumbs' => [
                    ['text' => 'Dashboard', 'href' => route('dashboard')],
                    ['text' => 'Usuários', 'href' => route('users.index')],
                    ['text' => 'Novo Usuário']
            ]
        ];
        $data['roles'] = Role::where('level', '>=', Auth::user()->roles()->orderBy('level', 'asc')->first()->level)->pluck('title', 'id');
        return view('users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->authorize('user-create');
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:255',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $this->authorize('user-show');
        return view('users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $this->authorize('user-edit');
        
        $data['user'] = User::find($id);
        $data['bgtitle'] = [
            'title' => 'EDITAR USUÁRIO',
            'breadcrumbs' => [
                    ['text' => 'Dashboard', 'href' => route('dashboard')],
                    ['text' => 'Usuários', 'href' => route('users.index')],
                    ['text' => 'Editar Usuário']
            ]
        ];
        //dd($data['user']->roles->pluck('id'));
        $data['roles'] = Role::where('level', '>=', Auth::user()->roles()->orderBy('level', 'asc')->first()->level)->pluck('title', 'id');
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->authorize('user-edit');
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => [
                'required',
                'max:255',
                Rule::unique('users')->ignore($id)
            ],
            'password' => 'required|max:255',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->authorize('user-destroy');
    }

    private function save(Request $request, $id = null) {
        $input = $request->all();
        $user = updateOrCreate(['id' => $id], $input);
        if(isset($input['roles'])){
            $user->roles()->sync($input['roles']);
        }
        return $user;
    }

}
