@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Register Customer</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="{{route('customer.store')}}" method="post" name="register_customer" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Register Customer" name="reg_customer" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection