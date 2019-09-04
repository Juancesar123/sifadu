<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatekegiatanpembangunanAPIRequest;
use App\Http\Requests\API\UpdatekegiatanpembangunanAPIRequest;
use App\Models\kegiatanpembangunan;
use App\Repositories\kegiatanpembangunanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class kegiatanpembangunanController
 * @package App\Http\Controllers\API
 */

class kegiatanpembangunanAPIController extends AppBaseController
{
    /** @var  kegiatanpembangunanRepository */
    private $kegiatanpembangunanRepository;

    public function __construct(kegiatanpembangunanRepository $kegiatanpembangunanRepo)
    {
        $this->kegiatanpembangunanRepository = $kegiatanpembangunanRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/kegiatanpembangunans",
     *      summary="Get a listing of the kegiatanpembangunans.",
     *      tags={"kegiatanpembangunan"},
     *      description="Get all kegiatanpembangunans",
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
     *                  @SWG\Items(ref="#/definitions/kegiatanpembangunan")
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
        $this->kegiatanpembangunanRepository->pushCriteria(new RequestCriteria($request));
        $this->kegiatanpembangunanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kegiatanpembangunans = $this->kegiatanpembangunanRepository->all();

        return $this->sendResponse($kegiatanpembangunans->toArray(), 'Kegiatanpembangunans retrieved successfully');
    }

    /**
     * @param CreatekegiatanpembangunanAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/kegiatanpembangunans",
     *      summary="Store a newly created kegiatanpembangunan in storage",
     *      tags={"kegiatanpembangunan"},
     *      description="Store kegiatanpembangunan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="kegiatanpembangunan that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/kegiatanpembangunan")
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
     *                  ref="#/definitions/kegiatanpembangunan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatekegiatanpembangunanAPIRequest $request)
    {
        $input = $request->all();

        $kegiatanpembangunans = $this->kegiatanpembangunanRepository->create($input);

        return $this->sendResponse($kegiatanpembangunans->toArray(), 'Kegiatanpembangunan saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/kegiatanpembangunans/{id}",
     *      summary="Display the specified kegiatanpembangunan",
     *      tags={"kegiatanpembangunan"},
     *      description="Get kegiatanpembangunan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of kegiatanpembangunan",
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
     *                  ref="#/definitions/kegiatanpembangunan"
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
        /** @var kegiatanpembangunan $kegiatanpembangunan */
        $kegiatanpembangunan = $this->kegiatanpembangunanRepository->findWithoutFail($id);

        if (empty($kegiatanpembangunan)) {
            return $this->sendError('Kegiatanpembangunan not found');
        }

        return $this->sendResponse($kegiatanpembangunan->toArray(), 'Kegiatanpembangunan retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatekegiatanpembangunanAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/kegiatanpembangunans/{id}",
     *      summary="Update the specified kegiatanpembangunan in storage",
     *      tags={"kegiatanpembangunan"},
     *      description="Update kegiatanpembangunan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of kegiatanpembangunan",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="kegiatanpembangunan that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/kegiatanpembangunan")
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
     *                  ref="#/definitions/kegiatanpembangunan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatekegiatanpembangunanAPIRequest $request)
    {
        $input = $request->all();

        /** @var kegiatanpembangunan $kegiatanpembangunan */
        $kegiatanpembangunan = $this->kegiatanpembangunanRepository->findWithoutFail($id);

        if (empty($kegiatanpembangunan)) {
            return $this->sendError('Kegiatanpembangunan not found');
        }

        $kegiatanpembangunan = $this->kegiatanpembangunanRepository->update($input, $id);

        return $this->sendResponse($kegiatanpembangunan->toArray(), 'kegiatanpembangunan updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/kegiatanpembangunans/{id}",
     *      summary="Remove the specified kegiatanpembangunan from storage",
     *      tags={"kegiatanpembangunan"},
     *      description="Delete kegiatanpembangunan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of kegiatanpembangunan",
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
        /** @var kegiatanpembangunan $kegiatanpembangunan */
        $kegiatanpembangunan = $this->kegiatanpembangunanRepository->findWithoutFail($id);

        if (empty($kegiatanpembangunan)) {
            return $this->sendError('Kegiatanpembangunan not found');
        }

        $kegiatanpembangunan->delete();

        return $this->sendResponse($id, 'Kegiatanpembangunan deleted successfully');
    }
}
