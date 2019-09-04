<?php

use App\Models\anggotabpd;
use App\Repositories\anggotabpdRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class anggotabpdRepositoryTest extends TestCase
{
    use MakeanggotabpdTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var anggotabpdRepository
     */
    protected $anggotabpdRepo;

    public function setUp()
    {
        parent::setUp();
        $this->anggotabpdRepo = App::make(anggotabpdRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateanggotabpd()
    {
        $anggotabpd = $this->fakeanggotabpdData();
        $createdanggotabpd = $this->anggotabpdRepo->create($anggotabpd);
        $createdanggotabpd = $createdanggotabpd->toArray();
        $this->assertArrayHasKey('id', $createdanggotabpd);
        $this->assertNotNull($createdanggotabpd['id'], 'Created anggotabpd must have id specified');
        $this->assertNotNull(anggotabpd::find($createdanggotabpd['id']), 'anggotabpd with given id must be in DB');
        $this->assertModelData($anggotabpd, $createdanggotabpd);
    }

    /**
     * @test read
     */
    public function testReadanggotabpd()
    {
        $anggotabpd = $this->makeanggotabpd();
        $dbanggotabpd = $this->anggotabpdRepo->find($anggotabpd->id);
        $dbanggotabpd = $dbanggotabpd->toArray();
        $this->assertModelData($anggotabpd->toArray(), $dbanggotabpd);
    }

    /**
     * @test update
     */
    public function testUpdateanggotabpd()
    {
        $anggotabpd = $this->makeanggotabpd();
        $fakeanggotabpd = $this->fakeanggotabpdData();
        $updatedanggotabpd = $this->anggotabpdRepo->update($fakeanggotabpd, $anggotabpd->id);
        $this->assertModelData($fakeanggotabpd, $updatedanggotabpd->toArray());
        $dbanggotabpd = $this->anggotabpdRepo->find($anggotabpd->id);
        $this->assertModelData($fakeanggotabpd, $dbanggotabpd->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteanggotabpd()
    {
        $anggotabpd = $this->makeanggotabpd();
        $resp = $this->anggotabpdRepo->delete($anggotabpd->id);
        $this->assertTrue($resp);
        $this->assertNull(anggotabpd::find($anggotabpd->id), 'anggotabpd should not exist in DB');
    }
}
