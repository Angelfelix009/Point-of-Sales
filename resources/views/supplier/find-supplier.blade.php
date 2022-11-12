@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">List of Customer</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <table class="table-responsive" width="100%" border="1">
                        <tr>
                            <td>Name of Company</td>
                            <td>Address of Company</td>
                            <td>Contact Person in the Company</td>
                            <td>Contact Phone Number</td>
                            <td>Description of Service</td>
                            <td>Edit</td>
                        </tr>
                        @if(count($data)>0)
                            @foreach($data as $record)
                                <tr>
                                    <td>{{$record->name}}</td>
                                    <td>{{$record->address}}</td>
                                    <td>{{$record->contact}}</td>
                                    <td>{{$record->phone}}</td>
                                    <td>{{$record->description}}</td>
                                    <td><a href="supplier/{{$record->id}}/edit" class="btn btn-primary">Edit</a> </td>
                                </tr>
                            @endforeach
                        @else
                            <p>No Record with that search keyword try another one.</p>
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection