<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientFormRequest;
use App\Models\Client;
use App\Models\Person;
use App\Models\State;
use App\Models\Plan;

class ClientController extends Controller
{

    private $clients;
    private $states;
    private $plans;
    private $people;
    private $totalPage = 7;
    public function __construct(CLient $clients, State $states, Person $people, Plan $plans)
    {
        $this->clients = $clients;
        $this->states = $states;
        $this->plans = $plans;
        $this->people = $people;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $keyword = $request->get('search');
            $clients = $this->clients
                ->search($keyword, ['person.cpf'=>10, 'person.id_number'=>10, 'person.name'=> 6])
                ->orderBy('id', 'desc')
                ->with('person')
                ->paginate($this->totalPage)
                ->appends(['search' => $keyword]);
                return view('admin.client.index', ['clients' => $clients, 'search' =>$keyword]);
        }
        else{
            $clients = $this->clients
            ->orderBy('id', 'desc')
            ->with('person')
            ->paginate($this->totalPage);
            return view('admin.client.index', ['clients' => $clients]);
        }
        //dd($clients);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = $this->states->orderBy('name')->pluck('uf', 'id');
        $plans = $this->plans->orderBy('id')->pluck('name', 'id');
        //dd($states);
        return view('admin.client.create-edit', ['states' => $states,  'plans' => $plans]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientFormRequest $request)
    {
        //
        $plan_id = $request->plan_id;
        $dataForm = $request->except(['_token','biometric_hash', 'plan_id']);
        //dd($dataForm);
        $insert = $this->people->create($dataForm);

        if($insert)
        {
            $insert = $this->clients->create([
                'id'                => $insert->id,
                'plan_id'           => $plan_id,
                'biometric_hash'    => bcrypt($insert->id),

            ]);
            if($insert)
            {
                return redirect('admin/client')->with('success', 'O Cliente foi cadastrado com sucesso!');
            }
            else
                return redirect()->back();

        }
        else
            return redirect()->back();

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
        $states = $this->states->orderBy('name')->pluck('uf', 'id');
        $plans = $this->plans->orderBy('id')->pluck('name', 'id');
        $client = $this->clients->with('person')->find($id);
        //dd($client);
        return view('admin.client.create-edit', ['client' => $client, 'states' => $states,  'plans' => $plans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientFormRequest $request, $id)
    {
        //
        $dataForm = $request->except("_token");

        $person = $this->people->findOrFail($id);
        $client = $this->clients->findOrFail($id);
        //dd($request);
        $update = $person->update($dataForm);



        if($update)
        {

            $update = $client->update($dataForm);

            if($update)
                return redirect('admin/client')->with('success', 'O Cliente foi alterado com sucesso!');
            else
                return redirect()->back()->with(['errors' => 'Falha ao editar!']);
        }
        else
            return redirect()->back()->with(['errors' => 'Falha ao editar!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = $this->people->findOrFail($id);
        $delete = $person->delete();

        if ($delete)
            return redirect('admin/client/')->with('success', 'O cliente '.$person->name.' foi excluído com sucesso!');
        else
            return redirect()->back()->with(['error' => 'Falha ao excluír Cliente!']);
    }
}
