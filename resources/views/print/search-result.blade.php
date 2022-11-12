@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Search Result</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <table class="table-responsive" width="100%" border="1">
                        <tr>
                            <td>Name of Seller</td>
                            <td>Invoice No</td>
                            <td>Amount</td>
                            <td>Discount</td>
                            <td>Net Price Paid</td>
                            <td>Date</td>
                            <td>Print</td>
                            @if(Auth::user()->role_id >=2)
                                <td>Revert Goods</td>
                            @endif
                        </tr>
                        @if(count($data)>0)
                            @foreach($data as $result)
                                <tr>
                                    <td>{{$result->user}}</td>
                                    <td>{{$result->sales_invoice}}</td>
                                    <td>{{$result->amount}}</td>
                                    <td>{{$result->discount}}</td>
                                    <td>{{$result->netPrice}}</td>
                                    <td>{{$result->created_at}}</td>
                                    <td><a href="sales/{{$result->id}}" class="btn btn-primary">Print</a> </td>
                                    @if(Auth::user()->role_id >=2)
                                        <td>
                                            <form action="{{route('sales.update',$result->id)}}" method="post">
                                                @csrf
                                                <input type="hidden" name="sid" value="{{$result->id}}">
                                                {{method_field('PUT')}}
                                                <button type="submit" class="btn btn-primary">Revert Goods</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <p>No Record at the Moment.</p>
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection