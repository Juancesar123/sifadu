<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatependudukmeninggalAPIRequest;
use App\Http\Requests\API\UpdatependudukmeninggalAPIRequest;
use App\Models\pendudukmeninggal;
use App\Repositories\pendudukmeninggalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class pendudukmeninggalController
 * @package App\Http\Controllers\API
 */

class pendudukmeninggalAPIController extends AppBaseController
{
    /** @var  pendudukmeninggalRepository */
    private $pendudukmeninggalRepository;

    public function __construct(pendudukmeninggalRepository $pendudukmeninggalRepo)
    {
        $this->pendudukmeninggalRepository = $pendudukmeninggalRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/pendudukmeninggals",
     *      summary="Get a listing of the pendudukmeninggals.",
     *      tags={"pendudukmeninggal"},
     *      description="Get all pendudukmeninggals",
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
     *                  @SWG\Items(ref="#/definitions/pendudukmeninggal")
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
        $this->pendudukmeninggalRepository->pushCriteria(new RequestCriteria($request));
        $this->pendudukmeninggalRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pendudukmeninggals = $this->pendudukmeninggalRepository->all();

        return $this->sendResponse($pendudukmeninggals->toArray(), 'Pendudukmeninggals retrieved successfully');
    }

    /**
     * @param CreatependudukmeninggalAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/pendudukmeninggals",
     *      summary="Store a newly created pendudukmeninggal in storage",
     *      tags={"pendudukmeninggal"},
     *      description="Store pendudukmeninggal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="pendudukmeninggal that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/pendudukmeninggal")
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
     *                  ref="#/definitions/pendudukmeninggal"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatependudukmeninggalAPIRequest $request)
    {
        $input = $request->all();

        $pendudukmeninggals = $this->pendudukmeninggalRepository->create($input);

        return $this->sendResponse($pendudukmeninggals->toArray(), 'Pendudukmeninggal berhasil ditambahkan');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/pendudukmeninggals/{id}",
     *      summary="Display the specified pendudukmeninggal",
     *      tags={"pendudukmeninggal"},
     *      description="Get pendudukmeninggal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pendudukmeninggal",
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
     *                  ref="#/definitions/pendudukmeninggal"
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
        /** @var pendudukmeninggal $pendudukmeninggal */
        $pendudukmeninggal = $this->pendudukmeninggalRepository->findWithoutFail($id);

        if (empty($pendudukmeninggal)) {
            return $this->sendError('Pendudukmeninggal not found');
        }

        return $this->sendResponse($pendudukmeninggal->toArray(), 'Pendudukmeninggal retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatependudukmeninggalAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/pendudukmeninggals/{id}",
     *      summary="Update the specified pendudukmeninggal in storage",
     *      tags={"pendudukmeninggal"},
     *      description="Update pendudukmeninggal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pendudukmeninggal",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="pendudukmeninggal that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/pendudukmeninggal")
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
     *                  ref="#/definitions/pendudukmeninggal"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatependudukmeninggalAPIRequest $request)
    {
        $input = $request->all();

        /** @var pendudukmeninggal $pendudukmeninggal */
        $pendudukmeninggal = $this->pendudukmeninggalRepository->findWithoutFail($id);

        if (empty($pendudukmeninggal)) {
            return $this->sendError('Pendudukmeninggal not found');
        }

        $pendudukmeninggal = $this->pendudukmeninggalRepository->update($input, $id);

        return $this->sendResponse($pendudukmeninggal->toArray(), 'pendudukmeninggal berhasil diperbarui');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/pendudukmeninggals/{id}",
     *      summary="Remove the specified pendudukmeninggal from storage",
     *      tags={"pendudukmeninggal"},
     *      description="Delete pendudukmeninggal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pendudukmeninggal",
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
        /** @var pendudukmeninggal $pendudukmeninggal */
        $pendudukmeninggal = $this->pendudukmeninggalRepository->findWithoutFail($id);

        if (empty($pendudukmeninggal)) {
            return $this->sendError('Pendudukmeninggal not found');
        }

        $pendudukmeninggal->delete();

        return $this->sendResponse($id, 'Pendudukmeninggal deleted successfully');
    }
}
