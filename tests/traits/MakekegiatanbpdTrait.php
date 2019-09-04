<?php

use Faker\Factory as Faker;
use App\Models\kegiatanbpd;
use App\Repositories\kegiatanbpdRepository;

trait MakekegiatanbpdTrait
{
    /**
     * Create fake instance of kegiatanbpd and save it in database
     *
     * @param array $kegiatanbpdFields
     * @return kegiatanbpd
     */
    public function makekegiatanbpd($kegiatanbpdFields = [])
    {
        /** @var kegiatanbpdRepository $kegiatanbpdRepo */
        $kegiatanbpdRepo = App::make(kegiatanbpdRepository::class);
        $theme = $this->fakekegiatanbpdData($kegiatanbpdFields);
        return $kegiatanbpdRepo->create($theme);
    }

    /**
     * Get fake instance of kegiatanbpd
     *
     * @param array $kegiatanbpdFields
     * @return kegiatanbpd
     */
    public function fakekegiatanbpd($kegiatanbpdFields = [])
    {
        return new kegiatanbpd($this->fakekegiatanbpdData($kegiatanbpdFields));
    }

    /**
     * Get fake data of kegiatanbpd
     *
     * @param array $postFields
     * @return array
     */
    public function fakekegiatanbpdData($kegiatanbpdFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'tentang' => $fake->word,
            'pelaksana' => $fake->word,
            'pokok_kegiatan' => $fake->word,
            'hasil_kegiatan' => $fake->word,
            'keterangan' => $fake->text,
            'tahun' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $kegiatanbpdFields);
    }
}
