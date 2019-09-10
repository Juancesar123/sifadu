<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKeteranganPenghasilanAPIRequest;
use App\Http\Requests\API\UpdateKeteranganPenghasilanAPIRequest;
use App\Models\KeteranganPenghasilan;
use App\Repositories\KeteranganPenghasilanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KeteranganPenghasilanController
 * @package App\Http\Controllers\API
 */

class KeteranganPenghasilanAPIController extends AppBaseController
{
    /** @var  KeteranganPenghasilanRepository */
    private $keteranganPenghasilanRepository;

    public function __construct(KeteranganPenghasilanRepository $keteranganPenghasilanRepo)
    {
        $this->keteranganPenghasilanRepository = $keteranganPenghasilanRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/keteranganPenghasilans",
     *      summary="Get a listing of the KeteranganPenghasilans.",
     *      tags={"KeteranganPenghasilan"},
     *      description="Get all KeteranganPenghasilans",
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
     *                  @SWG\Items(ref="#/definitions/KeteranganPenghasilan")
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
        $this->keteranganPenghasilanRepository->pushCriteria(new RequestCriteria($request));
        $this->keteranganPenghasilanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $keteranganPenghasilans = $this->keteranganPenghasilanRepository->all();

        return $this->sendResponse($keteranganPenghasilans->toArray(), 'Keterangan Penghasilans retrieved successfully');
    }

    /**
     * @param CreateKeteranganPenghasilanAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/keteranganPenghasilans",
     *      summary="Store a newly created KeteranganPenghasilan in storage",
     *      tags={"KeteranganPenghasilan"},
     *      description="Store KeteranganPenghasilan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="KeteranganPenghasilan that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/KeteranganPenghasilan")
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
     *                  ref="#/definitions/KeteranganPenghasilan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateKeteranganPenghasilanAPIRequest $request)
    {
        $input = $request->all();

        $keteranganPenghasilans = $this->keteranganPenghasilanRepository->create($input);

        return $this->sendResponse($keteranganPenghasilans->toArray(), 'Keterangan Penghasilan saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/keteranganPenghasilans/{id}",
     *      summary="Display the specified KeteranganPenghasilan",
     *      tags={"KeteranganPenghasilan"},
     *      description="Get KeteranganPenghasilan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of KeteranganPenghasilan",
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
     *                  ref="#/definitions/KeteranganPenghasilan"
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
        /** @var KeteranganPenghasilan $keteranganPenghasilan */
        $keteranganPenghasilan = $this->keteranganPenghasilanRepository->findWithoutFail($id);

        if (empty($keteranganPenghasilan)) {
            return $this->sendError('Keterangan Penghasilan not found');
        }

        return $this->sendResponse($keteranganPenghasilan->toArray(), 'Keterangan Penghasilan retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateKeteranganPenghasilanAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/keteranganPenghasilans/{id}",
     *      summary="Update the specified KeteranganPenghasilan in storage",
     *      tags={"KeteranganPenghasilan"},
     *      description="Update KeteranganPenghasilan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of KeteranganPenghasilan",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="KeteranganPenghasilan that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/KeteranganPenghasilan")
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
     *                  ref="#/definitions/KeteranganPenghasilan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateKeteranganPenghasilanAPIRequest $request)
    {
        $input = $request->all();

        /** @var KeteranganPenghasilan $keteranganPenghasilan */
        $keteranganPenghasilan = $this->keteranganPenghasilanRepository->findWithoutFail($id);

        if (empty($keteranganPenghasilan)) {
            return $this->sendError('Keterangan Penghasilan not found');
        }

        $keteranganPenghasilan = $this->keteranganPenghasilanRepository->update($input, $id);

        return $this->sendResponse($keteranganPenghasilan->toArray(), 'KeteranganPenghasilan updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/keteranganPenghasilans/{id}",
     *      summary="Remove the specified KeteranganPenghasilan from storage",
     *      tags={"KeteranganPenghasilan"},
     *      description="Delete KeteranganPenghasilan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of KeteranganPenghasilan",
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
        /** @var KeteranganPenghasilan $keteranganPenghasilan */
        $keteranganPenghasilan = $this->keteranganPenghasilanRepository->findWithoutFail($id);

        if (empty($keteranganPenghasilan)) {
            return $this->sendError('Keterangan Penghasilan not found');
        }

        $keteranganPenghasilan->delete();

        return $this->sendResponse($id, 'Keterangan Penghasilan deleted successfully');
    }
}
