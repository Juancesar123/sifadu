<?php

use Faker\Factory as Faker;
use App\Models\kaderpembangunan;
use App\Repositories\kaderpembangunanRepository;

trait MakekaderpembangunanTrait
{
    /**
     * Create fake instance of kaderpembangunan and save it in database
     *
     * @param array $kaderpembangunanFields
     * @return kaderpembangunan
     */
    public function makekaderpembangunan($kaderpembangunanFields = [])
    {
        /** @var kaderpembangunanRepository $kaderpembangunanRepo */
        $kaderpembangunanRepo = App::make(kaderpembangunanRepository::class);
        $theme = $this->fakekaderpembangunanData($kaderpembangunanFields);
        return $kaderpembangunanRepo->create($theme);
    }

    /**
     * Get fake instance of kaderpembangunan
     *
     * @param array $kaderpembangunanFields
     * @return kaderpembangunan
     */
    public function fakekaderpembangunan($kaderpembangunanFields = [])
    {
        return new kaderpembangunan($this->fakekaderpembangunanData($kaderpembangunanFields));
    }

    /**
     * Get fake data of kaderpembangunan
     *
     * @param array $postFields
     * @return array
     */
    public function fakekaderpembangunanData($kaderpembangunanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'umur' => $fake->word,
            'jeniskelamin' => $fake->word,
            'pendidikan_atau_kursus' => $fake->word,
            'bidang' => $fake->word,
            'alamat' => $fake->text,
            'keterangan' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $kaderpembangunanFields);
    }
}
