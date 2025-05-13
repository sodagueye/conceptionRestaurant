<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'heure',
        'nombre',
        'client_id'
    ];
     public function clientreserv()
    {
        return $this->belongsTo(Client::class ,'client_id');
    }
}
