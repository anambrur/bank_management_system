<?php

namespace Database\Seeders;

use App\Models\AccountType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $AccountType=[
            ['account_type'=>'Saving Account'],
            ['account_type'=>'Current Account']
        ];
        AccountType::insert($AccountType);
    }
}
