<?php

use Faker\Factory as Faker;
use App\Models\jenispekerjaan;
use App\Repositories\jenispekerjaanRepository;

trait MakejenispekerjaanTrait
{
    /**
     * Create fake instance of jenispekerjaan and save it in database
     *
     * @param array $jenispekerjaanFields
     * @return jenispekerjaan
     */
    public function makejenispekerjaan($jenispekerjaanFields = [])
    {
        /** @var jenispekerjaanRepository $jenispekerjaanRepo */
        $jenispekerjaanRepo = App::make(jenispekerjaanRepository::class);
        $theme = $this->fakejenispekerjaanData($jenispekerjaanFields);
        return $jenispekerjaanRepo->create($theme);
    }

    /**
     * Get fake instance of jenispekerjaan
     *
     * @param array $jenispekerjaanFields
     * @return jenispekerjaan
     */
    public function fakejenispekerjaan($jenispekerjaanFields = [])
    {
        return new jenispekerjaan($this->fakejenispekerjaanData($jenispekerjaanFields));
    }

    /**
     * Get fake data of jenispekerjaan
     *
     * @param array $postFields
     * @return array
     */
    public function fakejenispekerjaanData($jenispekerjaanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'jenis_pekerjaan' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $jenispekerjaanFields);
    }
}
