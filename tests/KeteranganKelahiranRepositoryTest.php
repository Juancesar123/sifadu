<?php

use App\Models\KeteranganKelahiran;
use App\Repositories\KeteranganKelahiranRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KeteranganKelahiranRepositoryTest extends TestCase
{
    use MakeKeteranganKelahiranTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KeteranganKelahiranRepository
     */
    protected $keteranganKelahiranRepo;

    public function setUp()
    {
        parent::setUp();
        $this->keteranganKelahiranRepo = App::make(KeteranganKelahiranRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKeteranganKelahiran()
    {
        $keteranganKelahiran = $this->fakeKeteranganKelahiranData();
        $createdKeteranganKelahiran = $this->keteranganKelahiranRepo->create($keteranganKelahiran);
        $createdKeteranganKelahiran = $createdKeteranganKelahiran->toArray();
        $this->assertArrayHasKey('id', $createdKeteranganKelahiran);
        $this->assertNotNull($createdKeteranganKelahiran['id'], 'Created KeteranganKelahiran must have id specified');
        $this->assertNotNull(KeteranganKelahiran::find($createdKeteranganKelahiran['id']), 'KeteranganKelahiran with given id must be in DB');
        $this->assertModelData($keteranganKelahiran, $createdKeteranganKelahiran);
    }

    /**
     * @test read
     */
    public function testReadKeteranganKelahiran()
    {
        $keteranganKelahiran = $this->makeKeteranganKelahiran();
        $dbKeteranganKelahiran = $this->keteranganKelahiranRepo->find($keteranganKelahiran->id);
        $dbKeteranganKelahiran = $dbKeteranganKelahiran->toArray();
        $this->assertModelData($keteranganKelahiran->toArray(), $dbKeteranganKelahiran);
    }

    /**
     * @test update
     */
    public function testUpdateKeteranganKelahiran()
    {
        $keteranganKelahiran = $this->makeKeteranganKelahiran();
        $fakeKeteranganKelahiran = $this->fakeKeteranganKelahiranData();
        $updatedKeteranganKelahiran = $this->keteranganKelahiranRepo->update($fakeKeteranganKelahiran, $keteranganKelahiran->id);
        $this->assertModelData($fakeKeteranganKelahiran, $updatedKeteranganKelahiran->toArray());
        $dbKeteranganKelahiran = $this->keteranganKelahiranRepo->find($keteranganKelahiran->id);
        $this->assertModelData($fakeKeteranganKelahiran, $dbKeteranganKelahiran->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKeteranganKelahiran()
    {
        $keteranganKelahiran = $this->makeKeteranganKelahiran();
        $resp = $this->keteranganKelahiranRepo->delete($keteranganKelahiran->id);
        $this->assertTrue($resp);
        $this->assertNull(KeteranganKelahiran::find($keteranganKelahiran->id), 'KeteranganKelahiran should not exist in DB');
    }
}
