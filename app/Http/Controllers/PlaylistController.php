<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

class PlaylistController extends Controller
{
    public $model;
    public $model_song;

    public function __construct(Playlist $playlist, Song $song) {
        $this->middleware('auth');
        $this->model = $playlist;
        $this->model_song = $song;
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
        return view('playlist.list', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playlist.create');
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
        if($this->model->storeAll($request->all(), $owner_id)) {
            return redirect(route('home'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        Playlist::destroy($playlist->id);
        return view('home');
    }

    public function addSong($playlistId) {
        $owner_id = Auth::id();
        $datas = $this->model_song->getAll($owner_id);
        return view('playlist.addsong', compact('playlistId', 'datas'));
    }
    public function addInList(Request $request, $playlistId) {
        $owner_id = Auth::id();
        $this->model->storeSongs($request->all(), $playlistId, $owner_id);
        return view('home');
    }
    public function getList($playListId) {
        $datas = $this->model->getSongInPL($playListId, Auth::id());
        return view('playlist.songlist', compact('datas'));
    }
    public function removeInPlaylist($songid) {
        $this->model->deleteInList($songid, Auth::id());
        return redirect()->back();
    }
}
