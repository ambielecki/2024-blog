<?php

namespace Database\Factories;

use App\Repositories\PageRepository;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public const array TEST_SITES = ['dive_log', 'home', 'beer'];

    public function definition(): array
    {
        $pageRepository = new PageRepository();

        $site = self::TEST_SITES[array_rand(self::TEST_SITES)];
        $title = $this->faker->words(5, true);
        return [
            'site' => $site,
            'title' => $title,
            'slug' => $pageRepository->generateSlug($site, 'test', $title),
            'is_active' => 1,
            'revision' => 1,
            'page_type' => 'test',
            'main_content' => $this->faker->paragraph(),
            'additional_content' => json_encode([]),
        ];
    }
}
