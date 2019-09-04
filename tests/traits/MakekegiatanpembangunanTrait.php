<?php

use Faker\Factory as Faker;
use App\Models\kegiatanpembangunan;
use App\Repositories\kegiatanpembangunanRepository;

trait MakekegiatanpembangunanTrait
{
    /**
     * Create fake instance of kegiatanpembangunan and save it in database
     *
     * @param array $kegiatanpembangunanFields
     * @return kegiatanpembangunan
     */
    public function makekegiatanpembangunan($kegiatanpembangunanFields = [])
    {
        /** @var kegiatanpembangunanRepository $kegiatanpembangunanRepo */
        $kegiatanpembangunanRepo = App::make(kegiatanpembangunanRepository::class);
        $theme = $this->fakekegiatanpembangunanData($kegiatanpembangunanFields);
        return $kegiatanpembangunanRepo->create($theme);
    }

    /**
     * Get fake instance of kegiatanpembangunan
     *
     * @param array $kegiatanpembangunanFields
     * @return kegiatanpembangunan
     */
    public function fakekegiatanpembangunan($kegiatanpembangunanFields = [])
    {
        return new kegiatanpembangunan($this->fakekegiatanpembangunanData($kegiatanpembangunanFields));
    }

    /**
     * Get fake data of kegiatanpembangunan
     *
     * @param array $postFields
     * @return array
     */
    public function fakekegiatanpembangunanData($kegiatanpembangunanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_proyek' => $fake->word,
            'volume' => $fake->word,
            'dana_dari_pemerintah' => $fake->word,
            'dana_dari_provinsi' => $fake->word,
            'dana_dari_kabupaten' => $fake->word,
            'dana_dari_swadaya' => $fake->word,
            'jumlah_dana' => $fake->word,
            'waktu' => $fake->word,
            'sifat_proyek' => $fake->word,
            'pelaksana' => $fake->word,
            'keterangan' => $fake->text,
            'tahun' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $kegiatanpembangunanFields);
    }
}
