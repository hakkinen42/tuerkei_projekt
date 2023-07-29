@extends('layouts.app')

@section('title','Beitrag Details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Beitrag - Detailansicht 
                @if($post->user_id !== NULL)
                (geschrieben von  {{$post->user->name}} )
                @endif
                </div>
                <div class="card-body">
                    <p><b>{{$post->name}}</b></p>
                    <p>{!! nl2br($post->beschreibung) !!}</p>
                    <!--#####################################-->
                    @if(Auth::check() && $post->user_id !== auth()->id())
                    <div class="alert alert-primary">
                        <form action="/reply" method="POST">
                        @csrf
                        <div class="p-1">
                            <label for="comment">Post Kommentieren</label>
                            <textarea name="comment" id="comment"
                            class="form-control {{$errors->has('comment') ? 'border-danger': ''}}">{{old('comment')}}</textarea>
                            <small class="form-text text-danger">{!!$errors->first('comment') !!}</small>
                        </div>
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <button type="submit"class="btn btn-success mt-2" >
                            <i class="fa-solid fa-floppy-disk"></i>
                            Kommentar senden
                        </button>
                        </form>
                    </div>
                    @endif

                    <!--#####################################-->
                    
               
                    <a href="{{URL::previous()}}" class="btn btn-primary my-2 float-right">
                    zurück
                    </a>
                </div>
                 <!--#####################################-->
                <div class="card p-3">
                        <div class="card-header blau">User-Kommentar zum Beitrag</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($post->replies AS $reply)
                                <li class="list-group-item">
                                    <p>
                                    <i class="fa fa-user text-info"></i>
                                    von: {{$reply->user->name}}
                                    </p>
                                    <p>
                                        <i class="fa fa-comment-dots text-primary h4"></i>
                                        {{$reply->content}}
                                    </p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                </div>
                 <!--#####################################-->
            </div>
        </div>
    </div>
</div>
@endsection
