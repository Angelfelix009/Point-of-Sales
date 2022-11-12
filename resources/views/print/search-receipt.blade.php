@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Search for Receipt</div>
                <div class="panel panel-body">
                    @include('inc.message')

                    <form action="/receipt-find" method="post" name="Search_receipt" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
                        <div class="form-group">
                            <label>Enter the goods name or the date</label>
                            <input type="search" name="search" placeholder="Search Keyword" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Search" name="search_receipt_btn" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection