@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Select Year</div>
                <div class="panel panel-body">
                    <br>
                    @include('inc.message')
                    <div>
                        <form name="check_year" action="check-year" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Select Month</label>
                                <input type="date" class="form-control" name="month" placeholder="Month" required>
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