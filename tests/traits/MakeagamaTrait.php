<?php

use Faker\Factory as Faker;
use App\Models\agama;
use App\Repositories\agamaRepository;

trait MakeagamaTrait
{
    /**
     * Create fake instance of agama and save it in database
     *
     * @param array $agamaFields
     * @return agama
     */
    public function makeagama($agamaFields = [])
    {
        /** @var agamaRepository $agamaRepo */
        $agamaRepo = App::make(agamaRepository::class);
        $theme = $this->fakeagamaData($agamaFields);
        return $agamaRepo->create($theme);
    }

    /**
     * Get fake instance of agama
     *
     * @param array $agamaFields
     * @return agama
     */
    public function fakeagama($agamaFields = [])
    {
        return new agama($this->fakeagamaData($agamaFields));
    }

    /**
     * Get fake data of agama
     *
     * @param array $postFields
     * @return array
     */
    public function fakeagamaData($agamaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'agama' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $agamaFields);
    }
}
