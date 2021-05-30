@extends('layouts.master')

@section('title')
    Ubah Password
@endsection

@section('content')
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>
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
           <form action="/editprofile" method="post">
               @csrf
               <div class="form-group">
                   <label for="password_lama">Kata Sandi Saat Ini</label>
                   <input type="password" class="form-control" id="password_lama" name="password_lama"> 
                   <input type="checkbox" class="form-checkbox1"> Tampilkan Kata Sandi
               </div>
               <div class="form-group">
                   <label for="new_password1">Kata Sandi Baru</label>
                   <input type="password" class="form-control" id="new_password1" name="kata_sandi_baru">
                   <input type="checkbox" class="form-checkbox2"> Tampilkan Kata Sandi 
               </div>
               <div class="form-group">
                   <label for="new_password2">Konfirmasi Kata Sandi Baru</label>
                   <input type="password" class="form-control" id="new_password2" name="konfirmasi_kata_sandi_baru"> 
                   <input type="checkbox" class="form-checkbox3"> Tampilkan Kata Sandi
               </div>
               <div class="form_group">
                   <button type="submit" class="btn btn-primary">Simpan</button>
                   <a href="{{route('post.index')}}" class="btn btn-danger">Back</a>
               </div>
           </form>
       </div>
   </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){		
     $('.form-checkbox1').click(function(){
        if($(this).is(':checked')){
           $('#password_lama').attr('type','text');
        }else{
           $('#password_lama').attr('type','password');
        }
     });
  });
   $(document).ready(function(){		
     $('.form-checkbox2').click(function(){
        if($(this).is(':checked')){
           $('#new_password1').attr('type','text');
        }else{
           $('#new_password1').attr('type','password');
        }
     });
  });
   $(document).ready(function(){		
     $('.form-checkbox3').click(function(){
        if($(this).is(':checked')){
           $('#new_password2').attr('type','text');
        }else{
           $('#new_password2').attr('type','password');
        }
     });
  });
</script>
@endsection