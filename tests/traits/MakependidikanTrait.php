<?php

use Faker\Factory as Faker;
use App\Models\pendidikan;
use App\Repositories\pendidikanRepository;

trait MakependidikanTrait
{
    /**
     * Create fake instance of pendidikan and save it in database
     *
     * @param array $pendidikanFields
     * @return pendidikan
     */
    public function makependidikan($pendidikanFields = [])
    {
        /** @var pendidikanRepository $pendidikanRepo */
        $pendidikanRepo = App::make(pendidikanRepository::class);
        $theme = $this->fakependidikanData($pendidikanFields);
        return $pendidikanRepo->create($theme);
    }

    /**
     * Get fake instance of pendidikan
     *
     * @param array $pendidikanFields
     * @return pendidikan
     */
    public function fakependidikan($pendidikanFields = [])
    {
        return new pendidikan($this->fakependidikanData($pendidikanFields));
    }

    /**
     * Get fake data of pendidikan
     *
     * @param array $postFields
     * @return array
     */
    public function fakependidikanData($pendidikanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'pendidikan' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pendidikanFields);
    }
}
