<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesuratketerangantidakmampuAPIRequest;
use App\Http\Requests\API\UpdatesuratketerangantidakmampuAPIRequest;
use App\Models\suratketerangantidakmampu;
use App\Repositories\suratketerangantidakmampuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class suratketerangantidakmampuController
 * @package App\Http\Controllers\API
 */

class suratketerangantidakmampuAPIController extends AppBaseController
{
    /** @var  suratketerangantidakmampuRepository */
    private $suratketerangantidakmampuRepository;

    public function __construct(suratketerangantidakmampuRepository $suratketerangantidakmampuRepo)
    {
        $this->suratketerangantidakmampuRepository = $suratketerangantidakmampuRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketerangantidakmampus",
     *      summary="Get a listing of the suratketerangantidakmampus.",
     *      tags={"suratketerangantidakmampu"},
     *      description="Get all suratketerangantidakmampus",
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
     *                  @SWG\Items(ref="#/definitions/suratketerangantidakmampu")
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
        $this->suratketerangantidakmampuRepository->pushCriteria(new RequestCriteria($request));
        $this->suratketerangantidakmampuRepository->pushCriteria(new LimitOffsetCriteria($request));
        $suratketerangantidakmampus = $this->suratketerangantidakmampuRepository->all();

        return $this->sendResponse($suratketerangantidakmampus->toArray(), 'Suratketerangantidakmampus retrieved successfully');
    }

    /**
     * @param CreatesuratketerangantidakmampuAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/suratketerangantidakmampus",
     *      summary="Store a newly created suratketerangantidakmampu in storage",
     *      tags={"suratketerangantidakmampu"},
     *      description="Store suratketerangantidakmampu",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketerangantidakmampu that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketerangantidakmampu")
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
     *                  ref="#/definitions/suratketerangantidakmampu"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesuratketerangantidakmampuAPIRequest $request)
    {
        $input = $request->all();

        $suratketerangantidakmampus = $this->suratketerangantidakmampuRepository->create($input);

        return $this->sendResponse($suratketerangantidakmampus->toArray(), 'Suratketerangantidakmampu saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketerangantidakmampus/{id}",
     *      summary="Display the specified suratketerangantidakmampu",
     *      tags={"suratketerangantidakmampu"},
     *      description="Get suratketerangantidakmampu",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketerangantidakmampu",
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
     *                  ref="#/definitions/suratketerangantidakmampu"
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
        /** @var suratketerangantidakmampu $suratketerangantidakmampu */
        $suratketerangantidakmampu = $this->suratketerangantidakmampuRepository->findWithoutFail($id);

        if (empty($suratketerangantidakmampu)) {
            return $this->sendError('Suratketerangantidakmampu not found');
        }

        return $this->sendResponse($suratketerangantidakmampu->toArray(), 'Suratketerangantidakmampu retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesuratketerangantidakmampuAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/suratketerangantidakmampus/{id}",
     *      summary="Update the specified suratketerangantidakmampu in storage",
     *      tags={"suratketerangantidakmampu"},
     *      description="Update suratketerangantidakmampu",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketerangantidakmampu",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketerangantidakmampu that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketerangantidakmampu")
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
     *                  ref="#/definitions/suratketerangantidakmampu"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesuratketerangantidakmampuAPIRequest $request)
    {
        $input = $request->all();

        /** @var suratketerangantidakmampu $suratketerangantidakmampu */
        $suratketerangantidakmampu = $this->suratketerangantidakmampuRepository->findWithoutFail($id);

        if (empty($suratketerangantidakmampu)) {
            return $this->sendError('Suratketerangantidakmampu not found');
        }

        $suratketerangantidakmampu = $this->suratketerangantidakmampuRepository->update($input, $id);

        return $this->sendResponse($suratketerangantidakmampu->toArray(), 'suratketerangantidakmampu updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/suratketerangantidakmampus/{id}",
     *      summary="Remove the specified suratketerangantidakmampu from storage",
     *      tags={"suratketerangantidakmampu"},
     *      description="Delete suratketerangantidakmampu",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketerangantidakmampu",
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
        /** @var suratketerangantidakmampu $suratketerangantidakmampu */
        $suratketerangantidakmampu = $this->suratketerangantidakmampuRepository->findWithoutFail($id);

        if (empty($suratketerangantidakmampu)) {
            return $this->sendError('Suratketerangantidakmampu not found');
        }

        $suratketerangantidakmampu->delete();

        return $this->sendResponse($id, 'Suratketerangantidakmampu deleted successfully');
    }
}
