<?php

use Faker\Factory as Faker;
use App\Models\KeteranganMenikah;
use App\Repositories\KeteranganMenikahRepository;

trait MakeKeteranganMenikahTrait
{
    /**
     * Create fake instance of KeteranganMenikah and save it in database
     *
     * @param array $keteranganMenikahFields
     * @return KeteranganMenikah
     */
    public function makeKeteranganMenikah($keteranganMenikahFields = [])
    {
        /** @var KeteranganMenikahRepository $keteranganMenikahRepo */
        $keteranganMenikahRepo = App::make(KeteranganMenikahRepository::class);
        $theme = $this->fakeKeteranganMenikahData($keteranganMenikahFields);
        return $keteranganMenikahRepo->create($theme);
    }

    /**
     * Get fake instance of KeteranganMenikah
     *
     * @param array $keteranganMenikahFields
     * @return KeteranganMenikah
     */
    public function fakeKeteranganMenikah($keteranganMenikahFields = [])
    {
        return new KeteranganMenikah($this->fakeKeteranganMenikahData($keteranganMenikahFields));
    }

    /**
     * Get fake data of KeteranganMenikah
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKeteranganMenikahData($keteranganMenikahFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor' => $fake->word,
            'footer' => $fake->word,
            'nik_mempelai_satu' => $fake->word,
            'nik_mempelai_dua' => $fake->word,
            'saksi_satu' => $fake->word,
            'saksi_dua' => $fake->word,
            'pembantu_ppn' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $keteranganMenikahFields);
    }
}
