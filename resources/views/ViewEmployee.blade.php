<x-header data="Employe Information"/>

@extends('layouts.template')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Images</th>
                <th>edit Record</th>
                <th>Delete Record</th>
            </tr>
        </thead>
        @foreach($employees as $emp)
        <tbody>
            <tr>
                <td>{{$emp->name}}</td>
                <td>{{$emp->email}}</td>
                <td>{{$emp->number}}</td>
                <td><img src="{{ asset('storage/images/'.$emp->image) }}" width="100px" height="100px"></td>
                <td>
                    <a href="{{route('employess.edit',$emp->id)}}" class="btn btn-info">Edit</a>
                </td>
                <td>
                    <form method="post" action="{{route('employess.destroy',$emp->id)}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <a href="index">Add New Records</a></br></br>
    <a>{{ $employees->links() }}</a>


@endsection
