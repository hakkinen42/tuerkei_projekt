
@extends('layouts.app')

@section('content')
<div class="float-right w-50 px-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <span class="h2">{{ ucfirst(auth()->user()->name) }}</span>
                <span class="text-primary float-right">(  {{ __('validation.logged') }} )</span>
                <p><a href="user/{{ auth()->id() }}/edit" class="btn btn-primary btn-sm">Profil bearbeiten</a></p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!--++++++++++++++++++++++++++++++++++++-->
                    <div class="alert alert-dark py-2">
                        <h3 class="text-center bg-warning p-2">Motto: {{auth()->user()->motto}}</h3>
                        <div class="d-flex align-items-stretch py-2">
                            @if(file_exists("images/user/".auth()->user()->id.".jpg"))
                                <img class="px-2" src="images/user/{{auth()->user()->id}}.jpg" alt="user">
                            @else
                                <img class="px-2" src="images/user/placeholder.jpg" alt="user">
                            @endif
                            <p class="d-inline-block h3 ">E-Mail: <span class="text-primary">{{auth()->user()->email}}</span> </p>

                        </div>
                       
                        <p class="p-2 my-4"><b>Über mich: </b>{{nl2br(auth()->user()->ueber_mich)}}</p>
                    </div>
                    <!--++++++++++++++++++++++++++++++++++++-->
                    @isset($beitraege)
                    @if($alle > 0)
                    <h3>Deine Kommentare ({{$alle}})</h3>
                    @endif
                    <ul class="list-group">
                    @foreach($beitraege AS $beitrag)
                    <li class="list-group-item">
                        <span>
                        <i class="fa fa-comment text-info"></i>
                        {{$beitrag->name}}
                        </span>
                        <a href="/post/{{$beitrag->id}}" class="btn btn-info btn-sm py-1">
                        <i class="fa fa-circle-info text-info"></i>
                        Detailansicht
                        </a>
                        <a href="/post/{{$beitrag->id}}/edit" class="btn btn-outline-primary btn-sm py-1">
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
                    </li>
                    @endforeach
                    </ul>
                    @endisset
                    <!--++++++++++++++++++++++++++++++++++++-->
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
