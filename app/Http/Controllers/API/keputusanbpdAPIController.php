<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatekeputusanbpdAPIRequest;
use App\Http\Requests\API\UpdatekeputusanbpdAPIRequest;
use App\Models\keputusanbpd;
use App\Repositories\keputusanbpdRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class keputusanbpdController
 * @package App\Http\Controllers\API
 */

class keputusanbpdAPIController extends AppBaseController
{
    /** @var  keputusanbpdRepository */
    private $keputusanbpdRepository;

    public function __construct(keputusanbpdRepository $keputusanbpdRepo)
    {
        $this->keputusanbpdRepository = $keputusanbpdRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/keputusanbpds",
     *      summary="Get a listing of the keputusanbpds.",
     *      tags={"keputusanbpd"},
     *      description="Get all keputusanbpds",
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
     *                  @SWG\Items(ref="#/definitions/keputusanbpd")
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
        $this->keputusanbpdRepository->pushCriteria(new RequestCriteria($request));
        $this->keputusanbpdRepository->pushCriteria(new LimitOffsetCriteria($request));
        $keputusanbpds = $this->keputusanbpdRepository->all();

        return $this->sendResponse($keputusanbpds->toArray(), 'Keputusanbpds retrieved successfully');
    }

    /**
     * @param CreatekeputusanbpdAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/keputusanbpds",
     *      summary="Store a newly created keputusanbpd in storage",
     *      tags={"keputusanbpd"},
     *      description="Store keputusanbpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="keputusanbpd that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/keputusanbpd")
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
     *                  ref="#/definitions/keputusanbpd"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatekeputusanbpdAPIRequest $request)
    {
        $input = $request->all();

        $keputusanbpds = $this->keputusanbpdRepository->create($input);

        return $this->sendResponse($keputusanbpds->toArray(), 'Keputusanbpd saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/keputusanbpds/{id}",
     *      summary="Display the specified keputusanbpd",
     *      tags={"keputusanbpd"},
     *      description="Get keputusanbpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of keputusanbpd",
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
     *                  ref="#/definitions/keputusanbpd"
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
        /** @var keputusanbpd $keputusanbpd */
        $keputusanbpd = $this->keputusanbpdRepository->findWithoutFail($id);

        if (empty($keputusanbpd)) {
            return $this->sendError('Keputusanbpd not found');
        }

        return $this->sendResponse($keputusanbpd->toArray(), 'Keputusanbpd retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatekeputusanbpdAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/keputusanbpds/{id}",
     *      summary="Update the specified keputusanbpd in storage",
     *      tags={"keputusanbpd"},
     *      description="Update keputusanbpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of keputusanbpd",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="keputusanbpd that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/keputusanbpd")
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
     *                  ref="#/definitions/keputusanbpd"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatekeputusanbpdAPIRequest $request)
    {
        $input = $request->all();

        /** @var keputusanbpd $keputusanbpd */
        $keputusanbpd = $this->keputusanbpdRepository->findWithoutFail($id);

        if (empty($keputusanbpd)) {
            return $this->sendError('Keputusanbpd not found');
        }

        $keputusanbpd = $this->keputusanbpdRepository->update($input, $id);

        return $this->sendResponse($keputusanbpd->toArray(), 'keputusanbpd updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/keputusanbpds/{id}",
     *      summary="Remove the specified keputusanbpd from storage",
     *      tags={"keputusanbpd"},
     *      description="Delete keputusanbpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of keputusanbpd",
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
        /** @var keputusanbpd $keputusanbpd */
        $keputusanbpd = $this->keputusanbpdRepository->findWithoutFail($id);

        if (empty($keputusanbpd)) {
            return $this->sendError('Keputusanbpd not found');
        }

        $keputusanbpd->delete();

        return $this->sendResponse($id, 'Keputusanbpd deleted successfully');
    }
}
