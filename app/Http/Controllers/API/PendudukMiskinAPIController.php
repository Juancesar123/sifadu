<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePendudukMiskinAPIRequest;
use App\Http\Requests\API\UpdatePendudukMiskinAPIRequest;
use App\Models\PendudukMiskin;
use App\Repositories\PendudukMiskinRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PendudukMiskinController
 * @package App\Http\Controllers\API
 */

class PendudukMiskinAPIController extends AppBaseController
{
    /** @var  PendudukMiskinRepository */
    private $pendudukMiskinRepository;

    public function __construct(PendudukMiskinRepository $pendudukMiskinRepo)
    {
        $this->pendudukMiskinRepository = $pendudukMiskinRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/kemiskinan",
     *      summary="Get a listing of the kemiskinan.",
     *      tags={"PendudukMiskin"},
     *      description="Get all kemiskinan",
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
     *                  @SWG\Items(ref="#/definitions/PendudukMiskin")
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
        $this->pendudukMiskinRepository->pushCriteria(new RequestCriteria($request));
        $this->pendudukMiskinRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kemiskinan = $this->pendudukMiskinRepository->all();

        return $this->sendResponse($kemiskinan->toArray(), 'Penduduk Miskins retrieved successfully');
    }

    /**
     * @param CreatePendudukMiskinAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/kemiskinan",
     *      summary="Store a newly created PendudukMiskin in storage",
     *      tags={"PendudukMiskin"},
     *      description="Store PendudukMiskin",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PendudukMiskin that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PendudukMiskin")
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
     *                  ref="#/definitions/PendudukMiskin"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePendudukMiskinAPIRequest $request)
    {
        $input = $request->all();

        $kemiskinan = $this->pendudukMiskinRepository->create($input);

        return $this->sendResponse($kemiskinan->toArray(), 'Penduduk Miskin saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/kemiskinan/{id}",
     *      summary="Display the specified PendudukMiskin",
     *      tags={"PendudukMiskin"},
     *      description="Get PendudukMiskin",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PendudukMiskin",
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
     *                  ref="#/definitions/PendudukMiskin"
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
        /** @var PendudukMiskin $pendudukMiskin */
        $pendudukMiskin = $this->pendudukMiskinRepository->findWithoutFail($id);

        if (empty($pendudukMiskin)) {
            return $this->sendError('Penduduk Miskin not found');
        }

        return $this->sendResponse($pendudukMiskin->toArray(), 'Penduduk Miskin retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePendudukMiskinAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/kemiskinan/{id}",
     *      summary="Update the specified PendudukMiskin in storage",
     *      tags={"PendudukMiskin"},
     *      description="Update PendudukMiskin",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PendudukMiskin",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PendudukMiskin that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PendudukMiskin")
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
     *                  ref="#/definitions/PendudukMiskin"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePendudukMiskinAPIRequest $request)
    {
        $input = $request->all();

        /** @var PendudukMiskin $pendudukMiskin */
        $pendudukMiskin = $this->pendudukMiskinRepository->findWithoutFail($id);

        if (empty($pendudukMiskin)) {
            return $this->sendError('Penduduk Miskin not found');
        }

        $pendudukMiskin = $this->pendudukMiskinRepository->update($input, $id);

        return $this->sendResponse($pendudukMiskin->toArray(), 'PendudukMiskin updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/kemiskinan/{id}",
     *      summary="Remove the specified PendudukMiskin from storage",
     *      tags={"PendudukMiskin"},
     *      description="Delete PendudukMiskin",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PendudukMiskin",
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
        /** @var PendudukMiskin $pendudukMiskin */
        $pendudukMiskin = $this->pendudukMiskinRepository->findWithoutFail($id);

        if (empty($pendudukMiskin)) {
            return $this->sendError('Penduduk Miskin not found');
        }

        $pendudukMiskin->delete();

        return $this->sendResponse($id, 'Penduduk Miskin deleted successfully');
    }
}