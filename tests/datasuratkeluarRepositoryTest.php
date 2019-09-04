<?php

use App\Models\datasuratkeluar;
use App\Repositories\datasuratkeluarRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class datasuratkeluarRepositoryTest extends TestCase
{
    use MakedatasuratkeluarTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var datasuratkeluarRepository
     */
    protected $datasuratkeluarRepo;

    public function setUp()
    {
        parent::setUp();
        $this->datasuratkeluarRepo = App::make(datasuratkeluarRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatedatasuratkeluar()
    {
        $datasuratkeluar = $this->fakedatasuratkeluarData();
        $createddatasuratkeluar = $this->datasuratkeluarRepo->create($datasuratkeluar);
        $createddatasuratkeluar = $createddatasuratkeluar->toArray();
        $this->assertArrayHasKey('id', $createddatasuratkeluar);
        $this->assertNotNull($createddatasuratkeluar['id'], 'Created datasuratkeluar must have id specified');
        $this->assertNotNull(datasuratkeluar::find($createddatasuratkeluar['id']), 'datasuratkeluar with given id must be in DB');
        $this->assertModelData($datasuratkeluar, $createddatasuratkeluar);
    }

    /**
     * @test read
     */
    public function testReaddatasuratkeluar()
    {
        $datasuratkeluar = $this->makedatasuratkeluar();
        $dbdatasuratkeluar = $this->datasuratkeluarRepo->find($datasuratkeluar->id);
        $dbdatasuratkeluar = $dbdatasuratkeluar->toArray();
        $this->assertModelData($datasuratkeluar->toArray(), $dbdatasuratkeluar);
    }

    /**
     * @test update
     */
    public function testUpdatedatasuratkeluar()
    {
        $datasuratkeluar = $this->makedatasuratkeluar();
        $fakedatasuratkeluar = $this->fakedatasuratkeluarData();
        $updateddatasuratkeluar = $this->datasuratkeluarRepo->update($fakedatasuratkeluar, $datasuratkeluar->id);
        $this->assertModelData($fakedatasuratkeluar, $updateddatasuratkeluar->toArray());
        $dbdatasuratkeluar = $this->datasuratkeluarRepo->find($datasuratkeluar->id);
        $this->assertModelData($fakedatasuratkeluar, $dbdatasuratkeluar->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedatasuratkeluar()
    {
        $datasuratkeluar = $this->makedatasuratkeluar();
        $resp = $this->datasuratkeluarRepo->delete($datasuratkeluar->id);
        $this->assertTrue($resp);
        $this->assertNull(datasuratkeluar::find($datasuratkeluar->id), 'datasuratkeluar should not exist in DB');
    }
}
