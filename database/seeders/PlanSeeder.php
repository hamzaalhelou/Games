<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Welcome offe',
                'slug' => 'business-plan',
                'stripe_plan' => 'price_1LmB1SCXbPPKAWayGsb1DAkq',
                'price' => 1,
                'description' => 'Get your first review for only $1'
            ],
            [
                'name' => '5 credits',
                'slug' => 'premium',
                'stripe_plan' => 'price_1LnwbTCXbPPKAWay3ByKpcfq',
                'price' => 24.99,
                'description' => 'only $4.99 per review'
            ],
            [
                'name' => '10 credits',
                'slug' => 'premium',
                'stripe_plan' => 'price_1LnwbTCXbPPKAWay3ByKpcfq',
                'price' => 44.99,
                'description' => 'only $4.49 per review'
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
