@extends('layouts.master')

@section('title')
    Show Data Profile
@endsection

@section('content')

<div>
    <label for="name">Username: </label>
    <h3 style="color: blue">{{auth()->user()->name}}</h3>
    <label for="tgl_lahir">Tanggal Lahir: </label>
    <h3 style="color: blue">{{$profile->tgl_lahir}}</h3>
    <label for="alamat">Alamat: </label>
    <p style="text-align: justify">{{$profile->alamat}}</p>
    {{-- <button type="submit" class="btn btn-danger">Kembali</button> --}}
    <a href="{{route('editc.index')}}" class="btn btn-danger">Back</a>
</div>
@endsection