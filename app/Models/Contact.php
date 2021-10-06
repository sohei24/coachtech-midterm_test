<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_name',
        'first_name',
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion',
        'created_at',
        'updated_at',
    ];

    public static $rules = array(
        'family_name' => 'required',
        'first_name' => 'required',
        'gender' =>'required',
        'email' => 'required|email',
        'postcode' => 'required|regex:/^[0-9]{3}-[0-9]{4}$/',
        'address' => 'required',
        'opinion' => 'required|max: 120',
    );

    public function getFullname()
    {
        $fullname = $this->family_name.' '.$this->first_name;
        return $fullname;
    }
}