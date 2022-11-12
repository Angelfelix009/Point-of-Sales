@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Search Goods</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <h4>Search Goods</h4>
                   <!-- <form action="result-goods" method="post" name="Search_receipt" enctype="multipart/form-data">
                       -->
                        <div class="form-group">
                            <label>Enter the goods name</label>
                            <input type="search" id="search" name="search" placeholder="Search Keyword" class="form-control" required>
                        </div>
                     <!--   <div class="form-group">
                            <input type="submit" value="Search Goods" name="search_receipt_btn" class="btn btn-primary">
                        </div>
                    </form>-->
                    <table class="table-responsive" width="100%" border="1">
                        <thead>
                        <tr>
                            <td>Name of Goods</td>
                            <td>Description</td>
                            <td>Unit</td>
                            <td>Price</td>
                            <td>Edit Goods</td>
                            <td>Add Stock</td>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection