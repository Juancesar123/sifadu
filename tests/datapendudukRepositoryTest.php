<?php

use App\Models\datapenduduk;
use App\Repositories\datapendudukRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class datapendudukRepositoryTest extends TestCase
{
    use MakedatapendudukTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var datapendudukRepository
     */
    protected $datapendudukRepo;

    public function setUp()
    {
        parent::setUp();
        $this->datapendudukRepo = App::make(datapendudukRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatedatapenduduk()
    {
        $datapenduduk = $this->fakedatapendudukData();
        $createddatapenduduk = $this->datapendudukRepo->create($datapenduduk);
        $createddatapenduduk = $createddatapenduduk->toArray();
        $this->assertArrayHasKey('id', $createddatapenduduk);
        $this->assertNotNull($createddatapenduduk['id'], 'Created datapenduduk must have id specified');
        $this->assertNotNull(datapenduduk::find($createddatapenduduk['id']), 'datapenduduk with given id must be in DB');
        $this->assertModelData($datapenduduk, $createddatapenduduk);
    }

    /**
     * @test read
     */
    public function testReaddatapenduduk()
    {
        $datapenduduk = $this->makedatapenduduk();
        $dbdatapenduduk = $this->datapendudukRepo->find($datapenduduk->id);
        $dbdatapenduduk = $dbdatapenduduk->toArray();
        $this->assertModelData($datapenduduk->toArray(), $dbdatapenduduk);
    }

    /**
     * @test update
     */
    public function testUpdatedatapenduduk()
    {
        $datapenduduk = $this->makedatapenduduk();
        $fakedatapenduduk = $this->fakedatapendudukData();
        $updateddatapenduduk = $this->datapendudukRepo->update($fakedatapenduduk, $datapenduduk->id);
        $this->assertModelData($fakedatapenduduk, $updateddatapenduduk->toArray());
        $dbdatapenduduk = $this->datapendudukRepo->find($datapenduduk->id);
        $this->assertModelData($fakedatapenduduk, $dbdatapenduduk->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedatapenduduk()
    {
        $datapenduduk = $this->makedatapenduduk();
        $resp = $this->datapendudukRepo->delete($datapenduduk->id);
        $this->assertTrue($resp);
        $this->assertNull(datapenduduk::find($datapenduduk->id), 'datapenduduk should not exist in DB');
    }
}
