<?php

use Faker\Factory as Faker;
use App\Models\datapenduduk;
use App\Repositories\datapendudukRepository;

trait MakedatapendudukTrait
{
    /**
     * Create fake instance of datapenduduk and save it in database
     *
     * @param array $datapendudukFields
     * @return datapenduduk
     */
    public function makedatapenduduk($datapendudukFields = [])
    {
        /** @var datapendudukRepository $datapendudukRepo */
        $datapendudukRepo = App::make(datapendudukRepository::class);
        $theme = $this->fakedatapendudukData($datapendudukFields);
        return $datapendudukRepo->create($theme);
    }

    /**
     * Get fake instance of datapenduduk
     *
     * @param array $datapendudukFields
     * @return datapenduduk
     */
    public function fakedatapenduduk($datapendudukFields = [])
    {
        return new datapenduduk($this->fakedatapendudukData($datapendudukFields));
    }

    /**
     * Get fake data of datapenduduk
     *
     * @param array $postFields
     * @return array
     */
    public function fakedatapendudukData($datapendudukFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nik' => $fake->word,
            'no_kk' => $fake->word,
            'nama_lengkap' => $fake->word,
            'tempat_lahir' => $fake->word,
            'tanggal_lahir' => $fake->word,
            'agama' => $fake->word,
            'hub_kel' => $fake->word,
            'status_kawin' => $fake->word,
            'nama_lengkap_ayah' => $fake->word,
            'nama_lengkap_ibu' => $fake->word,
            'alamat' => $fake->text,
            'no_rt' => $fake->word,
            'no_rw' => $fake->word,
            'nama_kecamatan' => $fake->word,
            'nama_kecamatan_2' => $fake->word,
            'jenis_pekerjaan' => $fake->word,
            'pendidikan_akhir' => $fake->word,
            'status_KTP' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $datapendudukFields);
    }
}
