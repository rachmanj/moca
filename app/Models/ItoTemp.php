<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItoTemp extends Model
{
    protected $guarded = [];

    public function uploadBy()
    {
        return $this->belongsTo(User::class, 'upload_by');
    }
}
