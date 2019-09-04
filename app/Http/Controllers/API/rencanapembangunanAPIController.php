<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreaterencanapembangunanAPIRequest;
use App\Http\Requests\API\UpdaterencanapembangunanAPIRequest;
use App\Models\rencanapembangunan;
use App\Repositories\rencanapembangunanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class rencanapembangunanController
 * @package App\Http\Controllers\API
 */

class rencanapembangunanAPIController extends AppBaseController
{
    /** @var  rencanapembangunanRepository */
    private $rencanapembangunanRepository;

    public function __construct(rencanapembangunanRepository $rencanapembangunanRepo)
    {
        $this->rencanapembangunanRepository = $rencanapembangunanRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/rencanapembangunans",
     *      summary="Get a listing of the rencanapembangunans.",
     *      tags={"rencanapembangunan"},
     *      description="Get all rencanapembangunans",
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
     *                  @SWG\Items(ref="#/definitions/rencanapembangunan")
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
        $this->rencanapembangunanRepository->pushCriteria(new RequestCriteria($request));
        $this->rencanapembangunanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $rencanapembangunans = $this->rencanapembangunanRepository->all();

        return $this->sendResponse($rencanapembangunans->toArray(), 'Rencanapembangunans retrieved successfully');
    }

    /**
     * @param CreaterencanapembangunanAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/rencanapembangunans",
     *      summary="Store a newly created rencanapembangunan in storage",
     *      tags={"rencanapembangunan"},
     *      description="Store rencanapembangunan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="rencanapembangunan that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/rencanapembangunan")
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
     *                  ref="#/definitions/rencanapembangunan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreaterencanapembangunanAPIRequest $request)
    {
        $input = $request->all();

        $rencanapembangunans = $this->rencanapembangunanRepository->create($input);

        return $this->sendResponse($rencanapembangunans->toArray(), 'Rencanapembangunan saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/rencanapembangunans/{id}",
     *      summary="Display the specified rencanapembangunan",
     *      tags={"rencanapembangunan"},
     *      description="Get rencanapembangunan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of rencanapembangunan",
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
     *                  ref="#/definitions/rencanapembangunan"
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
        /** @var rencanapembangunan $rencanapembangunan */
        $rencanapembangunan = $this->rencanapembangunanRepository->findWithoutFail($id);

        if (empty($rencanapembangunan)) {
            return $this->sendError('Rencanapembangunan not found');
        }

        return $this->sendResponse($rencanapembangunan->toArray(), 'Rencanapembangunan retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdaterencanapembangunanAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/rencanapembangunans/{id}",
     *      summary="Update the specified rencanapembangunan in storage",
     *      tags={"rencanapembangunan"},
     *      description="Update rencanapembangunan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of rencanapembangunan",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="rencanapembangunan that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/rencanapembangunan")
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
     *                  ref="#/definitions/rencanapembangunan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdaterencanapembangunanAPIRequest $request)
    {
        $input = $request->all();

        /** @var rencanapembangunan $rencanapembangunan */
        $rencanapembangunan = $this->rencanapembangunanRepository->findWithoutFail($id);

        if (empty($rencanapembangunan)) {
            return $this->sendError('Rencanapembangunan not found');
        }

        $rencanapembangunan = $this->rencanapembangunanRepository->update($input, $id);

        return $this->sendResponse($rencanapembangunan->toArray(), 'rencanapembangunan updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/rencanapembangunans/{id}",
     *      summary="Remove the specified rencanapembangunan from storage",
     *      tags={"rencanapembangunan"},
     *      description="Delete rencanapembangunan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of rencanapembangunan",
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
        /** @var rencanapembangunan $rencanapembangunan */
        $rencanapembangunan = $this->rencanapembangunanRepository->findWithoutFail($id);

        if (empty($rencanapembangunan)) {
            return $this->sendError('Rencanapembangunan not found');
        }

        $rencanapembangunan->delete();

        return $this->sendResponse($id, 'Rencanapembangunan deleted successfully');
    }
}
