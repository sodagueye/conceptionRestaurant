<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;


    protected $fillable = [
        'date',
        'status',
        'total',
        'client_id' ,
        'livreur_id'
     ];
}


public function clientComm()
{
    return $this->belongsTo(Client::class ,'client_id');
}
