<?php

use Illuminate\Database\Seeder;

use App\HoldingCompany;

class HoldingCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        HoldingCompany::create([
            //'id' => StatusEnum::DEFAULT,
            'id' => 1,
            'is_visible' => false,
            'name' => 'Brandix',
            'display_name' => 'Brandix'
        ]);
    }
}
