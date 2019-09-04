<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatejenispekerjaanAPIRequest;
use App\Http\Requests\API\UpdatejenispekerjaanAPIRequest;
use App\Models\jenispekerjaan;
use App\Repositories\jenispekerjaanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class jenispekerjaanController
 * @package App\Http\Controllers\API
 */

class jenispekerjaanAPIController extends AppBaseController
{
    /** @var  jenispekerjaanRepository */
    private $jenispekerjaanRepository;

    public function __construct(jenispekerjaanRepository $jenispekerjaanRepo)
    {
        $this->jenispekerjaanRepository = $jenispekerjaanRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/jenispekerjaans",
     *      summary="Get a listing of the jenispekerjaans.",
     *      tags={"jenispekerjaan"},
     *      description="Get all jenispekerjaans",
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
     *                  @SWG\Items(ref="#/definitions/jenispekerjaan")
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
        $this->jenispekerjaanRepository->pushCriteria(new RequestCriteria($request));
        $this->jenispekerjaanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jenispekerjaans = $this->jenispekerjaanRepository->all();

        return $this->sendResponse($jenispekerjaans->toArray(), 'Jenispekerjaans retrieved successfully');
    }

    /**
     * @param CreatejenispekerjaanAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/jenispekerjaans",
     *      summary="Store a newly created jenispekerjaan in storage",
     *      tags={"jenispekerjaan"},
     *      description="Store jenispekerjaan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="jenispekerjaan that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/jenispekerjaan")
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
     *                  ref="#/definitions/jenispekerjaan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatejenispekerjaanAPIRequest $request)
    {
        $input = $request->all();

        $jenispekerjaans = $this->jenispekerjaanRepository->create($input);

        return $this->sendResponse($jenispekerjaans->toArray(), 'Jenispekerjaan saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/jenispekerjaans/{id}",
     *      summary="Display the specified jenispekerjaan",
     *      tags={"jenispekerjaan"},
     *      description="Get jenispekerjaan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of jenispekerjaan",
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
     *                  ref="#/definitions/jenispekerjaan"
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
        /** @var jenispekerjaan $jenispekerjaan */
        $jenispekerjaan = $this->jenispekerjaanRepository->findWithoutFail($id);

        if (empty($jenispekerjaan)) {
            return $this->sendError('Jenispekerjaan not found');
        }

        return $this->sendResponse($jenispekerjaan->toArray(), 'Jenispekerjaan retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatejenispekerjaanAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/jenispekerjaans/{id}",
     *      summary="Update the specified jenispekerjaan in storage",
     *      tags={"jenispekerjaan"},
     *      description="Update jenispekerjaan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of jenispekerjaan",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="jenispekerjaan that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/jenispekerjaan")
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
     *                  ref="#/definitions/jenispekerjaan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatejenispekerjaanAPIRequest $request)
    {
        $input = $request->all();

        /** @var jenispekerjaan $jenispekerjaan */
        $jenispekerjaan = $this->jenispekerjaanRepository->findWithoutFail($id);

        if (empty($jenispekerjaan)) {
            return $this->sendError('Jenispekerjaan not found');
        }

        $jenispekerjaan = $this->jenispekerjaanRepository->update($input, $id);

        return $this->sendResponse($jenispekerjaan->toArray(), 'jenispekerjaan updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/jenispekerjaans/{id}",
     *      summary="Remove the specified jenispekerjaan from storage",
     *      tags={"jenispekerjaan"},
     *      description="Delete jenispekerjaan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of jenispekerjaan",
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
        /** @var jenispekerjaan $jenispekerjaan */
        $jenispekerjaan = $this->jenispekerjaanRepository->findWithoutFail($id);

        if (empty($jenispekerjaan)) {
            return $this->sendError('Jenispekerjaan not found');
        }

        $jenispekerjaan->delete();

        return $this->sendResponse($id, 'Jenispekerjaan deleted successfully');
    }
}
