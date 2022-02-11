<?php

namespace App\Models;

use App\Events\NewEntryRecievedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestEntry extends Model
{
    use HasFactory;

    protected $guarded = [];

    /*protected static function booted()
    {
        static::created(function ($contestEntry) {
            NewEntryRecievedEvent::dispatch();
        });
    }*/
}
