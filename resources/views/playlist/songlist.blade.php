@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body">
                @include('layouts.modal')
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Songs</th>
                            <th>File</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>
                                    <audio controls style="margin: 0 auto;">
                                        <source src="../uploads/{{$data->file}}" type="audio/mpeg">
                                    </audio>
                                <td>
                                    <a class="btn btn-danger remove-record" data-toggle="modal" data-target="#custom-width-modal" data-url="{{ route('song.removeInList', $data->id) }}" data-id="{{ $data->id }}">Remove in playlist</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection