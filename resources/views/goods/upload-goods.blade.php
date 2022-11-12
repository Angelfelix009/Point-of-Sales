
@extends('layouts.user')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Upload Goods
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">Upload Goods</div>
                <div class="panel-body">
                    @include('inc.message')
                    <form action="{{ route('import-goods') }}" method="post" name="Upload_File" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Upload An Excel File</label>
                            <input type="file" class="form-control" name="file" placeholder="Goods Excel File" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Import Goods' Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection