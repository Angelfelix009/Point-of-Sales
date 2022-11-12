@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Customer Debt </div>
                <div class="panel panel-body">
                    @include('inc.message')

                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table-responsive" width="100%" border="1">
                                <tr>
                                    <td>Name of Staff</td>
                                    <td>Invoice No</td>
                                    <td>Amount Paid</td>
                                    <td>Balance</td>
                                    <td>Date of Purchase</td>
                                </tr>
                                @php
                                    $totalDebt = 0;
                                @endphp
                                @foreach($data as $record)
                                    <tr>
                                        <td>{{$record->sales->customer_name}}</td>
                                        <td>{{$record->sales->sales_invoice}}</td>
                                        <td>{{$record->part_payment}}</td>
                                        <td>{{$record->balance}}</td>
                                        <td>{{$record->created_at}}</td>
                                    </tr>
                                    @php
                                        $totalDebt += $record->balance;
                                    @endphp
                                @endforeach
                            </table>
                        </div>

                    </div>
                    <h4 class="text-justify"> Total Debt = {{$totalDebt }}<strong> </strong></h4>
                </div>
            </div>
        </section>
    </div>
@endsection