<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Domain;
use App\User;

class LeadController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['leads'] = Lead::all();
        return view('leads.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('leads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $lead = $this->save($request);
        //if ($request->ajax()) {
        //    return response()->json($lead);
        //}
        return back()->withInput()->with('message', 'Lead Adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('leads.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function save(Request $request) {
        $data = $request->except(['_token']);
        $domain_previous = str_replace('www.', '', explode('/', url()->previous())[2]);
        $domain = Domain::where(['domain' => $domain_previous])->first();
        if ($domain->count() <= 0) {
            return ['status' => false, 'message' => 'Dominio ' . $domain_previous . ' não cadastrado no crm!', 'lead' => null];
        }
        $site_id = $domain['site_id'];
        if ((!isset($data['email']) || empty($data['email'])) && (!isset($data['phone']) || empty($data['phone']))) {
            return ['status' => false, 'message' => 'Nenhum email e/ou telefone encontrado!', 'lead' => null];
        }
        $content = json_encode($data);
        $data_lead = [            
            'site_id' => $site_id,
            'code' => uniqid(),
            'content' => $content
        ];
        $lead = Lead::create($data_lead);
        if (isset($data['email']) || !empty($data['email'])) {
            $email = $data['email'];
            $name = isset($data['name']) ? $data['name'] : explode('@', $data['email'])[0];
            $password = bcrypt('98462495846498454894654987458');
            $remember_token = str_random(10);
            $user = User::firstOrCreate(
                ['email' => $email], ['email' => $email, 'name' => $name, 'password' => $password, 'remember_token' => $remember_token]
            );
            $user->leads()->attach([$lead->id]);
        }
        return ['status' => true, 'message' => 'Lead cadastrado com sucesso!', 'lead' => $lead];
    }

}
