<?php

use Faker\Factory as Faker;
use App\Models\suratketerangandesa;
use App\Repositories\suratketerangandesaRepository;

trait MakesuratketerangandesaTrait
{
    /**
     * Create fake instance of suratketerangandesa and save it in database
     *
     * @param array $suratketerangandesaFields
     * @return suratketerangandesa
     */
    public function makesuratketerangandesa($suratketerangandesaFields = [])
    {
        /** @var suratketerangandesaRepository $suratketerangandesaRepo */
        $suratketerangandesaRepo = App::make(suratketerangandesaRepository::class);
        $theme = $this->fakesuratketerangandesaData($suratketerangandesaFields);
        return $suratketerangandesaRepo->create($theme);
    }

    /**
     * Get fake instance of suratketerangandesa
     *
     * @param array $suratketerangandesaFields
     * @return suratketerangandesa
     */
    public function fakesuratketerangandesa($suratketerangandesaFields = [])
    {
        return new suratketerangandesa($this->fakesuratketerangandesaData($suratketerangandesaFields));
    }

    /**
     * Get fake data of suratketerangandesa
     *
     * @param array $postFields
     * @return array
     */
    public function fakesuratketerangandesaData($suratketerangandesaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nik' => $fake->word,
            'nomor_surat' => $fake->word,
            'footer_cetak_data' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $suratketerangandesaFields);
    }
}
