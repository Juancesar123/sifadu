<?php

use Faker\Factory as Faker;
use App\Models\inventarisproyek;
use App\Repositories\inventarisproyekRepository;

trait MakeinventarisproyekTrait
{
    /**
     * Create fake instance of inventarisproyek and save it in database
     *
     * @param array $inventarisproyekFields
     * @return inventarisproyek
     */
    public function makeinventarisproyek($inventarisproyekFields = [])
    {
        /** @var inventarisproyekRepository $inventarisproyekRepo */
        $inventarisproyekRepo = App::make(inventarisproyekRepository::class);
        $theme = $this->fakeinventarisproyekData($inventarisproyekFields);
        return $inventarisproyekRepo->create($theme);
    }

    /**
     * Get fake instance of inventarisproyek
     *
     * @param array $inventarisproyekFields
     * @return inventarisproyek
     */
    public function fakeinventarisproyek($inventarisproyekFields = [])
    {
        return new inventarisproyek($this->fakeinventarisproyekData($inventarisproyekFields));
    }

    /**
     * Get fake data of inventarisproyek
     *
     * @param array $postFields
     * @return array
     */
    public function fakeinventarisproyekData($inventarisproyekFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_proyek' => $fake->word,
            'volume' => $fake->word,
            'biaya' => $fake->word,
            'lokasi' => $fake->word,
            'keterangan' => $fake->text,
            'tahun' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $inventarisproyekFields);
    }
}
