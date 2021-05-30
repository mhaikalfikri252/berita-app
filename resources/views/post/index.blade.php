@extends('layouts.master')

@section('title')
    Index Page
@endsection

@section('content')
{{-- Post Table --}}
<div class="card">
    <div class="card-header">
        Tambah Artikel <a href="{{route('post.create')}}" class="btn btn-primary ml-2">Tambah</a>
    </div>
    
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th style="width: 5%">No</th>
                <th style="width: 25%">Judul</th>
                <th style="width: 40%">Konten</th>
                <th style="width: 25%"><a>Action</a></th>
              </tr>
            </thead>
            <tbody>
                @forelse ($post as $key=>$post)
                    <tr>
                        <td>{{$key + 1}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>
                            <form action="{{route('post.destroy', ['post' => $post->id])}} " method="POST">
                                <a href="{{route('post.show', ['post' => $post->id])}} " class="btn btn-info ">Show</a>
                                <a href="{{route('post.edit', ['post' => $post->id])}}" class="btn btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                    <input type="submit" class="btn btn-danger my-1" value="Delete">
                                    {{-- <a href="{{route('post', ['post' => $post->id])}} " class="btn btn-danger ">Delete</a> --}}
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr colspan="3">
                        <td></td>
                        <td>No data</td>
                    </tr>  
                @endforelse              
            </tbody>
         </table>
    </div>
</div>

@endsection

 
