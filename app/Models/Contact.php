<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'mobile_no',
        'email',
        'subject',
        'message',
        'mark_as_read',
    ];

    public function SetNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
}