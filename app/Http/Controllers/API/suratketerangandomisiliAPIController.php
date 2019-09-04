<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesuratketerangandomisiliAPIRequest;
use App\Http\Requests\API\UpdatesuratketerangandomisiliAPIRequest;
use App\Models\suratketerangandomisili;
use App\Repositories\suratketerangandomisiliRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class suratketerangandomisiliController
 * @package App\Http\Controllers\API
 */

class suratketerangandomisiliAPIController extends AppBaseController
{
    /** @var  suratketerangandomisiliRepository */
    private $suratketerangandomisiliRepository;

    public function __construct(suratketerangandomisiliRepository $suratketerangandomisiliRepo)
    {
        $this->suratketerangandomisiliRepository = $suratketerangandomisiliRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketerangandomisilis",
     *      summary="Get a listing of the suratketerangandomisilis.",
     *      tags={"suratketerangandomisili"},
     *      description="Get all suratketerangandomisilis",
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
     *                  @SWG\Items(ref="#/definitions/suratketerangandomisili")
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
        $this->suratketerangandomisiliRepository->pushCriteria(new RequestCriteria($request));
        $this->suratketerangandomisiliRepository->pushCriteria(new LimitOffsetCriteria($request));
        $suratketerangandomisilis = $this->suratketerangandomisiliRepository->all();

        return $this->sendResponse($suratketerangandomisilis->toArray(), 'Suratketerangandomisilis retrieved successfully');
    }

    /**
     * @param CreatesuratketerangandomisiliAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/suratketerangandomisilis",
     *      summary="Store a newly created suratketerangandomisili in storage",
     *      tags={"suratketerangandomisili"},
     *      description="Store suratketerangandomisili",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketerangandomisili that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketerangandomisili")
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
     *                  ref="#/definitions/suratketerangandomisili"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesuratketerangandomisiliAPIRequest $request)
    {
        $input = $request->all();

        $suratketerangandomisilis = $this->suratketerangandomisiliRepository->create($input);

        return $this->sendResponse($suratketerangandomisilis->toArray(), 'Suratketerangandomisili saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketerangandomisilis/{id}",
     *      summary="Display the specified suratketerangandomisili",
     *      tags={"suratketerangandomisili"},
     *      description="Get suratketerangandomisili",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketerangandomisili",
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
     *                  ref="#/definitions/suratketerangandomisili"
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
        /** @var suratketerangandomisili $suratketerangandomisili */
        $suratketerangandomisili = $this->suratketerangandomisiliRepository->findWithoutFail($id);

        if (empty($suratketerangandomisili)) {
            return $this->sendError('Suratketerangandomisili not found');
        }

        return $this->sendResponse($suratketerangandomisili->toArray(), 'Suratketerangandomisili retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesuratketerangandomisiliAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/suratketerangandomisilis/{id}",
     *      summary="Update the specified suratketerangandomisili in storage",
     *      tags={"suratketerangandomisili"},
     *      description="Update suratketerangandomisili",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketerangandomisili",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketerangandomisili that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketerangandomisili")
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
     *                  ref="#/definitions/suratketerangandomisili"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesuratketerangandomisiliAPIRequest $request)
    {
        $input = $request->all();

        /** @var suratketerangandomisili $suratketerangandomisili */
        $suratketerangandomisili = $this->suratketerangandomisiliRepository->findWithoutFail($id);

        if (empty($suratketerangandomisili)) {
            return $this->sendError('Suratketerangandomisili not found');
        }

        $suratketerangandomisili = $this->suratketerangandomisiliRepository->update($input, $id);

        return $this->sendResponse($suratketerangandomisili->toArray(), 'suratketerangandomisili updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/suratketerangandomisilis/{id}",
     *      summary="Remove the specified suratketerangandomisili from storage",
     *      tags={"suratketerangandomisili"},
     *      description="Delete suratketerangandomisili",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketerangandomisili",
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
        /** @var suratketerangandomisili $suratketerangandomisili */
        $suratketerangandomisili = $this->suratketerangandomisiliRepository->findWithoutFail($id);

        if (empty($suratketerangandomisili)) {
            return $this->sendError('Suratketerangandomisili not found');
        }

        $suratketerangandomisili->delete();

        return $this->sendResponse($id, 'Suratketerangandomisili deleted successfully');
    }
}
