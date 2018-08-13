@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <br>
                </center> <div class="card-body">
                Selamat datang di Larapus.
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="text-muted">Buku dipinjam</td>
                            <td>@if ($borrowLogs->count() == 0)
                                Tidak ada buku dipinjam
                                @endif
                                <ul>@foreach ($borrowLogs as $borrowLog)
                                <li>{!! Form::open(['url' => route('member.books.return', $borrowLog->book_id),
                                        'method'=> 'put',
                                        'class'=> 'form-inline js-confirm',
                                        'data-confirm' => "Anda yakin hendak mengembalikan " . $borrowLog->book->title . "?"] ) !!}
                                    {{ $borrowLog->book->title }}
                                    <div class="col-md-8 col-md-offset-6">{!! Form::submit('Kembalikan', ['class'=>'btn btn-xs btn-success']) !!}
                                    {!! Form::close() !!}</div>
                                    <br>
                                </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection