<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedatasuratmasukAPIRequest;
use App\Http\Requests\API\UpdatedatasuratmasukAPIRequest;
use App\Models\datasuratmasuk;
use App\Repositories\datasuratmasukRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class datasuratmasukController
 * @package App\Http\Controllers\API
 */

class datasuratmasukAPIController extends AppBaseController
{
    /** @var  datasuratmasukRepository */
    private $datasuratmasukRepository;

    public function __construct(datasuratmasukRepository $datasuratmasukRepo)
    {
        $this->datasuratmasukRepository = $datasuratmasukRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/datasuratmasuks",
     *      summary="Get a listing of the datasuratmasuks.",
     *      tags={"datasuratmasuk"},
     *      description="Get all datasuratmasuks",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/datasuratmasuk")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->datasuratmasukRepository->pushCriteria(new RequestCriteria($request));
        $this->datasuratmasukRepository->pushCriteria(new LimitOffsetCriteria($request));
        $datasuratmasuks = $this->datasuratmasukRepository->all();

        return $this->sendResponse($datasuratmasuks->toArray(), 'Datasuratmasuks retrieved successfully');
    }

    /**
     * @param CreatedatasuratmasukAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/datasuratmasuks",
     *      summary="Store a newly created datasuratmasuk in storage",
     *      tags={"datasuratmasuk"},
     *      description="Store datasuratmasuk",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="datasuratmasuk that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/datasuratmasuk")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/datasuratmasuk"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatedatasuratmasukAPIRequest $request)
    {
        $input = $request->all();

        $datasuratmasuks = $this->datasuratmasukRepository->create($input);

        return $this->sendResponse($datasuratmasuks->toArray(), 'Datasuratmasuk saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/datasuratmasuks/{id}",
     *      summary="Display the specified datasuratmasuk",
     *      tags={"datasuratmasuk"},
     *      description="Get datasuratmasuk",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of datasuratmasuk",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/datasuratmasuk"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var datasuratmasuk $datasuratmasuk */
        $datasuratmasuk = $this->datasuratmasukRepository->findWithoutFail($id);

        if (empty($datasuratmasuk)) {
            return $this->sendError('Datasuratmasuk not found');
        }

        return $this->sendResponse($datasuratmasuk->toArray(), 'Datasuratmasuk retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatedatasuratmasukAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/datasuratmasuks/{id}",
     *      summary="Update the specified datasuratmasuk in storage",
     *      tags={"datasuratmasuk"},
     *      description="Update datasuratmasuk",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of datasuratmasuk",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="datasuratmasuk that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/datasuratmasuk")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/datasuratmasuk"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatedatasuratmasukAPIRequest $request)
    {
        $input = $request->all();

        /** @var datasuratmasuk $datasuratmasuk */
        $datasuratmasuk = $this->datasuratmasukRepository->findWithoutFail($id);

        if (empty($datasuratmasuk)) {
            return $this->sendError('Datasuratmasuk not found');
        }

        $datasuratmasuk = $this->datasuratmasukRepository->update($input, $id);

        return $this->sendResponse($datasuratmasuk->toArray(), 'datasuratmasuk updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/datasuratmasuks/{id}",
     *      summary="Remove the specified datasuratmasuk from storage",
     *      tags={"datasuratmasuk"},
     *      description="Delete datasuratmasuk",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of datasuratmasuk",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var datasuratmasuk $datasuratmasuk */
        $datasuratmasuk = $this->datasuratmasukRepository->findWithoutFail($id);

        if (empty($datasuratmasuk)) {
            return $this->sendError('Datasuratmasuk not found');
        }

        $datasuratmasuk->delete();

        return $this->sendResponse($id, 'Datasuratmasuk deleted successfully');
    }
}
