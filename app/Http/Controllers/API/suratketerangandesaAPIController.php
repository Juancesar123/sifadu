<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesuratketerangandesaAPIRequest;
use App\Http\Requests\API\UpdatesuratketerangandesaAPIRequest;
use App\Models\suratketerangandesa;
use App\Repositories\suratketerangandesaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class suratketerangandesaController
 * @package App\Http\Controllers\API
 */

class suratketerangandesaAPIController extends AppBaseController
{
    /** @var  suratketerangandesaRepository */
    private $suratketerangandesaRepository;

    public function __construct(suratketerangandesaRepository $suratketerangandesaRepo)
    {
        $this->suratketerangandesaRepository = $suratketerangandesaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketerangandesas",
     *      summary="Get a listing of the suratketerangandesas.",
     *      tags={"suratketerangandesa"},
     *      description="Get all suratketerangandesas",
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
     *                  @SWG\Items(ref="#/definitions/suratketerangandesa")
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
        $this->suratketerangandesaRepository->pushCriteria(new RequestCriteria($request));
        $this->suratketerangandesaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $suratketerangandesas = $this->suratketerangandesaRepository->all();

        return $this->sendResponse($suratketerangandesas->toArray(), 'Suratketerangandesas retrieved successfully');
    }

    /**
     * @param CreatesuratketerangandesaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/suratketerangandesas",
     *      summary="Store a newly created suratketerangandesa in storage",
     *      tags={"suratketerangandesa"},
     *      description="Store suratketerangandesa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketerangandesa that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketerangandesa")
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
     *                  ref="#/definitions/suratketerangandesa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesuratketerangandesaAPIRequest $request)
    {
        $input = $request->all();

        $suratketerangandesas = $this->suratketerangandesaRepository->create($input);

        return $this->sendResponse($suratketerangandesas->toArray(), 'Suratketerangandesa saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketerangandesas/{id}",
     *      summary="Display the specified suratketerangandesa",
     *      tags={"suratketerangandesa"},
     *      description="Get suratketerangandesa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketerangandesa",
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
     *                  ref="#/definitions/suratketerangandesa"
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
        /** @var suratketerangandesa $suratketerangandesa */
        $suratketerangandesa = $this->suratketerangandesaRepository->findWithoutFail($id);

        if (empty($suratketerangandesa)) {
            return $this->sendError('Suratketerangandesa not found');
        }

        return $this->sendResponse($suratketerangandesa->toArray(), 'Suratketerangandesa retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesuratketerangandesaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/suratketerangandesas/{id}",
     *      summary="Update the specified suratketerangandesa in storage",
     *      tags={"suratketerangandesa"},
     *      description="Update suratketerangandesa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketerangandesa",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketerangandesa that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketerangandesa")
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
     *                  ref="#/definitions/suratketerangandesa"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesuratketerangandesaAPIRequest $request)
    {
        $input = $request->all();

        /** @var suratketerangandesa $suratketerangandesa */
        $suratketerangandesa = $this->suratketerangandesaRepository->findWithoutFail($id);

        if (empty($suratketerangandesa)) {
            return $this->sendError('Suratketerangandesa not found');
        }

        $suratketerangandesa = $this->suratketerangandesaRepository->update($input, $id);

        return $this->sendResponse($suratketerangandesa->toArray(), 'suratketerangandesa updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/suratketerangandesas/{id}",
     *      summary="Remove the specified suratketerangandesa from storage",
     *      tags={"suratketerangandesa"},
     *      description="Delete suratketerangandesa",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketerangandesa",
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
        /** @var suratketerangandesa $suratketerangandesa */
        $suratketerangandesa = $this->suratketerangandesaRepository->findWithoutFail($id);

        if (empty($suratketerangandesa)) {
            return $this->sendError('Suratketerangandesa not found');
        }

        $suratketerangandesa->delete();

        return $this->sendResponse($id, 'Suratketerangandesa deleted successfully');
    }
}
