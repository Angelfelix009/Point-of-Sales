@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Staff Debt </div>
                <div class="panel panel-body">
                    @include('inc.message')

                    <div class="row">
                        <div>
                            <table class="table-responsive" width="100%" border="1" align="center">
                                <tr>
                                    <td>Name of Staff</td>
                                    <td>Invoice No</td>
                                    <td>Amount</td>
                                    <td>Date of Purchase</td>
                                    <td>More  Details</td>
                                    <td>Update Record</td>
                                </tr>
                                @foreach($data as $record)
                                    <tr>
                                        <td>{{$record->customer_name}}</td>
                                        <td>{{$record->sales_invoice}}</td>
                                        <td>{{$record->netPrice}}</td>
                                        <td>{{$record->created_at}}</td>
                                        <td><a href="{{route('view.staff.debt',array('invoice'=>$record->sales_invoice,'id'=>$record->id))}}" class="btn btn-primary">More Details</a></td>
                                        <td><a href="/update-debt?id={{$record->id}}" class="btn btn-primary">Update Record</a></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection