<?php

use Faker\Factory as Faker;
use App\Models\dusun;
use App\Repositories\dusunRepository;

trait MakedusunTrait
{
    /**
     * Create fake instance of dusun and save it in database
     *
     * @param array $dusunFields
     * @return dusun
     */
    public function makedusun($dusunFields = [])
    {
        /** @var dusunRepository $dusunRepo */
        $dusunRepo = App::make(dusunRepository::class);
        $theme = $this->fakedusunData($dusunFields);
        return $dusunRepo->create($theme);
    }

    /**
     * Get fake instance of dusun
     *
     * @param array $dusunFields
     * @return dusun
     */
    public function fakedusun($dusunFields = [])
    {
        return new dusun($this->fakedusunData($dusunFields));
    }

    /**
     * Get fake data of dusun
     *
     * @param array $postFields
     * @return array
     */
    public function fakedusunData($dusunFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_dusun' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $dusunFields);
    }
}
