@extends('layouts.app2')

@section('content2')

<div class="container col-6 mt-5">
    <div class="card card-body ">
      <form action="{{route('categories.update' , $category)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
             <input type="text" value="{{$category->name}}" name="name" id="name" class="form-control">

        </div>


        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <a target="_blank" href="{{asset('categories/' . $category->file_name)}}">Edit Image</a>
             <input type="file" name="image"  id="file" class="form-control">



        </div>
        <div class="text-center">
            <button class="btn btn-warning">Update</button>
        </div>
      </form>

    </div>

</div>

@endsection
