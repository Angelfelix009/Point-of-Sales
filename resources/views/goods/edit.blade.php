@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Edit Goods {{$data->name}}</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="{{route('goods.update',$data->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name of Goods</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Name" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Description of Goods</label>
                            <input type="text" class="form-control" value="{{$data->description}}" name="description" placeholder="Description" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" value="{{$data->price}}" name="price" placeholder="price" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update Record" name="reg_goods" class="btn btn-primary">
                        </div>
                     @method('PUT')
                </form>
                </div>
            </div>
        </section>
    </div>
@endsection