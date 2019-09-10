<?php

use App\Models\KeteranganMenikah;
use App\Repositories\KeteranganMenikahRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KeteranganMenikahRepositoryTest extends TestCase
{
    use MakeKeteranganMenikahTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KeteranganMenikahRepository
     */
    protected $keteranganMenikahRepo;

    public function setUp()
    {
        parent::setUp();
        $this->keteranganMenikahRepo = App::make(KeteranganMenikahRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKeteranganMenikah()
    {
        $keteranganMenikah = $this->fakeKeteranganMenikahData();
        $createdKeteranganMenikah = $this->keteranganMenikahRepo->create($keteranganMenikah);
        $createdKeteranganMenikah = $createdKeteranganMenikah->toArray();
        $this->assertArrayHasKey('id', $createdKeteranganMenikah);
        $this->assertNotNull($createdKeteranganMenikah['id'], 'Created KeteranganMenikah must have id specified');
        $this->assertNotNull(KeteranganMenikah::find($createdKeteranganMenikah['id']), 'KeteranganMenikah with given id must be in DB');
        $this->assertModelData($keteranganMenikah, $createdKeteranganMenikah);
    }

    /**
     * @test read
     */
    public function testReadKeteranganMenikah()
    {
        $keteranganMenikah = $this->makeKeteranganMenikah();
        $dbKeteranganMenikah = $this->keteranganMenikahRepo->find($keteranganMenikah->id);
        $dbKeteranganMenikah = $dbKeteranganMenikah->toArray();
        $this->assertModelData($keteranganMenikah->toArray(), $dbKeteranganMenikah);
    }

    /**
     * @test update
     */
    public function testUpdateKeteranganMenikah()
    {
        $keteranganMenikah = $this->makeKeteranganMenikah();
        $fakeKeteranganMenikah = $this->fakeKeteranganMenikahData();
        $updatedKeteranganMenikah = $this->keteranganMenikahRepo->update($fakeKeteranganMenikah, $keteranganMenikah->id);
        $this->assertModelData($fakeKeteranganMenikah, $updatedKeteranganMenikah->toArray());
        $dbKeteranganMenikah = $this->keteranganMenikahRepo->find($keteranganMenikah->id);
        $this->assertModelData($fakeKeteranganMenikah, $dbKeteranganMenikah->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKeteranganMenikah()
    {
        $keteranganMenikah = $this->makeKeteranganMenikah();
        $resp = $this->keteranganMenikahRepo->delete($keteranganMenikah->id);
        $this->assertTrue($resp);
        $this->assertNull(KeteranganMenikah::find($keteranganMenikah->id), 'KeteranganMenikah should not exist in DB');
    }
}
