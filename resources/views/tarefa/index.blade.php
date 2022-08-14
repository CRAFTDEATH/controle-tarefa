@extends('layouts.app')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Listar de Tarefas
                        <a class="btn btn-default float-end" href="{{route('tarefa.create')}}">
                            <i class="bi bi-plus" style="font-size:25px;"></i>
                        </a>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tarefa</th>
                                    <th>Data limita de conlusão</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tarefas as  $tarefa)
                                    <tr>
                                        <td>{{$tarefa->id}}</td>
                                        <td>{{$tarefa->tarefa}}</td>
                                        <td>{{date('d/m/Y',strtotime($tarefa->data_limite_conclusao))}}</td>
                                        <td class="row">
                                            <div class="col-4">
                                                <a class="btn btn-info" href="{{route('tarefa.edit',$tarefa)}}">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </div>
                                           <div class="col">
                                                <form action="{{route('tarefa.destroy',$tarefa)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" href="{{route('tarefa.destroy',$tarefa)}}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                           </div>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item"><a class="page-link" href="{{$tarefas->previousPageUrl()}}">Previous</a></li>
                              @for($i = 1; $i <= $tarefas->lastPage();$i++)
                                <li class="page-item {{$tarefas->currentPage() == $i ? 'active' : ''}}">
                                    <a class="page-link" href="{{$tarefas->url($i)}}">
                                        {{$i}}
                                    </a>
                                </li>
                              @endfor
                              <li class="page-item"><a class="page-link" href="{{$tarefas->nextPageUrl()}}">Next</a></li>
                            </ul>
                          </nav>

                    </div>
                </div>
            </div>
        </div>
    @endsection
