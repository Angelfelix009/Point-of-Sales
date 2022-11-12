@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Expenditure
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Add Expenditure</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Add Expenditure</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="/add-expenditure" method="post" name="Register_Expenditure" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
                        <div class="form-group">
                            <label>Amount Spent Out</label>
                            <input type="number" class="form-control" name="amount" placeholder="Amount of Money Spent out" required>
                        </div>
                        <div class="form-group">
                            <label>Description of Expenditure</label>
                            <input type="text" class="form-control" name="description" placeholder="Description of Expenditure" required>
                        </div>
                        <div class="form-group">
                            <label>Date of Expenditure</label>
                            <input type="date" class="form-control" name="date_expenditure" placeholder="mm/dd/yyyy" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Expenditure" name="reg_goods" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection