<?php

use Faker\Factory as Faker;
use App\Models\datasuratmasuk;
use App\Repositories\datasuratmasukRepository;

trait MakedatasuratmasukTrait
{
    /**
     * Create fake instance of datasuratmasuk and save it in database
     *
     * @param array $datasuratmasukFields
     * @return datasuratmasuk
     */
    public function makedatasuratmasuk($datasuratmasukFields = [])
    {
        /** @var datasuratmasukRepository $datasuratmasukRepo */
        $datasuratmasukRepo = App::make(datasuratmasukRepository::class);
        $theme = $this->fakedatasuratmasukData($datasuratmasukFields);
        return $datasuratmasukRepo->create($theme);
    }

    /**
     * Get fake instance of datasuratmasuk
     *
     * @param array $datasuratmasukFields
     * @return datasuratmasuk
     */
    public function fakedatasuratmasuk($datasuratmasukFields = [])
    {
        return new datasuratmasuk($this->fakedatasuratmasukData($datasuratmasukFields));
    }

    /**
     * Get fake data of datasuratmasuk
     *
     * @param array $postFields
     * @return array
     */
    public function fakedatasuratmasukData($datasuratmasukFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'kode_surat' => $fake->word,
            'nomor_surat' => $fake->word,
            'penerima' => $fake->word,
            'tanggal_keluar' => $fake->word,
            'perihal' => $fake->word,
            'tanda_tangan' => $fake->word,
            'atas_nama' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $datasuratmasukFields);
    }
}
