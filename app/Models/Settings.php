<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = ['min_deposit', 'max_deposit', 'enable_registration', 'enable_investment', 'min_withdraw', 'max_withdraw', 'international_plan_interest', 'standard_plan_interest', 'goal_plan_interest', 'referral_interest', 'compound'];
}
