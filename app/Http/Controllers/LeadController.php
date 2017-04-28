<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Domain;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['leads'] = Lead::all();
        return view('leads.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lead = $this->save($request);
        if(isset($request->_token)){
            return back()->withInput();
        }
        return response()->json($lead);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function save(Request $request) {
        $data = $request->all();
        $domain_previous = str_replace('www.', '', explode('/', url()->previous())[2]);
        
        $domain = Domain::where(['domain' => $domain_previous])->first();
        if($domain->count() <= 0){
            return ['status' => false, 'message' => 'Dominio ' . $domain_previous . ' não cadastrado no crm!', 'lead' => null];
        }
        $site_id = $domain['site_id'];
        if((!isset($data['email']) || empty($data['email'])) && (!isset($data['phone']) || empty($data['phone']))){
            return ['status' => false, 'message' => 'Nenhum email e/ou telefone encontrado!', 'lead' => null];
        }
        $content = json_encode($data);
        $data_lead = [
            'site_id' => $site_id,
            'content' => $content
        ];
        $lead = Lead::create($data_lead);
        return ['status' => true, 'message' => 'Lead cadastrado com sucesso!', 'lead' => $lead];
    }

}
