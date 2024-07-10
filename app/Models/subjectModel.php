<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    public $table = 'subjects';
    public $timestamps = false;

    protected $fillable = ['name', 'code', 'class'];

    public function getClassAttribute($value)
    {
        return explode(',', $value);
    }

    public function setClassAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['class'] = implode(',', $value);
        } else {
            $this->attributes['class'] = $value;
        }
    }
}
