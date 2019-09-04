<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatekegiatanbpdAPIRequest;
use App\Http\Requests\API\UpdatekegiatanbpdAPIRequest;
use App\Models\kegiatanbpd;
use App\Repositories\kegiatanbpdRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class kegiatanbpdController
 * @package App\Http\Controllers\API
 */

class kegiatanbpdAPIController extends AppBaseController
{
    /** @var  kegiatanbpdRepository */
    private $kegiatanbpdRepository;

    public function __construct(kegiatanbpdRepository $kegiatanbpdRepo)
    {
        $this->kegiatanbpdRepository = $kegiatanbpdRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/kegiatanbpds",
     *      summary="Get a listing of the kegiatanbpds.",
     *      tags={"kegiatanbpd"},
     *      description="Get all kegiatanbpds",
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
     *                  @SWG\Items(ref="#/definitions/kegiatanbpd")
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
        $this->kegiatanbpdRepository->pushCriteria(new RequestCriteria($request));
        $this->kegiatanbpdRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kegiatanbpds = $this->kegiatanbpdRepository->all();

        return $this->sendResponse($kegiatanbpds->toArray(), 'Kegiatanbpds retrieved successfully');
    }

    /**
     * @param CreatekegiatanbpdAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/kegiatanbpds",
     *      summary="Store a newly created kegiatanbpd in storage",
     *      tags={"kegiatanbpd"},
     *      description="Store kegiatanbpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="kegiatanbpd that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/kegiatanbpd")
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
     *                  ref="#/definitions/kegiatanbpd"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatekegiatanbpdAPIRequest $request)
    {
        $input = $request->all();

        $kegiatanbpds = $this->kegiatanbpdRepository->create($input);

        return $this->sendResponse($kegiatanbpds->toArray(), 'Kegiatanbpd saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/kegiatanbpds/{id}",
     *      summary="Display the specified kegiatanbpd",
     *      tags={"kegiatanbpd"},
     *      description="Get kegiatanbpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of kegiatanbpd",
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
     *                  ref="#/definitions/kegiatanbpd"
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
        /** @var kegiatanbpd $kegiatanbpd */
        $kegiatanbpd = $this->kegiatanbpdRepository->findWithoutFail($id);

        if (empty($kegiatanbpd)) {
            return $this->sendError('Kegiatanbpd not found');
        }

        return $this->sendResponse($kegiatanbpd->toArray(), 'Kegiatanbpd retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatekegiatanbpdAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/kegiatanbpds/{id}",
     *      summary="Update the specified kegiatanbpd in storage",
     *      tags={"kegiatanbpd"},
     *      description="Update kegiatanbpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of kegiatanbpd",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="kegiatanbpd that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/kegiatanbpd")
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
     *                  ref="#/definitions/kegiatanbpd"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatekegiatanbpdAPIRequest $request)
    {
        $input = $request->all();

        /** @var kegiatanbpd $kegiatanbpd */
        $kegiatanbpd = $this->kegiatanbpdRepository->findWithoutFail($id);

        if (empty($kegiatanbpd)) {
            return $this->sendError('Kegiatanbpd not found');
        }

        $kegiatanbpd = $this->kegiatanbpdRepository->update($input, $id);

        return $this->sendResponse($kegiatanbpd->toArray(), 'kegiatanbpd updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/kegiatanbpds/{id}",
     *      summary="Remove the specified kegiatanbpd from storage",
     *      tags={"kegiatanbpd"},
     *      description="Delete kegiatanbpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of kegiatanbpd",
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
        /** @var kegiatanbpd $kegiatanbpd */
        $kegiatanbpd = $this->kegiatanbpdRepository->findWithoutFail($id);

        if (empty($kegiatanbpd)) {
            return $this->sendError('Kegiatanbpd not found');
        }

        $kegiatanbpd->delete();

        return $this->sendResponse($id, 'Kegiatanbpd deleted successfully');
    }
}
