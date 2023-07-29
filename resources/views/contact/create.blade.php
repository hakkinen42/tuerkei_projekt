@extends('layouts.app')

@section('title','Kontakt')

@section('content')
<div class="container">
<div class="col-12 p-0 my-2 text-center rounded-1 bg-secondary bg-opacity-25">

<form action="/contact" method="POST" class="rounded-1 p-2">
@csrf
<fieldset class="border border-light border-2 p-2 rounded-2">
	<legend class="text-center text-light">Kontakt</legend>
	<div class="p-1">
		<input type="text" name="name" class="form-control my-1 {{$errors->has('name') ? 'border-danger': ''}}" value="" placeholder="Name eingeben..."	value = "" />
		<input type="text" name="mail" class="form-control my-1 {{$errors->has('name') ? 'border-danger': ''}}" value="" placeholder="E-Mail eingeben..."	value = "" />
		<input type="text" name="betreff" class="form-control my-1 {{$errors->has('name') ? 'border-danger': ''}}" value="" placeholder="Betreff eingeben..."	value = "" />
		<textarea  name="nachricht" cols="10" rows="5" placeholder="Ihr Text..." class="form-control my-1 {{$errors->has('name') ? 'border-danger': ''}}"></textarea>
	</div>
	<div class="my-1 text-center">
		<input type="submit" value="Absenden" name="kontakt" class="btn btn-success w-25 py-2 fs-4" />
	</div>
</fieldset>
</form>
<a href="{{URL::previous()}}" class="btn btn-primary my-2 float-right">zurück</a>
</div>
</div>
@endsection

