@extends('layouts.app')
@section('content')




<div class="container col-6 mt-5">
    <div class="card card-body ">
      <form action="{{route('product.update' , $product)}}" method="POST" >
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
             <input type="text" value="{{$product->name}}" name="name" id="name" class="form-control">



        </div>
        <div class="mb-3">
            <label for="title" class="form-control">Title</label>
            <textarea name="title" id="title"  class="form-control">{{$product->title}}</textarea>


        </div>


        <div class="text-center">
            <button class="btn btn-warning">Update</button>
        </div>
      </form>

    </div>

</div>







@endsection
