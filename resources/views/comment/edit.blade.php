@extends('layouts.app')

@section('title','Besucherkommentar bearbeiten')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header blau">
                <i class="fa fa-solid fa-pen-to-square"></i>
                   Besucherkommentar bearbeiten
                </div>
                <div class="card-body">
                    <form action="/comment/{{$comment->id}}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="p-1">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title"
                             class="form-control {{$errors->has('title') ? 'border-danger': ''}}"
                             value="{{old('title') ?? $comment->title }} ">
                             <small class="form-text text-danger">{!!$errors->first('title') !!}</small>
                        </div>
                        <div class="p-1">
                            <label for="kommentar">Kommentar</label>
                            <textarea id="kommentar" name="kommentar" 
                            class="form-control {{$errors->has('kommentar') ? 'border-danger': ''}}"
                            >{{old('kommentar') ?? $comment->comment }}</textarea>
                            <small class="form-text text-danger">{!!$errors->first('kommentar') !!}</small>
                        </div>

                        <button type="submit"class="btn btn-success mt-2" >
                            <i class="fa-solid fa-floppy-disk"></i>
                            Kommentar ändern und speichern
                        </button>
                    </form>
              
                <a href="/comment" class="btn btn-primary my-2 float-right">zurück</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
