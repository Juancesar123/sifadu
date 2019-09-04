<?php

use Faker\Factory as Faker;
use App\Models\pendudukmeninggal;
use App\Repositories\pendudukmeninggalRepository;

trait MakependudukmeninggalTrait
{
    /**
     * Create fake instance of pendudukmeninggal and save it in database
     *
     * @param array $pendudukmeninggalFields
     * @return pendudukmeninggal
     */
    public function makependudukmeninggal($pendudukmeninggalFields = [])
    {
        /** @var pendudukmeninggalRepository $pendudukmeninggalRepo */
        $pendudukmeninggalRepo = App::make(pendudukmeninggalRepository::class);
        $theme = $this->fakependudukmeninggalData($pendudukmeninggalFields);
        return $pendudukmeninggalRepo->create($theme);
    }

    /**
     * Get fake instance of pendudukmeninggal
     *
     * @param array $pendudukmeninggalFields
     * @return pendudukmeninggal
     */
    public function fakependudukmeninggal($pendudukmeninggalFields = [])
    {
        return new pendudukmeninggal($this->fakependudukmeninggalData($pendudukmeninggalFields));
    }

    /**
     * Get fake data of pendudukmeninggal
     *
     * @param array $postFields
     * @return array
     */
    public function fakependudukmeninggalData($pendudukmeninggalFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'penduduk_id' => $fake->randomDigitNotNull,
            'tanggal_meninggal' => $fake->word,
            'keterangan_meninggal' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pendudukmeninggalFields);
    }
}
