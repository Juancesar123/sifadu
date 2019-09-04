<?php

use Faker\Factory as Faker;
use App\Models\suratketeranganlainnya;
use App\Repositories\suratketeranganlainnyaRepository;

trait MakesuratketeranganlainnyaTrait
{
    /**
     * Create fake instance of suratketeranganlainnya and save it in database
     *
     * @param array $suratketeranganlainnyaFields
     * @return suratketeranganlainnya
     */
    public function makesuratketeranganlainnya($suratketeranganlainnyaFields = [])
    {
        /** @var suratketeranganlainnyaRepository $suratketeranganlainnyaRepo */
        $suratketeranganlainnyaRepo = App::make(suratketeranganlainnyaRepository::class);
        $theme = $this->fakesuratketeranganlainnyaData($suratketeranganlainnyaFields);
        return $suratketeranganlainnyaRepo->create($theme);
    }

    /**
     * Get fake instance of suratketeranganlainnya
     *
     * @param array $suratketeranganlainnyaFields
     * @return suratketeranganlainnya
     */
    public function fakesuratketeranganlainnya($suratketeranganlainnyaFields = [])
    {
        return new suratketeranganlainnya($this->fakesuratketeranganlainnyaData($suratketeranganlainnyaFields));
    }

    /**
     * Get fake data of suratketeranganlainnya
     *
     * @param array $postFields
     * @return array
     */
    public function fakesuratketeranganlainnyaData($suratketeranganlainnyaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nik' => $fake->word,
            'nomor_surat' => $fake->word,
            'footer_cetak_data' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $suratketeranganlainnyaFields);
    }
}
