<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SongController extends Controller
{
    public $model;

    public function __construct(Song $song) {
        $this->middleware('auth');
        $this->model = $song;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owner_id = Auth::id();
        $datas = $this->model->getAll($owner_id);
        return view('song.list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('song.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $owner_id = Auth::id();
        $file = $request->file('songFile');
        $destinationPath = 'uploads';
        $name = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
        
        if($file->getClientOriginalExtension() != 'mp3') {
            dd('not a mp3');
        } else {
            $destinationPath = 'uploads';
            if($file->move($destinationPath,$file->getClientOriginalName())) {
                $this->model->uploadSong($name, $file->getClientOriginalName(), $owner_id);
            }
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        Song::destroy($song->id);
        return view('home');
    }
}
