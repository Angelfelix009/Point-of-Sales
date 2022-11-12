@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Search Supplier</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="/find-supplier" method="post" name="search_supplier" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Search:</label>
                            <input type="text" class="form-control" name="search" placeholder="Enter either name or phone number" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Search Supplier" name="find_supplier" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection