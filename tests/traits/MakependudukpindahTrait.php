<?php

use Faker\Factory as Faker;
use App\Models\pendudukpindah;
use App\Repositories\pendudukpindahRepository;

trait MakependudukpindahTrait
{
    /**
     * Create fake instance of pendudukpindah and save it in database
     *
     * @param array $pendudukpindahFields
     * @return pendudukpindah
     */
    public function makependudukpindah($pendudukpindahFields = [])
    {
        /** @var pendudukpindahRepository $pendudukpindahRepo */
        $pendudukpindahRepo = App::make(pendudukpindahRepository::class);
        $theme = $this->fakependudukpindahData($pendudukpindahFields);
        return $pendudukpindahRepo->create($theme);
    }

    /**
     * Get fake instance of pendudukpindah
     *
     * @param array $pendudukpindahFields
     * @return pendudukpindah
     */
    public function fakependudukpindah($pendudukpindahFields = [])
    {
        return new pendudukpindah($this->fakependudukpindahData($pendudukpindahFields));
    }

    /**
     * Get fake data of pendudukpindah
     *
     * @param array $postFields
     * @return array
     */
    public function fakependudukpindahData($pendudukpindahFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'penduduk_id' => $fake->randomDigitNotNull,
            'tanggal_pindah' => $fake->word,
            'keterangan_pindah' => $fake->text,
            'pindah_ke' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pendudukpindahFields);
    }
}
