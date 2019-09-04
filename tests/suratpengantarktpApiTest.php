<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratpengantarktpApiTest extends TestCase
{
    use MakesuratpengantarktpTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatesuratpengantarktp()
    {
        $suratpengantarktp = $this->fakesuratpengantarktpData();
        $this->json('POST', '/api/v1/suratpengantarktps', $suratpengantarktp);

        $this->assertApiResponse($suratpengantarktp);
    }

    /**
     * @test
     */
    public function testReadsuratpengantarktp()
    {
        $suratpengantarktp = $this->makesuratpengantarktp();
        $this->json('GET', '/api/v1/suratpengantarktps/'.$suratpengantarktp->id);

        $this->assertApiResponse($suratpengantarktp->toArray());
    }

    /**
     * @test
     */
    public function testUpdatesuratpengantarktp()
    {
        $suratpengantarktp = $this->makesuratpengantarktp();
        $editedsuratpengantarktp = $this->fakesuratpengantarktpData();

        $this->json('PUT', '/api/v1/suratpengantarktps/'.$suratpengantarktp->id, $editedsuratpengantarktp);

        $this->assertApiResponse($editedsuratpengantarktp);
    }

    /**
     * @test
     */
    public function testDeletesuratpengantarktp()
    {
        $suratpengantarktp = $this->makesuratpengantarktp();
        $this->json('DELETE', '/api/v1/suratpengantarktps/'.$suratpengantarktp->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/suratpengantarktps/'.$suratpengantarktp->id);

        $this->assertResponseStatus(404);
    }
}
