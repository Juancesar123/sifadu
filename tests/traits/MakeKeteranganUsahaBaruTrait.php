<?php

use Faker\Factory as Faker;
use App\Models\KeteranganUsahaBaru;
use App\Repositories\KeteranganUsahaBaruRepository;

trait MakeKeteranganUsahaBaruTrait
{
    /**
     * Create fake instance of KeteranganUsahaBaru and save it in database
     *
     * @param array $keteranganUsahaBaruFields
     * @return KeteranganUsahaBaru
     */
    public function makeKeteranganUsahaBaru($keteranganUsahaBaruFields = [])
    {
        /** @var KeteranganUsahaBaruRepository $keteranganUsahaBaruRepo */
        $keteranganUsahaBaruRepo = App::make(KeteranganUsahaBaruRepository::class);
        $theme = $this->fakeKeteranganUsahaBaruData($keteranganUsahaBaruFields);
        return $keteranganUsahaBaruRepo->create($theme);
    }

    /**
     * Get fake instance of KeteranganUsahaBaru
     *
     * @param array $keteranganUsahaBaruFields
     * @return KeteranganUsahaBaru
     */
    public function fakeKeteranganUsahaBaru($keteranganUsahaBaruFields = [])
    {
        return new KeteranganUsahaBaru($this->fakeKeteranganUsahaBaruData($keteranganUsahaBaruFields));
    }

    /**
     * Get fake data of KeteranganUsahaBaru
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKeteranganUsahaBaruData($keteranganUsahaBaruFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor' => $fake->word,
            'footer' => $fake->word,
            'jenis_usaha' => $fake->word,
            'luas_tempat' => $fake->word,
            'alamat_tempat' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $keteranganUsahaBaruFields);
    }
}
