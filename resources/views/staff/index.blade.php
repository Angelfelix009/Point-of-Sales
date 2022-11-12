@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">List of Staff</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <table class="table-responsive" width="100%" border="1">
                        <tr>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Address</td>
                            <td>Designation</td>
                            <td>image</td>
                            <td>Added By</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        @if(count($user)>0)
                            @foreach($user as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->address}}</td>
                                    <td>{{$data->designation}}</td>
                                    <td><img src="storage/staff/{{$data->id}}/{{$data->img}}" width="50px" height="70px"></td>
                                    <td>{{$data->added_by}}</td>
                                    <td><a href="staff/{{$data->id}}/edit" class="btn btn-primary">Edit</a> </td>
                                    <td>
                                        <form action="{{route('staff.destroy',$data->id)}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{$user->links()}}
                        @else
                            <p>No Record at the Moment. Click <a href="/staff/create">here</a> to add new Staff</p>
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection