<?php

use App\Models\agama;
use App\Repositories\agamaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class agamaRepositoryTest extends TestCase
{
    use MakeagamaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var agamaRepository
     */
    protected $agamaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->agamaRepo = App::make(agamaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateagama()
    {
        $agama = $this->fakeagamaData();
        $createdagama = $this->agamaRepo->create($agama);
        $createdagama = $createdagama->toArray();
        $this->assertArrayHasKey('id', $createdagama);
        $this->assertNotNull($createdagama['id'], 'Created agama must have id specified');
        $this->assertNotNull(agama::find($createdagama['id']), 'agama with given id must be in DB');
        $this->assertModelData($agama, $createdagama);
    }

    /**
     * @test read
     */
    public function testReadagama()
    {
        $agama = $this->makeagama();
        $dbagama = $this->agamaRepo->find($agama->id);
        $dbagama = $dbagama->toArray();
        $this->assertModelData($agama->toArray(), $dbagama);
    }

    /**
     * @test update
     */
    public function testUpdateagama()
    {
        $agama = $this->makeagama();
        $fakeagama = $this->fakeagamaData();
        $updatedagama = $this->agamaRepo->update($fakeagama, $agama->id);
        $this->assertModelData($fakeagama, $updatedagama->toArray());
        $dbagama = $this->agamaRepo->find($agama->id);
        $this->assertModelData($fakeagama, $dbagama->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteagama()
    {
        $agama = $this->makeagama();
        $resp = $this->agamaRepo->delete($agama->id);
        $this->assertTrue($resp);
        $this->assertNull(agama::find($agama->id), 'agama should not exist in DB');
    }
}
