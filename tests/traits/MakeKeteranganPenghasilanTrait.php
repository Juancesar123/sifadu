<?php

use Faker\Factory as Faker;
use App\Models\KeteranganPenghasilan;
use App\Repositories\KeteranganPenghasilanRepository;

trait MakeKeteranganPenghasilanTrait
{
    /**
     * Create fake instance of KeteranganPenghasilan and save it in database
     *
     * @param array $keteranganPenghasilanFields
     * @return KeteranganPenghasilan
     */
    public function makeKeteranganPenghasilan($keteranganPenghasilanFields = [])
    {
        /** @var KeteranganPenghasilanRepository $keteranganPenghasilanRepo */
        $keteranganPenghasilanRepo = App::make(KeteranganPenghasilanRepository::class);
        $theme = $this->fakeKeteranganPenghasilanData($keteranganPenghasilanFields);
        return $keteranganPenghasilanRepo->create($theme);
    }

    /**
     * Get fake instance of KeteranganPenghasilan
     *
     * @param array $keteranganPenghasilanFields
     * @return KeteranganPenghasilan
     */
    public function fakeKeteranganPenghasilan($keteranganPenghasilanFields = [])
    {
        return new KeteranganPenghasilan($this->fakeKeteranganPenghasilanData($keteranganPenghasilanFields));
    }

    /**
     * Get fake data of KeteranganPenghasilan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKeteranganPenghasilanData($keteranganPenghasilanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor_surat' => $fake->word,
            'footer' => $fake->word,
            'penghasilan' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $keteranganPenghasilanFields);
    }
}
