<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'businessName',
        'category',
        'cnpj',
        'description',
        'phone',
        'email',
        'websiteURL',
        'road',
        'number',
        'cep',
        'neighborhood',
        'city',
        'state',
        'operatingSchedule',
        'locationPhoto',
        'ownerName',
        'ownerTelephone',
        'ownerEmail',
        'ownerCpf',
        'status',
        'ratingBusiness',
        'registrationDate',
        'user_id'
    ];

    public function socialMedias()
    {
        return $this->hasMany(SocialMedia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'business_id');
    }


    public static function rules()
    {
        return [
            'businessName' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'cnpj' => ['required', 'string', 'unique:businesses'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Business::class],
            'websiteURL' => ['string', 'max:255'],
            'locationPhoto' => ['required', 'max:255'],
            'road' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'cep' => ['required', 'string', 'max:255'],
            'operatingDays' => ['required', 'array'],
            'openingTime' => ['required', 'array'],
            'closingTime' => ['required', 'array'],
            'ownerName' => ['required', 'string', 'max:255'],
            'ownerTelephone' => ['required', 'string', 'max:255'],
            'ownerEmail' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'ownerCpf' => ['required', 'string', 'max:255'],
        ];
    }
}
