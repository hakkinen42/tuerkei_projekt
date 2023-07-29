<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
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
  
       $ptAll = Post::all();
       $id = auth()->id();
       if($id){
            $userNichtLogged = Post::whereNotIn('user_id',[$id])->orderBy('updated_at','DESC');

            $pt = Post::where('user_id',$id)
            ->orderBy('updated_at', 'DESC')
            ->union( $userNichtLogged)
            ->paginate(10);
       }else{
            $pt = Post::orderBy('updated_at','DESC')->paginate(10);
       }
       return view('post.index')->with(['beitraege'=>$pt,'alle'=>$ptAll]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      #echo 'Hallo ich bin die Function create'; 
      return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #echo 'ich bin zum Speichern da';
        $request->validate(
            [
                'name1' => 'required | min:3',
                'kommentar1' => 'required | min:5'

            ]
        );
        $post = new Post(
            [
                #'nameDerSpalteInDB'=> $request['nameDesFeldesInFormular']
                'name' => $request['name1'],
                'beschreibung' => $request['kommentar1'],
                'user_id'=>auth()->id()
            ]
        );
        $post->save();#alles soll gespeichert werden(in die Tabelle posts rein)
        #return redirect('/post');
        #return $this->index()->with('msg_success', 'Kommentar wurde eingefügt');
        $msg = Session::get('msg','Kommentar <b>'.$post->name.'</b>  wurde eingefügt');

        return $this->index()->with('msg_success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        #echo 'ich bin show';

        return view('post.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        #echo 'ich bin edit';
        return view('post.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        #echo 'ich bin update';
        $request->validate(
            [
                'name1' => 'required | min:3',
                'kommentar1' => 'required | min:5'

            ]
        );
        $post->update(
            [
                'name' => $request->name1,
                'beschreibung' => $request->kommentar1
            ]
        );
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        #echo 'ich lösche alles';
        $post->delete();
        #return redirect('/post');
        return redirect()->back();
    }
}
