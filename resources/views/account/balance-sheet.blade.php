@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Statement of Account
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Statement of Account</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Statement of Account for {{$date}}</div>
                <div class="panel panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table-responsive" width="100%" border="1">
                                <tr>
                                    <td colspan="3">Income</td>
                                </tr>
                                <tr>
                                    <td>Description of Income</td>
                                    <td>Amount</td>
                                    <td>Date</td>
                                </tr>
                                @php
                                    $totalSales = 0;
                                    $totalExpenses = 0;
                                @endphp
                                @foreach($sales as $sales)
                                    <tr>
                                        <td>sales With Invoice Number {{$sales->sales_invoice}} </td>
                                        <td>{{$sales->netPrice}}</td>
                                        <td>{{$sales->created_at}}</td>
                                        @php
                                            $totalSales += $sales->netPrice;
                                        @endphp
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>Total:</td>
                                    <td>{{$totalSales}}</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table-responsive" width="100%" border="1">
                                <tr>
                                    <td colspan="4">Expenditure</td>
                                </tr>
                                <tr>
                                    <td>Description of Expenses</td>
                                    <td>Amount</td>
                                    <td>Date</td>
                                    <td>Added by</td>
                                </tr>
                                @foreach($expenses as $result)
                                    <tr>
                                        <td>{{$result->description}}</td>
                                        <td>{{$result->amount}}</td>
                                        <td>{{$result->expenditure_date}}</td>
                                        <td>{{$result->created_by}}</td>
                                    </tr>
                                    @php
                                        $totalExpenses += $result->amount;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td>Total:</td>
                                    <td>{{$totalExpenses}}</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>

                            </table>
                        </div>

                    </div>
                    <h4 class="text-center"> <strong> Net Profit = {{$totalSales - $totalExpenses}}</strong></h4>
                </div>
            </div>
        </section>
    </div>
@endsection