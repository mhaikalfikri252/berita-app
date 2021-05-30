@extends('layouts.master')

@section('title')
    Create Page
@endsection

@section('content')
<div class="card">
   <div class="card-header">
      <h2 class="card-title">Tambah Artikel</h2>
   </div>
   <div class="card-body">
      <form action="/post" method="POST">
         @csrf
         <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Judul" required>
            @error('title')
               <div class="alert alert-danger">
                  {{ $message }}
               </div>
            @enderror
         </div>
         <div class="form-group">
            <label for="body">Konten</label>
            <textarea class="form-control" style="height: 4cm" name="body" id="body" placeholder="Masukkan Konten" required></textarea>
            @error('body')
               <div class="alert alert-danger">
                  {{ $message }}
               </div>
               @enderror
         </div>

         <div class="form-group">
            <label for="tags">Tag</label>
            <input type="text" class="form-control" name="tags" id="tags" placeholder="format : tag1, tag2, tag3">
         </div>
         
         <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
    </div>
 </div>

@endsection



