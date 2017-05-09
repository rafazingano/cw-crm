<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\Permission;

class RoleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->authorize('role-index');
        $data['bgtitle'] = [
            'title' => 'LISTAGEM DE FUNÇÕES',
            'breadcrumbs' => [
                    ['text' => 'Dashboard', 'href' => route('dashboard')],
                    ['text' => 'Funções']
            ],
            'buttons' => [
                    ['text' => 'Nova Função', 'href' => route('roles.create')]
            ]
        ];
        $data['roles'] = Role::all();
        return view('roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $this->authorize('role-create');
        $data['bgtitle'] = [
            'title' => 'CRIAR UMA FUNÇÃO',
            'breadcrumbs' => [
                    ['text' => 'Dashboard', 'href' => route('dashboard')],
                    ['text' => 'Funções', 'href' => route('roles.index')],
                    ['text' => 'Nova função'],
            ]
        ];
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $d = explode('-', $permission->slug);
            $data['permissions'][$d[0]][$permission->id] = $permission->title;
        }
        $data['levels'] = Role::where('level', '>=', Auth::user()->roles()->orderBy('level', 'asc')->first()->level)->pluck('title', 'level');
        return view('roles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->authorize('role-create');
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|unique:roles|max:255',
        ]);
        $role = $this->save($request);
        return redirect()->route('roles.edit', $role->id)->with('message', 'Salvo com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $this->authorize('role-show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $this->authorize('role-edit');
        $data['role'] = Role::find($id);
        $data['bgtitle'] = [
            'title' => 'CRIAR UMA FUNÇÃO',
            'breadcrumbs' => [
                    ['text' => 'Dashboard', 'href' => route('dashboard')],
                    ['text' => 'Funções', 'href' => route('roles.index')],
                    ['text' => 'Edite a função ' . $data['role']['title']],
            ]
        ];
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $d = explode('-', $permission->slug);
            $data['permissions'][$d[0]][$permission->id] = $permission->title;
        }
        $data['levels'] = Role::where('level', '>=', Auth::user()->roles()->orderBy('level', 'asc')->first()->level)->pluck('title', 'level');
        return view('roles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->authorize('role-edit');
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => [
                'required',
                'max:255',
                Rule::unique('roles')->ignore($id)
            ],
        ]);
        $role = $this->save($request, $id);
        return redirect()->route('roles.edit', $role->id)->with('message', 'Editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->authorize('role-destroy');
        Role::destroy($id);
        return redirect()->route('roles.index', $id)->with(['strong' => 'Parabéns', 'message' => 'Função deletada com sucesso!']);
    }

    public function save(Request $request, $id = null) {
        $input = $request->all();
        $input['slug'] = str_slug($input['slug'], '-');
        $input['level'] = $input['level']++;
        $role = Role::updateOrCreate(['id' => $id], $input);
        $role->permissions()->sync($input['permissions']);
        return $role;
    }

}
