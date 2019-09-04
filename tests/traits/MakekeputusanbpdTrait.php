<?php

use Faker\Factory as Faker;
use App\Models\keputusanbpd;
use App\Repositories\keputusanbpdRepository;

trait MakekeputusanbpdTrait
{
    /**
     * Create fake instance of keputusanbpd and save it in database
     *
     * @param array $keputusanbpdFields
     * @return keputusanbpd
     */
    public function makekeputusanbpd($keputusanbpdFields = [])
    {
        /** @var keputusanbpdRepository $keputusanbpdRepo */
        $keputusanbpdRepo = App::make(keputusanbpdRepository::class);
        $theme = $this->fakekeputusanbpdData($keputusanbpdFields);
        return $keputusanbpdRepo->create($theme);
    }

    /**
     * Get fake instance of keputusanbpd
     *
     * @param array $keputusanbpdFields
     * @return keputusanbpd
     */
    public function fakekeputusanbpd($keputusanbpdFields = [])
    {
        return new keputusanbpd($this->fakekeputusanbpdData($keputusanbpdFields));
    }

    /**
     * Get fake data of keputusanbpd
     *
     * @param array $postFields
     * @return array
     */
    public function fakekeputusanbpdData($keputusanbpdFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'no_keputusan' => $fake->word,
            'tentang' => $fake->word,
            'tanggal_keputusan' => $fake->word,
            'uraian_singkat' => $fake->text,
            'keterangan' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $keputusanbpdFields);
    }
}
