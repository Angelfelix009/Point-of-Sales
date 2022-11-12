@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Stock List</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <table class="table-responsive" width="100%" border="1">
                        <tr>
                            <td><strong>S/N</strong></td>
                            <td><strong>Goods Name</strong></td>
                            <td><strong>Unit</strong></td>
                            <td><strong>Quantity Added</strong></td>
                            <td><strong>User:</strong></td>
                            <td><strong>Date Added</strong></td>
                        </tr>
                        @if(count($data)>0)
                            @php
                                $no = 0;
                            @endphp
                            @foreach($data as $result)
                                @php
                                    $no +=1;
                                @endphp

                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$result->goods->name}}</td>
                                    <td>{{$result->goods->unit}}</td>
                                    <td>{{$result->quantity}}</td>
                                    <td>{{$result->users->name}}</td>
                                    <td>{{$result->created_at}}</td>
                                </tr>

                            @endforeach
                        @else
                            <p>No Sales Found at the interval</p>
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection