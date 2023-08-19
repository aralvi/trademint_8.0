<?php

namespace App\Console\Commands;

use App\Models\MonthlyCommission;
use App\Models\Settings;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Console\Command;

class MonthlyCommissionCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthlyCommission:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commission transfer to user on 1st of every month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $settings = Settings::first();
        $users = User::where('role', 'user')->get();
        foreach ($users as $key => $user) {
            $plan_interest = $user->plan . '_plan_interest';
            $referal_users = User::where('referral_id', $user->id)->wherePlan('standard')->pluck('id')->toArray();
            $referral_investment = $user->plan == 'standard' && $user->total_amount >=1200 ? (int)Transaction::whereIn('user_id', $referal_users)->pluck('deposit')->sum() - (int)Transaction::whereIn('user_id', $referal_users)->pluck('withdraw')->sum() : 0;
            $monthly_commission = new MonthlyCommission();
            $monthly_commission->user_id = $user->id;
            $monthly_commission->investment = $user->total_amount;
            $monthly_commission->plan = $user->plan;
            $monthly_commission->interest_percent = $settings->$plan_interest;
            $monthly_commission->referral_investment = $referral_investment;
            $monthly_commission->referral_interest_percent = $settings->referral_interest;
            $monthly_commission->total_amount = (int)$user->total_amount + (int)(((int)$settings->$plan_interest / 100) * (int)$user->total_amount) + (int)(((int)$settings->referral_interest / 100) * (int)$referral_investment);
            $monthly_commission->total_interest = (int)(((int)$settings->$plan_interest / 100) * (int)$user->total_amount) + (int)(((int)$settings->referral_interest / 100) * (int)$referral_investment);
            $monthly_commission->save();
            $user->total_amount = (int) $user->total_amount + (int) $monthly_commission->total_interest;
            $user->save();

        }


    }
}
