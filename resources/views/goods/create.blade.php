@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Register Goods</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="{{route('goods.store')}}" method="post" name="Register_goods" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name of Goods</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label>Description of Goods</label>
                            <input type="text" class="form-control" name="description" placeholder="Description" required>
                        </div>
                        <div class="form-group">
                            <label>Unit of Goods</label>
                            <input type="text" class="form-control" name="good_unit" placeholder="Unit" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" placeholder="price" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Register Goods" name="reg_goods" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection