@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Register Supplier</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="/supplier" method="post" name="register_supplier" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" placeholder="Address" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Contact Person Name</label>
                            <input type="text" class="form-control" name="cname" placeholder="Contact Person Name" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label>Description of Service</label>
                            <textarea class="form-control" name="description" placeholder="what do this supplier do" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Register Supplier" name="reg_supplier" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection