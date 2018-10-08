<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class EstimationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $estimations = $user->estimations();

        return view('estimations.index', compact('estimations'));
    }

    public function create()
    {
        return view('estimations.create');
    }

    public function store()
    {

    }
}
