<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hospital extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name','desc','about_us'];

    protected $guarded=[];

    public function branches() {
        return $this->hasMany(HospitalBranch::class);
    }

}
