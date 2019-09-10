<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKeteranganKelahiranAPIRequest;
use App\Http\Requests\API\UpdateKeteranganKelahiranAPIRequest;
use App\Models\KeteranganKelahiran;
use App\Repositories\KeteranganKelahiranRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KeteranganKelahiranController
 * @package App\Http\Controllers\API
 */

class KeteranganKelahiranAPIController extends AppBaseController
{
    /** @var  KeteranganKelahiranRepository */
    private $keteranganKelahiranRepository;

    public function __construct(KeteranganKelahiranRepository $keteranganKelahiranRepo)
    {
        $this->keteranganKelahiranRepository = $keteranganKelahiranRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/keteranganKelahirans",
     *      summary="Get a listing of the KeteranganKelahirans.",
     *      tags={"KeteranganKelahiran"},
     *      description="Get all KeteranganKelahirans",
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
     *                  @SWG\Items(ref="#/definitions/KeteranganKelahiran")
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
        $this->keteranganKelahiranRepository->pushCriteria(new RequestCriteria($request));
        $this->keteranganKelahiranRepository->pushCriteria(new LimitOffsetCriteria($request));
        $keteranganKelahirans = $this->keteranganKelahiranRepository->all();

        return $this->sendResponse($keteranganKelahirans->toArray(), 'Keterangan Kelahirans retrieved successfully');
    }

    /**
     * @param CreateKeteranganKelahiranAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/keteranganKelahirans",
     *      summary="Store a newly created KeteranganKelahiran in storage",
     *      tags={"KeteranganKelahiran"},
     *      description="Store KeteranganKelahiran",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="KeteranganKelahiran that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/KeteranganKelahiran")
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
     *                  ref="#/definitions/KeteranganKelahiran"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateKeteranganKelahiranAPIRequest $request)
    {
        $input = $request->all();

        $keteranganKelahirans = $this->keteranganKelahiranRepository->create($input);

        return $this->sendResponse($keteranganKelahirans->toArray(), 'Keterangan Kelahiran saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/keteranganKelahirans/{id}",
     *      summary="Display the specified KeteranganKelahiran",
     *      tags={"KeteranganKelahiran"},
     *      description="Get KeteranganKelahiran",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of KeteranganKelahiran",
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
     *                  ref="#/definitions/KeteranganKelahiran"
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
        /** @var KeteranganKelahiran $keteranganKelahiran */
        $keteranganKelahiran = $this->keteranganKelahiranRepository->findWithoutFail($id);

        if (empty($keteranganKelahiran)) {
            return $this->sendError('Keterangan Kelahiran not found');
        }

        return $this->sendResponse($keteranganKelahiran->toArray(), 'Keterangan Kelahiran retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateKeteranganKelahiranAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/keteranganKelahirans/{id}",
     *      summary="Update the specified KeteranganKelahiran in storage",
     *      tags={"KeteranganKelahiran"},
     *      description="Update KeteranganKelahiran",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of KeteranganKelahiran",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="KeteranganKelahiran that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/KeteranganKelahiran")
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
     *                  ref="#/definitions/KeteranganKelahiran"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateKeteranganKelahiranAPIRequest $request)
    {
        $input = $request->all();

        /** @var KeteranganKelahiran $keteranganKelahiran */
        $keteranganKelahiran = $this->keteranganKelahiranRepository->findWithoutFail($id);

        if (empty($keteranganKelahiran)) {
            return $this->sendError('Keterangan Kelahiran not found');
        }

        $keteranganKelahiran = $this->keteranganKelahiranRepository->update($input, $id);

        return $this->sendResponse($keteranganKelahiran->toArray(), 'KeteranganKelahiran updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/keteranganKelahirans/{id}",
     *      summary="Remove the specified KeteranganKelahiran from storage",
     *      tags={"KeteranganKelahiran"},
     *      description="Delete KeteranganKelahiran",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of KeteranganKelahiran",
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
        /** @var KeteranganKelahiran $keteranganKelahiran */
        $keteranganKelahiran = $this->keteranganKelahiranRepository->findWithoutFail($id);

        if (empty($keteranganKelahiran)) {
            return $this->sendError('Keterangan Kelahiran not found');
        }

        $keteranganKelahiran->delete();

        return $this->sendResponse($id, 'Keterangan Kelahiran deleted successfully');
    }
}
