@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Select Types</div>
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col-sm-6"><button class="btn btn-primary" id="intervalbtn">Interval Search</button></div>
                        <div class="col-sm-6"><button class="btn btn-primary" id="singlebtn">Single Search</button> </div>
                    </div>
                    <br>
                    @include('inc.message')
                    <div id="interval" style="display: none;">
                        <form name="stock-report-view" action="stock-report-view" method="post" target="_blank">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Start Date</label>
                                <input type="date" class="form-control" name="start_date" placeholder="Start Date" required>
                            </div>
                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" class="form-control" name="end_date" placeholder="End Date" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="check_sales_btn" value="Check Sales">
                            </div>
                        </form>
                    </div>
                    <div id="single" style="display: none;">
                        <form name="check_sales_fm" action="single-report-view" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" name="start_date" placeholder="Start Date" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="check_sales_btn" value="Check Sales">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection