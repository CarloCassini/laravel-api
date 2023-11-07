<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnology extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'color',
    ];

    // per non vedere la tabella pivot nelle API che verranno inviate collegate a questa tabella
    protected $hidden = ['pivot'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}