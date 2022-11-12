@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Register User</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="{{route('user.store')}}" method="post" name="Register_User" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" class="form-control" name="sname" value="{{old('sname')}}" placeholder="Surname" required>
                        </div>
                        <div class="form-group">
                            <label>Other Names</label>
                            <input type="text" class="form-control" name="oname" value="{{old('oname')}}"  placeholder="Othernames" required>
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="email" required>
                        </div>
                       <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="form-control" required>
                                <option value="">Select a Level</option>
                                <option>DataInput</option>
                                <option>Supervisor</option>
                                @if ( Auth::user()->role_id >= 3)
                                <option>Manager</option>
                                <option>Admin</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Upload User Image</label>
                            <input type="file" class="form-control" name="img" placeholder="Upload an Image" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Create Account" name="reg_admin" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection