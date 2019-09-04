<?php

use App\Models\suratpengantarktp;
use App\Repositories\suratpengantarktpRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class suratpengantarktpRepositoryTest extends TestCase
{
    use MakesuratpengantarktpTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var suratpengantarktpRepository
     */
    protected $suratpengantarktpRepo;

    public function setUp()
    {
        parent::setUp();
        $this->suratpengantarktpRepo = App::make(suratpengantarktpRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatesuratpengantarktp()
    {
        $suratpengantarktp = $this->fakesuratpengantarktpData();
        $createdsuratpengantarktp = $this->suratpengantarktpRepo->create($suratpengantarktp);
        $createdsuratpengantarktp = $createdsuratpengantarktp->toArray();
        $this->assertArrayHasKey('id', $createdsuratpengantarktp);
        $this->assertNotNull($createdsuratpengantarktp['id'], 'Created suratpengantarktp must have id specified');
        $this->assertNotNull(suratpengantarktp::find($createdsuratpengantarktp['id']), 'suratpengantarktp with given id must be in DB');
        $this->assertModelData($suratpengantarktp, $createdsuratpengantarktp);
    }

    /**
     * @test read
     */
    public function testReadsuratpengantarktp()
    {
        $suratpengantarktp = $this->makesuratpengantarktp();
        $dbsuratpengantarktp = $this->suratpengantarktpRepo->find($suratpengantarktp->id);
        $dbsuratpengantarktp = $dbsuratpengantarktp->toArray();
        $this->assertModelData($suratpengantarktp->toArray(), $dbsuratpengantarktp);
    }

    /**
     * @test update
     */
    public function testUpdatesuratpengantarktp()
    {
        $suratpengantarktp = $this->makesuratpengantarktp();
        $fakesuratpengantarktp = $this->fakesuratpengantarktpData();
        $updatedsuratpengantarktp = $this->suratpengantarktpRepo->update($fakesuratpengantarktp, $suratpengantarktp->id);
        $this->assertModelData($fakesuratpengantarktp, $updatedsuratpengantarktp->toArray());
        $dbsuratpengantarktp = $this->suratpengantarktpRepo->find($suratpengantarktp->id);
        $this->assertModelData($fakesuratpengantarktp, $dbsuratpengantarktp->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletesuratpengantarktp()
    {
        $suratpengantarktp = $this->makesuratpengantarktp();
        $resp = $this->suratpengantarktpRepo->delete($suratpengantarktp->id);
        $this->assertTrue($resp);
        $this->assertNull(suratpengantarktp::find($suratpengantarktp->id), 'suratpengantarktp should not exist in DB');
    }
}
