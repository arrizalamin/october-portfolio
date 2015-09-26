<?php namespace ArrizalAmin\Portfolio\Updates;

use ArrizalAmin\Portfolio\Models\Category;
use October\Rain\Database\Updates\Seeder;

class SeedAllTables extends Seeder
{

    public function run()
    {
        //
        // @todo
        //
        // Add a Welcome post or something
        //

        Category::create([
            'name' => 'Uncategorized',
        ]);
    }

}
