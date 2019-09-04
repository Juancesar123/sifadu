<?php

use Faker\Factory as Faker;
use App\Models\anggotabpd;
use App\Repositories\anggotabpdRepository;

trait MakeanggotabpdTrait
{
    /**
     * Create fake instance of anggotabpd and save it in database
     *
     * @param array $anggotabpdFields
     * @return anggotabpd
     */
    public function makeanggotabpd($anggotabpdFields = [])
    {
        /** @var anggotabpdRepository $anggotabpdRepo */
        $anggotabpdRepo = App::make(anggotabpdRepository::class);
        $theme = $this->fakeanggotabpdData($anggotabpdFields);
        return $anggotabpdRepo->create($theme);
    }

    /**
     * Get fake instance of anggotabpd
     *
     * @param array $anggotabpdFields
     * @return anggotabpd
     */
    public function fakeanggotabpd($anggotabpdFields = [])
    {
        return new anggotabpd($this->fakeanggotabpdData($anggotabpdFields));
    }

    /**
     * Get fake data of anggotabpd
     *
     * @param array $postFields
     * @return array
     */
    public function fakeanggotabpdData($anggotabpdFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'jenis_kelamin' => $fake->word,
            'tempat_lahir' => $fake->word,
            'tanggal_lahir' => $fake->word,
            'agama' => $fake->word,
            'pendidikan_terakhir' => $fake->word,
            'nomor_keputusan_pengangkatan' => $fake->word,
            'tanggal_keputusan_pengangkatan' => $fake->word,
            'nomor_keputusan_pemberentian' => $fake->word,
            'tanggal_keputusan_pemberentian' => $fake->word,
            'keterangan' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $anggotabpdFields);
    }
}
