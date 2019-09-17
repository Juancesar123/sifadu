<?php

use App\Models\ParameterIndikatorKemiskinan;
use App\Repositories\ParameterIndikatorKemiskinanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParameterIndikatorKemiskinanRepositoryTest extends TestCase
{
    use MakeParameterIndikatorKemiskinanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ParameterIndikatorKemiskinanRepository
     */
    protected $parameterIndikatorKemiskinanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->parameterIndikatorKemiskinanRepo = App::make(ParameterIndikatorKemiskinanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateParameterIndikatorKemiskinan()
    {
        $parameterIndikatorKemiskinan = $this->fakeParameterIndikatorKemiskinanData();
        $createdParameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepo->create($parameterIndikatorKemiskinan);
        $createdParameterIndikatorKemiskinan = $createdParameterIndikatorKemiskinan->toArray();
        $this->assertArrayHasKey('id', $createdParameterIndikatorKemiskinan);
        $this->assertNotNull($createdParameterIndikatorKemiskinan['id'], 'Created ParameterIndikatorKemiskinan must have id specified');
        $this->assertNotNull(ParameterIndikatorKemiskinan::find($createdParameterIndikatorKemiskinan['id']), 'ParameterIndikatorKemiskinan with given id must be in DB');
        $this->assertModelData($parameterIndikatorKemiskinan, $createdParameterIndikatorKemiskinan);
    }

    /**
     * @test read
     */
    public function testReadParameterIndikatorKemiskinan()
    {
        $parameterIndikatorKemiskinan = $this->makeParameterIndikatorKemiskinan();
        $dbParameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepo->find($parameterIndikatorKemiskinan->id);
        $dbParameterIndikatorKemiskinan = $dbParameterIndikatorKemiskinan->toArray();
        $this->assertModelData($parameterIndikatorKemiskinan->toArray(), $dbParameterIndikatorKemiskinan);
    }

    /**
     * @test update
     */
    public function testUpdateParameterIndikatorKemiskinan()
    {
        $parameterIndikatorKemiskinan = $this->makeParameterIndikatorKemiskinan();
        $fakeParameterIndikatorKemiskinan = $this->fakeParameterIndikatorKemiskinanData();
        $updatedParameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepo->update($fakeParameterIndikatorKemiskinan, $parameterIndikatorKemiskinan->id);
        $this->assertModelData($fakeParameterIndikatorKemiskinan, $updatedParameterIndikatorKemiskinan->toArray());
        $dbParameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepo->find($parameterIndikatorKemiskinan->id);
        $this->assertModelData($fakeParameterIndikatorKemiskinan, $dbParameterIndikatorKemiskinan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteParameterIndikatorKemiskinan()
    {
        $parameterIndikatorKemiskinan = $this->makeParameterIndikatorKemiskinan();
        $resp = $this->parameterIndikatorKemiskinanRepo->delete($parameterIndikatorKemiskinan->id);
        $this->assertTrue($resp);
        $this->assertNull(ParameterIndikatorKemiskinan::find($parameterIndikatorKemiskinan->id), 'ParameterIndikatorKemiskinan should not exist in DB');
    }
}
