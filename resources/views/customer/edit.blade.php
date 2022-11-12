@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Edit Customer</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="{{route('customer.update',$data->id)}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{$data->phone}}" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update Customer  Record" name="reg_customer" class="btn btn-primary">
                        </div>
                        {{method_field('PUT')}}
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection