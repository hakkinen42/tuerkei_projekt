@extends('layouts.app')

@section('title','Beitrag bearbeiten')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header blau">
                <i class="fa fa-solid fa-pen-to-square"></i>
                   Beitrag bearbeiten
                </div>
                <div class="card-body">
                    <form action="/post/{{$post->id}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="p-1">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name1"
                             class="form-control {{$errors->has('name1') ? 'border-danger': ''}}"
                             value="{{old('name1') ?? $post->name }} ">
                             <small class="form-text text-danger">{!!$errors->first('name1') !!}</small>
                        </div>
                        <div class="p-1">
                            <label for="kommentar">Kommentar</label>
                            <textarea id="kommentar" name="kommentar1" 
                            class="form-control {{$errors->has('kommentar1') ? 'border-danger': ''}}"
                            >{{old('kommentar1') ?? $post->beschreibung  }}</textarea>
                            <small class="form-text text-danger">{!!$errors->first('kommentar1') !!}</small>
                        </div>

                        <button type="submit"class="btn btn-success mt-2" >
                            <i class="fa-solid fa-floppy-disk"></i>
                            Beitarg ändern und speichern
                        </button>
                    </form>
              
                <a href="/post" class="btn btn-primary my-2 float-right">zurück</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
