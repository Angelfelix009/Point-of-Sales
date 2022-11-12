@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Goods Information</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    @if(count($data)>0)
                    <form method="get" action="search-products">
                        @csrf
                        <div class="form-group">
                            <label>Search Goods</label>
                            <input type="search" name="search" class="form-control" placeholder="Enter Faculty Name">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Search Goods</button>
                        </div>
                    </form>
                    <br>
                    <table class="table-responsive" width="100%" border="1">
                        <tr>
                            <td>Name of Goods</td>
                            <td>Description of Goods</td>
                            <td>Unit Price of Goods</td>
                            <td>Created on</td>
                            <td>Edit</td>
                        </tr>
                            @foreach($data as $result)
                                <tr>
                                    <td>{{$result->name}}</td>
                                    <td>{{$result->description}}</td>
                                    <td>{{$result->price}}</td>
                                    <td>{{$result->created_at}}</td>
                                    <td><a href="goods/{{$result->id}}" class="btn btn-primary">Edit</a> </td>
                                </tr>
                            @endforeach
                            {{$data->links()}}
                        @else
                            <p>No Record at the Moment. Click <a href="reg-goods">here</a> to add goods</p>
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection