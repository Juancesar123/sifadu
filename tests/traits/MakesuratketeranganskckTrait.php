<?php

use Faker\Factory as Faker;
use App\Models\suratketeranganskck;
use App\Repositories\suratketeranganskckRepository;

trait MakesuratketeranganskckTrait
{
    /**
     * Create fake instance of suratketeranganskck and save it in database
     *
     * @param array $suratketeranganskckFields
     * @return suratketeranganskck
     */
    public function makesuratketeranganskck($suratketeranganskckFields = [])
    {
        /** @var suratketeranganskckRepository $suratketeranganskckRepo */
        $suratketeranganskckRepo = App::make(suratketeranganskckRepository::class);
        $theme = $this->fakesuratketeranganskckData($suratketeranganskckFields);
        return $suratketeranganskckRepo->create($theme);
    }

    /**
     * Get fake instance of suratketeranganskck
     *
     * @param array $suratketeranganskckFields
     * @return suratketeranganskck
     */
    public function fakesuratketeranganskck($suratketeranganskckFields = [])
    {
        return new suratketeranganskck($this->fakesuratketeranganskckData($suratketeranganskckFields));
    }

    /**
     * Get fake data of suratketeranganskck
     *
     * @param array $postFields
     * @return array
     */
    public function fakesuratketeranganskckData($suratketeranganskckFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nik' => $fake->word,
            'nomor_surat' => $fake->word,
            'footer_cetak_data' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $suratketeranganskckFields);
    }
}
