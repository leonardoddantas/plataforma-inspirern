<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'business_name',
        'category',
        'cnpj',
        'state_registration',
        'municipal_registration',
        'description',
        'phone',
        'email',
        'website_url',
        'social_media',
        'street',
        'number',
        'zipcode',
        'neighborhood',
        'city',
        'state',
        'working_days',
        'working_hours',
        'location_photo',
        'owner_name',
        'owner_phone',
        'owner_email',
        'owner_cpf',
    ];
}
