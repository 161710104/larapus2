@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb primary">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('/admin/members') }}">Member</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail {{ $member->name }}</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">Detail {{ $member->name }}</div>
                <br>
                <p>&nbsp*Buku yang sedang dipinjam:</p>
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal Peminjaman</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($member->borrowLogs()->borrowed()->get() as $log)
                        <tr>
                            <td>{{ $log->book->title }}</td>
                            <td>{{ $log->created_at }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <br>
                    <p>&nbsp*Buku yang telah dikembalikan:</p>
                <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal Kembali</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($member->borrowLogs()->returned()->get() as $log)
                    <tr>
                        <td>{{ $log->book->title }}</td>
                        <td>{{ $log->updated_at }}</td>
                    </tr>
                    @empty
                    <tr>
                    <td colspan="2">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection