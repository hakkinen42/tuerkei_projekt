@extends('layouts.app')

@section('title','User Details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User - Detailansicht  </div>
                <div class="card-body">
                    <p><b>{{$benutzer->name}}</b></p>
                    <p><b>{{$benutzer->motto ? strtoupper($benutzer->motto) : 'Kein Motto'}}</b></p>
                    <p>{!! $benutzer->ueber_mich ? nl2br($benutzer->ueber_mich) : 'war zu faul um Info zu schreiben' !!}</p>
                    
                    @if(file_exists("images/user/".$benutzer->id.".jpg"))
                    @php
                        $id = $benutzer->id;
                    @endphp
						<img src="/images/user/{{$id}}.jpg" alt="user" />
                    @else 
                        <img src="/images/placeholder.jpg" alt="Dummy" />
					@endif
               
                    <a href="{{URL::previous()}}" class="btn btn-primary my-2 float-right">
                    zurück
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
