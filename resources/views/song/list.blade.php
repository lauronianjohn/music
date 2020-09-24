@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <button id="play" class="btn btn-primary">play</button><br>
                <button id="pause" class="btn btn-primary">pause</button><br>
                <button id="next" class="btn btn-primary">next</button><br>
                <button id="prev" class="btn btn-primary">prev</button><br>
                <div class="card-body">
                    @include('layouts.modal')
                    <table class="table" id="songtable">
                        <thead>
                            <tr>
                            <th scope="col">Song Title</th>
                            <th>file</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="songbody">
                            @foreach ($datas as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>
                                    <audio controls style="margin: 0 auto;" id="audio">
                                        <source src="/uploads/{{$data->file}}" type="audio/mpeg">
                                    </audio>
                                <td>
                                <td>
                                <a class="btn btn-danger remove-record" data-toggle="modal" data-target="#custom-width-modal" data-url="{{ route('song.destroy', $data->id) }}" data-id="{{ $data->id }}">Delete</a>
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