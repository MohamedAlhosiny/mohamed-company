@extends('layouts.app2')

@section('content2')



<div class="container col-6 mt-5">
    <div class="card card-body ">
      <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
             <input type="text" name="name" id="name" class="form-control">

        </div>


        <div class="mb-3">
            <label for="file" class="form-label">File</label>
             <input type="file" name="image" id="file" class="form-control">



        </div>
        <div class="text-center">
            <button class="btn btn-primary">Submit File</button>
        </div>
      </form>

    </div>

</div>



@endsection
