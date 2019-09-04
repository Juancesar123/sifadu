<?php

use App\Models\dusun;
use App\Repositories\dusunRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class dusunRepositoryTest extends TestCase
{
    use MakedusunTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var dusunRepository
     */
    protected $dusunRepo;

    public function setUp()
    {
        parent::setUp();
        $this->dusunRepo = App::make(dusunRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatedusun()
    {
        $dusun = $this->fakedusunData();
        $createddusun = $this->dusunRepo->create($dusun);
        $createddusun = $createddusun->toArray();
        $this->assertArrayHasKey('id', $createddusun);
        $this->assertNotNull($createddusun['id'], 'Created dusun must have id specified');
        $this->assertNotNull(dusun::find($createddusun['id']), 'dusun with given id must be in DB');
        $this->assertModelData($dusun, $createddusun);
    }

    /**
     * @test read
     */
    public function testReaddusun()
    {
        $dusun = $this->makedusun();
        $dbdusun = $this->dusunRepo->find($dusun->id);
        $dbdusun = $dbdusun->toArray();
        $this->assertModelData($dusun->toArray(), $dbdusun);
    }

    /**
     * @test update
     */
    public function testUpdatedusun()
    {
        $dusun = $this->makedusun();
        $fakedusun = $this->fakedusunData();
        $updateddusun = $this->dusunRepo->update($fakedusun, $dusun->id);
        $this->assertModelData($fakedusun, $updateddusun->toArray());
        $dbdusun = $this->dusunRepo->find($dusun->id);
        $this->assertModelData($fakedusun, $dbdusun->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletedusun()
    {
        $dusun = $this->makedusun();
        $resp = $this->dusunRepo->delete($dusun->id);
        $this->assertTrue($resp);
        $this->assertNull(dusun::find($dusun->id), 'dusun should not exist in DB');
    }
}
