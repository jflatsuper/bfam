<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastPlayedContent extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function content(){
        return $this->hasOne(CourseSectionVideos::class, 'id','last_content');
    }
}
