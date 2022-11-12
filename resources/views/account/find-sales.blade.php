@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                View Account
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View Account</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">View Account</div>
                <div class="panel panel-body">
                    <table class="table-responsive" width="100%" border="1">
                        <tr>
                            <td><strong>Invoice No</strong></td>
                            <td><strong>Discount</strong></td>
                            <td><strong>Amount</strong></td>
                            <td><strong>Amount</strong></td>
                            <td><strong>Sold by:</strong></td>
                            <td><strong>Date Sold</strong></td>
                        </tr>
                        @if(count($data)>0)
                            @php
                                $total = 0;
                            @endphp
                            @foreach($data as $result)
                                <tr>
                                    <td>{{$result->sales_invoice}}</td>
                                    <td>{{$result->discount}}</td>
                                    <td>{{$result->amount}}</td>
                                    <td>{{$result->netPrice}}</td>
                                    <td>{{$result->user}}</td>
                                    <td>{{$result->created_at}}</td>
                                </tr>
                                @php
                                    $total += $result->netPrice;
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="2" align="centre"><strong>Total</strong></td>
                                <td colspan="2" align="center"><strong>N{{$total}}</strong></td>
                                <td colspan="1" align="center">&nbsp;</td>
                            </tr>
                        @else
                            <p>No Sales Found at the interval</p>
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection