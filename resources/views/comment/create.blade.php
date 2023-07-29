@extends('layouts.app')

@section('title','Alle Beiträge')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header blau">
                <i class="fa-solid fa-comment text-light"></i>
                    Neuen Commentar anlegen
                </div>
                <div class="card-body">
                    <form action="/comment" method="POST">
                    @csrf
                        <div class="p-1">
                            <label for="name">Title</label>
                            <input type="text" id="name" name="name"
                             class="form-control {{$errors->has('name') ? 'border-danger': ''}}"
                             value="{{old('name')}}">
                             <small class="form-text text-danger">{!!$errors->first('name') !!}</small>
                        </div>
                        <div class="p-1">
                            <label for="kommentar">Kommentar</label>
                            <textarea id="kommentar" name="kommentar" 
                            class="form-control {{$errors->has('kommentar') ? 'border-danger': ''}}"
                            >{{old('kommentar')}}</textarea>
                            <small class="form-text text-danger">{!!$errors->first('kommentar') !!}</small>
                        </div>

                        <button type="submit"class="btn btn-success mt-2" >
                            <i class="fa-solid fa-floppy-disk"></i>
                            neuen Kommentar anlegen
                        </button>
                    </form>
              
                <a href="{{URL::previous()}}" class="btn btn-primary my-2 float-right">zurück</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
