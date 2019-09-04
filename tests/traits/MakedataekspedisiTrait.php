<?php

use Faker\Factory as Faker;
use App\Models\dataekspedisi;
use App\Repositories\dataekspedisiRepository;

trait MakedataekspedisiTrait
{
    /**
     * Create fake instance of dataekspedisi and save it in database
     *
     * @param array $dataekspedisiFields
     * @return dataekspedisi
     */
    public function makedataekspedisi($dataekspedisiFields = [])
    {
        /** @var dataekspedisiRepository $dataekspedisiRepo */
        $dataekspedisiRepo = App::make(dataekspedisiRepository::class);
        $theme = $this->fakedataekspedisiData($dataekspedisiFields);
        return $dataekspedisiRepo->create($theme);
    }

    /**
     * Get fake instance of dataekspedisi
     *
     * @param array $dataekspedisiFields
     * @return dataekspedisi
     */
    public function fakedataekspedisi($dataekspedisiFields = [])
    {
        return new dataekspedisi($this->fakedataekspedisiData($dataekspedisiFields));
    }

    /**
     * Get fake data of dataekspedisi
     *
     * @param array $postFields
     * @return array
     */
    public function fakedataekspedisiData($dataekspedisiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor_urut' => $fake->word,
            'tanggal_pengiriman' => $fake->word,
            'tanggal_surat' => $fake->word,
            'nomor_surat' => $fake->word,
            'isi_surat' => $fake->text,
            'surat_yang_dituju' => $fake->word,
            'keterangan' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $dataekspedisiFields);
    }
}
