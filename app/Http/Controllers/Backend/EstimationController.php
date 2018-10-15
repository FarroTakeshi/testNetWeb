<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Estimation;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class EstimationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $estimations = $user->estimations;

        return view('estimations.index', compact('estimations'));
    }

    public function create()
    {
        return view('estimations.create');
    }

    public function store()
    {
        $this->validate(request(), [
            's_actor'        => 'required|integer',
            'a_actor'        => 'required|integer',
            'c_actor'        => 'required|integer',
            's_usecase'      => 'required|integer',
            'a_usecase'      => 'required|integer',
            'c_usecase'      => 'required|integer',
            'tef'            => 'required|integer',
            'f_productivity' => 'required|integer',
        ]);

        $current_date = Carbon::now();
        $user_id      = Auth::id();

        $estimation = Estimation::create([
            's_actor'        => request('s_actor'),
            'a_actor'        => request('a_actor'),
            'c_actor'        => request('c_actor'),
            's_usecase'      => request('s_usecase'),
            'a_usecase'      => request('a_usecase'),
            'c_usecase'      => request('c_usecase'),
            'tef'            => request('tef'),
            'f_productivity' => request('f_productivity'),
            'request_date'   => $current_date,
            'user_id'        => $user_id,
        ]);

        return redirect()->route('estimations.index')
                         ->with('message', 'Operacion completada');
    }
}
