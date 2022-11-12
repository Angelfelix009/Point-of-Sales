@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Customer Debt</div>
                <div class="panel panel-body">
                    @include('inc.message')

                    <div class="row">
                        <div class="col-sm-6">
                            <a href="/all-customer-debt" class="btn btn-primary">All Customer Debt</a>
                            <a href="/single-customer-debt" class="btn btn-primary">Single Customer Debt</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection