<?php

use App\Models\jenispekerjaan;
use App\Repositories\jenispekerjaanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class jenispekerjaanRepositoryTest extends TestCase
{
    use MakejenispekerjaanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var jenispekerjaanRepository
     */
    protected $jenispekerjaanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->jenispekerjaanRepo = App::make(jenispekerjaanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatejenispekerjaan()
    {
        $jenispekerjaan = $this->fakejenispekerjaanData();
        $createdjenispekerjaan = $this->jenispekerjaanRepo->create($jenispekerjaan);
        $createdjenispekerjaan = $createdjenispekerjaan->toArray();
        $this->assertArrayHasKey('id', $createdjenispekerjaan);
        $this->assertNotNull($createdjenispekerjaan['id'], 'Created jenispekerjaan must have id specified');
        $this->assertNotNull(jenispekerjaan::find($createdjenispekerjaan['id']), 'jenispekerjaan with given id must be in DB');
        $this->assertModelData($jenispekerjaan, $createdjenispekerjaan);
    }

    /**
     * @test read
     */
    public function testReadjenispekerjaan()
    {
        $jenispekerjaan = $this->makejenispekerjaan();
        $dbjenispekerjaan = $this->jenispekerjaanRepo->find($jenispekerjaan->id);
        $dbjenispekerjaan = $dbjenispekerjaan->toArray();
        $this->assertModelData($jenispekerjaan->toArray(), $dbjenispekerjaan);
    }

    /**
     * @test update
     */
    public function testUpdatejenispekerjaan()
    {
        $jenispekerjaan = $this->makejenispekerjaan();
        $fakejenispekerjaan = $this->fakejenispekerjaanData();
        $updatedjenispekerjaan = $this->jenispekerjaanRepo->update($fakejenispekerjaan, $jenispekerjaan->id);
        $this->assertModelData($fakejenispekerjaan, $updatedjenispekerjaan->toArray());
        $dbjenispekerjaan = $this->jenispekerjaanRepo->find($jenispekerjaan->id);
        $this->assertModelData($fakejenispekerjaan, $dbjenispekerjaan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletejenispekerjaan()
    {
        $jenispekerjaan = $this->makejenispekerjaan();
        $resp = $this->jenispekerjaanRepo->delete($jenispekerjaan->id);
        $this->assertTrue($resp);
        $this->assertNull(jenispekerjaan::find($jenispekerjaan->id), 'jenispekerjaan should not exist in DB');
    }
}
