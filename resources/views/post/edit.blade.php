@extends('layouts.master')

@section('title')
    Edit Page
@endsection

@section('content')
    <div class="card">
        
        <div class="card-body">
            <form action="/post/{{$post->id}}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                   <label for="title">Judul</label>
                   <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}" placeholder="Masukkan Judul">
                   @error('title')
                      <div class="alert alert-danger">
                         {{ $message }}
                      </div>
                   @enderror
                </div>
                <div class="form-group">
                   <label for="body">Konten</label>
                     <textarea class="form-control" style="height: 4cm" name="body" id="body" placeholder="Masukkan Konten" required>{{$post->body}}</textarea>
                   @error('body')
                      <div class="alert alert-danger">
                         {{ $message }}
                      </div>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="tags">Tag</label>
                  <input type="text" class="form-control" name="tags" id="tags" placeholder="format : tag1, tag2, tag3"
                  value="@forelse($post->tags as $tag){{$tag["name"]}}{{", "}}@empty @endforelse">
                  <h6 class="align: right">NB : Hapus koma paling belakang untuk tidak mengubah Tag</h6>
               </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="{{route('post.index')}}" class="btn btn-danger">Back</a>
             </form>
        </div>
    </div>
@endsection