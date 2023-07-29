<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['index','show']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmtAll= Comment::all();
        $id = auth()->id();
   
        if($id){
             $userNichtLogged = Comment::whereNotIn('user_id',[$id])->orderBy('updated_at','DESC');
 
             $cmt = Comment::where('user_id',$id)
             ->orderBy('updated_at', 'DESC')
             ->union( $userNichtLogged)
             ->paginate(5);
        }else{
             $cmt = Comment::orderBy('updated_at','DESC')->paginate(5);
        }
        return view('comment.index')->with(['comment'=>$cmt,'alle'=>$cmtAll]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required | min:3',
                'kommentar'=> 'required | min:10'
            ]
        );
        $comment = new Comment(
            [
                'title'=> $request['name'],
                'comment'=> $request['kommentar'],
                'user_id' => auth()->id()


            ]
        );
        $comment->save();
        $msg = Session::get('msg','Kommentar <b>'.$comment->name.'</b>  wurde eingefügt');

        return $this->index()->with('msg_success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('comment.show')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comment.edit')->with('comment',$comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate(
            [
                'title'=> 'required | min:3',
                'kommentar'=> 'required | min:10'
            ]
        );
        $comment->update(
            [
                'title'=> $request['title'],
                'comment'=> $request['kommentar'],
                'user_id' => auth()->id()


            ]
        );
        
        return redirect('/comment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
