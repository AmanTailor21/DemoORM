<x-header data="Edit Employees Info"/>

@extends('layouts.template')
@section('content')
    <form method="post" action="{{route('employess.update',$data->id)}}">
        @method("put")
        @csrf
        <div class="form-group">
            <input type="text" placeholder="Enter Name" value="{{$data->name}}" class="form-control" name="name">
            @error('name') <span class="text-danger">{{$message}}</span> @enderror
        </div>
        <div class="form-group">
            <input type="email" placeholder="Enter email Id" value="{{$data->email}}" class="form-control" name="email">
        </div>
        <div class="form-group">
            <input type="number" placeholder="Enter Mobile Number" value="{{$data->number}}" class="form-control" name="number">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password" value="{{$data->password}}" class="form-control" name="password">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-dark" value="Update Record">
        </div>
        <a href="{{route('employess.index')}}">View Employees Data</a>
    </form>
    {{session('msg')}}
@endsection

