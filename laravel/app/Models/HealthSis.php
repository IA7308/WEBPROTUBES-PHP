<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;

class HealthSis extends User
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "FirstName",
        "LastName",
        "Username",
        "NoHP",
        "Status",
        "Note",
        "Umur",
        "TanggalLahir",
        "password",
        "Email",
        "Image"
    ];
    protected $hidden = [
        'password',
    ];
}
