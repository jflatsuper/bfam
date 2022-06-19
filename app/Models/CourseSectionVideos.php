<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSectionVideos extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getVideoContentAttribute(){
        return $this->video;
    }

    public function getVideoMaterialAttribute(){
        return asset("uploads/materials/$this->material");
    }
}
