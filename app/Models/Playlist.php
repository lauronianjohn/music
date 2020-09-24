<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function storeAll(array $data, $owner) {
        return Playlist::insert([
            'owner_playlist_id' => $owner, 
            'title' => $data['title'],
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
    public function getAll($owner) {
        return Playlist::where('owner_playlist_id', '=', $owner)->get();
    }
    public function storeSongs(array $data, $playlist, $owner) {
        $songs = $data['song'];
        for($i=0;$i<count($songs);$i++) {
            $result = DB::table('song_in_playlist')->insert([
                'song_id' => $songs[$i], 
                'playlist_id' => $playlist,
                'user_id' => $owner,
                'created_at' =>  date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        return 1;
    }
    public function getSongInPL($playlist, $owner) {
        return DB::table('song_in_playlist')
            ->join('songs', 'song_in_playlist.song_id', '=', 'songs.id')
            ->select('song_in_playlist.*', 'songs.name', 'songs.file')
            ->where([
            ['playlist_id', '=', $playlist],
            ['user_id', '=', $owner],
        ])->get();
    }
    public function deleteInList($songid, $owner) {
        return DB::table('song_in_playlist')
            ->where([
            ['id', '=', $songid],
            ['user_id', '=', $owner],
        ])->delete();
    }
}
