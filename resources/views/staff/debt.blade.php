@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Staff Debt</div>
                <div class="panel panel-body">
                    @include('inc.message')

                    <div class="row">
                        <div class="col-sm-6">
                            <a href="/all-staff-debt" class="btn btn-primary">All Staff Debt</a>
                            <a href="/single-staff-debt" class="btn btn-primary">Single Staff Debt</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection