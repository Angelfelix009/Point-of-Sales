@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
               Change Password
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Change Password</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Change Password</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form method="post" action="change-password">
                    @csrf
                   <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control" name="oldpassword" placeholder="Old-Password" required>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password" placeholder="New-Password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm-Password" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Change Password" name="change_pword" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection