<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesuratketeranganpenguasaantanahAPIRequest;
use App\Http\Requests\API\UpdatesuratketeranganpenguasaantanahAPIRequest;
use App\Models\suratketeranganpenguasaantanah;
use App\Repositories\suratketeranganpenguasaantanahRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class suratketeranganpenguasaantanahController
 * @package App\Http\Controllers\API
 */

class suratketeranganpenguasaantanahAPIController extends AppBaseController
{
    /** @var  suratketeranganpenguasaantanahRepository */
    private $suratketeranganpenguasaantanahRepository;

    public function __construct(suratketeranganpenguasaantanahRepository $suratketeranganpenguasaantanahRepo)
    {
        $this->suratketeranganpenguasaantanahRepository = $suratketeranganpenguasaantanahRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketeranganpenguasaantanahs",
     *      summary="Get a listing of the suratketeranganpenguasaantanahs.",
     *      tags={"suratketeranganpenguasaantanah"},
     *      description="Get all suratketeranganpenguasaantanahs",
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
     *                  @SWG\Items(ref="#/definitions/suratketeranganpenguasaantanah")
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
        $this->suratketeranganpenguasaantanahRepository->pushCriteria(new RequestCriteria($request));
        $this->suratketeranganpenguasaantanahRepository->pushCriteria(new LimitOffsetCriteria($request));
        $suratketeranganpenguasaantanahs = $this->suratketeranganpenguasaantanahRepository->all();

        return $this->sendResponse($suratketeranganpenguasaantanahs->toArray(), 'Suratketeranganpenguasaantanahs retrieved successfully');
    }

    /**
     * @param CreatesuratketeranganpenguasaantanahAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/suratketeranganpenguasaantanahs",
     *      summary="Store a newly created suratketeranganpenguasaantanah in storage",
     *      tags={"suratketeranganpenguasaantanah"},
     *      description="Store suratketeranganpenguasaantanah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketeranganpenguasaantanah that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketeranganpenguasaantanah")
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
     *                  ref="#/definitions/suratketeranganpenguasaantanah"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesuratketeranganpenguasaantanahAPIRequest $request)
    {
        $input = $request->all();

        $suratketeranganpenguasaantanahs = $this->suratketeranganpenguasaantanahRepository->create($input);

        return $this->sendResponse($suratketeranganpenguasaantanahs->toArray(), 'Suratketeranganpenguasaantanah saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketeranganpenguasaantanahs/{id}",
     *      summary="Display the specified suratketeranganpenguasaantanah",
     *      tags={"suratketeranganpenguasaantanah"},
     *      description="Get suratketeranganpenguasaantanah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketeranganpenguasaantanah",
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
     *                  ref="#/definitions/suratketeranganpenguasaantanah"
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
        /** @var suratketeranganpenguasaantanah $suratketeranganpenguasaantanah */
        $suratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepository->findWithoutFail($id);

        if (empty($suratketeranganpenguasaantanah)) {
            return $this->sendError('Suratketeranganpenguasaantanah not found');
        }

        return $this->sendResponse($suratketeranganpenguasaantanah->toArray(), 'Suratketeranganpenguasaantanah retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesuratketeranganpenguasaantanahAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/suratketeranganpenguasaantanahs/{id}",
     *      summary="Update the specified suratketeranganpenguasaantanah in storage",
     *      tags={"suratketeranganpenguasaantanah"},
     *      description="Update suratketeranganpenguasaantanah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketeranganpenguasaantanah",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketeranganpenguasaantanah that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketeranganpenguasaantanah")
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
     *                  ref="#/definitions/suratketeranganpenguasaantanah"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesuratketeranganpenguasaantanahAPIRequest $request)
    {
        $input = $request->all();

        /** @var suratketeranganpenguasaantanah $suratketeranganpenguasaantanah */
        $suratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepository->findWithoutFail($id);

        if (empty($suratketeranganpenguasaantanah)) {
            return $this->sendError('Suratketeranganpenguasaantanah not found');
        }

        $suratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepository->update($input, $id);

        return $this->sendResponse($suratketeranganpenguasaantanah->toArray(), 'suratketeranganpenguasaantanah updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/suratketeranganpenguasaantanahs/{id}",
     *      summary="Remove the specified suratketeranganpenguasaantanah from storage",
     *      tags={"suratketeranganpenguasaantanah"},
     *      description="Delete suratketeranganpenguasaantanah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketeranganpenguasaantanah",
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
        /** @var suratketeranganpenguasaantanah $suratketeranganpenguasaantanah */
        $suratketeranganpenguasaantanah = $this->suratketeranganpenguasaantanahRepository->findWithoutFail($id);

        if (empty($suratketeranganpenguasaantanah)) {
            return $this->sendError('Suratketeranganpenguasaantanah not found');
        }

        $suratketeranganpenguasaantanah->delete();

        return $this->sendResponse($id, 'Suratketeranganpenguasaantanah deleted successfully');
    }
}
