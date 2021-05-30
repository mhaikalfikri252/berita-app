<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Alert;
use DB;

class PostController extends Controller
{
    // Middleware
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        $tag = Tag::all();
        return view('post.index', compact('post', 'tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request->validate([
            'title' => 'required|unique:posts'
        ]);

        // Mengubah request tags menjadi array dengan function explode
        $tags_arr = explode(', ', $request["tags"]);

        // Buat array penampung
        $tag_ids = [];

        /*
           Looping melakukan pengecekan apakah sudah ada tagnya atau belum
           jika sudah ambil id nya 
           jika belum, simpan tag lalu ambil id nya lalu ditampung diarray penampung
           gunakan fungsi dari eloquent 
        */
        foreach($tags_arr as $tag_name) {
            $tag = Tag::firstOrCreate(['name' => $tag_name]);
            $tag_ids[] = $tag->id;
        }


        $post = Post::create([
            "title" => $request["title"],
            "body" => $request["body"]
        ]);
        
        // Tampilkan Tags
        $post->tags()->sync($tag_ids);

        // Sweet Alert  
        if ($post) {
            toast('Data Berhasil Ditambahkan', 'success', 'top-right');
            return redirect('/post');
        } else {
            alert()->error('Pesan Error', 'Data Gagal Ditambahkan');
            return redirect('/post');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $tag = Tag::all();        

        return view('post.edit', compact('post', 'tag'));
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
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        // $tag_name = $request["tags"];

        $post = Post::find($id);
        $tags_arr = explode(', ', $request["tags"]);
        $tag_ids = [];

        foreach($tags_arr as $tag_name) {
            $tag = Tag::firstOrCreate(['name' => $tag_name]);
            $tag_ids[] = $tag->id;
        }

        $update = Post::where('id', $id)
            ->update([
                'title' => $request["title"],
                'body' => $request["body"],
            ]);

        $post->tags()->sync($tag_ids);

        if ($update) {
            toast('Data Berhasil Diupdate', 'success', 'top-right');
            return redirect('/post');
        } else {
            alert()->error('Pesan Error', 'Data Gagal Diupdate');
            return redirect('/post');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data = Post::destroy($id);
        $data = DB::table('post_tag')->where('post_id', $id)->delete();
        $data = DB::table('posts')->where('id', $id)->delete();
        if ($data) {
            toast('Data Berhasil Dihapus', 'success', 'top-right');
            return redirect('/post');
        } else {
            alert()->error('Pesan Error', 'Data Gagal Dihapus');
            return redirect('/post');
        }
        return redirect('/post');


        // $query = DB::table('tags')->where('id', $id)->delete();
        // return redirect('/post');
    }

    
}
