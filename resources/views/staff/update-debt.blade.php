@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Update Record</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <form action="/update-debt" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="debt_id" value="{{ $data->id }}" required>
                    <input type="hidden" name="sales_id" value="{{ $data->sales_id }}" required>
                    <div class="form-group">
                        <label>Name of Goods</label>
                        <input type="text" class="form-control" value="{{$data->sales->goods_name}}" name="gname" readonly required>
                    </div>
                    <div class="form-group">
                        <label>Quantity of Goods</label>
                        <input type="text" class="form-control" value="{{$data->sales->quantity}}" name="quantity" readonly required>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="{{$data->sales->customer_name}}" name="cname" readonly required>
                    </div>
                    <div class="form-group">
                        <label>Amount of Goods</label>
                        <input type="number" class="form-control" value="{{$data->amount}}" name="amount" readonly required>
                    </div>
                    <div class="form-group">
                        <label>Part Payment</label>
                        <input type="number" class="form-control" value="{{$data->part_payment}}" name="part_payment" readonly required>
                    </div>
                    <div class="form-group">
                        <label>Balanced</label>
                        <input type="number" class="form-control" value="{{$data->balance}}" name="balance" readonly required>
                    </div>
                    <div class="form-group">
                        <label>Payment Options</label>
                        <select class="form-control"  name="poption" required>
                            <option value="">Select an Option</option>
                            <option>Full Payment</option>
                            <option>Part Payment</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Amount Paid</label>
                        <input type="number" class="form-control" value="{{$data->balance}}" name="amount_paid" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update Record" name="update_record_btn" class="btn btn-primary">
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection