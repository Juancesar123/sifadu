<?php

use Faker\Factory as Faker;
use App\Models\KeteranganKelahiran;
use App\Repositories\KeteranganKelahiranRepository;

trait MakeKeteranganKelahiranTrait
{
    /**
     * Create fake instance of KeteranganKelahiran and save it in database
     *
     * @param array $keteranganKelahiranFields
     * @return KeteranganKelahiran
     */
    public function makeKeteranganKelahiran($keteranganKelahiranFields = [])
    {
        /** @var KeteranganKelahiranRepository $keteranganKelahiranRepo */
        $keteranganKelahiranRepo = App::make(KeteranganKelahiranRepository::class);
        $theme = $this->fakeKeteranganKelahiranData($keteranganKelahiranFields);
        return $keteranganKelahiranRepo->create($theme);
    }

    /**
     * Get fake instance of KeteranganKelahiran
     *
     * @param array $keteranganKelahiranFields
     * @return KeteranganKelahiran
     */
    public function fakeKeteranganKelahiran($keteranganKelahiranFields = [])
    {
        return new KeteranganKelahiran($this->fakeKeteranganKelahiranData($keteranganKelahiranFields));
    }

    /**
     * Get fake data of KeteranganKelahiran
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKeteranganKelahiranData($keteranganKelahiranFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor_surat' => $fake->word,
            'tanggal' => $fake->word,
            'tempat' => $fake->word,
            'jenis_kelamin' => $fake->word,
            'nama' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $keteranganKelahiranFields);
    }
}
