@extends('layouts.app')

@section('title','Sehenwürdigkeiten Details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger text-light text-center">Sehenwürdigkeiten - Detailansicht 
                </div>
                <div class="card-body bg-light">
                    <h3><b>{{$row->name}}</b></h3>
                    
                    @if(file_exists("images/sehen/".$row->id.".jpg"))
                    @php
                        $id = $row->id;
                    @endphp
						<img class="float-left px-3" src="/images/sehen/{{$id}}.jpg" alt="sehen" width="400px" height="300px" />
                    @else 
                        <img src="/sehen/placeholder.jpg" alt="Dummy" width="200px" height="200px" />
					@endif
                    <p class="mx-3"> {!! nl2br($row->info) !!}</p>
                    <p class="mx-3">{{$row->adress}}</p>
                    <p class="mx-3">{{$row->city}}</p>
                    
               
                    <a href="{{URL::previous()}}" class="btn btn-primary my-2 float-right">
                    zurück
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
