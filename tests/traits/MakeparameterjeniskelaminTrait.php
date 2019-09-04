<?php

use Faker\Factory as Faker;
use App\Models\parameterjeniskelamin;
use App\Repositories\parameterjeniskelaminRepository;

trait MakeparameterjeniskelaminTrait
{
    /**
     * Create fake instance of parameterjeniskelamin and save it in database
     *
     * @param array $parameterjeniskelaminFields
     * @return parameterjeniskelamin
     */
    public function makeparameterjeniskelamin($parameterjeniskelaminFields = [])
    {
        /** @var parameterjeniskelaminRepository $parameterjeniskelaminRepo */
        $parameterjeniskelaminRepo = App::make(parameterjeniskelaminRepository::class);
        $theme = $this->fakeparameterjeniskelaminData($parameterjeniskelaminFields);
        return $parameterjeniskelaminRepo->create($theme);
    }

    /**
     * Get fake instance of parameterjeniskelamin
     *
     * @param array $parameterjeniskelaminFields
     * @return parameterjeniskelamin
     */
    public function fakeparameterjeniskelamin($parameterjeniskelaminFields = [])
    {
        return new parameterjeniskelamin($this->fakeparameterjeniskelaminData($parameterjeniskelaminFields));
    }

    /**
     * Get fake data of parameterjeniskelamin
     *
     * @param array $postFields
     * @return array
     */
    public function fakeparameterjeniskelaminData($parameterjeniskelaminFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'jenis_kelamin' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $parameterjeniskelaminFields);
    }
}
