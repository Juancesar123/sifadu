<?php

use App\Models\KeteranganUsahaBaru;
use App\Repositories\KeteranganUsahaBaruRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KeteranganUsahaBaruRepositoryTest extends TestCase
{
    use MakeKeteranganUsahaBaruTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KeteranganUsahaBaruRepository
     */
    protected $keteranganUsahaBaruRepo;

    public function setUp()
    {
        parent::setUp();
        $this->keteranganUsahaBaruRepo = App::make(KeteranganUsahaBaruRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKeteranganUsahaBaru()
    {
        $keteranganUsahaBaru = $this->fakeKeteranganUsahaBaruData();
        $createdKeteranganUsahaBaru = $this->keteranganUsahaBaruRepo->create($keteranganUsahaBaru);
        $createdKeteranganUsahaBaru = $createdKeteranganUsahaBaru->toArray();
        $this->assertArrayHasKey('id', $createdKeteranganUsahaBaru);
        $this->assertNotNull($createdKeteranganUsahaBaru['id'], 'Created KeteranganUsahaBaru must have id specified');
        $this->assertNotNull(KeteranganUsahaBaru::find($createdKeteranganUsahaBaru['id']), 'KeteranganUsahaBaru with given id must be in DB');
        $this->assertModelData($keteranganUsahaBaru, $createdKeteranganUsahaBaru);
    }

    /**
     * @test read
     */
    public function testReadKeteranganUsahaBaru()
    {
        $keteranganUsahaBaru = $this->makeKeteranganUsahaBaru();
        $dbKeteranganUsahaBaru = $this->keteranganUsahaBaruRepo->find($keteranganUsahaBaru->id);
        $dbKeteranganUsahaBaru = $dbKeteranganUsahaBaru->toArray();
        $this->assertModelData($keteranganUsahaBaru->toArray(), $dbKeteranganUsahaBaru);
    }

    /**
     * @test update
     */
    public function testUpdateKeteranganUsahaBaru()
    {
        $keteranganUsahaBaru = $this->makeKeteranganUsahaBaru();
        $fakeKeteranganUsahaBaru = $this->fakeKeteranganUsahaBaruData();
        $updatedKeteranganUsahaBaru = $this->keteranganUsahaBaruRepo->update($fakeKeteranganUsahaBaru, $keteranganUsahaBaru->id);
        $this->assertModelData($fakeKeteranganUsahaBaru, $updatedKeteranganUsahaBaru->toArray());
        $dbKeteranganUsahaBaru = $this->keteranganUsahaBaruRepo->find($keteranganUsahaBaru->id);
        $this->assertModelData($fakeKeteranganUsahaBaru, $dbKeteranganUsahaBaru->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKeteranganUsahaBaru()
    {
        $keteranganUsahaBaru = $this->makeKeteranganUsahaBaru();
        $resp = $this->keteranganUsahaBaruRepo->delete($keteranganUsahaBaru->id);
        $this->assertTrue($resp);
        $this->assertNull(KeteranganUsahaBaru::find($keteranganUsahaBaru->id), 'KeteranganUsahaBaru should not exist in DB');
    }
}
