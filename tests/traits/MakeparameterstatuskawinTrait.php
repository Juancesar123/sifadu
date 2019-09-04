<?php

use Faker\Factory as Faker;
use App\Models\parameterstatuskawin;
use App\Repositories\parameterstatuskawinRepository;

trait MakeparameterstatuskawinTrait
{
    /**
     * Create fake instance of parameterstatuskawin and save it in database
     *
     * @param array $parameterstatuskawinFields
     * @return parameterstatuskawin
     */
    public function makeparameterstatuskawin($parameterstatuskawinFields = [])
    {
        /** @var parameterstatuskawinRepository $parameterstatuskawinRepo */
        $parameterstatuskawinRepo = App::make(parameterstatuskawinRepository::class);
        $theme = $this->fakeparameterstatuskawinData($parameterstatuskawinFields);
        return $parameterstatuskawinRepo->create($theme);
    }

    /**
     * Get fake instance of parameterstatuskawin
     *
     * @param array $parameterstatuskawinFields
     * @return parameterstatuskawin
     */
    public function fakeparameterstatuskawin($parameterstatuskawinFields = [])
    {
        return new parameterstatuskawin($this->fakeparameterstatuskawinData($parameterstatuskawinFields));
    }

    /**
     * Get fake data of parameterstatuskawin
     *
     * @param array $postFields
     * @return array
     */
    public function fakeparameterstatuskawinData($parameterstatuskawinFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'status_nikah' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $parameterstatuskawinFields);
    }
}
