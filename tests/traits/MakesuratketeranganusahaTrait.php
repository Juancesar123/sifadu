<?php

use Faker\Factory as Faker;
use App\Models\suratketeranganusaha;
use App\Repositories\suratketeranganusahaRepository;

trait MakesuratketeranganusahaTrait
{
    /**
     * Create fake instance of suratketeranganusaha and save it in database
     *
     * @param array $suratketeranganusahaFields
     * @return suratketeranganusaha
     */
    public function makesuratketeranganusaha($suratketeranganusahaFields = [])
    {
        /** @var suratketeranganusahaRepository $suratketeranganusahaRepo */
        $suratketeranganusahaRepo = App::make(suratketeranganusahaRepository::class);
        $theme = $this->fakesuratketeranganusahaData($suratketeranganusahaFields);
        return $suratketeranganusahaRepo->create($theme);
    }

    /**
     * Get fake instance of suratketeranganusaha
     *
     * @param array $suratketeranganusahaFields
     * @return suratketeranganusaha
     */
    public function fakesuratketeranganusaha($suratketeranganusahaFields = [])
    {
        return new suratketeranganusaha($this->fakesuratketeranganusahaData($suratketeranganusahaFields));
    }

    /**
     * Get fake data of suratketeranganusaha
     *
     * @param array $postFields
     * @return array
     */
    public function fakesuratketeranganusahaData($suratketeranganusahaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nik' => $fake->word,
            'nomor_surat' => $fake->word,
            'jenis_usaha'=>$fake->word,
            'footer_cetak_data' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $suratketeranganusahaFields);
    }
}