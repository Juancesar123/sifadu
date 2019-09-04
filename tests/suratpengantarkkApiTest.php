<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratpengantarkkApiTest extends TestCase
{
    use MakesuratpengantarkkTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesuratpengantarkk()
    {
        $suratpengantarkk = $this->fakesuratpengantarkkData();
        $this->json('POST', '/api/v1/suratpengantarkks', $suratpengantarkk);

        $this->assertApiResponse($suratpengantarkk);
    }

    /**
     * @test
     */
    public function testReadsuratpengantarkk()
    {
        $suratpengantarkk = $this->makesuratpengantarkk();
        $this->json('GET', '/api/v1/suratpengantarkks/'.$suratpengantarkk->id);

        $this->assertApiResponse($suratpengantarkk->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesuratpengantarkk()
    {
        $suratpengantarkk = $this->makesuratpengantarkk();
        $editedsuratpengantarkk = $this->fakesuratpengantarkkData();

        $this->json('PUT', '/api/v1/suratpengantarkks/'.$suratpengantarkk->id, $editedsuratpengantarkk);

        $this->assertApiResponse($editedsuratpengantarkk);
    }

    /**
     * @test
     */
    public function testDeletesuratpengantarkk()
    {
        $suratpengantarkk = $this->makesuratpengantarkk();
        $this->json('DELETE', '/api/v1/suratpengantarkks/'.$suratpengantarkk->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/suratpengantarkks/'.$suratpengantarkk->id);

        $this->assertResponseStatus(404);
    }
}
