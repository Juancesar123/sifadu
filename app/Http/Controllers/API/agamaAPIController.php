<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateagamaAPIRequest;
use App\Http\Requests\API\UpdateagamaAPIRequest;
use App\Models\agama;
use App\Repositories\agamaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class agamaController
 * @package App\Http\Controllers\API
 */

class agamaAPIController extends AppBaseController
{
    /** @var  agamaRepository */
    private $agamaRepository;

    public function __construct(agamaRepository $agamaRepo)
    {
        $this->agamaRepository = $agamaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/agamas",
     *      summary="Get a listing of the agamas.",
     *      tags={"agama"},
     *      description="Get all agamas",
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
     *                  @SWG\Items(ref="#/definitions/agama")
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
        $this->agamaRepository->pushCriteria(new RequestCriteria($request));
        $this->agamaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $agamas = $this->agamaRepository->all();

        return $this->sendResponse($agamas->toArray(), 'Agamas retrieved successfully');
    }

    /**
     * @param CreateagamaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/agamas",
     *      summary="Store a newly created agama in storage",
     *      tags={"agama"},
     *      description="Store agama",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="agama that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/agama")
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
     *                  ref="#/definitions/agama"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateagamaAPIRequest $request)
    {
        $input = $request->all();

        $agamas = $this->agamaRepository->create($input);

        return $this->sendResponse($agamas->toArray(), 'Agama berhasil ditambahkan');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/agamas/{id}",
     *      summary="Display the specified agama",
     *      tags={"agama"},
     *      description="Get agama",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of agama",
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
     *                  ref="#/definitions/agama"
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
        /** @var agama $agama */
        $agama = $this->agamaRepository->findWithoutFail($id);

        if (empty($agama)) {
            return $this->sendError('Agama not found');
        }

        return $this->sendResponse($agama->toArray(), 'Agama retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateagamaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/agamas/{id}",
     *      summary="Update the specified agama in storage",
     *      tags={"agama"},
     *      description="Update agama",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of agama",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="agama that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/agama")
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
     *                  ref="#/definitions/agama"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateagamaAPIRequest $request)
    {
        $input = $request->all();

        /** @var agama $agama */
        $agama = $this->agamaRepository->findWithoutFail($id);

        if (empty($agama)) {
            return $this->sendError('Agama not found');
        }

        $agama = $this->agamaRepository->update($input, $id);

        return $this->sendResponse($agama->toArray(), 'agama berhasil diperbarui');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/agamas/{id}",
     *      summary="Remove the specified agama from storage",
     *      tags={"agama"},
     *      description="Delete agama",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of agama",
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
        /** @var agama $agama */
        $agama = $this->agamaRepository->findWithoutFail($id);

        if (empty($agama)) {
            return $this->sendError('Agama not found');
        }

        $agama->delete();

        return $this->sendResponse($id, 'Agama deleted successfully');
    }
}
