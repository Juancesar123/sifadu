<?php

use App\Models\pendudukmeninggal;
use App\Repositories\pendudukmeninggalRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class pendudukmeninggalRepositoryTest extends TestCase
{
    use MakependudukmeninggalTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var pendudukmeninggalRepository
     */
    protected $pendudukmeninggalRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pendudukmeninggalRepo = App::make(pendudukmeninggalRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatependudukmeninggal()
    {
        $pendudukmeninggal = $this->fakependudukmeninggalData();
        $createdpendudukmeninggal = $this->pendudukmeninggalRepo->create($pendudukmeninggal);
        $createdpendudukmeninggal = $createdpendudukmeninggal->toArray();
        $this->assertArrayHasKey('id', $createdpendudukmeninggal);
        $this->assertNotNull($createdpendudukmeninggal['id'], 'Created pendudukmeninggal must have id specified');
        $this->assertNotNull(pendudukmeninggal::find($createdpendudukmeninggal['id']), 'pendudukmeninggal with given id must be in DB');
        $this->assertModelData($pendudukmeninggal, $createdpendudukmeninggal);
    }

    /**
     * @test read
     */
    public function testReadpendudukmeninggal()
    {
        $pendudukmeninggal = $this->makependudukmeninggal();
        $dbpendudukmeninggal = $this->pendudukmeninggalRepo->find($pendudukmeninggal->id);
        $dbpendudukmeninggal = $dbpendudukmeninggal->toArray();
        $this->assertModelData($pendudukmeninggal->toArray(), $dbpendudukmeninggal);
    }

    /**
     * @test update
     */
    public function testUpdatependudukmeninggal()
    {
        $pendudukmeninggal = $this->makependudukmeninggal();
        $fakependudukmeninggal = $this->fakependudukmeninggalData();
        $updatedpendudukmeninggal = $this->pendudukmeninggalRepo->update($fakependudukmeninggal, $pendudukmeninggal->id);
        $this->assertModelData($fakependudukmeninggal, $updatedpendudukmeninggal->toArray());
        $dbpendudukmeninggal = $this->pendudukmeninggalRepo->find($pendudukmeninggal->id);
        $this->assertModelData($fakependudukmeninggal, $dbpendudukmeninggal->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletependudukmeninggal()
    {
        $pendudukmeninggal = $this->makependudukmeninggal();
        $resp = $this->pendudukmeninggalRepo->delete($pendudukmeninggal->id);
        $this->assertTrue($resp);
        $this->assertNull(pendudukmeninggal::find($pendudukmeninggal->id), 'pendudukmeninggal should not exist in DB');
    }
}
