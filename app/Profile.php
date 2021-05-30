<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profile";
    protected $fillable = ['user_id', 'tgl_lahir', 'alamat'];

    public function user(){
        return $this-> belongsTo(User::class);
    }
}
