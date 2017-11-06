<?php

namespace App\Domains;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'last_name', 'age', 'gender', 'phone', 'photo_address', 'about'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function getGender()
    {
        $this->gender == 0 ? $gender = "Feminino" : $gender = "Masculino";
        return $gender;
    }
}
