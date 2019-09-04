<?php

use App\Models\dataekspedisi;
use App\Repositories\dataekspedisiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class dataekspedisiRepositoryTest extends TestCase
{
    use MakedataekspedisiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var dataekspedisiRepository
     */
    protected $dataekspedisiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->dataekspedisiRepo = App::make(dataekspedisiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatedataekspedisi()
    {
        $dataekspedisi = $this->fakedataekspedisiData();
        $createddataekspedisi = $this->dataekspedisiRepo->create($dataekspedisi);
        $createddataekspedisi = $createddataekspedisi->toArray();
        $this->assertArrayHasKey('id', $createddataekspedisi);
        $this->assertNotNull($createddataekspedisi['id'], 'Created dataekspedisi must have id specified');
        $this->assertNotNull(dataekspedisi::find($createddataekspedisi['id']), 'dataekspedisi with given id must be in DB');
        $this->assertModelData($dataekspedisi, $createddataekspedisi);
    }

    /**
     * @test read
     */
    public function testReaddataekspedisi()
    {
        $dataekspedisi = $this->makedataekspedisi();
        $dbdataekspedisi = $this->dataekspedisiRepo->find($dataekspedisi->id);
        $dbdataekspedisi = $dbdataekspedisi->toArray();
        $this->assertModelData($dataekspedisi->toArray(), $dbdataekspedisi);
    }

    /**
     * @test update
     */
    public function testUpdatedataekspedisi()
    {
        $dataekspedisi = $this->makedataekspedisi();
        $fakedataekspedisi = $this->fakedataekspedisiData();
        $updateddataekspedisi = $this->dataekspedisiRepo->update($fakedataekspedisi, $dataekspedisi->id);
        $this->assertModelData($fakedataekspedisi, $updateddataekspedisi->toArray());
        $dbdataekspedisi = $this->dataekspedisiRepo->find($dataekspedisi->id);
        $this->assertModelData($fakedataekspedisi, $dbdataekspedisi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedataekspedisi()
    {
        $dataekspedisi = $this->makedataekspedisi();
        $resp = $this->dataekspedisiRepo->delete($dataekspedisi->id);
        $this->assertTrue($resp);
        $this->assertNull(dataekspedisi::find($dataekspedisi->id), 'dataekspedisi should not exist in DB');
    }
}
