@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb primary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/admin/members') }}">Member</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Member</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">Tambah Member</div>
                <br>
                {!! Form::open(['url' => route('members.store'),
                    'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
                    @include('members._form')
                    
                {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection