@extends('layouts.app')

@section('title','Beitrag bearbeiten')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger ">
                <p class="h3 text-light"><i class="fa fa-solid fa-pen-to-square"></i>
                Profil bearbeiten- {{ucfirst($user->name)}}</p> 
                </div>
                <div class="card-body">
                    <form action="/user/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="p-1">
                            <label for="motto" class="h4">Motto</label>
                            <input type="text" id="motto" name="motto"
                             class="form-control {{$errors->has('motto') ? 'border-danger': ''}}"
                             value="{{old('motto') ?? $user->motto }} ">
                             <small class="form-text text-danger">{!!$errors->first('motto') !!}</small>
                        </div>
                        <div class="p-1">
                            <label for="ueber_mich" class="h4" >Über mich</label>
                            <textarea id="ueber_mich" name="ueber_mich" 
                            class="form-control {{$errors->has('ueber_mich') ? 'border-danger': ''}}"
                            >{{old('ueber_mich') ?? $user->ueber_mich  }}</textarea>
                            <small class="form-text text-danger">{!!$errors->first('ueber_mich') !!}</small>
                        </div>
                        <div class="p-1">
                        <label for="bild" class="h4">Bild</label>
                        <input type="file" id="bild" name="bild" class="form-control  {{$errors->has('ueber_mich') ? 'border-danger': ''}}" >
                        <small class="form-text text-danger">{!!$errors->first('bild') !!}</small>
                        </div>

                        <button type="submit"class="btn btn-success mt-2" >
                            <i class="fa-solid fa-floppy-disk"></i>
                            daten ändern und speichern
                        </button>
                    </form>
              
                <a href="/home" class="btn btn-primary my-2 float-right">zurück</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
