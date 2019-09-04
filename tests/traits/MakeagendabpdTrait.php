<?php

use Faker\Factory as Faker;
use App\Models\agendabpd;
use App\Repositories\agendabpdRepository;

trait MakeagendabpdTrait
{
    /**
     * Create fake instance of agendabpd and save it in database
     *
     * @param array $agendabpdFields
     * @return agendabpd
     */
    public function makeagendabpd($agendabpdFields = [])
    {
        /** @var agendabpdRepository $agendabpdRepo */
        $agendabpdRepo = App::make(agendabpdRepository::class);
        $theme = $this->fakeagendabpdData($agendabpdFields);
        return $agendabpdRepo->create($theme);
    }

    /**
     * Get fake instance of agendabpd
     *
     * @param array $agendabpdFields
     * @return agendabpd
     */
    public function fakeagendabpd($agendabpdFields = [])
    {
        return new agendabpd($this->fakeagendabpdData($agendabpdFields));
    }

    /**
     * Get fake data of agendabpd
     *
     * @param array $postFields
     * @return array
     */
    public function fakeagendabpdData($agendabpdFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'tanggal' => $fake->word,
            'nomor_surat_masuk' => $fake->word,
            'tanggal_surat_masuk' => $fake->word,
            'pengirim_surat_masuk' => $fake->word,
            'isi_singkat_surat_masuk' => $fake->text,
            'isi_singkat_surat_keluar' => $fake->text,
            'tanggal_pengiriman_surat_keluar' => $fake->word,
            'tujuan' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $agendabpdFields);
    }
}
