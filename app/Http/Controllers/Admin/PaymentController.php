<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientFormRequest;
use App\Models\Client;
use App\Models\Person;
use App\Models\Plan;
use App\Models\Payment;

class PaymentController extends Controller
{
    //
    private $clients;

    private $plans;
    private $people;
    private $totalPage = 7;
    public function __construct(CLient $clients, Person $people, Plan $plans)
    {
        $this->clients = $clients;
        $this->plans = $plans;
        $this->people = $people;
    }


    public function index(Request $request)
    {
        if($request->has('search')){
            $keyword = $request->get('search');
            $clients = $this->clients
                ->search($keyword, ['person.cpf'=>10, 'person.id_number'=>10, 'person.name'=> 6])
                ->orderBy('id', 'desc')
                ->with('person')
                ->with('payment')
                ->paginate($this->totalPage)
                ->appends(['search' => $keyword]);
                return view('admin.payment.index', ['clients' => $clients, 'search' =>$keyword]);
        }
        else{
            $clients = $this->clients
            ->orderBy('id', 'desc')
            ->with('person')
            ->with('payment')
            ->paginate($this->totalPage);
            //dd($clients);
            return view('admin.payment.index', ['clients' => $clients]);
        }
    }


}
