<?php

use App\Models\pendidikan;
use App\Repositories\pendidikanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class pendidikanRepositoryTest extends TestCase
{
    use MakependidikanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var pendidikanRepository
     */
    protected $pendidikanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pendidikanRepo = App::make(pendidikanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatependidikan()
    {
        $pendidikan = $this->fakependidikanData();
        $createdpendidikan = $this->pendidikanRepo->create($pendidikan);
        $createdpendidikan = $createdpendidikan->toArray();
        $this->assertArrayHasKey('id', $createdpendidikan);
        $this->assertNotNull($createdpendidikan['id'], 'Created pendidikan must have id specified');
        $this->assertNotNull(pendidikan::find($createdpendidikan['id']), 'pendidikan with given id must be in DB');
        $this->assertModelData($pendidikan, $createdpendidikan);
    }

    /**
     * @test read
     */
    public function testReadpendidikan()
    {
        $pendidikan = $this->makependidikan();
        $dbpendidikan = $this->pendidikanRepo->find($pendidikan->id);
        $dbpendidikan = $dbpendidikan->toArray();
        $this->assertModelData($pendidikan->toArray(), $dbpendidikan);
    }

    /**
     * @test update
     */
    public function testUpdatependidikan()
    {
        $pendidikan = $this->makependidikan();
        $fakependidikan = $this->fakependidikanData();
        $updatedpendidikan = $this->pendidikanRepo->update($fakependidikan, $pendidikan->id);
        $this->assertModelData($fakependidikan, $updatedpendidikan->toArray());
        $dbpendidikan = $this->pendidikanRepo->find($pendidikan->id);
        $this->assertModelData($fakependidikan, $dbpendidikan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletependidikan()
    {
        $pendidikan = $this->makependidikan();
        $resp = $this->pendidikanRepo->delete($pendidikan->id);
        $this->assertTrue($resp);
        $this->assertNull(pendidikan::find($pendidikan->id), 'pendidikan should not exist in DB');
    }
}
