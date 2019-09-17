<?php

use Faker\Factory as Faker;
use App\Models\ParameterIndikatorKemiskinan;
use App\Repositories\ParameterIndikatorKemiskinanRepository;

trait MakeParameterIndikatorKemiskinanTrait
{
    /**
     * Create fake instance of ParameterIndikatorKemiskinan and save it in database
     *
     * @param array $parameterIndikatorKemiskinanFields
     * @return ParameterIndikatorKemiskinan
     */
    public function makeParameterIndikatorKemiskinan($parameterIndikatorKemiskinanFields = [])
    {
        /** @var ParameterIndikatorKemiskinanRepository $parameterIndikatorKemiskinanRepo */
        $parameterIndikatorKemiskinanRepo = App::make(ParameterIndikatorKemiskinanRepository::class);
        $theme = $this->fakeParameterIndikatorKemiskinanData($parameterIndikatorKemiskinanFields);
        return $parameterIndikatorKemiskinanRepo->create($theme);
    }

    /**
     * Get fake instance of ParameterIndikatorKemiskinan
     *
     * @param array $parameterIndikatorKemiskinanFields
     * @return ParameterIndikatorKemiskinan
     */
    public function fakeParameterIndikatorKemiskinan($parameterIndikatorKemiskinanFields = [])
    {
        return new ParameterIndikatorKemiskinan($this->fakeParameterIndikatorKemiskinanData($parameterIndikatorKemiskinanFields));
    }

    /**
     * Get fake data of ParameterIndikatorKemiskinan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeParameterIndikatorKemiskinanData($parameterIndikatorKemiskinanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'indikator_kemiskinan' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $parameterIndikatorKemiskinanFields);
    }
}
