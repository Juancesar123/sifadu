<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateparameterjeniskelaminAPIRequest;
use App\Http\Requests\API\UpdateparameterjeniskelaminAPIRequest;
use App\Models\parameterjeniskelamin;
use App\Repositories\parameterjeniskelaminRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class parameterjeniskelaminController
 * @package App\Http\Controllers\API
 */

class parameterjeniskelaminAPIController extends AppBaseController
{
    /** @var  parameterjeniskelaminRepository */
    private $parameterjeniskelaminRepository;

    public function __construct(parameterjeniskelaminRepository $parameterjeniskelaminRepo)
    {
        $this->parameterjeniskelaminRepository = $parameterjeniskelaminRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/parameterjeniskelamins",
     *      summary="Get a listing of the parameterjeniskelamins.",
     *      tags={"parameterjeniskelamin"},
     *      description="Get all parameterjeniskelamins",
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
     *                  @SWG\Items(ref="#/definitions/parameterjeniskelamin")
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
        $this->parameterjeniskelaminRepository->pushCriteria(new RequestCriteria($request));
        $this->parameterjeniskelaminRepository->pushCriteria(new LimitOffsetCriteria($request));
        $parameterjeniskelamins = $this->parameterjeniskelaminRepository->all();

        return $this->sendResponse($parameterjeniskelamins->toArray(), 'Parameterjeniskelamins retrieved successfully');
    }

    /**
     * @param CreateparameterjeniskelaminAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/parameterjeniskelamins",
     *      summary="Store a newly created parameterjeniskelamin in storage",
     *      tags={"parameterjeniskelamin"},
     *      description="Store parameterjeniskelamin",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="parameterjeniskelamin that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/parameterjeniskelamin")
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
     *                  ref="#/definitions/parameterjeniskelamin"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateparameterjeniskelaminAPIRequest $request)
    {
        $input = $request->all();

        $parameterjeniskelamins = $this->parameterjeniskelaminRepository->create($input);

        return $this->sendResponse($parameterjeniskelamins->toArray(), 'Parameterjeniskelamin saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/parameterjeniskelamins/{id}",
     *      summary="Display the specified parameterjeniskelamin",
     *      tags={"parameterjeniskelamin"},
     *      description="Get parameterjeniskelamin",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of parameterjeniskelamin",
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
     *                  ref="#/definitions/parameterjeniskelamin"
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
        /** @var parameterjeniskelamin $parameterjeniskelamin */
        $parameterjeniskelamin = $this->parameterjeniskelaminRepository->findWithoutFail($id);

        if (empty($parameterjeniskelamin)) {
            return $this->sendError('Parameterjeniskelamin not found');
        }

        return $this->sendResponse($parameterjeniskelamin->toArray(), 'Parameterjeniskelamin retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateparameterjeniskelaminAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/parameterjeniskelamins/{id}",
     *      summary="Update the specified parameterjeniskelamin in storage",
     *      tags={"parameterjeniskelamin"},
     *      description="Update parameterjeniskelamin",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of parameterjeniskelamin",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="parameterjeniskelamin that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/parameterjeniskelamin")
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
     *                  ref="#/definitions/parameterjeniskelamin"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateparameterjeniskelaminAPIRequest $request)
    {
        $input = $request->all();

        /** @var parameterjeniskelamin $parameterjeniskelamin */
        $parameterjeniskelamin = $this->parameterjeniskelaminRepository->findWithoutFail($id);

        if (empty($parameterjeniskelamin)) {
            return $this->sendError('Parameterjeniskelamin not found');
        }

        $parameterjeniskelamin = $this->parameterjeniskelaminRepository->update($input, $id);

        return $this->sendResponse($parameterjeniskelamin->toArray(), 'parameterjeniskelamin updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/parameterjeniskelamins/{id}",
     *      summary="Remove the specified parameterjeniskelamin from storage",
     *      tags={"parameterjeniskelamin"},
     *      description="Delete parameterjeniskelamin",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of parameterjeniskelamin",
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
        /** @var parameterjeniskelamin $parameterjeniskelamin */
        $parameterjeniskelamin = $this->parameterjeniskelaminRepository->findWithoutFail($id);

        if (empty($parameterjeniskelamin)) {
            return $this->sendError('Parameterjeniskelamin not found');
        }

        $parameterjeniskelamin->delete();

        return $this->sendResponse($id, 'Parameterjeniskelamin deleted successfully');
    }
}
