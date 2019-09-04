<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedatasuratkeluarAPIRequest;
use App\Http\Requests\API\UpdatedatasuratkeluarAPIRequest;
use App\Models\datasuratkeluar;
use App\Repositories\datasuratkeluarRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class datasuratkeluarController
 * @package App\Http\Controllers\API
 */

class datasuratkeluarAPIController extends AppBaseController
{
    /** @var  datasuratkeluarRepository */
    private $datasuratkeluarRepository;

    public function __construct(datasuratkeluarRepository $datasuratkeluarRepo)
    {
        $this->datasuratkeluarRepository = $datasuratkeluarRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/datasuratkeluars",
     *      summary="Get a listing of the datasuratkeluars.",
     *      tags={"datasuratkeluar"},
     *      description="Get all datasuratkeluars",
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
     *                  @SWG\Items(ref="#/definitions/datasuratkeluar")
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
        $this->datasuratkeluarRepository->pushCriteria(new RequestCriteria($request));
        $this->datasuratkeluarRepository->pushCriteria(new LimitOffsetCriteria($request));
        $datasuratkeluars = $this->datasuratkeluarRepository->all();

        return $this->sendResponse($datasuratkeluars->toArray(), 'Datasuratkeluars retrieved successfully');
    }

    /**
     * @param CreatedatasuratkeluarAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/datasuratkeluars",
     *      summary="Store a newly created datasuratkeluar in storage",
     *      tags={"datasuratkeluar"},
     *      description="Store datasuratkeluar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="datasuratkeluar that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/datasuratkeluar")
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
     *                  ref="#/definitions/datasuratkeluar"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatedatasuratkeluarAPIRequest $request)
    {
        $input = $request->all();

        $datasuratkeluars = $this->datasuratkeluarRepository->create($input);

        return $this->sendResponse($datasuratkeluars->toArray(), 'Datasuratkeluar saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/datasuratkeluars/{id}",
     *      summary="Display the specified datasuratkeluar",
     *      tags={"datasuratkeluar"},
     *      description="Get datasuratkeluar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of datasuratkeluar",
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
     *                  ref="#/definitions/datasuratkeluar"
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
        /** @var datasuratkeluar $datasuratkeluar */
        $datasuratkeluar = $this->datasuratkeluarRepository->findWithoutFail($id);

        if (empty($datasuratkeluar)) {
            return $this->sendError('Datasuratkeluar not found');
        }

        return $this->sendResponse($datasuratkeluar->toArray(), 'Datasuratkeluar retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatedatasuratkeluarAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/datasuratkeluars/{id}",
     *      summary="Update the specified datasuratkeluar in storage",
     *      tags={"datasuratkeluar"},
     *      description="Update datasuratkeluar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of datasuratkeluar",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="datasuratkeluar that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/datasuratkeluar")
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
     *                  ref="#/definitions/datasuratkeluar"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatedatasuratkeluarAPIRequest $request)
    {
        $input = $request->all();

        /** @var datasuratkeluar $datasuratkeluar */
        $datasuratkeluar = $this->datasuratkeluarRepository->findWithoutFail($id);

        if (empty($datasuratkeluar)) {
            return $this->sendError('Datasuratkeluar not found');
        }

        $datasuratkeluar = $this->datasuratkeluarRepository->update($input, $id);

        return $this->sendResponse($datasuratkeluar->toArray(), 'datasuratkeluar updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/datasuratkeluars/{id}",
     *      summary="Remove the specified datasuratkeluar from storage",
     *      tags={"datasuratkeluar"},
     *      description="Delete datasuratkeluar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of datasuratkeluar",
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
        /** @var datasuratkeluar $datasuratkeluar */
        $datasuratkeluar = $this->datasuratkeluarRepository->findWithoutFail($id);

        if (empty($datasuratkeluar)) {
            return $this->sendError('Datasuratkeluar not found');
        }

        $datasuratkeluar->delete();

        return $this->sendResponse($id, 'Datasuratkeluar deleted successfully');
    }
}
