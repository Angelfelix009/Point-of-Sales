@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Add Sales</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <div class="form-group">
                        <label>Enter the goods name</label>
                        <input type="search" id="good_name" name="good_name" placeholder="Search Keyword" class="form-control" required>
                    </div>
                    <table width="100%">
                        <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Goods Name</td>
                            <td>Unit</td>
                            <td>Price</td>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    @if($data!='')
                        <form action="/add-sales" method="post" name="Add_Product" id="add_product_form" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
                            <input type="hidden" name="ref" value="{{ $code }}">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Name of Goods</label>
                                        <input type="text" name="name" value="{{$data}}" class="form-control" readonly required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control" name="quantity" placeholder="Quantity Bought" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <br>
                                        <button type="submit" id="add_form" name="add_product" class="btn btn-primary">Add Product</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                @php
                                    $tamount = 0;
                                @endphp
                                @if(count($so) >0)
                                    @foreach($so as $record)
                                        <tbody>
                                        <tr>
                                            <td>{{$record->goods_name}}</td>
                                            <td>{{$record->unit_price}}</td>
                                            <td>{{$record->quantity}}</td>
                                            <td>{{$record->amount}}</td>
                                            <td>
                                                <a href="/delete-item?id={{$record->id}}"><span class="fa fa-trash"></span></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                        @php
                                            $tamount += $record->amount;
                                        @endphp
                                    @endforeach
                                    <tbody>
                                    <tr>
                                        <td colspan="3"><strong>Total Amount of Money</strong></td>
                                        <td><strong>{{$tamount}}</strong></td>
                                    </tr>
                                    </tbody>
                                @endif
                            </table>
                        </div>
                        <form action="sales" method="post" name="Register_Course" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
                            <input type="hidden" name="price" value="{{ $tamount }}">
                            <input type="hidden" name="sales_invoice" value="{{ $code }}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Discount (in %)</label>
                                        <input type="number" class="form-control" name="discount" placeholder="Enter the percentage discounted" value="0" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Payment method</label>
                                        <select name="pmethod" id="pmethod" class="form-control" required>
                                            <option value="">Select payment method</option>
                                            <option>Cash</option>
                                            <option>POS</option>
                                            <option>Transfer</option>
                                            <option>Debt</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group" id="ctypediv" style="display: none">
                                        <label>Customer Type</label>
                                        <select name="ctype" id="ctype" class="form-control">
                                            <option value="">Select Customer Type</option>
                                            <option>Customer</option>
                                            <option>Staff</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group" id="ppaymentdiv" style="display: none">
                                        <label>Part Payment</label>
                                        <input type="number" class="form-control" name="part_payment" placeholder="Part Payment" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group" id="snamediv" style="display: none">
                                        <label>Staff Name</label>
                                        <select name="sname" id="sname" class="form-control" >
                                            <option value="">Select Staff Name</option>
                                            @foreach($staff as $record)
                                                <option>{{$record->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group" id="cnamediv" style="display: none">
                                        <label>Customer Name</label>
                                        <select name="cname" id="cname" class="form-control">
                                            <option value="">Select Customer Name</option>
                                            @foreach($cust as $record)
                                                <option>{{$record->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <input type="submit" value="Register Sales" name="reg_goods" class="btn btn-primary">
                            </div>
                        </form>
                    @else
                        <p>Add a product first. Click <a href="reg-goods">Here</a> to add a product </p>
                    @endif

                </div>
            </div>
        </section>
    </div>
@endsection
