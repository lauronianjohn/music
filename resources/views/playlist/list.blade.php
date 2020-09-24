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
                            <th scope="col">Play List Title</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <td>{{$data->title}}</td>
                                <td>
                                    <a href="{{ route('song.addsong', $data->id) }}" class="btn btn-primary">Add a song</a>
                                    <a href="{{ route('song.getSongList', $data->id) }}" class="btn btn-success">View Song List</a>
                                    <a class="btn btn-danger remove-record" data-toggle="modal" data-target="#custom-width-modal" data-url="{{ route('playlist.destroy', $data->id) }}" data-id="{{ $data->id }}">Delete</a>
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