@extends('layouts.app')



@section('content')

<div class="container col-6 mt-5">
    <div class="card card-body ">
      <form action="{{route('product.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
             <input type="text" name="name" id="name" class="form-control">


        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
             <input type="text" name="title" id="title" class="form-control">
        </div>






        <div class="text-center">
            <button class="btn btn-primary">Submit Product</button>
        </div>
      </form>

    </div>

</div>
@endsection
