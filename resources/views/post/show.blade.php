@extends('layouts.master')

@section('title')
    Show Page
@endsection

@section('content')

<div>
    <h3 style="color: blue">{{$post->title}}</h3>
    <p style="text-align: justify">{{$post->body}}</p>
    <p>
        Tags : 
        @forelse ($post->tags as $tag)
            <a href="/post" style="text-decoration: none">
                <button class="btn btn-primary btn-sm" name="post_id">{{$tag["name"]}}</button>
            </a>
        @empty
            No Tags
        @endforelse
    </p>
    {{-- <button type="submit" class="btn btn-danger">Kembali</button> --}}
    <a href="{{route('post.index')}}" class="btn btn-danger">Back</a>
</div>
@endsection