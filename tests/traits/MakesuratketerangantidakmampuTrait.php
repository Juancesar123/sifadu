<?php

use Faker\Factory as Faker;
use App\Models\suratketerangantidakmampu;
use App\Repositories\suratketerangantidakmampuRepository;

trait MakesuratketerangantidakmampuTrait
{
    /**
     * Create fake instance of suratketerangantidakmampu and save it in database
     *
     * @param array $suratketerangantidakmampuFields
     * @return suratketerangantidakmampu
     */
    public function makesuratketerangantidakmampu($suratketerangantidakmampuFields = [])
    {
        /** @var suratketerangantidakmampuRepository $suratketerangantidakmampuRepo */
        $suratketerangantidakmampuRepo = App::make(suratketerangantidakmampuRepository::class);
        $theme = $this->fakesuratketerangantidakmampuData($suratketerangantidakmampuFields);
        return $suratketerangantidakmampuRepo->create($theme);
    }

    /**
     * Get fake instance of suratketerangantidakmampu
     *
     * @param array $suratketerangantidakmampuFields
     * @return suratketerangantidakmampu
     */
    public function fakesuratketerangantidakmampu($suratketerangantidakmampuFields = [])
    {
        return new suratketerangantidakmampu($this->fakesuratketerangantidakmampuData($suratketerangantidakmampuFields));
    }

    /**
     * Get fake data of suratketerangantidakmampu
     *
     * @param array $postFields
     * @return array
     */
    public function fakesuratketerangantidakmampuData($suratketerangantidakmampuFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nik' => $fake->word,
            'nomor_surat' => $fake->word,
            'footer_cetak_data' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $suratketerangantidakmampuFields);
    }
}
