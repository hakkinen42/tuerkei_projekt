@extends('layouts.app')

@section('title','Besucherkommentar Details')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger text-light text-center">Besucherkommentar- Detailansicht 
                @if($comment->user_id !== NULL)
                (geschrieben von  {{$comment->user->name}} )
                @endif
                </div>
                <div class="card-body bg-light">
                    <h3><b>{{$comment->title}}</b></h3>
                    <p>{!! nl2br($comment->comment) !!}</p>
                   
                    <a href="/comment" class="btn btn-primary my-2 float-right">
                    zurück
                    </a>
                </div>
                
                
                <div class="d-flex justify-content-center">
                                    <p class="p-2 my-1 d-inline-block"><span class="font-weight-bold px-2"> Created at:</span>{{$comment->created_at}}</p>
                                    <p class="p-2 my-1 d-inline-block"><span class="font-weight-bold px-2"> Updated at:</span>{{$comment->updated_at}}</p>
                                
                </div>
                <!--#####################################-->
                @if(Auth::check() && $comment->user_id !== auth()->id())
                <div class="alert alert-primary">
                    <form action="/reply" method="POST" class="rounded-1 p-2">
                    @csrf
                    
                    <fieldset class="border border-light border-2 p-1 rounded-2">
                    <div class="p-1">
                            <label for="comment">Post Kommentieren</label>
                            <textarea name="comment" id="comment"  placeholder="Bewertung eingeben..."
                            class="form-control {{$errors->has('comment') ? 'border-danger': ''}}">{{old('comment')}}</textarea>
                            <small class="form-text text-danger">{!!$errors->first('comment') !!}</small>
                        </div>
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <button type="submit"class="btn btn-success mt-2" >
                            <i class="fa-solid fa-floppy-disk"></i>
                            Kommentar senden
                        </button>
                        <input type="reset" value="Löschen"  class="btn btn-danger fw-bold" />
                        </form>
                    </div>
                    @endif

                </div >
                <!--#####################################-->

                <!--#####################################-->
                <div class="card p-3">
                        <div class="card-header bg-success">User-Kommentar zum Beitrag</div>
                        <div class="card-body bg-secondary">
                            <ul class="list-group">
                                @foreach($comment->replies AS $reply)
                                <li class="list-group-item">
                                    <p class="h4 py-2">
                                    <i class="fa fa-user text-info"></i>
                                    von: {{$reply->user->name}}
                                    </p>
                                    <p class="py-3">
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
