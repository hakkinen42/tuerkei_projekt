@extends('layouts.app')

@section('title','Besucherkommentare')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger text-light text-center"><h2 class="">Besucherkommentare - ( {{$alle->count()}} )</h2></div>
                <div class="card-body bg-info">
                        @if($comment->count() > 0)
                            <ul class="list-group m-2">
                                @foreach($comment AS $row)
                                <li class="list-group-item my-2 bg-light">
                                
                                <div class="d-flex justify-content-between">
                                    <div>
                                 
                                    <a href="/home">
                                   
                                        <i class="fa fa-user-pen fa-xl" style="color: #00ffff;"></i>
                                    <h3 class="p-2 my-1 d-inline-block">{{ucfirst($row->user->name)}}</h3>
                                    </a>
                                    </div>
                                   
                                    <h3 class="p-2 my-1 d-inline-block">Title: {{$row->title}}</h3>

                                </div>
                                
                                <p class="p-3 m-3">{{Str::limit($row->comment,50,'...')}}
                                <a href="/comment/{{$row->id}}" class="btn btn-info btn-sm">
                                <i class="fa fa-circle-info text-warning"></i>
                                Detailansicht
                                </a>
                                @if(Auth::check() && Auth::id() ===$row->user_id)
                                <a href="/comment/{{$row->id}}/edit" class="btn btn-success btn-sm">
                                <i class="fa-solid fa-hammer"></i>
                                Bearbeiten
                                </a>
                                <form action="comment/{{$row->id}}" method="POST" class="d-inline-block float-right" onclick=" return confirm('Wollen Sie den Datensatz wirklich löschen?');">
                                @csrf
                                @method('DELETE')
                                <button type ="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fa fa-trash"></i>
                                Kommentar löschen
                                </button>
                                </form>
                               
                                @endif
                                </p>
                               
                              
                                </li>
                                @endforeach
                            </ul>
                         @else
                            <p>Keine Kommentare vorhanden</p>
                        @endif
                        @if(Auth::check())
                            <a href="comment/create" class="btn btn-success my-2">
                            <i class="fa-regular fa-comment"></i>
                            Neuen Kommentar
                            </a>
                        @endif
                
                </div>
                <div class="card-footer bg-secondary" >
                    <div class="mt-3 d-flex justify-content-center">
                        {{$comment->links()}}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
