@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Edit User Account</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="{{route('user.update',$data->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$data->name}}" required>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" value="{{$data->level}}" class="form-control" required>
                            <option value="">Select a Level</option>
                            <option>DataInput</option>
                            <option>Supervisor</option>
                            <option>Manager</option>
                            <option>Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update Account" name="update_admin" class="btn btn-primary">
                    </div>
                    @method('PUT')
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection