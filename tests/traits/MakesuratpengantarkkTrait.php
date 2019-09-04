<?php

use Faker\Factory as Faker;
use App\Models\suratpengantarkk;
use App\Repositories\suratpengantarkkRepository;

trait MakesuratpengantarkkTrait
{
    /**
     * Create fake instance of suratpengantarkk and save it in database
     *
     * @param array $suratpengantarkkFields
     * @return suratpengantarkk
     */
    public function makesuratpengantarkk($suratpengantarkkFields = [])
    {
        /** @var suratpengantarkkRepository $suratpengantarkkRepo */
        $suratpengantarkkRepo = App::make(suratpengantarkkRepository::class);
        $theme = $this->fakesuratpengantarkkData($suratpengantarkkFields);
        return $suratpengantarkkRepo->create($theme);
    }

    /**
     * Get fake instance of suratpengantarkk
     *
     * @param array $suratpengantarkkFields
     * @return suratpengantarkk
     */
    public function fakesuratpengantarkk($suratpengantarkkFields = [])
    {
        return new suratpengantarkk($this->fakesuratpengantarkkData($suratpengantarkkFields));
    }

    /**
     * Get fake data of suratpengantarkk
     *
     * @param array $postFields
     * @return array
     */
    public function fakesuratpengantarkkData($suratpengantarkkFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nik_atau_nama' => $fake->word,
            'nomor_surat' => $fake->word,
            'footer_cetak_data' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $suratpengantarkkFields);
    }
}
