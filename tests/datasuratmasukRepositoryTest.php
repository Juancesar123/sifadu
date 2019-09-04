<?php

use App\Models\datasuratmasuk;
use App\Repositories\datasuratmasukRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class datasuratmasukRepositoryTest extends TestCase
{
    use MakedatasuratmasukTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var datasuratmasukRepository
     */
    protected $datasuratmasukRepo;

    public function setUp()
    {
        parent::setUp();
        $this->datasuratmasukRepo = App::make(datasuratmasukRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatedatasuratmasuk()
    {
        $datasuratmasuk = $this->fakedatasuratmasukData();
        $createddatasuratmasuk = $this->datasuratmasukRepo->create($datasuratmasuk);
        $createddatasuratmasuk = $createddatasuratmasuk->toArray();
        $this->assertArrayHasKey('id', $createddatasuratmasuk);
        $this->assertNotNull($createddatasuratmasuk['id'], 'Created datasuratmasuk must have id specified');
        $this->assertNotNull(datasuratmasuk::find($createddatasuratmasuk['id']), 'datasuratmasuk with given id must be in DB');
        $this->assertModelData($datasuratmasuk, $createddatasuratmasuk);
    }

    /**
     * @test read
     */
    public function testReaddatasuratmasuk()
    {
        $datasuratmasuk = $this->makedatasuratmasuk();
        $dbdatasuratmasuk = $this->datasuratmasukRepo->find($datasuratmasuk->id);
        $dbdatasuratmasuk = $dbdatasuratmasuk->toArray();
        $this->assertModelData($datasuratmasuk->toArray(), $dbdatasuratmasuk);
    }

    /**
     * @test update
     */
    public function testUpdatedatasuratmasuk()
    {
        $datasuratmasuk = $this->makedatasuratmasuk();
        $fakedatasuratmasuk = $this->fakedatasuratmasukData();
        $updateddatasuratmasuk = $this->datasuratmasukRepo->update($fakedatasuratmasuk, $datasuratmasuk->id);
        $this->assertModelData($fakedatasuratmasuk, $updateddatasuratmasuk->toArray());
        $dbdatasuratmasuk = $this->datasuratmasukRepo->find($datasuratmasuk->id);
        $this->assertModelData($fakedatasuratmasuk, $dbdatasuratmasuk->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedatasuratmasuk()
    {
        $datasuratmasuk = $this->makedatasuratmasuk();
        $resp = $this->datasuratmasukRepo->delete($datasuratmasuk->id);
        $this->assertTrue($resp);
        $this->assertNull(datasuratmasuk::find($datasuratmasuk->id), 'datasuratmasuk should not exist in DB');
    }
}
