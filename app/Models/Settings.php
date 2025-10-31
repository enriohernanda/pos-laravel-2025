<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    // eloquent: Object Relation Mapping
    // Query Builder:
    // select * from settings
    // insert into settings (app_name, phone_number, address) values()

    protected $fillable = [
        'app_name',
        'phone_number',
        'address'
    ];
}
