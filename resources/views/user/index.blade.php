@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">List of Accounts</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    <table class="table-responsive" width="100%" border="1">
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        @if(count($user)>0)
                            @foreach($user as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>
                                        @if($data->role_id ==1)
                                            Data-Input
                                        @elseif($data->role_id ==2)
                                            Supervisor
                                        @elseif($data->role_id ==3)
                                            Manager
                                        @elseif($data->role_id ==4)
                                            Admin
                                        @endif

                                    </td>
                                    <td><a href="user/{{$data->id}}/edit" class="btn btn-primary">Edit</a> </td>
                                    <td>
                                        <form action="{{route('user.destroy',$data->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            {{$user->links()}}
                        @else
                            <p>No Record at the Moment. Click <a href="reg-admin">here</a> to add new User</p>
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection