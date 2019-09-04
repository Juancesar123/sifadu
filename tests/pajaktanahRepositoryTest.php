<?php

use App\Models\pajaktanah;
use App\Repositories\pajaktanahRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class pajaktanahRepositoryTest extends TestCase
{
    use MakepajaktanahTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var pajaktanahRepository
     */
    protected $pajaktanahRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pajaktanahRepo = App::make(pajaktanahRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatepajaktanah()
    {
        $pajaktanah = $this->fakepajaktanahData();
        $createdpajaktanah = $this->pajaktanahRepo->create($pajaktanah);
        $createdpajaktanah = $createdpajaktanah->toArray();
        $this->assertArrayHasKey('id', $createdpajaktanah);
        $this->assertNotNull($createdpajaktanah['id'], 'Created pajaktanah must have id specified');
        $this->assertNotNull(pajaktanah::find($createdpajaktanah['id']), 'pajaktanah with given id must be in DB');
        $this->assertModelData($pajaktanah, $createdpajaktanah);
    }

    /**
     * @test read
     */
    public function testReadpajaktanah()
    {
        $pajaktanah = $this->makepajaktanah();
        $dbpajaktanah = $this->pajaktanahRepo->find($pajaktanah->id);
        $dbpajaktanah = $dbpajaktanah->toArray();
        $this->assertModelData($pajaktanah->toArray(), $dbpajaktanah);
    }

    /**
     * @test update
     */
    public function testUpdatepajaktanah()
    {
        $pajaktanah = $this->makepajaktanah();
        $fakepajaktanah = $this->fakepajaktanahData();
        $updatedpajaktanah = $this->pajaktanahRepo->update($fakepajaktanah, $pajaktanah->id);
        $this->assertModelData($fakepajaktanah, $updatedpajaktanah->toArray());
        $dbpajaktanah = $this->pajaktanahRepo->find($pajaktanah->id);
        $this->assertModelData($fakepajaktanah, $dbpajaktanah->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletepajaktanah()
    {
        $pajaktanah = $this->makepajaktanah();
        $resp = $this->pajaktanahRepo->delete($pajaktanah->id);
        $this->assertTrue($resp);
        $this->assertNull(pajaktanah::find($pajaktanah->id), 'pajaktanah should not exist in DB');
    }
}
