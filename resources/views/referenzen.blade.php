@extends('layouts.app')

@section('title','Mein Portfolio')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Meine Referenzen</div>

                <div class="card-body">
                 <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, </p>
                </div>
            </div>
				
					 @foreach($daten AS $user) 
					<ul class="list-group m-2">
						<li class="list-group-item">{{ $user['name'] }}</li>
						<li class="list-group-item">{{ $user['vorname'] }}</li>
						<li class="list-group-item">Wohnort: {{ $user['ort'] }}</li>
					</ul>
				 @endforeach
			 </div>
    </div>
</div>
@endsection
