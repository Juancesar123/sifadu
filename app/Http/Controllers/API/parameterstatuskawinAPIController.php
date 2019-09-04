<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateparameterstatuskawinAPIRequest;
use App\Http\Requests\API\UpdateparameterstatuskawinAPIRequest;
use App\Models\parameterstatuskawin;
use App\Repositories\parameterstatuskawinRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class parameterstatuskawinController
 * @package App\Http\Controllers\API
 */

class parameterstatuskawinAPIController extends AppBaseController
{
    /** @var  parameterstatuskawinRepository */
    private $parameterstatuskawinRepository;

    public function __construct(parameterstatuskawinRepository $parameterstatuskawinRepo)
    {
        $this->parameterstatuskawinRepository = $parameterstatuskawinRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/parameterstatuskawins",
     *      summary="Get a listing of the parameterstatuskawins.",
     *      tags={"parameterstatuskawin"},
     *      description="Get all parameterstatuskawins",
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
     *                  @SWG\Items(ref="#/definitions/parameterstatuskawin")
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
        $this->parameterstatuskawinRepository->pushCriteria(new RequestCriteria($request));
        $this->parameterstatuskawinRepository->pushCriteria(new LimitOffsetCriteria($request));
        $parameterstatuskawins = $this->parameterstatuskawinRepository->all();

        return $this->sendResponse($parameterstatuskawins->toArray(), 'Parameterstatuskawins retrieved successfully');
    }

    /**
     * @param CreateparameterstatuskawinAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/parameterstatuskawins",
     *      summary="Store a newly created parameterstatuskawin in storage",
     *      tags={"parameterstatuskawin"},
     *      description="Store parameterstatuskawin",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="parameterstatuskawin that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/parameterstatuskawin")
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
     *                  ref="#/definitions/parameterstatuskawin"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateparameterstatuskawinAPIRequest $request)
    {
        $input = $request->all();

        $parameterstatuskawins = $this->parameterstatuskawinRepository->create($input);

        return $this->sendResponse($parameterstatuskawins->toArray(), 'Parameterstatuskawin berhasil ditambahkan');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/parameterstatuskawins/{id}",
     *      summary="Display the specified parameterstatuskawin",
     *      tags={"parameterstatuskawin"},
     *      description="Get parameterstatuskawin",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of parameterstatuskawin",
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
     *                  ref="#/definitions/parameterstatuskawin"
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
        /** @var parameterstatuskawin $parameterstatuskawin */
        $parameterstatuskawin = $this->parameterstatuskawinRepository->findWithoutFail($id);

        if (empty($parameterstatuskawin)) {
            return $this->sendError('Parameterstatuskawin not found');
        }

        return $this->sendResponse($parameterstatuskawin->toArray(), 'Parameterstatuskawin retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateparameterstatuskawinAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/parameterstatuskawins/{id}",
     *      summary="Update the specified parameterstatuskawin in storage",
     *      tags={"parameterstatuskawin"},
     *      description="Update parameterstatuskawin",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of parameterstatuskawin",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="parameterstatuskawin that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/parameterstatuskawin")
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
     *                  ref="#/definitions/parameterstatuskawin"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateparameterstatuskawinAPIRequest $request)
    {
        $input = $request->all();

        /** @var parameterstatuskawin $parameterstatuskawin */
        $parameterstatuskawin = $this->parameterstatuskawinRepository->findWithoutFail($id);

        if (empty($parameterstatuskawin)) {
            return $this->sendError('Parameterstatuskawin not found');
        }

        $parameterstatuskawin = $this->parameterstatuskawinRepository->update($input, $id);

        return $this->sendResponse($parameterstatuskawin->toArray(), 'parameterstatuskawin berhasil diperbarui');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/parameterstatuskawins/{id}",
     *      summary="Remove the specified parameterstatuskawin from storage",
     *      tags={"parameterstatuskawin"},
     *      description="Delete parameterstatuskawin",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of parameterstatuskawin",
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
        /** @var parameterstatuskawin $parameterstatuskawin */
        $parameterstatuskawin = $this->parameterstatuskawinRepository->findWithoutFail($id);

        if (empty($parameterstatuskawin)) {
            return $this->sendError('Parameterstatuskawin not found');
        }

        $parameterstatuskawin->delete();

        return $this->sendResponse($id, 'Parameterstatuskawin deleted successfully');
    }
}
