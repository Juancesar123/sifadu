<?php

use Faker\Factory as Faker;
use App\Models\PendudukMiskin;
use App\Repositories\PendudukMiskinRepository;

trait MakePendudukMiskinTrait
{
    /**
     * Create fake instance of PendudukMiskin and save it in database
     *
     * @param array $pendudukMiskinFields
     * @return PendudukMiskin
     */
    public function makePendudukMiskin($pendudukMiskinFields = [])
    {
        /** @var PendudukMiskinRepository $pendudukMiskinRepo */
        $pendudukMiskinRepo = App::make(PendudukMiskinRepository::class);
        $theme = $this->fakePendudukMiskinData($pendudukMiskinFields);
        return $pendudukMiskinRepo->create($theme);
    }

    /**
     * Get fake instance of PendudukMiskin
     *
     * @param array $pendudukMiskinFields
     * @return PendudukMiskin
     */
    public function fakePendudukMiskin($pendudukMiskinFields = [])
    {
        return new PendudukMiskin($this->fakePendudukMiskinData($pendudukMiskinFields));
    }

    /**
     * Get fake data of PendudukMiskin
     *
     * @param array $postFields
     * @return array
     */
    public function fakePendudukMiskinData($pendudukMiskinFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_penduduk' => $fake->word,
            'id_indikator_kemiskinan' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pendudukMiskinFields);
    }
}
