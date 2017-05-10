<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\User;
use App\Role;
use App\Lead;

class CustomerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->authorize('customer-index');
        $data['bgtitle'] = [
            'title' => 'CLIENTES',
            'buttons' => [
                    ['text' => 'Adicionar novo', 'btn' => 'primary', 'href' => route('customers.create')]
            ],
            'breadcrumbs' => [
                    ['text' => 'Dashboard', 'href' => route('dashboard')],
                    ['text' => 'Clientes']
            ]
        ];
        $data['customers'] = Customer::all();
        return view('customers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data['roles'] = Role::where('level', '>=', Auth::user()->roles()->orderBy('level', 'asc')->first()->level)->pluck('title', 'id');
        return view('customers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:255',
            'user.email' => 'required'
        ]);
        $r = $this->save($request);
        if (!$r) {
            return back()->withInput()->with(['strong' => 'Ops', 'alert' => 'danger', 'message' => 'Algo deu errado, tente novamente!']);
        }
        return redirect()->route('customers.edit', $r->id)->with(['strong' => 'Parabéns', 'message' => 'Cliente criado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data['customer'] = Customer::find($id);
        return view('customers.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $this->authorize('customer-edit');
        $data['customer'] = Customer::find($id);
        $data['roles'] = Role::where('level', '>=', Auth::user()->roles()->orderBy('level', 'asc')->first()->level)->pluck('title', 'id');
        return view('customers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required|max:255',
            'user.email' => 'required'
        ]);
        $r = $this->save($request, $id);
        if (!$r) {
            return back()->withInput()->with(['strong' => 'Ops', 'alert' => 'danger', 'message' => 'Algo deu errado, tente novamente!']);
        }
        return redirect()->route('customers.edit', $id)->with(['strong' => 'Parabéns', 'message' => 'Cliente atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Customer::destroy($id);
        return redirect()->route('customers.index', $id)->with(['strong' => 'Parabéns', 'message' => 'Cliente deletado com sucesso!']);
    }

    /**
     * 
     * @param Request $request
     * @param type $id
     * @return boolean
     */
    public function save(Request $request, $id = null) {
        try {
            $data = $request->except(['user']);
            $requestUser = $request->user;
            if (!$id) {
                $user = User::firstOrCreate(['email' => $requestUser['email']], $requestUser);
                if ($user->wasRecentlyCreated && isset($requestUser['roles'])) {
                    $user->roles()->attach($requestUser['roles']);
                }
                $data['user_id'] = $user->id;
            }
            $customer = Customer::updateOrCreate(['id' => $id], $data);
            if (isset($user)) {
                $customer->users()->attach($data['user_id']);
            }
            return $customer;
        } catch (Exception $ex) {
            return false;
        }
    }

}
