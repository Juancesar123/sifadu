<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateagendabpdAPIRequest;
use App\Http\Requests\API\UpdateagendabpdAPIRequest;
use App\Models\agendabpd;
use App\Repositories\agendabpdRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class agendabpdController
 * @package App\Http\Controllers\API
 */

class agendabpdAPIController extends AppBaseController
{
    /** @var  agendabpdRepository */
    private $agendabpdRepository;

    public function __construct(agendabpdRepository $agendabpdRepo)
    {
        $this->agendabpdRepository = $agendabpdRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/agendabpds",
     *      summary="Get a listing of the agendabpds.",
     *      tags={"agendabpd"},
     *      description="Get all agendabpds",
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
     *                  @SWG\Items(ref="#/definitions/agendabpd")
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
        $this->agendabpdRepository->pushCriteria(new RequestCriteria($request));
        $this->agendabpdRepository->pushCriteria(new LimitOffsetCriteria($request));
        $agendabpds = $this->agendabpdRepository->all();

        return $this->sendResponse($agendabpds->toArray(), 'Agendabpds retrieved successfully');
    }

    /**
     * @param CreateagendabpdAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/agendabpds",
     *      summary="Store a newly created agendabpd in storage",
     *      tags={"agendabpd"},
     *      description="Store agendabpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="agendabpd that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/agendabpd")
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
     *                  ref="#/definitions/agendabpd"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateagendabpdAPIRequest $request)
    {
        $input = $request->all();

        $agendabpds = $this->agendabpdRepository->create($input);

        return $this->sendResponse($agendabpds->toArray(), 'Agendabpd berhasil ditambahkan');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/agendabpds/{id}",
     *      summary="Display the specified agendabpd",
     *      tags={"agendabpd"},
     *      description="Get agendabpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of agendabpd",
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
     *                  ref="#/definitions/agendabpd"
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
        /** @var agendabpd $agendabpd */
        $agendabpd = $this->agendabpdRepository->findWithoutFail($id);

        if (empty($agendabpd)) {
            return $this->sendError('Agendabpd not found');
        }

        return $this->sendResponse($agendabpd->toArray(), 'Agendabpd retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateagendabpdAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/agendabpds/{id}",
     *      summary="Update the specified agendabpd in storage",
     *      tags={"agendabpd"},
     *      description="Update agendabpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of agendabpd",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="agendabpd that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/agendabpd")
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
     *                  ref="#/definitions/agendabpd"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateagendabpdAPIRequest $request)
    {
        $input = $request->all();

        /** @var agendabpd $agendabpd */
        $agendabpd = $this->agendabpdRepository->findWithoutFail($id);

        if (empty($agendabpd)) {
            return $this->sendError('Agendabpd not found');
        }

        $agendabpd = $this->agendabpdRepository->update($input, $id);

        return $this->sendResponse($agendabpd->toArray(), 'agendabpd berhasil diperbarui');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/agendabpds/{id}",
     *      summary="Remove the specified agendabpd from storage",
     *      tags={"agendabpd"},
     *      description="Delete agendabpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of agendabpd",
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
        /** @var agendabpd $agendabpd */
        $agendabpd = $this->agendabpdRepository->findWithoutFail($id);

        if (empty($agendabpd)) {
            return $this->sendError('Agendabpd not found');
        }

        $agendabpd->delete();

        return $this->sendResponse($id, 'Agendabpd deleted successfully');
    }
}
