<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKeteranganMenikahAPIRequest;
use App\Http\Requests\API\UpdateKeteranganMenikahAPIRequest;
use App\Models\KeteranganMenikah;
use App\Repositories\KeteranganMenikahRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KeteranganMenikahController
 * @package App\Http\Controllers\API
 */

class KeteranganMenikahAPIController extends AppBaseController
{
    /** @var  KeteranganMenikahRepository */
    private $keteranganMenikahRepository;

    public function __construct(KeteranganMenikahRepository $keteranganMenikahRepo)
    {
        $this->keteranganMenikahRepository = $keteranganMenikahRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/keteranganMenikahs",
     *      summary="Get a listing of the KeteranganMenikahs.",
     *      tags={"KeteranganMenikah"},
     *      description="Get all KeteranganMenikahs",
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
     *                  @SWG\Items(ref="#/definitions/KeteranganMenikah")
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
        $this->keteranganMenikahRepository->pushCriteria(new RequestCriteria($request));
        $this->keteranganMenikahRepository->pushCriteria(new LimitOffsetCriteria($request));
        $keteranganMenikahs = $this->keteranganMenikahRepository->all();

        return $this->sendResponse($keteranganMenikahs->toArray(), 'Keterangan Menikahs retrieved successfully');
    }

    /**
     * @param CreateKeteranganMenikahAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/keteranganMenikahs",
     *      summary="Store a newly created KeteranganMenikah in storage",
     *      tags={"KeteranganMenikah"},
     *      description="Store KeteranganMenikah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="KeteranganMenikah that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/KeteranganMenikah")
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
     *                  ref="#/definitions/KeteranganMenikah"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateKeteranganMenikahAPIRequest $request)
    {
        $input = $request->all();

        $keteranganMenikahs = $this->keteranganMenikahRepository->create($input);

        return $this->sendResponse($keteranganMenikahs->toArray(), 'Keterangan Menikah saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/keteranganMenikahs/{id}",
     *      summary="Display the specified KeteranganMenikah",
     *      tags={"KeteranganMenikah"},
     *      description="Get KeteranganMenikah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of KeteranganMenikah",
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
     *                  ref="#/definitions/KeteranganMenikah"
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
        /** @var KeteranganMenikah $keteranganMenikah */
        $keteranganMenikah = $this->keteranganMenikahRepository->findWithoutFail($id);

        if (empty($keteranganMenikah)) {
            return $this->sendError('Keterangan Menikah not found');
        }

        return $this->sendResponse($keteranganMenikah->toArray(), 'Keterangan Menikah retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateKeteranganMenikahAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/keteranganMenikahs/{id}",
     *      summary="Update the specified KeteranganMenikah in storage",
     *      tags={"KeteranganMenikah"},
     *      description="Update KeteranganMenikah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of KeteranganMenikah",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="KeteranganMenikah that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/KeteranganMenikah")
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
     *                  ref="#/definitions/KeteranganMenikah"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateKeteranganMenikahAPIRequest $request)
    {
        $input = $request->all();

        /** @var KeteranganMenikah $keteranganMenikah */
        $keteranganMenikah = $this->keteranganMenikahRepository->findWithoutFail($id);

        if (empty($keteranganMenikah)) {
            return $this->sendError('Keterangan Menikah not found');
        }

        $keteranganMenikah = $this->keteranganMenikahRepository->update($input, $id);

        return $this->sendResponse($keteranganMenikah->toArray(), 'KeteranganMenikah updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/keteranganMenikahs/{id}",
     *      summary="Remove the specified KeteranganMenikah from storage",
     *      tags={"KeteranganMenikah"},
     *      description="Delete KeteranganMenikah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of KeteranganMenikah",
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
        /** @var KeteranganMenikah $keteranganMenikah */
        $keteranganMenikah = $this->keteranganMenikahRepository->findWithoutFail($id);

        if (empty($keteranganMenikah)) {
            return $this->sendError('Keterangan Menikah not found');
        }

        $keteranganMenikah->delete();

        return $this->sendResponse($id, 'Keterangan Menikah deleted successfully');
    }
}
