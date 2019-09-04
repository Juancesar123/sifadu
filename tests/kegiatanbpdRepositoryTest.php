<?php

use App\Models\kegiatanbpd;
use App\Repositories\kegiatanbpdRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class kegiatanbpdRepositoryTest extends TestCase
{
    use MakekegiatanbpdTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var kegiatanbpdRepository
     */
    protected $kegiatanbpdRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kegiatanbpdRepo = App::make(kegiatanbpdRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatekegiatanbpd()
    {
        $kegiatanbpd = $this->fakekegiatanbpdData();
        $createdkegiatanbpd = $this->kegiatanbpdRepo->create($kegiatanbpd);
        $createdkegiatanbpd = $createdkegiatanbpd->toArray();
        $this->assertArrayHasKey('id', $createdkegiatanbpd);
        $this->assertNotNull($createdkegiatanbpd['id'], 'Created kegiatanbpd must have id specified');
        $this->assertNotNull(kegiatanbpd::find($createdkegiatanbpd['id']), 'kegiatanbpd with given id must be in DB');
        $this->assertModelData($kegiatanbpd, $createdkegiatanbpd);
    }

    /**
     * @test read
     */
    public function testReadkegiatanbpd()
    {
        $kegiatanbpd = $this->makekegiatanbpd();
        $dbkegiatanbpd = $this->kegiatanbpdRepo->find($kegiatanbpd->id);
        $dbkegiatanbpd = $dbkegiatanbpd->toArray();
        $this->assertModelData($kegiatanbpd->toArray(), $dbkegiatanbpd);
    }

    /**
     * @test update
     */
    public function testUpdatekegiatanbpd()
    {
        $kegiatanbpd = $this->makekegiatanbpd();
        $fakekegiatanbpd = $this->fakekegiatanbpdData();
        $updatedkegiatanbpd = $this->kegiatanbpdRepo->update($fakekegiatanbpd, $kegiatanbpd->id);
        $this->assertModelData($fakekegiatanbpd, $updatedkegiatanbpd->toArray());
        $dbkegiatanbpd = $this->kegiatanbpdRepo->find($kegiatanbpd->id);
        $this->assertModelData($fakekegiatanbpd, $dbkegiatanbpd->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletekegiatanbpd()
    {
        $kegiatanbpd = $this->makekegiatanbpd();
        $resp = $this->kegiatanbpdRepo->delete($kegiatanbpd->id);
        $this->assertTrue($resp);
        $this->assertNull(kegiatanbpd::find($kegiatanbpd->id), 'kegiatanbpd should not exist in DB');
    }
}
