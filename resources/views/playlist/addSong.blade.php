@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{ route('song.addInList', $playlistId ) }}" method="post">
                        @method('PUT')
                        @csrf
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Title</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="song[]" value="{{$data->id}}"></label>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection