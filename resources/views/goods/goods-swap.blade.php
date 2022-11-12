@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Goods Information</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <table class="table-responsive" width="100%" border="1">
                        <tr>
                            <td>Name of Goods</td>
                            <td>Description of Goods</td>
                            <td>Unit Price of Goods</td>
                            <td>Created on</td>
                            <td>Swap</td>
                        </tr>
                        @if(count($data)>0)
                            @foreach($data as $result)
                                <tr>
                                    <td>{{$result->name}}</td>
                                    <td>{{$result->description}}</td>
                                    <td>{{$result->price}}</td>
                                    <td>{{$result->created_at}}</td>
                                    <td><a href="good-swap/{{$result->id}}" class="btn btn-primary">Swap</a> </td>
                                </tr>
                            @endforeach
                        @else
                            <p>No Record at the Moment. Click <a href="reg-goods">here</a> to add goods</p>
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection