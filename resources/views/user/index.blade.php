@extends('layouts.app')

@section('title','Alle Users')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header blau">Alle User</div>
                <div class="card-body">
                @if($benutzer->count() > 0)
                <ul class="list-group">
                @foreach($benutzer AS $row)
                    <li class="list-group-item">
                        <i class="fa-solid fa-comment text-info"></i>
                        {{$row->name}}
                        @if($row->user_id !== NULL)
                        <small>( von: {{$row->user->name}} - {{$row->user->posts->count()}})</small>
                        @endif
                        <a href="/user/{{$row->id}}" class="btn btn-info btn-sm">
                        <i class="fa fa-circle-info text-warning"></i>
                        Detailansicht
                        </a>
                        <!--#########################################-->
                        @if(Auth::check() && Auth::id() === $row->user_id)
                        <a href="/user/{{$row->id}}/edit" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-pen-to-square"></i>
                        Bearbeiten
                        </a>
                        <form action="user/{{$row->id}}" method="POST" class="d-inline-block" onclick=" return confirm('Wollen Sie den Datensatz wirklich löschen?');">
                        @csrf
                        @method('DELETE')
                        <button type ="submit" class="btn btn-outline-danger btn-sm">
                        <i class="fa fa-trash"></i>
                         löschen
                        </button>
                        </form>
                        
                        @endif
                        <!--##################################-->
                    </li>
                @endforeach
                </ul>
                @else
                            <p>Keine Kommentare vorhanden</p>
                @endif
                @if(Auth::check())
                <a href="post/create" class="btn btn-success my-2">
                <i class="fa-regular fa-plus"></i>
                Neuen Beitrag anlegen
                </a>
                @endif
             
                
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
