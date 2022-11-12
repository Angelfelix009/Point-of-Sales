@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Find Customer</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <table class="table-responsive" width="100%" border="1">
                        <tr>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        @if(count($data)>0)
                            @foreach($data as $record)
                                <tr>
                                    <td>{{$record->name}}</td>
                                    <td>{{$record->phone}}</td>
                                    <td><a href="customer/{{$record->id}}/edit" class="btn btn-primary">Edit</a> </td>
                                    <td>
                                        <form action="{{route('customer.destroy',$record->id)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>No Record at with that name</p>
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection