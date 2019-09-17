<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParameterIndikatorKemiskinanAPIRequest;
use App\Http\Requests\API\UpdateParameterIndikatorKemiskinanAPIRequest;
use App\Models\ParameterIndikatorKemiskinan;
use App\Repositories\ParameterIndikatorKemiskinanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ParameterIndikatorKemiskinanController
 * @package App\Http\Controllers\API
 */

class ParameterIndikatorKemiskinanAPIController extends AppBaseController
{
    /** @var  ParameterIndikatorKemiskinanRepository */
    private $parameterIndikatorKemiskinanRepository;

    public function __construct(ParameterIndikatorKemiskinanRepository $parameterIndikatorKemiskinanRepo)
    {
        $this->parameterIndikatorKemiskinanRepository = $parameterIndikatorKemiskinanRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/parameterIndikatorKemiskinans",
     *      summary="Get a listing of the ParameterIndikatorKemiskinans.",
     *      tags={"ParameterIndikatorKemiskinan"},
     *      description="Get all ParameterIndikatorKemiskinans",
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
     *                  @SWG\Items(ref="#/definitions/ParameterIndikatorKemiskinan")
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
        $this->parameterIndikatorKemiskinanRepository->pushCriteria(new RequestCriteria($request));
        $this->parameterIndikatorKemiskinanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $parameterIndikatorKemiskinans = $this->parameterIndikatorKemiskinanRepository->all();

        return $this->sendResponse($parameterIndikatorKemiskinans->toArray(), 'Parameter Indikator Kemiskinans retrieved successfully');
    }

    /**
     * @param CreateParameterIndikatorKemiskinanAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/parameterIndikatorKemiskinans",
     *      summary="Store a newly created ParameterIndikatorKemiskinan in storage",
     *      tags={"ParameterIndikatorKemiskinan"},
     *      description="Store ParameterIndikatorKemiskinan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ParameterIndikatorKemiskinan that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ParameterIndikatorKemiskinan")
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
     *                  ref="#/definitions/ParameterIndikatorKemiskinan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateParameterIndikatorKemiskinanAPIRequest $request)
    {
        $input = $request->all();

        $parameterIndikatorKemiskinans = $this->parameterIndikatorKemiskinanRepository->create($input);

        return $this->sendResponse($parameterIndikatorKemiskinans->toArray(), 'Parameter Indikator Kemiskinan saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/parameterIndikatorKemiskinans/{id}",
     *      summary="Display the specified ParameterIndikatorKemiskinan",
     *      tags={"ParameterIndikatorKemiskinan"},
     *      description="Get ParameterIndikatorKemiskinan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ParameterIndikatorKemiskinan",
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
     *                  ref="#/definitions/ParameterIndikatorKemiskinan"
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
        /** @var ParameterIndikatorKemiskinan $parameterIndikatorKemiskinan */
        $parameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepository->findWithoutFail($id);

        if (empty($parameterIndikatorKemiskinan)) {
            return $this->sendError('Parameter Indikator Kemiskinan not found');
        }

        return $this->sendResponse($parameterIndikatorKemiskinan->toArray(), 'Parameter Indikator Kemiskinan retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateParameterIndikatorKemiskinanAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/parameterIndikatorKemiskinans/{id}",
     *      summary="Update the specified ParameterIndikatorKemiskinan in storage",
     *      tags={"ParameterIndikatorKemiskinan"},
     *      description="Update ParameterIndikatorKemiskinan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ParameterIndikatorKemiskinan",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ParameterIndikatorKemiskinan that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ParameterIndikatorKemiskinan")
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
     *                  ref="#/definitions/ParameterIndikatorKemiskinan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateParameterIndikatorKemiskinanAPIRequest $request)
    {
        $input = $request->all();

        /** @var ParameterIndikatorKemiskinan $parameterIndikatorKemiskinan */
        $parameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepository->findWithoutFail($id);

        if (empty($parameterIndikatorKemiskinan)) {
            return $this->sendError('Parameter Indikator Kemiskinan not found');
        }

        $parameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepository->update($input, $id);

        return $this->sendResponse($parameterIndikatorKemiskinan->toArray(), 'ParameterIndikatorKemiskinan updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/parameterIndikatorKemiskinans/{id}",
     *      summary="Remove the specified ParameterIndikatorKemiskinan from storage",
     *      tags={"ParameterIndikatorKemiskinan"},
     *      description="Delete ParameterIndikatorKemiskinan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ParameterIndikatorKemiskinan",
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
        /** @var ParameterIndikatorKemiskinan $parameterIndikatorKemiskinan */
        $parameterIndikatorKemiskinan = $this->parameterIndikatorKemiskinanRepository->findWithoutFail($id);

        if (empty($parameterIndikatorKemiskinan)) {
            return $this->sendError('Parameter Indikator Kemiskinan not found');
        }

        $parameterIndikatorKemiskinan->delete();

        return $this->sendResponse($id, 'Parameter Indikator Kemiskinan deleted successfully');
    }
}
