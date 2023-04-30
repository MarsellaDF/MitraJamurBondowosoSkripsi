<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function visitsCounter()
    {
        return visits($this);
    }

    public function visits()
    {
        return visits($this)->relation();
    }
}
