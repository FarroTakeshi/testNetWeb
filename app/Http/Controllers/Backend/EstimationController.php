<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Estimation;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class EstimationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $estimations = $user->estimations;

        $estimations = $estimations->sortByDesc('request_date');

        return view('estimations.index', compact('estimations'));
    }

    public function create()
    {
        return view('estimations.create');
    }

    public function store()
    {
        $this->validate(request(), [
            's_actor'        => 'required|integer|between:0,99',
            'a_actor'        => 'required|integer|between:0,99',
            'c_actor'        => 'required|integer|between:0,99',
            's_usecase'      => 'required|integer|between:0,99',
            'a_usecase'      => 'required|integer|between:0,99',
            'c_usecase'      => 'required|integer|between:0,99',
            'tef'            => 'required|integer|between:1,165',
            'f_productivity' => 'required|integer|between:1,99',
        ]);

        $current_date = Carbon::now();
        $user_id      = Auth::id();

        $inputs = array(request('s_actor'),
                    request('a_actor'),
                    request('c_actor'),
                    request('s_usecase'),
                    request('a_usecase'),
                    request('c_usecase'),
                    request('tef')/100,
                    request('f_productivity')
                );

        $json = json_encode($inputs);
        $process = new Process("python /Users/takeshi/PycharmProjects/testnet/estimation.py  {$json}");
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $output = $process->getOutput();

        $estimation = Estimation::create([
            's_actor'          => request('s_actor'),
            'a_actor'          => request('a_actor'),
            'c_actor'          => request('c_actor'),
            's_usecase'        => request('s_usecase'),
            'a_usecase'        => request('a_usecase'),
            'c_usecase'        => request('c_usecase'),
            'tef'              => request('tef'),
            'f_productivity'   => request('f_productivity'),
            'request_date'     => $current_date,
            'user_id'          => $user_id,
            'effort_estimated' => $output,
        ]);

        return redirect()->route('estimations.result', ['id' => $estimation->id])
                         ->with('message', 'Operacion completada');
    }

    public function result($id)
    {
        $estimation = Estimation::find($id);
        $output = $estimation->effort_estimated;
        return view('estimations.result', compact('output'));
    }
}
