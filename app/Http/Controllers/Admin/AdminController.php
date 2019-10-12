<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;

class AdminController extends Controller
{

    private $clients;
    public function __construct(CLient $clients)
    {
        $this->clients = $clients;

    }

    public function index()
    {
        $clients = $this->clients->get();

        return view('admin.home.index', ['clients'=>$clients->count()]);
    }
}
