<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKeteranganUsahaBaruAPIRequest;
use App\Http\Requests\API\UpdateKeteranganUsahaBaruAPIRequest;
use App\Models\KeteranganUsahaBaru;
use App\Repositories\KeteranganUsahaBaruRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KeteranganUsahaBaruController
 * @package App\Http\Controllers\API
 */

class KeteranganUsahaBaruAPIController extends AppBaseController
{
    /** @var  KeteranganUsahaBaruRepository */
    private $keteranganUsahaBaruRepository;

    public function __construct(KeteranganUsahaBaruRepository $keteranganUsahaBaruRepo)
    {
        $this->keteranganUsahaBaruRepository = $keteranganUsahaBaruRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/keteranganUsahaBarus",
     *      summary="Get a listing of the KeteranganUsahaBarus.",
     *      tags={"KeteranganUsahaBaru"},
     *      description="Get all KeteranganUsahaBarus",
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
     *                  @SWG\Items(ref="#/definitions/KeteranganUsahaBaru")
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
        $this->keteranganUsahaBaruRepository->pushCriteria(new RequestCriteria($request));
        $this->keteranganUsahaBaruRepository->pushCriteria(new LimitOffsetCriteria($request));
        $keteranganUsahaBarus = $this->keteranganUsahaBaruRepository->all();

        return $this->sendResponse($keteranganUsahaBarus->toArray(), 'Keterangan Usaha Barus retrieved successfully');
    }

    /**
     * @param CreateKeteranganUsahaBaruAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/keteranganUsahaBarus",
     *      summary="Store a newly created KeteranganUsahaBaru in storage",
     *      tags={"KeteranganUsahaBaru"},
     *      description="Store KeteranganUsahaBaru",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="KeteranganUsahaBaru that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/KeteranganUsahaBaru")
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
     *                  ref="#/definitions/KeteranganUsahaBaru"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateKeteranganUsahaBaruAPIRequest $request)
    {
        $input = $request->all();

        $keteranganUsahaBarus = $this->keteranganUsahaBaruRepository->create($input);

        return $this->sendResponse($keteranganUsahaBarus->toArray(), 'Keterangan Usaha Baru saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/keteranganUsahaBarus/{id}",
     *      summary="Display the specified KeteranganUsahaBaru",
     *      tags={"KeteranganUsahaBaru"},
     *      description="Get KeteranganUsahaBaru",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of KeteranganUsahaBaru",
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
     *                  ref="#/definitions/KeteranganUsahaBaru"
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
        /** @var KeteranganUsahaBaru $keteranganUsahaBaru */
        $keteranganUsahaBaru = $this->keteranganUsahaBaruRepository->findWithoutFail($id);

        if (empty($keteranganUsahaBaru)) {
            return $this->sendError('Keterangan Usaha Baru not found');
        }

        return $this->sendResponse($keteranganUsahaBaru->toArray(), 'Keterangan Usaha Baru retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateKeteranganUsahaBaruAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/keteranganUsahaBarus/{id}",
     *      summary="Update the specified KeteranganUsahaBaru in storage",
     *      tags={"KeteranganUsahaBaru"},
     *      description="Update KeteranganUsahaBaru",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of KeteranganUsahaBaru",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="KeteranganUsahaBaru that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/KeteranganUsahaBaru")
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
     *                  ref="#/definitions/KeteranganUsahaBaru"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateKeteranganUsahaBaruAPIRequest $request)
    {
        $input = $request->all();

        /** @var KeteranganUsahaBaru $keteranganUsahaBaru */
        $keteranganUsahaBaru = $this->keteranganUsahaBaruRepository->findWithoutFail($id);

        if (empty($keteranganUsahaBaru)) {
            return $this->sendError('Keterangan Usaha Baru not found');
        }

        $keteranganUsahaBaru = $this->keteranganUsahaBaruRepository->update($input, $id);

        return $this->sendResponse($keteranganUsahaBaru->toArray(), 'KeteranganUsahaBaru updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/keteranganUsahaBarus/{id}",
     *      summary="Remove the specified KeteranganUsahaBaru from storage",
     *      tags={"KeteranganUsahaBaru"},
     *      description="Delete KeteranganUsahaBaru",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of KeteranganUsahaBaru",
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
        /** @var KeteranganUsahaBaru $keteranganUsahaBaru */
        $keteranganUsahaBaru = $this->keteranganUsahaBaruRepository->findWithoutFail($id);

        if (empty($keteranganUsahaBaru)) {
            return $this->sendError('Keterangan Usaha Baru not found');
        }

        $keteranganUsahaBaru->delete();

        return $this->sendResponse($id, 'Keterangan Usaha Baru deleted successfully');
    }
}
