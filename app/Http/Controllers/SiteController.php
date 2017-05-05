<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Customer;

class SiteController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['sites'] = Site::all();
        return view('sites.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data['customers'] = Customer::pluck('title', 'id');
        return view('sites.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:255'
        ]);
        $r = $this->save($request);
        if (!$r) {
            return back()->withInput()->with(['strong' => 'Ops', 'alert' => 'danger', 'message' => 'Algo deu errado, tente novamente!']);
        }
        return redirect()->route('sites.edit', $r->id)->with(['strong' => 'Parabéns', 'message' => 'Site criado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data['site'] = Site::find($id);
        return view('sites.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data['site'] = Site::find($id);
        $data['customers'] = Customer::pluck('title', 'id');
        return view('sites.edit', $data);
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
            'title' => 'required|max:255'
        ]);
        $r = $this->save($request, $id);
        if (!$r) {
            return back()->withInput()->with(['strong' => 'Ops', 'alert' => 'danger', 'message' => 'Algo deu errado, tente novamente!']);
        }
        return redirect()->route('sites.edit', $id)->with(['strong' => 'Parabéns', 'message' => 'Site atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Site::destroy($id);
        return redirect()->route('sites.index', $id)->with(['strong' => 'Parabéns', 'message' => 'Site deletado com sucesso!']);
    }

    /**
     * 
     * @param Request $request
     * @param type $id
     * @return boolean
     */
    public function save(Request $request, $id = null) {
        try {
            $data = $request->all();
            if (!isset($data['customer_id'])) {
                $data['customer_id'] = auth()->user()->customers()->first()->id;
            }
            $site = Site::updateOrCreate(['id' => $id], $data);
            if (isset($data['domain'][0]) && !empty($data['domain'][0] && is_array($data['domain'][0]))) {
                foreach ($data['domain'] as $domain) {
                    $site->domains()->firstOrCreate($domain, $domain);
                }
            }
            return $site;
        } catch (Exception $ex) {
            return false;
        }
    }

}
