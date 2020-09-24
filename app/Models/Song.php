<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'songFile',
    ];

    public function uploadSong($name, $filename, $owner) {
        return Song::insert([
            'name' => $name, 
            'file' => $filename,
            'owner_id' => $owner,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
    public function getAll($owner){
        return Song::where('owner_id', '=', $owner)->get();
    }
}
