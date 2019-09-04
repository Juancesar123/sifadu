<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedusunAPIRequest;
use App\Http\Requests\API\UpdatedusunAPIRequest;
use App\Models\dusun;
use App\Repositories\dusunRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class dusunController
 * @package App\Http\Controllers\API
 */

class dusunAPIController extends AppBaseController
{
    /** @var  dusunRepository */
    private $dusunRepository;

    public function __construct(dusunRepository $dusunRepo)
    {
        $this->dusunRepository = $dusunRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/dusuns",
     *      summary="Get a listing of the dusuns.",
     *      tags={"dusun"},
     *      description="Get all dusuns",
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
     *                  @SWG\Items(ref="#/definitions/dusun")
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
        $this->dusunRepository->pushCriteria(new RequestCriteria($request));
        $this->dusunRepository->pushCriteria(new LimitOffsetCriteria($request));
        $dusuns = $this->dusunRepository->all();

        return $this->sendResponse($dusuns->toArray(), 'Dusuns retrieved successfully');
    }

    /**
     * @param CreatedusunAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/dusuns",
     *      summary="Store a newly created dusun in storage",
     *      tags={"dusun"},
     *      description="Store dusun",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="dusun that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/dusun")
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
     *                  ref="#/definitions/dusun"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatedusunAPIRequest $request)
    {
        $input = $request->all();

        $dusuns = $this->dusunRepository->create($input);

        return $this->sendResponse($dusuns->toArray(), 'Dusun saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/dusuns/{id}",
     *      summary="Display the specified dusun",
     *      tags={"dusun"},
     *      description="Get dusun",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of dusun",
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
     *                  ref="#/definitions/dusun"
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
        /** @var dusun $dusun */
        $dusun = $this->dusunRepository->findWithoutFail($id);

        if (empty($dusun)) {
            return $this->sendError('Dusun not found');
        }

        return $this->sendResponse($dusun->toArray(), 'Dusun retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatedusunAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/dusuns/{id}",
     *      summary="Update the specified dusun in storage",
     *      tags={"dusun"},
     *      description="Update dusun",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of dusun",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="dusun that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/dusun")
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
     *                  ref="#/definitions/dusun"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatedusunAPIRequest $request)
    {
        $input = $request->all();

        /** @var dusun $dusun */
        $dusun = $this->dusunRepository->findWithoutFail($id);

        if (empty($dusun)) {
            return $this->sendError('Dusun not found');
        }

        $dusun = $this->dusunRepository->update($input, $id);

        return $this->sendResponse($dusun->toArray(), 'dusun updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/dusuns/{id}",
     *      summary="Remove the specified dusun from storage",
     *      tags={"dusun"},
     *      description="Delete dusun",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of dusun",
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
        /** @var dusun $dusun */
        $dusun = $this->dusunRepository->findWithoutFail($id);

        if (empty($dusun)) {
            return $this->sendError('Dusun not found');
        }

        $dusun->delete();

        return $this->sendResponse($id, 'Dusun deleted successfully');
    }
}
