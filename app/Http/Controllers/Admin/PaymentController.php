<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentFormRequest;
use App\Models\Client;
use App\Models\Person;
use App\Models\Plan;
use App\Models\Payment;
use Auth;

class PaymentController extends Controller
{
    //
    private $clients;
    private $payment;
    private $plans;
    private $people;
    private $totalPage = 7;
    public function __construct(CLient $clients, Person $people, Plan $plans, Payment $payment)
    {
        $this->clients = $clients;
        $this->plans = $plans;
        $this->people = $people;
        $this->payment = $payment;
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


        /**
     * Show the form for creating a new resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function register($id)
    {
        $clients = $this->clients
        ->with('plan')
        ->with('person')
        ->with('payment')->find($id);
        //dd($clients);

        return view('admin.payment.register', ['client' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentFormRequest $request, $id)
    {
        
        $dataForm = $request->except(['_token']);
        //dd($id, $dataForm);
        $dataForm['user_id'] = Auth::user()->id;
        $dataForm['client_id'] = $id;
        $insert = $this->payment->create($dataForm);
        if($insert)
        {
            return redirect('admin/payment')->with('success', 'O Pagamento foi registrado com sucesso!');
        }
        else
            return redirect()->back();

    }


}
