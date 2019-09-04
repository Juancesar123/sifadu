<?php

use App\Models\suratpengantarkk;
use App\Repositories\suratpengantarkkRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratpengantarkkRepositoryTest extends TestCase
{
    use MakesuratpengantarkkTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var suratpengantarkkRepository
     */
    protected $suratpengantarkkRepo;

    public function setUp()
    {
        parent::setUp();
        $this->suratpengantarkkRepo = App::make(suratpengantarkkRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesuratpengantarkk()
    {
        $suratpengantarkk = $this->fakesuratpengantarkkData();
        $createdsuratpengantarkk = $this->suratpengantarkkRepo->create($suratpengantarkk);
        $createdsuratpengantarkk = $createdsuratpengantarkk->toArray();
        $this->assertArrayHasKey('id', $createdsuratpengantarkk);
        $this->assertNotNull($createdsuratpengantarkk['id'], 'Created suratpengantarkk must have id specified');
        $this->assertNotNull(suratpengantarkk::find($createdsuratpengantarkk['id']), 'suratpengantarkk with given id must be in DB');
        $this->assertModelData($suratpengantarkk, $createdsuratpengantarkk);
    }

    /**
     * @test read
     */
    public function testReadsuratpengantarkk()
    {
        $suratpengantarkk = $this->makesuratpengantarkk();
        $dbsuratpengantarkk = $this->suratpengantarkkRepo->find($suratpengantarkk->id);
        $dbsuratpengantarkk = $dbsuratpengantarkk->toArray();
        $this->assertModelData($suratpengantarkk->toArray(), $dbsuratpengantarkk);
    }

    /**
     * @test update
     */
    public function testUpdatesuratpengantarkk()
    {
        $suratpengantarkk = $this->makesuratpengantarkk();
        $fakesuratpengantarkk = $this->fakesuratpengantarkkData();
        $updatedsuratpengantarkk = $this->suratpengantarkkRepo->update($fakesuratpengantarkk, $suratpengantarkk->id);
        $this->assertModelData($fakesuratpengantarkk, $updatedsuratpengantarkk->toArray());
        $dbsuratpengantarkk = $this->suratpengantarkkRepo->find($suratpengantarkk->id);
        $this->assertModelData($fakesuratpengantarkk, $dbsuratpengantarkk->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesuratpengantarkk()
    {
        $suratpengantarkk = $this->makesuratpengantarkk();
        $resp = $this->suratpengantarkkRepo->delete($suratpengantarkk->id);
        $this->assertTrue($resp);
        $this->assertNull(suratpengantarkk::find($suratpengantarkk->id), 'suratpengantarkk should not exist in DB');
    }
}
