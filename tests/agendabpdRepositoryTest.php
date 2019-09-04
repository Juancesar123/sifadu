<?php

use App\Models\agendabpd;
use App\Repositories\agendabpdRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class agendabpdRepositoryTest extends TestCase
{
    use MakeagendabpdTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var agendabpdRepository
     */
    protected $agendabpdRepo;

    public function setUp()
    {
        parent::setUp();
        $this->agendabpdRepo = App::make(agendabpdRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateagendabpd()
    {
        $agendabpd = $this->fakeagendabpdData();
        $createdagendabpd = $this->agendabpdRepo->create($agendabpd);
        $createdagendabpd = $createdagendabpd->toArray();
        $this->assertArrayHasKey('id', $createdagendabpd);
        $this->assertNotNull($createdagendabpd['id'], 'Created agendabpd must have id specified');
        $this->assertNotNull(agendabpd::find($createdagendabpd['id']), 'agendabpd with given id must be in DB');
        $this->assertModelData($agendabpd, $createdagendabpd);
    }

    /**
     * @test read
     */
    public function testReadagendabpd()
    {
        $agendabpd = $this->makeagendabpd();
        $dbagendabpd = $this->agendabpdRepo->find($agendabpd->id);
        $dbagendabpd = $dbagendabpd->toArray();
        $this->assertModelData($agendabpd->toArray(), $dbagendabpd);
    }

    /**
     * @test update
     */
    public function testUpdateagendabpd()
    {
        $agendabpd = $this->makeagendabpd();
        $fakeagendabpd = $this->fakeagendabpdData();
        $updatedagendabpd = $this->agendabpdRepo->update($fakeagendabpd, $agendabpd->id);
        $this->assertModelData($fakeagendabpd, $updatedagendabpd->toArray());
        $dbagendabpd = $this->agendabpdRepo->find($agendabpd->id);
        $this->assertModelData($fakeagendabpd, $dbagendabpd->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteagendabpd()
    {
        $agendabpd = $this->makeagendabpd();
        $resp = $this->agendabpdRepo->delete($agendabpd->id);
        $this->assertTrue($resp);
        $this->assertNull(agendabpd::find($agendabpd->id), 'agendabpd should not exist in DB');
    }
}
