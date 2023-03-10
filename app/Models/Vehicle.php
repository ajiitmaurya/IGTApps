<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Vehicle extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'vehicles';

    
    protected $fillable=[
        'VehAvailCore',
        'VehAvailInfo',
      ];
}
