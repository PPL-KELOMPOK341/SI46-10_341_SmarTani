<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['site_title', 'site_description', 'site_logo', 'site_version'];
}

