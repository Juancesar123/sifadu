<?php

use Faker\Factory as Faker;
use App\Models\rencanapembangunan;
use App\Repositories\rencanapembangunanRepository;

trait MakerencanapembangunanTrait
{
    /**
     * Create fake instance of rencanapembangunan and save it in database
     *
     * @param array $rencanapembangunanFields
     * @return rencanapembangunan
     */
    public function makerencanapembangunan($rencanapembangunanFields = [])
    {
        /** @var rencanapembangunanRepository $rencanapembangunanRepo */
        $rencanapembangunanRepo = App::make(rencanapembangunanRepository::class);
        $theme = $this->fakerencanapembangunanData($rencanapembangunanFields);
        return $rencanapembangunanRepo->create($theme);
    }

    /**
     * Get fake instance of rencanapembangunan
     *
     * @param array $rencanapembangunanFields
     * @return rencanapembangunan
     */
    public function fakerencanapembangunan($rencanapembangunanFields = [])
    {
        return new rencanapembangunan($this->fakerencanapembangunanData($rencanapembangunanFields));
    }

    /**
     * Get fake data of rencanapembangunan
     *
     * @param array $postFields
     * @return array
     */
    public function fakerencanapembangunanData($rencanapembangunanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_proyek' => $fake->word,
            'lokasi' => $fake->word,
            'dana_dari_pemerintah' => $fake->word,
            'dana_dari_provinsi' => $fake->word,
            'dana_dari_kabupaten' => $fake->word,
            'dana_dari_swadaya' => $fake->word,
            'jumlah_dana' => $fake->word,
            'pelaksana' => $fake->word,
            'manfaat' => $fake->word,
            'keterangan' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $rencanapembangunanFields);
    }
}
