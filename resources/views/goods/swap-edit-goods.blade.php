@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Edit Goods {{$data->name}}</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="{{route('good-swap.store')}}" method="post" enctype="multipart/form-data" name="Swap_goods">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="gid" value="{{ $data->id }}">
                    <div class="form-group">
                        <label>Name of Goods</label>
                        <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Name" readonly required>
                    </div>
                    <div class="form-group">
                        <label>New Name of Goods</label>
                        <select name="new_name" class="form-control" required>
                            <option value="">Select Goods</option>
                        @foreach($record as $d)

                                <option value="{{$d->id}}">{{$d->name}}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type of Goods Swapping</label>
                        <select name="tgoods" class="form-control" required id="tgoods">
                            <option value="">Select Types</option>
                            <option>Total Swap</option>
                            <option>Partial Swap</option>
                        </select>
                    </div>
                    <div class="form-group" id="quandiv" style="display: none">
                        <label>Quantity of Goods</label>
                        <input type="text" class="form-control"  name="quantity_goods" placeholder="Quantity">
                    </div>
                        <div class="form-group">
                            <label>Unit</label>
                            <input type="text" class="form-control" name="unit" placeholder="unit of Goods Bought" required>
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
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection