<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepajaktanahAPIRequest;
use App\Http\Requests\API\UpdatepajaktanahAPIRequest;
use App\Models\pajaktanah;
use App\Repositories\pajaktanahRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class pajaktanahController
 * @package App\Http\Controllers\API
 */

class pajaktanahAPIController extends AppBaseController
{
    /** @var  pajaktanahRepository */
    private $pajaktanahRepository;

    public function __construct(pajaktanahRepository $pajaktanahRepo)
    {
        $this->pajaktanahRepository = $pajaktanahRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/pajaktanahs",
     *      summary="Get a listing of the pajaktanahs.",
     *      tags={"pajaktanah"},
     *      description="Get all pajaktanahs",
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
     *                  @SWG\Items(ref="#/definitions/pajaktanah")
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
        $this->pajaktanahRepository->pushCriteria(new RequestCriteria($request));
        $this->pajaktanahRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pajaktanahs = $this->pajaktanahRepository->all();

        return $this->sendResponse($pajaktanahs->toArray(), 'Pajaktanahs retrieved successfully');
    }

    /**
     * @param CreatepajaktanahAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/pajaktanahs",
     *      summary="Store a newly created pajaktanah in storage",
     *      tags={"pajaktanah"},
     *      description="Store pajaktanah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="pajaktanah that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/pajaktanah")
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
     *                  ref="#/definitions/pajaktanah"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatepajaktanahAPIRequest $request)
    {
        $input = $request->all();

        $pajaktanahs = $this->pajaktanahRepository->create($input);

        return $this->sendResponse($pajaktanahs->toArray(), 'Pajaktanah saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/pajaktanahs/{id}",
     *      summary="Display the specified pajaktanah",
     *      tags={"pajaktanah"},
     *      description="Get pajaktanah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pajaktanah",
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
     *                  ref="#/definitions/pajaktanah"
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
        /** @var pajaktanah $pajaktanah */
        $pajaktanah = $this->pajaktanahRepository->findWithoutFail($id);

        if (empty($pajaktanah)) {
            return $this->sendError('Pajaktanah not found');
        }

        return $this->sendResponse($pajaktanah->toArray(), 'Pajaktanah retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatepajaktanahAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/pajaktanahs/{id}",
     *      summary="Update the specified pajaktanah in storage",
     *      tags={"pajaktanah"},
     *      description="Update pajaktanah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pajaktanah",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="pajaktanah that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/pajaktanah")
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
     *                  ref="#/definitions/pajaktanah"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatepajaktanahAPIRequest $request)
    {
        $input = $request->all();

        /** @var pajaktanah $pajaktanah */
        $pajaktanah = $this->pajaktanahRepository->findWithoutFail($id);

        if (empty($pajaktanah)) {
            return $this->sendError('Pajaktanah not found');
        }

        $pajaktanah = $this->pajaktanahRepository->update($input, $id);

        return $this->sendResponse($pajaktanah->toArray(), 'pajaktanah updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/pajaktanahs/{id}",
     *      summary="Remove the specified pajaktanah from storage",
     *      tags={"pajaktanah"},
     *      description="Delete pajaktanah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pajaktanah",
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
        /** @var pajaktanah $pajaktanah */
        $pajaktanah = $this->pajaktanahRepository->findWithoutFail($id);

        if (empty($pajaktanah)) {
            return $this->sendError('Pajaktanah not found');
        }

        $pajaktanah->delete();

        return $this->sendResponse($id, 'Pajaktanah deleted successfully');
    }
}
