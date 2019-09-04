<?php

use Faker\Factory as Faker;
use App\Models\suratketeranganpenguasaantanah;
use App\Repositories\suratketeranganpenguasaantanahRepository;

trait MakesuratketeranganpenguasaantanahTrait
{
    /**
     * Create fake instance of suratketeranganpenguasaantanah and save it in database
     *
     * @param array $suratketeranganpenguasaantanahFields
     * @return suratketeranganpenguasaantanah
     */
    public function makesuratketeranganpenguasaantanah($suratketeranganpenguasaantanahFields = [])
    {
        /** @var suratketeranganpenguasaantanahRepository $suratketeranganpenguasaantanahRepo */
        $suratketeranganpenguasaantanahRepo = App::make(suratketeranganpenguasaantanahRepository::class);
        $theme = $this->fakesuratketeranganpenguasaantanahData($suratketeranganpenguasaantanahFields);
        return $suratketeranganpenguasaantanahRepo->create($theme);
    }

    /**
     * Get fake instance of suratketeranganpenguasaantanah
     *
     * @param array $suratketeranganpenguasaantanahFields
     * @return suratketeranganpenguasaantanah
     */
    public function fakesuratketeranganpenguasaantanah($suratketeranganpenguasaantanahFields = [])
    {
        return new suratketeranganpenguasaantanah($this->fakesuratketeranganpenguasaantanahData($suratketeranganpenguasaantanahFields));
    }

    /**
     * Get fake data of suratketeranganpenguasaantanah
     *
     * @param array $postFields
     * @return array
     */
    public function fakesuratketeranganpenguasaantanahData($suratketeranganpenguasaantanahFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nik' => $fake->word,
            'nomor_surat' => $fake->word,
            'footer_cetak_data' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $suratketeranganpenguasaantanahFields);
    }
}
