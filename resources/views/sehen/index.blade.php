@extends('layouts.app')

@section('title','Alle Sehenwürdigkeiten')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger text-light text-center"><h2 class="">Türkei-Sehenwürdigkeiten - ( {{$alle->count()}} )</h2></div>
                <div class="card-body bg-info">
                        @if($sehen->count() > 0)
                            <ul class="list-group m-2">
                                @foreach($sehen AS $row)
                                <li class="list-group-item my-2 bg-light rounded-lg">
                                <h3 class="p-2 my-1">{{$row->name}}</h3>
                                <p class="p-2 my-1">{{Str::limit($row->info,50,'...')}}
                                <a href="/sehen/{{$row->id}}" class="btn btn-info btn-sm">
                                <i class="fa fa-circle-info text-warning"></i>
                                Detailansicht
                                </a>
                                </p>

                                @isset($row->adress)
                                <p class="p-2 my-1">{{$row->adress}}</p>
                                @else
                                <p class="p-2 my-1">Offene Adresse nicht gefunden</p>
                                
                                @endisset

                                <p class="p-2 my-1">{{$row->city}}</p>
 
                                </li>
                                
                                @endforeach
                            </ul>
                        @endif
                </div>
                <div class="card-footer bg-secondary" >
                    <div class="">
                        {{$sehen->links()}}
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
