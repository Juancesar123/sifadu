<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesuratketeranganusahaAPIRequest;
use App\Http\Requests\API\UpdatesuratketeranganusahaAPIRequest;
use App\Models\suratketeranganusaha;
use App\Repositories\suratketeranganusahaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class suratketeranganusahaController
 * @package App\Http\Controllers\API
 */

class suratketeranganusahaAPIController extends AppBaseController
{
    /** @var  suratketeranganusahaRepository */
    private $suratketeranganusahaRepository;

    public function __construct(suratketeranganusahaRepository $suratketeranganusahaRepo)
    {
        $this->suratketeranganusahaRepository = $suratketeranganusahaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketeranganusahas",
     *      summary="Get a listing of the suratketeranganusahas.",
     *      tags={"suratketeranganusaha"},
     *      description="Get all suratketeranganusahas",
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
     *                  @SWG\Items(ref="#/definitions/suratketeranganusaha")
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
        $this->suratketeranganusahaRepository->pushCriteria(new RequestCriteria($request));
        $this->suratketeranganusahaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $suratketeranganusahas = $this->suratketeranganusahaRepository->all();

        return $this->sendResponse($suratketeranganusahas->toArray(), 'Suratketeranganusahas retrieved successfully');
    }

    /**
     * @param CreatesuratketeranganusahaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/suratketeranganusahas",
     *      summary="Store a newly created suratketeranganusaha in storage",
     *      tags={"suratketeranganusaha"},
     *      description="Store suratketeranganusaha",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketeranganusaha that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketeranganusaha")
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
     *                  ref="#/definitions/suratketeranganusaha"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesuratketeranganusahaAPIRequest $request)
    {
        $input = $request->all();

        $suratketeranganusahas = $this->suratketeranganusahaRepository->create($input);

        return $this->sendResponse($suratketeranganusahas->toArray(), 'Suratketeranganusaha berhasil ditambahkan');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketeranganusahas/{id}",
     *      summary="Display the specified suratketeranganusaha",
     *      tags={"suratketeranganusaha"},
     *      description="Get suratketeranganusaha",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketeranganusaha",
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
     *                  ref="#/definitions/suratketeranganusaha"
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
        /** @var suratketeranganusaha $suratketeranganusaha */
        $suratketeranganusaha = $this->suratketeranganusahaRepository->findWithoutFail($id);

        if (empty($suratketeranganusaha)) {
            return $this->sendError('Suratketeranganusaha not found');
        }

        return $this->sendResponse($suratketeranganusaha->toArray(), 'Suratketeranganusaha retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesuratketeranganusahaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/suratketeranganusahas/{id}",
     *      summary="Update the specified suratketeranganusaha in storage",
     *      tags={"suratketeranganusaha"},
     *      description="Update suratketeranganusaha",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketeranganusaha",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketeranganusaha that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketeranganusaha")
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
     *                  ref="#/definitions/suratketeranganusaha"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesuratketeranganusahaAPIRequest $request)
    {
        $input = $request->all();

        /** @var suratketeranganusaha $suratketeranganusaha */
        $suratketeranganusaha = $this->suratketeranganusahaRepository->findWithoutFail($id);

        if (empty($suratketeranganusaha)) {
            return $this->sendError('Suratketeranganusaha not found');
        }

        $suratketeranganusaha = $this->suratketeranganusahaRepository->update($input, $id);

        return $this->sendResponse($suratketeranganusaha->toArray(), 'suratketeranganusaha berhasil diperbarui');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/suratketeranganusahas/{id}",
     *      summary="Remove the specified suratketeranganusaha from storage",
     *      tags={"suratketeranganusaha"},
     *      description="Delete suratketeranganusaha",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketeranganusaha",
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
        /** @var suratketeranganusaha $suratketeranganusaha */
        $suratketeranganusaha = $this->suratketeranganusahaRepository->findWithoutFail($id);

        if (empty($suratketeranganusaha)) {
            return $this->sendError('Suratketeranganusaha not found');
        }

        $suratketeranganusaha->delete();

        return $this->sendResponse($id, 'Suratketeranganusaha deleted successfully');
    }
}
