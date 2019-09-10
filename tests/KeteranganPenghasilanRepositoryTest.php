<?php

use App\Models\KeteranganPenghasilan;
use App\Repositories\KeteranganPenghasilanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KeteranganPenghasilanRepositoryTest extends TestCase
{
    use MakeKeteranganPenghasilanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var KeteranganPenghasilanRepository
     */
    protected $keteranganPenghasilanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->keteranganPenghasilanRepo = App::make(KeteranganPenghasilanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateKeteranganPenghasilan()
    {
        $keteranganPenghasilan = $this->fakeKeteranganPenghasilanData();
        $createdKeteranganPenghasilan = $this->keteranganPenghasilanRepo->create($keteranganPenghasilan);
        $createdKeteranganPenghasilan = $createdKeteranganPenghasilan->toArray();
        $this->assertArrayHasKey('id', $createdKeteranganPenghasilan);
        $this->assertNotNull($createdKeteranganPenghasilan['id'], 'Created KeteranganPenghasilan must have id specified');
        $this->assertNotNull(KeteranganPenghasilan::find($createdKeteranganPenghasilan['id']), 'KeteranganPenghasilan with given id must be in DB');
        $this->assertModelData($keteranganPenghasilan, $createdKeteranganPenghasilan);
    }

    /**
     * @test read
     */
    public function testReadKeteranganPenghasilan()
    {
        $keteranganPenghasilan = $this->makeKeteranganPenghasilan();
        $dbKeteranganPenghasilan = $this->keteranganPenghasilanRepo->find($keteranganPenghasilan->id);
        $dbKeteranganPenghasilan = $dbKeteranganPenghasilan->toArray();
        $this->assertModelData($keteranganPenghasilan->toArray(), $dbKeteranganPenghasilan);
    }

    /**
     * @test update
     */
    public function testUpdateKeteranganPenghasilan()
    {
        $keteranganPenghasilan = $this->makeKeteranganPenghasilan();
        $fakeKeteranganPenghasilan = $this->fakeKeteranganPenghasilanData();
        $updatedKeteranganPenghasilan = $this->keteranganPenghasilanRepo->update($fakeKeteranganPenghasilan, $keteranganPenghasilan->id);
        $this->assertModelData($fakeKeteranganPenghasilan, $updatedKeteranganPenghasilan->toArray());
        $dbKeteranganPenghasilan = $this->keteranganPenghasilanRepo->find($keteranganPenghasilan->id);
        $this->assertModelData($fakeKeteranganPenghasilan, $dbKeteranganPenghasilan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteKeteranganPenghasilan()
    {
        $keteranganPenghasilan = $this->makeKeteranganPenghasilan();
        $resp = $this->keteranganPenghasilanRepo->delete($keteranganPenghasilan->id);
        $this->assertTrue($resp);
        $this->assertNull(KeteranganPenghasilan::find($keteranganPenghasilan->id), 'KeteranganPenghasilan should not exist in DB');
    }
}
