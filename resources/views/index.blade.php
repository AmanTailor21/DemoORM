<x-header data="Add Employees Data"/>

@extends('layouts.template')
@section('content')
<form method="post" action="{{route('employess.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" placeholder="Enter Name" class="form-control" name="name">
        @error('name') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        <input type="email" placeholder="Enter email Id" class="form-control" name="email">
        @error('email') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        <input type="number" placeholder="Enter Mobile Number" class="form-control" name="number">
        @error('number') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        <input type="password" placeholder="Enter Password" class="form-control" name="password">
        @error('password') <span class="text-danger">{{$message}}</span> @enderror
    </div>
    <div class="form-group">
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-dark" name="insert">
    </div>
    {{session('msg')}}<br>
    <a href="{{route('employess.index')}}">View Employees Data</a>
</form>
    </body>
@endsection
