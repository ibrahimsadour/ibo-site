<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;

class DynamicContent extends Model
{
    use HasFactory;
    protected $table = 'dynamic_content';

    protected $fillable = [
        'id', 'name','content','photo','active','created_at','updated_at'
    ];

    public $timestamps = true;

     // deze een globaal scope om een active product of winkel te laat zien with Methode(where('active',1))
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
 
    public function getActive()
    {
        $inactive = 'غير مفعل';
        $active = 'مفعل';
        return $this->active == 1 ? $active  : $inactive;

    }

    public function getBodyAttribute($body)
    {

    return Blade::compileString($body);

    }
    public function getPageDescAttribute($value)
    {
        return htmlspecialchars($value);
    }

    //whene you get Photo from database (automacly added http://dominName/assets/)
    //that is made with standard method (asset)
    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }
 
}
