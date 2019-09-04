<?php

use App\Models\parameterjeniskelamin;
use App\Repositories\parameterjeniskelaminRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class parameterjeniskelaminRepositoryTest extends TestCase
{
    use MakeparameterjeniskelaminTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var parameterjeniskelaminRepository
     */
    protected $parameterjeniskelaminRepo;

    public function setUp()
    {
        parent::setUp();
        $this->parameterjeniskelaminRepo = App::make(parameterjeniskelaminRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateparameterjeniskelamin()
    {
        $parameterjeniskelamin = $this->fakeparameterjeniskelaminData();
        $createdparameterjeniskelamin = $this->parameterjeniskelaminRepo->create($parameterjeniskelamin);
        $createdparameterjeniskelamin = $createdparameterjeniskelamin->toArray();
        $this->assertArrayHasKey('id', $createdparameterjeniskelamin);
        $this->assertNotNull($createdparameterjeniskelamin['id'], 'Created parameterjeniskelamin must have id specified');
        $this->assertNotNull(parameterjeniskelamin::find($createdparameterjeniskelamin['id']), 'parameterjeniskelamin with given id must be in DB');
        $this->assertModelData($parameterjeniskelamin, $createdparameterjeniskelamin);
    }

    /**
     * @test read
     */
    public function testReadparameterjeniskelamin()
    {
        $parameterjeniskelamin = $this->makeparameterjeniskelamin();
        $dbparameterjeniskelamin = $this->parameterjeniskelaminRepo->find($parameterjeniskelamin->id);
        $dbparameterjeniskelamin = $dbparameterjeniskelamin->toArray();
        $this->assertModelData($parameterjeniskelamin->toArray(), $dbparameterjeniskelamin);
    }

    /**
     * @test update
     */
    public function testUpdateparameterjeniskelamin()
    {
        $parameterjeniskelamin = $this->makeparameterjeniskelamin();
        $fakeparameterjeniskelamin = $this->fakeparameterjeniskelaminData();
        $updatedparameterjeniskelamin = $this->parameterjeniskelaminRepo->update($fakeparameterjeniskelamin, $parameterjeniskelamin->id);
        $this->assertModelData($fakeparameterjeniskelamin, $updatedparameterjeniskelamin->toArray());
        $dbparameterjeniskelamin = $this->parameterjeniskelaminRepo->find($parameterjeniskelamin->id);
        $this->assertModelData($fakeparameterjeniskelamin, $dbparameterjeniskelamin->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteparameterjeniskelamin()
    {
        $parameterjeniskelamin = $this->makeparameterjeniskelamin();
        $resp = $this->parameterjeniskelaminRepo->delete($parameterjeniskelamin->id);
        $this->assertTrue($resp);
        $this->assertNull(parameterjeniskelamin::find($parameterjeniskelamin->id), 'parameterjeniskelamin should not exist in DB');
    }
}
