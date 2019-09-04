<?php

use App\Models\kegiatanpembangunan;
use App\Repositories\kegiatanpembangunanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class kegiatanpembangunanRepositoryTest extends TestCase
{
    use MakekegiatanpembangunanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var kegiatanpembangunanRepository
     */
    protected $kegiatanpembangunanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kegiatanpembangunanRepo = App::make(kegiatanpembangunanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatekegiatanpembangunan()
    {
        $kegiatanpembangunan = $this->fakekegiatanpembangunanData();
        $createdkegiatanpembangunan = $this->kegiatanpembangunanRepo->create($kegiatanpembangunan);
        $createdkegiatanpembangunan = $createdkegiatanpembangunan->toArray();
        $this->assertArrayHasKey('id', $createdkegiatanpembangunan);
        $this->assertNotNull($createdkegiatanpembangunan['id'], 'Created kegiatanpembangunan must have id specified');
        $this->assertNotNull(kegiatanpembangunan::find($createdkegiatanpembangunan['id']), 'kegiatanpembangunan with given id must be in DB');
        $this->assertModelData($kegiatanpembangunan, $createdkegiatanpembangunan);
    }

    /**
     * @test read
     */
    public function testReadkegiatanpembangunan()
    {
        $kegiatanpembangunan = $this->makekegiatanpembangunan();
        $dbkegiatanpembangunan = $this->kegiatanpembangunanRepo->find($kegiatanpembangunan->id);
        $dbkegiatanpembangunan = $dbkegiatanpembangunan->toArray();
        $this->assertModelData($kegiatanpembangunan->toArray(), $dbkegiatanpembangunan);
    }

    /**
     * @test update
     */
    public function testUpdatekegiatanpembangunan()
    {
        $kegiatanpembangunan = $this->makekegiatanpembangunan();
        $fakekegiatanpembangunan = $this->fakekegiatanpembangunanData();
        $updatedkegiatanpembangunan = $this->kegiatanpembangunanRepo->update($fakekegiatanpembangunan, $kegiatanpembangunan->id);
        $this->assertModelData($fakekegiatanpembangunan, $updatedkegiatanpembangunan->toArray());
        $dbkegiatanpembangunan = $this->kegiatanpembangunanRepo->find($kegiatanpembangunan->id);
        $this->assertModelData($fakekegiatanpembangunan, $dbkegiatanpembangunan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletekegiatanpembangunan()
    {
        $kegiatanpembangunan = $this->makekegiatanpembangunan();
        $resp = $this->kegiatanpembangunanRepo->delete($kegiatanpembangunan->id);
        $this->assertTrue($resp);
        $this->assertNull(kegiatanpembangunan::find($kegiatanpembangunan->id), 'kegiatanpembangunan should not exist in DB');
    }
}
