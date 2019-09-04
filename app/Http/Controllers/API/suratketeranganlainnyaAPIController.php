<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesuratketeranganlainnyaAPIRequest;
use App\Http\Requests\API\UpdatesuratketeranganlainnyaAPIRequest;
use App\Models\suratketeranganlainnya;
use App\Repositories\suratketeranganlainnyaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class suratketeranganlainnyaController
 * @package App\Http\Controllers\API
 */

class suratketeranganlainnyaAPIController extends AppBaseController
{
    /** @var  suratketeranganlainnyaRepository */
    private $suratketeranganlainnyaRepository;

    public function __construct(suratketeranganlainnyaRepository $suratketeranganlainnyaRepo)
    {
        $this->suratketeranganlainnyaRepository = $suratketeranganlainnyaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketeranganlainnyas",
     *      summary="Get a listing of the suratketeranganlainnyas.",
     *      tags={"suratketeranganlainnya"},
     *      description="Get all suratketeranganlainnyas",
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
     *                  @SWG\Items(ref="#/definitions/suratketeranganlainnya")
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
        $this->suratketeranganlainnyaRepository->pushCriteria(new RequestCriteria($request));
        $this->suratketeranganlainnyaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $suratketeranganlainnyas = $this->suratketeranganlainnyaRepository->all();

        return $this->sendResponse($suratketeranganlainnyas->toArray(), 'Suratketeranganlainnyas retrieved successfully');
    }

    /**
     * @param CreatesuratketeranganlainnyaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/suratketeranganlainnyas",
     *      summary="Store a newly created suratketeranganlainnya in storage",
     *      tags={"suratketeranganlainnya"},
     *      description="Store suratketeranganlainnya",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketeranganlainnya that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketeranganlainnya")
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
     *                  ref="#/definitions/suratketeranganlainnya"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesuratketeranganlainnyaAPIRequest $request)
    {
        $input = $request->all();

        $suratketeranganlainnyas = $this->suratketeranganlainnyaRepository->create($input);

        return $this->sendResponse($suratketeranganlainnyas->toArray(), 'Suratketeranganlainnya berhasil ditambahkan');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketeranganlainnyas/{id}",
     *      summary="Display the specified suratketeranganlainnya",
     *      tags={"suratketeranganlainnya"},
     *      description="Get suratketeranganlainnya",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketeranganlainnya",
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
     *                  ref="#/definitions/suratketeranganlainnya"
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
        /** @var suratketeranganlainnya $suratketeranganlainnya */
        $suratketeranganlainnya = $this->suratketeranganlainnyaRepository->findWithoutFail($id);

        if (empty($suratketeranganlainnya)) {
            return $this->sendError('Suratketeranganlainnya not found');
        }

        return $this->sendResponse($suratketeranganlainnya->toArray(), 'Suratketeranganlainnya retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesuratketeranganlainnyaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/suratketeranganlainnyas/{id}",
     *      summary="Update the specified suratketeranganlainnya in storage",
     *      tags={"suratketeranganlainnya"},
     *      description="Update suratketeranganlainnya",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketeranganlainnya",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketeranganlainnya that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketeranganlainnya")
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
     *                  ref="#/definitions/suratketeranganlainnya"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesuratketeranganlainnyaAPIRequest $request)
    {
        $input = $request->all();

        /** @var suratketeranganlainnya $suratketeranganlainnya */
        $suratketeranganlainnya = $this->suratketeranganlainnyaRepository->findWithoutFail($id);

        if (empty($suratketeranganlainnya)) {
            return $this->sendError('Suratketeranganlainnya not found');
        }

        $suratketeranganlainnya = $this->suratketeranganlainnyaRepository->update($input, $id);

        return $this->sendResponse($suratketeranganlainnya->toArray(), 'suratketeranganlainnya berhasil diperbarui');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/suratketeranganlainnyas/{id}",
     *      summary="Remove the specified suratketeranganlainnya from storage",
     *      tags={"suratketeranganlainnya"},
     *      description="Delete suratketeranganlainnya",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketeranganlainnya",
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
        /** @var suratketeranganlainnya $suratketeranganlainnya */
        $suratketeranganlainnya = $this->suratketeranganlainnyaRepository->findWithoutFail($id);

        if (empty($suratketeranganlainnya)) {
            return $this->sendError('Suratketeranganlainnya not found');
        }

        $suratketeranganlainnya->delete();

        return $this->sendResponse($id, 'Suratketeranganlainnya deleted successfully');
    }
}
