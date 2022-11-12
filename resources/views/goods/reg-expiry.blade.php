@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel panel-heading">Add Goods Expiry Date</div>
                <div class="panel panel-body">
                    @include('inc.message')
                    @if(count($data) >0)
                        <form action="/track" method="post" name="reg_expiry" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
                            <div class="form-group">
                                <label>Name of Goods</label>
                                <select name="name" class="form-control">
                                    <option value="">Select Name of Goods</option>
                                    @foreach($data as $record)
                                        <option>{{$record->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Expiry Date</label>
                                <input type="date" class="form-control" name="edate" placeholder="MM-DD-YYYY" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Capture Expiry Date" name="cap_date" class="btn btn-primary">
                            </div>
                        </form>
                    @else
                        <p>Add a product first. Click <a href="reg-goods">Here</a> to add a product </p>
                    @endif

                </div>
            </div>
        </section>
    </div>
@endsection