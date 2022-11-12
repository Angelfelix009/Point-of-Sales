@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Register Staff</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="/staff" method="post" name="Register_staff" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user" value="{{ Auth::user()->name }}">
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" class="form-control" name="sname" placeholder="Surname" required>
                        </div>
                        <div class="form-group">
                            <label>Other Names</label>
                            <input type="text" class="form-control" name="oname" placeholder="Othernames" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="phone Number" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" placeholder="address" required>
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control" name="desig" placeholder="Designation" required>
                        </div>
                        <div class="form-group">
                            <label>Upload User Image</label>
                            <input type="file" class="form-control" name="img" placeholder="Upload an Image" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Register Staff" name="reg_staff" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection