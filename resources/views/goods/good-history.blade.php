@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Inventory of Goods</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <table class="table-responsive" width="100%" border="1">
                        <tr>
                            <td>Name of Goods</td>
                            <td>Quantity of Goods Remaining</td>
                            <td>Date Purchased</td>
                        </tr>
                        @if(count($data)>0)
                            @foreach($data as $result)
                                <tr>
                                    <td>{{$result->goods->name}}</td>
                                    <td>{{$result->quantity}}</td>
                                    <td>{{$result->date_purchased}}</td>
                                </tr>
                            @endforeach
                            {{$data->links()}}
                        @else
                            <p>No Record at the Moment. Click <a href="reg-stock">here</a> to add stock</p>
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection