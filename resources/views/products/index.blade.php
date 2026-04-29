@extends('layouts.app')

@section('content')

<div class="container col-6 mt-5">
    <div class="card card-body table-responsive">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>

        @endif
    </div>
        <table class=" table table-hover">
            <thead>
                <th>#</th>
                <th>name</th>
                <th>title</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @forelse( $product as $index=> $products )


                <tr>
                    <td>{{$index +1}}</td>
                    <td>{{$products->name}}</td>
                    <td>{{$products->title}}</td>
                    <td>
                        <a href="{{route('product.edit' , $products->id)}}" class="btn btn-warning">Edit</a>
                        <a href="{{route('product.destroy' , $products->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <div class="alert alert-danger">There is no data</div>
                </tr>
                @endforelse
            </tbody>
        </table>


    </div>
</div>



@endsection

