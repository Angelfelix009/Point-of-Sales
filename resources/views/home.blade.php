
@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Staff Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">Staff Dashboard</div>
                <div class="panel-body">
                    @include('inc.message')
                    <div class="row">
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3> 1</h3>

                                    <p>Total Product Saved</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3> 2</h3>

                                    <p>Registered Staff</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-tasks"></i>
                                </div>
                                <a href="" class="small-box-footer">View More<i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>3</h3>

                                    <p>Total Sales</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <a href="" class="small-box-footer">View More<i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3> 5</h3>

                                    <p>Total Course Offered</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3> 6</h3>

                                    <p>Total Uploaded Material</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <a href="" class="small-box-footer">View More<i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>7</h3>

                                    <p>Lock Account</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <a href="" class="small-box-footer">View More<i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection