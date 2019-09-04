<?php

use Faker\Factory as Faker;
use App\Models\pajaktanah;
use App\Repositories\pajaktanahRepository;

trait MakepajaktanahTrait
{
    /**
     * Create fake instance of pajaktanah and save it in database
     *
     * @param array $pajaktanahFields
     * @return pajaktanah
     */
    public function makepajaktanah($pajaktanahFields = [])
    {
        /** @var pajaktanahRepository $pajaktanahRepo */
        $pajaktanahRepo = App::make(pajaktanahRepository::class);
        $theme = $this->fakepajaktanahData($pajaktanahFields);
        return $pajaktanahRepo->create($theme);
    }

    /**
     * Get fake instance of pajaktanah
     *
     * @param array $pajaktanahFields
     * @return pajaktanah
     */
    public function fakepajaktanah($pajaktanahFields = [])
    {
        return new pajaktanah($this->fakepajaktanahData($pajaktanahFields));
    }

    /**
     * Get fake data of pajaktanah
     *
     * @param array $postFields
     * @return array
     */
    public function fakepajaktanahData($pajaktanahFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'blok' => $fake->word,
            'dusun' => $fake->word,
            'nop' => $fake->word,
            'nama_wp' => $fake->word,
            'alamat' => $fake->text,
            'ketetapan_pembayaran' => $fake->word,
            'lunas' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pajaktanahFields);
    }
}
