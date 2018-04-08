<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Request;
//use App\Http\Controllers\Controller;
use App\Post;
use Session;

class PostController extends Controller
{   

    public function __construct(){
        $this->middleware('auth');
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //crear una variable y almacenar todo el blog en el post esto con la base de datos
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validar los datos
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug'  => 'required|alpha_dash|min:5|max:255',
            'body' => 'required'
        ));
        // almacenar en la base de datos
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body  = $request->body;

        $post->save();

        Session::flash('success','The Blog was Successfully save!');
        // redireccionar aotra pagina
        return redirect()->route('posts.show', $post->id);
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        $post = Post::All();
        echo ($post);
        */
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //busca  el post en la base de datos para guardar como una variable
        $post = Post::find($id);
        //returen la vista para las opciones
        return  view('posts.edit')->withPost($post); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validacion de datos
        $post = Post::find($id);
        if($request->input('slug') == $post->slug){
            $this->validate($request, array(
            'title' =>  'required|max:255',
            'body'  =>  'required'
            ));
        }else
        {    
            $this->validate($request, array(
                'title' =>  'required|max:255',
                'slug'  =>  'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body'  =>  'required'
            ));
        }
     
        //guardar en la base de datos
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        $post->save();
        //set flash data  with succes message
        
        Session::flash('success','This Post was suyccessfully saved.');
        //redirection con flash data de posts.show
        return redirect() -> route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
        //dd($post);
        Session::flash('success','The post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}
