@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Add Stock</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="{{route('stock.store')}}" method="post" name="Register_stock" enctype="multipart/form-data">
                      @csrf
                        @if(count($data)>0)
                            <div class="form-group">
                                <label>Name of Goods</label>
                                <select name="name" class="form-control" required>
                                    <option value="">Select the name of the goods</option>
                                    @foreach($data as $result)
                                        <option value="{{$result->id}}">{{$result->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Quantity of Goods Bought</label>
                            <input type="number" class="form-control" name="quantity" placeholder="Quantity of Goods Bought" required>
                        </div>
                        <div class="form-group">
                            <label>Unit</label>
                            <input type="text" class="form-control" name="unit" placeholder="unit of Goods Bought" required>
                        </div>
                        <div class="form-group">
                            <label>Date of Purchase</label>
                            <input type="date" class="form-control" name="date_purchased" placeholder="mm/dd/yyyy" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Stock" name="reg_goods" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection