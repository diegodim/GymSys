<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientCreateFormRequest;
use App\Models\Client;
use App\Models\Person;
use App\Models\State;

class ClientController extends Controller
{

    private $clients;
    private $states;
    private $people;
    private $totalPage = 7;
    public function __construct(CLient $clients, State $states, Person $people)
    {
        $this->clients = $clients;
        $this->states = $states;
        $this->people = $people;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = $this->clients->orderBy('id', 'desc')->with('person')->paginate($this->totalPage);
        //dd($clients);
        return view('admin.client.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = $this->states->orderBy('name')->pluck('uf', 'id');
        //dd($states);
        return view('admin.client.create-edit', ['states' => $states ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientCreateFormRequest $request)
    {
        //
        $dataForm = $request->except(['_token','biometric_hash']);

        $insert = $this->people->create($dataForm);
        //dd($insert);
        if($insert)
        {
            $insert = $this->clients->create([
                'id'                => $insert->id,
                'biometric_hash'    => bcrypt($insert->id),

            ]);
            if($insert)
            {
                return redirect('admin/client');
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
}
