<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedataekspedisiAPIRequest;
use App\Http\Requests\API\UpdatedataekspedisiAPIRequest;
use App\Models\dataekspedisi;
use App\Repositories\dataekspedisiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class dataekspedisiController
 * @package App\Http\Controllers\API
 */

class dataekspedisiAPIController extends AppBaseController
{
    /** @var  dataekspedisiRepository */
    private $dataekspedisiRepository;

    public function __construct(dataekspedisiRepository $dataekspedisiRepo)
    {
        $this->dataekspedisiRepository = $dataekspedisiRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/dataekspedisis",
     *      summary="Get a listing of the dataekspedisis.",
     *      tags={"dataekspedisi"},
     *      description="Get all dataekspedisis",
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
     *                  @SWG\Items(ref="#/definitions/dataekspedisi")
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
        $this->dataekspedisiRepository->pushCriteria(new RequestCriteria($request));
        $this->dataekspedisiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $dataekspedisis = $this->dataekspedisiRepository->all();

        return $this->sendResponse($dataekspedisis->toArray(), 'Dataekspedisis retrieved successfully');
    }

    /**
     * @param CreatedataekspedisiAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/dataekspedisis",
     *      summary="Store a newly created dataekspedisi in storage",
     *      tags={"dataekspedisi"},
     *      description="Store dataekspedisi",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="dataekspedisi that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/dataekspedisi")
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
     *                  ref="#/definitions/dataekspedisi"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatedataekspedisiAPIRequest $request)
    {
        $input = $request->all();

        $dataekspedisis = $this->dataekspedisiRepository->create($input);

        return $this->sendResponse($dataekspedisis->toArray(), 'Dataekspedisi saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/dataekspedisis/{id}",
     *      summary="Display the specified dataekspedisi",
     *      tags={"dataekspedisi"},
     *      description="Get dataekspedisi",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of dataekspedisi",
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
     *                  ref="#/definitions/dataekspedisi"
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
        /** @var dataekspedisi $dataekspedisi */
        $dataekspedisi = $this->dataekspedisiRepository->findWithoutFail($id);

        if (empty($dataekspedisi)) {
            return $this->sendError('Dataekspedisi not found');
        }

        return $this->sendResponse($dataekspedisi->toArray(), 'Dataekspedisi retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatedataekspedisiAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/dataekspedisis/{id}",
     *      summary="Update the specified dataekspedisi in storage",
     *      tags={"dataekspedisi"},
     *      description="Update dataekspedisi",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of dataekspedisi",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="dataekspedisi that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/dataekspedisi")
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
     *                  ref="#/definitions/dataekspedisi"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatedataekspedisiAPIRequest $request)
    {
        $input = $request->all();

        /** @var dataekspedisi $dataekspedisi */
        $dataekspedisi = $this->dataekspedisiRepository->findWithoutFail($id);

        if (empty($dataekspedisi)) {
            return $this->sendError('Dataekspedisi not found');
        }

        $dataekspedisi = $this->dataekspedisiRepository->update($input, $id);

        return $this->sendResponse($dataekspedisi->toArray(), 'dataekspedisi updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/dataekspedisis/{id}",
     *      summary="Remove the specified dataekspedisi from storage",
     *      tags={"dataekspedisi"},
     *      description="Delete dataekspedisi",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of dataekspedisi",
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
        /** @var dataekspedisi $dataekspedisi */
        $dataekspedisi = $this->dataekspedisiRepository->findWithoutFail($id);

        if (empty($dataekspedisi)) {
            return $this->sendError('Dataekspedisi not found');
        }

        $dataekspedisi->delete();

        return $this->sendResponse($id, 'Dataekspedisi deleted successfully');
    }
}
