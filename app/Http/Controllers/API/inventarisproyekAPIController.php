<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateinventarisproyekAPIRequest;
use App\Http\Requests\API\UpdateinventarisproyekAPIRequest;
use App\Models\inventarisproyek;
use App\Repositories\inventarisproyekRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class inventarisproyekController
 * @package App\Http\Controllers\API
 */

class inventarisproyekAPIController extends AppBaseController
{
    /** @var  inventarisproyekRepository */
    private $inventarisproyekRepository;

    public function __construct(inventarisproyekRepository $inventarisproyekRepo)
    {
        $this->inventarisproyekRepository = $inventarisproyekRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/inventarisproyeks",
     *      summary="Get a listing of the inventarisproyeks.",
     *      tags={"inventarisproyek"},
     *      description="Get all inventarisproyeks",
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
     *                  @SWG\Items(ref="#/definitions/inventarisproyek")
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
        $this->inventarisproyekRepository->pushCriteria(new RequestCriteria($request));
        $this->inventarisproyekRepository->pushCriteria(new LimitOffsetCriteria($request));
        $inventarisproyeks = $this->inventarisproyekRepository->all();

        return $this->sendResponse($inventarisproyeks->toArray(), 'Inventarisproyeks retrieved successfully');
    }

    /**
     * @param CreateinventarisproyekAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/inventarisproyeks",
     *      summary="Store a newly created inventarisproyek in storage",
     *      tags={"inventarisproyek"},
     *      description="Store inventarisproyek",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="inventarisproyek that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/inventarisproyek")
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
     *                  ref="#/definitions/inventarisproyek"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateinventarisproyekAPIRequest $request)
    {
        $input = $request->all();

        $inventarisproyeks = $this->inventarisproyekRepository->create($input);

        return $this->sendResponse($inventarisproyeks->toArray(), 'Inventarisproyek berhasil ditambahkan');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/inventarisproyeks/{id}",
     *      summary="Display the specified inventarisproyek",
     *      tags={"inventarisproyek"},
     *      description="Get inventarisproyek",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of inventarisproyek",
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
     *                  ref="#/definitions/inventarisproyek"
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
        /** @var inventarisproyek $inventarisproyek */
        $inventarisproyek = $this->inventarisproyekRepository->findWithoutFail($id);

        if (empty($inventarisproyek)) {
            return $this->sendError('Inventarisproyek not found');
        }

        return $this->sendResponse($inventarisproyek->toArray(), 'Inventarisproyek retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateinventarisproyekAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/inventarisproyeks/{id}",
     *      summary="Update the specified inventarisproyek in storage",
     *      tags={"inventarisproyek"},
     *      description="Update inventarisproyek",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of inventarisproyek",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="inventarisproyek that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/inventarisproyek")
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
     *                  ref="#/definitions/inventarisproyek"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateinventarisproyekAPIRequest $request)
    {
        $input = $request->all();

        /** @var inventarisproyek $inventarisproyek */
        $inventarisproyek = $this->inventarisproyekRepository->findWithoutFail($id);

        if (empty($inventarisproyek)) {
            return $this->sendError('Inventarisproyek not found');
        }

        $inventarisproyek = $this->inventarisproyekRepository->update($input, $id);

        return $this->sendResponse($inventarisproyek->toArray(), 'inventarisproyek berhasil diperbarui');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/inventarisproyeks/{id}",
     *      summary="Remove the specified inventarisproyek from storage",
     *      tags={"inventarisproyek"},
     *      description="Delete inventarisproyek",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of inventarisproyek",
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
        /** @var inventarisproyek $inventarisproyek */
        $inventarisproyek = $this->inventarisproyekRepository->findWithoutFail($id);

        if (empty($inventarisproyek)) {
            return $this->sendError('Inventarisproyek not found');
        }

        $inventarisproyek->delete();

        return $this->sendResponse($id, 'Inventarisproyek deleted successfully');
    }
}
