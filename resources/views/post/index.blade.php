@extends('layouts.app')

@section('title','Alle Beiträge')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header blau">User-Kommentare - ( {{$alle->count()}} )</div>
                <div class="card-body">
                @if($beitraege->count() > 0)
                <ul class="list-group">
                @foreach($beitraege AS $beitrag)
                    <li class="list-group-item">
                        <i class="fa-solid fa-comment text-info"></i>
                        {{$beitrag->name}}
                        @if(isset($beitrag->user_id))
                        <span>( von: 
                        <i class ="fa fa-user"></i>
                        <a href="/user/{{$beitrag->user_id}}">{{$beitrag->user->name}}</a> - 
                        {{$beitrag->user->posts->count()}}
                            
                        )
                        @else  
                            (von: Unbekannt)

                        </span>
                        @endif
                        <a href="/post/{{$beitrag->id}}" class="btn btn-info btn-sm">
                        <i class="fa fa-circle-info text-warning"></i>
                        Detailansicht
                        </a>
                        <!--#########################################-->
                        @if(Auth::check() && Auth::id() === $beitrag->user_id)
                        <a href="/post/{{$beitrag->id}}/edit" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-pen-to-square"></i>
                        Bearbeiten
                        </a>
                        <form action="post/{{$beitrag->id}}" method="POST" class="d-inline-block" onclick=" return confirm('Wollen Sie den Datensatz wirklich löschen?');">
                        @csrf
                        @method('DELETE')
                        <button type ="submit" class="btn btn-outline-danger btn-sm">
                        <i class="fa fa-trash"></i>
                         löschen
                        </button>
                        </form>
                        
                        @endif
                        <!--##################################-->
                        <div class="float-right">
                        @isset($beitrag->created_at)
                        {{$beitrag->created_at->diffForHumans()}}
                        @endisset
                        </div>
                    </li>
                @endforeach
                </ul>
                @else
                            <p>Keine Kommentare vorhanden</p>
                @endif
               
                <a href="post/create" class="btn btn-success my-2">
                <i class="fa-regular fa-plus"></i>
                Neuen Beitrag anlegen
                </a>
                
                <div class="mt-3">
                {{$beitraege->links()}}
                
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
