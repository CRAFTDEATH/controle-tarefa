<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tarefa;
use App\Mail\NovaTarefaMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index(Request $request)
    {
        $tarefas = Tarefa::where('user_id',Auth::user()->id)
            ->orderBy('data_limite_conclusao','desc')
            ->paginate('1');
        return view('tarefa.index',['tarefas'=>$tarefas,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $tarefa = Tarefa::create($request->all());
        $destinatario = Auth::user()->email;
        Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));
        return redirect()->route('tarefa.show',['tarefa'=>$tarefa]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show',['tarefa'=>$tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        return view('tarefa.edit',['tarefa'=>$tarefa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $request['user_id'] = $tarefa->user_id;
        if($request->user_id !== Auth::user()->id){
            abort(401);
        }
        $tarefa->update($request->all());
        return redirect()->route('tarefa.show',['tarefa'=>$tarefa->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        if($tarefa->user_id != Auth::user()->id){
            abort(401);
        }
        $tarefa->delete();
        return redirect()->route('tarefa.index');
    }
}
