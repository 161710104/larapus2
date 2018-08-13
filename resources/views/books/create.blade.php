@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb primary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/admin/books') }}">Buku</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Buku</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">Tambah Buku</div>
                <br>
                <div class="tab-v1">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="nav-item active">
                        <a href="#form" aria-controls="form" role="tab" data-toggle="tab" class="nav-link active">
                            <i class="fa fa-pencil-square-o"></i> Isi Form
                        </a>
                    </li>
                    <li role="presentation" class="nav-item active">
                        <a href="#upload" aria-controls="upload" role="tab" data-toggle="tab" class="nav-link">
                            <i class="fa fa-cloud-upload"></i> Upload Excel
                        </a>
                    </li>
                </ul>
            </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="form">
                        {!! Form::open(['url' => route('books.store'),
                            'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
                            @include('books._form')
                            {!! Form::close() !!}
                    </div>
                    <div role="tabpanel" class="tab-pane" id="upload">
                        {!! Form::open(['url' => route('import.books'),
                            'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
                            @include('books._import')
                            {!! Form::close() !!}
                    </div>
                </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection