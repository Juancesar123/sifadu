<?php

use Faker\Factory as Faker;
use App\Models\suratketerangandomisili;
use App\Repositories\suratketerangandomisiliRepository;

trait MakesuratketerangandomisiliTrait
{
    /**
     * Create fake instance of suratketerangandomisili and save it in database
     *
     * @param array $suratketerangandomisiliFields
     * @return suratketerangandomisili
     */
    public function makesuratketerangandomisili($suratketerangandomisiliFields = [])
    {
        /** @var suratketerangandomisiliRepository $suratketerangandomisiliRepo */
        $suratketerangandomisiliRepo = App::make(suratketerangandomisiliRepository::class);
        $theme = $this->fakesuratketerangandomisiliData($suratketerangandomisiliFields);
        return $suratketerangandomisiliRepo->create($theme);
    }

    /**
     * Get fake instance of suratketerangandomisili
     *
     * @param array $suratketerangandomisiliFields
     * @return suratketerangandomisili
     */
    public function fakesuratketerangandomisili($suratketerangandomisiliFields = [])
    {
        return new suratketerangandomisili($this->fakesuratketerangandomisiliData($suratketerangandomisiliFields));
    }

    /**
     * Get fake data of suratketerangandomisili
     *
     * @param array $postFields
     * @return array
     */
    public function fakesuratketerangandomisiliData($suratketerangandomisiliFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nik' => $fake->word,
            'nomor_surat' => $fake->word,
            'footer_cetak_data' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $suratketerangandomisiliFields);
    }
}
