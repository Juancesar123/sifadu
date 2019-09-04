<?php

use App\Models\kaderpembangunan;
use App\Repositories\kaderpembangunanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class kaderpembangunanRepositoryTest extends TestCase
{
    use MakekaderpembangunanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var kaderpembangunanRepository
     */
    protected $kaderpembangunanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->kaderpembangunanRepo = App::make(kaderpembangunanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatekaderpembangunan()
    {
        $kaderpembangunan = $this->fakekaderpembangunanData();
        $createdkaderpembangunan = $this->kaderpembangunanRepo->create($kaderpembangunan);
        $createdkaderpembangunan = $createdkaderpembangunan->toArray();
        $this->assertArrayHasKey('id', $createdkaderpembangunan);
        $this->assertNotNull($createdkaderpembangunan['id'], 'Created kaderpembangunan must have id specified');
        $this->assertNotNull(kaderpembangunan::find($createdkaderpembangunan['id']), 'kaderpembangunan with given id must be in DB');
        $this->assertModelData($kaderpembangunan, $createdkaderpembangunan);
    }

    /**
     * @test read
     */
    public function testReadkaderpembangunan()
    {
        $kaderpembangunan = $this->makekaderpembangunan();
        $dbkaderpembangunan = $this->kaderpembangunanRepo->find($kaderpembangunan->id);
        $dbkaderpembangunan = $dbkaderpembangunan->toArray();
        $this->assertModelData($kaderpembangunan->toArray(), $dbkaderpembangunan);
    }

    /**
     * @test update
     */
    public function testUpdatekaderpembangunan()
    {
        $kaderpembangunan = $this->makekaderpembangunan();
        $fakekaderpembangunan = $this->fakekaderpembangunanData();
        $updatedkaderpembangunan = $this->kaderpembangunanRepo->update($fakekaderpembangunan, $kaderpembangunan->id);
        $this->assertModelData($fakekaderpembangunan, $updatedkaderpembangunan->toArray());
        $dbkaderpembangunan = $this->kaderpembangunanRepo->find($kaderpembangunan->id);
        $this->assertModelData($fakekaderpembangunan, $dbkaderpembangunan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletekaderpembangunan()
    {
        $kaderpembangunan = $this->makekaderpembangunan();
        $resp = $this->kaderpembangunanRepo->delete($kaderpembangunan->id);
        $this->assertTrue($resp);
        $this->assertNull(kaderpembangunan::find($kaderpembangunan->id), 'kaderpembangunan should not exist in DB');
    }
}
