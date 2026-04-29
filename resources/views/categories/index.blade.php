@extends('layouts.app2')

@section('content2')

<div class="container col-6 mt-5">
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>

</div>
@endif
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>Image of category</th>
            <th>Status</th>
            <th>file type</th>
            <th>Download</th>
            <th>Actios</th>
        </tr>
    </thead>
    <tbody>

        @forelse($category as $index=>$categories)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$categories->name}}</td>
            <td>
                <a target="_blank" href="{{asset('categories/'.$categories->file_name )}}">View Image</a>
            </td>
            <td>
                <a href="{{route('categories.status' , $categories)}}" class="  btn btn-primary">{{$categories->status}}</a>
            </td>
            <td>{{$categories->file_type}}</td>
            <td> <a href="{{route('categories.download', $categories->id)}}" class="btn btn-success">Download</a> </td>
            <td>
                <a href="{{route('categories.edit' , $categories)}}" class="btn btn-warning">Edit</a>
                <a href="{{route('categories.destroy' , $categories)}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6"> <div class="alert alert-danger">There is no data</div> </td>
        </tr>
        @endforelse

    </tbody>



</table>

@endsection
