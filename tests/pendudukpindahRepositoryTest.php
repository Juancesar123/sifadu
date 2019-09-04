<?php

use App\Models\pendudukpindah;
use App\Repositories\pendudukpindahRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class pendudukpindahRepositoryTest extends TestCase
{
    use MakependudukpindahTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var pendudukpindahRepository
     */
    protected $pendudukpindahRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pendudukpindahRepo = App::make(pendudukpindahRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatependudukpindah()
    {
        $pendudukpindah = $this->fakependudukpindahData();
        $createdpendudukpindah = $this->pendudukpindahRepo->create($pendudukpindah);
        $createdpendudukpindah = $createdpendudukpindah->toArray();
        $this->assertArrayHasKey('id', $createdpendudukpindah);
        $this->assertNotNull($createdpendudukpindah['id'], 'Created pendudukpindah must have id specified');
        $this->assertNotNull(pendudukpindah::find($createdpendudukpindah['id']), 'pendudukpindah with given id must be in DB');
        $this->assertModelData($pendudukpindah, $createdpendudukpindah);
    }

    /**
     * @test read
     */
    public function testReadpendudukpindah()
    {
        $pendudukpindah = $this->makependudukpindah();
        $dbpendudukpindah = $this->pendudukpindahRepo->find($pendudukpindah->id);
        $dbpendudukpindah = $dbpendudukpindah->toArray();
        $this->assertModelData($pendudukpindah->toArray(), $dbpendudukpindah);
    }

    /**
     * @test update
     */
    public function testUpdatependudukpindah()
    {
        $pendudukpindah = $this->makependudukpindah();
        $fakependudukpindah = $this->fakependudukpindahData();
        $updatedpendudukpindah = $this->pendudukpindahRepo->update($fakependudukpindah, $pendudukpindah->id);
        $this->assertModelData($fakependudukpindah, $updatedpendudukpindah->toArray());
        $dbpendudukpindah = $this->pendudukpindahRepo->find($pendudukpindah->id);
        $this->assertModelData($fakependudukpindah, $dbpendudukpindah->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletependudukpindah()
    {
        $pendudukpindah = $this->makependudukpindah();
        $resp = $this->pendudukpindahRepo->delete($pendudukpindah->id);
        $this->assertTrue($resp);
        $this->assertNull(pendudukpindah::find($pendudukpindah->id), 'pendudukpindah should not exist in DB');
    }
}
