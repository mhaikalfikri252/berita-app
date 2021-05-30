@extends('layouts.master')

@section('title')
    Edit Profile
@endsection

@section('content')
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
     </div>
   <div class="row">
       <div class="col-lg-6">
               @if ($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           @if(\Session::has('alert-success'))
               <div class="alert alert-success">
                   <div>{{Session::get('alert-success')}}</div>
               </div>
           @endif
           <form action="/editc" method="post">
               @csrf
               <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" id="name" value="{{auth()->user()->name}}" name="name" disabled>
            </div>
               <div class="form-group">
                   <label for="tgl_lahir">Tanggal Lahir</label>
                   <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value=""> 
               </div>
               <div class="form-group">
                   <label for="alamat">Alamat</label>
                   <textarea class="form-control" id="alamat" name="alamat" cols="30" rows="10"></textarea>
               </div>
               {{-- <div class="form-group">
                   <label for="foto">Foto</label>
                   <input type="file" class="form-control" id="foto" name="foto"> 
               </div> --}}
               <div class="form_group">
                   <button type="submit" class="btn btn-primary">Simpan</button>
                   <a href="{{route('post.index')}}" class="btn btn-danger">Back</a>
                   <a href="{{route('editc.show', auth()->user()->id)}}" class="btn btn-success">Show</a>
               </div>
           </form>
       </div>
   </div>
</div>

@endsection