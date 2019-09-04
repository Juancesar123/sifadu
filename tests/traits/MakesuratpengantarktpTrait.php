<?php

use Faker\Factory as Faker;
use App\Models\suratpengantarktp;
use App\Repositories\suratpengantarktpRepository;

trait MakesuratpengantarktpTrait
{
    /**
     * Create fake instance of suratpengantarktp and save it in database
     *
     * @param array $suratpengantarktpFields
     * @return suratpengantarktp
     */
    public function makesuratpengantarktp($suratpengantarktpFields = [])
    {
        /** @var suratpengantarktpRepository $suratpengantarktpRepo */
        $suratpengantarktpRepo = App::make(suratpengantarktpRepository::class);
        $theme = $this->fakesuratpengantarktpData($suratpengantarktpFields);
        return $suratpengantarktpRepo->create($theme);
    }

    /**
     * Get fake instance of suratpengantarktp
     *
     * @param array $suratpengantarktpFields
     * @return suratpengantarktp
     */
    public function fakesuratpengantarktp($suratpengantarktpFields = [])
    {
        return new suratpengantarktp($this->fakesuratpengantarktpData($suratpengantarktpFields));
    }

    /**
     * Get fake data of suratpengantarktp
     *
     * @param array $postFields
     * @return array
     */
    public function fakesuratpengantarktpData($suratpengantarktpFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_atau_nik' => $fake->word,
            'nomor_surat' => $fake->word,
            'footer_cetak_data' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $suratpengantarktpFields);
    }
}
