<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class jenispekerjaanApiTest extends TestCase
{
    use MakejenispekerjaanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatejenispekerjaan()
    {
        $jenispekerjaan = $this->fakejenispekerjaanData();
        $this->json('POST', '/api/v1/jenispekerjaans', $jenispekerjaan);

        $this->assertApiResponse($jenispekerjaan);
    }

    /**
     * @test
     */
    public function testReadjenispekerjaan()
    {
        $jenispekerjaan = $this->makejenispekerjaan();
        $this->json('GET', '/api/v1/jenispekerjaans/'.$jenispekerjaan->id);

        $this->assertApiResponse($jenispekerjaan->toArray());
    }

    /**
     * @test
     */
    public function testUpdatejenispekerjaan()
    {
        $jenispekerjaan = $this->makejenispekerjaan();
        $editedjenispekerjaan = $this->fakejenispekerjaanData();

        $this->json('PUT', '/api/v1/jenispekerjaans/'.$jenispekerjaan->id, $editedjenispekerjaan);

        $this->assertApiResponse($editedjenispekerjaan);
    }

    /**
     * @test
     */
    public function testDeletejenispekerjaan()
    {
        $jenispekerjaan = $this->makejenispekerjaan();
        $this->json('DELETE', '/api/v1/jenispekerjaans/'.$jenispekerjaan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/jenispekerjaans/'.$jenispekerjaan->id);

        $this->assertResponseStatus(404);
    }
}
