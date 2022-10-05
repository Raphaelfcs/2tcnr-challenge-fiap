<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    protected $table = 'analysis';

    use HasFactory;

    protected $fillable = [
        "company_name",
        "employee_name",
        "phone_number",
        "car_fleet_size",
        "localization",
    ];
}
