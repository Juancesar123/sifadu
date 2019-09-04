<?php

use App\Models\parameterstatuskawin;
use App\Repositories\parameterstatuskawinRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class parameterstatuskawinRepositoryTest extends TestCase
{
    use MakeparameterstatuskawinTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var parameterstatuskawinRepository
     */
    protected $parameterstatuskawinRepo;

    public function setUp()
    {
        parent::setUp();
        $this->parameterstatuskawinRepo = App::make(parameterstatuskawinRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateparameterstatuskawin()
    {
        $parameterstatuskawin = $this->fakeparameterstatuskawinData();
        $createdparameterstatuskawin = $this->parameterstatuskawinRepo->create($parameterstatuskawin);
        $createdparameterstatuskawin = $createdparameterstatuskawin->toArray();
        $this->assertArrayHasKey('id', $createdparameterstatuskawin);
        $this->assertNotNull($createdparameterstatuskawin['id'], 'Created parameterstatuskawin must have id specified');
        $this->assertNotNull(parameterstatuskawin::find($createdparameterstatuskawin['id']), 'parameterstatuskawin with given id must be in DB');
        $this->assertModelData($parameterstatuskawin, $createdparameterstatuskawin);
    }

    /**
     * @test read
     */
    public function testReadparameterstatuskawin()
    {
        $parameterstatuskawin = $this->makeparameterstatuskawin();
        $dbparameterstatuskawin = $this->parameterstatuskawinRepo->find($parameterstatuskawin->id);
        $dbparameterstatuskawin = $dbparameterstatuskawin->toArray();
        $this->assertModelData($parameterstatuskawin->toArray(), $dbparameterstatuskawin);
    }

    /**
     * @test update
     */
    public function testUpdateparameterstatuskawin()
    {
        $parameterstatuskawin = $this->makeparameterstatuskawin();
        $fakeparameterstatuskawin = $this->fakeparameterstatuskawinData();
        $updatedparameterstatuskawin = $this->parameterstatuskawinRepo->update($fakeparameterstatuskawin, $parameterstatuskawin->id);
        $this->assertModelData($fakeparameterstatuskawin, $updatedparameterstatuskawin->toArray());
        $dbparameterstatuskawin = $this->parameterstatuskawinRepo->find($parameterstatuskawin->id);
        $this->assertModelData($fakeparameterstatuskawin, $dbparameterstatuskawin->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteparameterstatuskawin()
    {
        $parameterstatuskawin = $this->makeparameterstatuskawin();
        $resp = $this->parameterstatuskawinRepo->delete($parameterstatuskawin->id);
        $this->assertTrue($resp);
        $this->assertNull(parameterstatuskawin::find($parameterstatuskawin->id), 'parameterstatuskawin should not exist in DB');
    }
}
