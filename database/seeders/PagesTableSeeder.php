<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Pages\HomePage;
use Database\Factories\PageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (PageFactory::TEST_SITES as $testSite) {
            Page::factory()->create([
                'site' => $testSite,
                'page_type' => HomePage::PAGE_TYPE,
                'slug' => '/',
            ]);

            Page::factory()->count(10)->create(['site' => $testSite]);
        }
    }
}
