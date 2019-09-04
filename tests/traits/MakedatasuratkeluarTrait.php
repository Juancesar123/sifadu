<?php

use Faker\Factory as Faker;
use App\Models\datasuratkeluar;
use App\Repositories\datasuratkeluarRepository;

trait MakedatasuratkeluarTrait
{
    /**
     * Create fake instance of datasuratkeluar and save it in database
     *
     * @param array $datasuratkeluarFields
     * @return datasuratkeluar
     */
    public function makedatasuratkeluar($datasuratkeluarFields = [])
    {
        /** @var datasuratkeluarRepository $datasuratkeluarRepo */
        $datasuratkeluarRepo = App::make(datasuratkeluarRepository::class);
        $theme = $this->fakedatasuratkeluarData($datasuratkeluarFields);
        return $datasuratkeluarRepo->create($theme);
    }

    /**
     * Get fake instance of datasuratkeluar
     *
     * @param array $datasuratkeluarFields
     * @return datasuratkeluar
     */
    public function fakedatasuratkeluar($datasuratkeluarFields = [])
    {
        return new datasuratkeluar($this->fakedatasuratkeluarData($datasuratkeluarFields));
    }

    /**
     * Get fake data of datasuratkeluar
     *
     * @param array $postFields
     * @return array
     */
    public function fakedatasuratkeluarData($datasuratkeluarFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'kode_surat' => $fake->word,
            'nomor_surat' => $fake->word,
            'penerima' => $fake->word,
            'tanggal_keluar' => $fake->word,
            'perihahl' => $fake->text,
            'tanda_tangan' => $fake->word,
            'atas_nama' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $datasuratkeluarFields);
    }
}
