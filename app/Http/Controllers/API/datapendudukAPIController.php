<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedatapendudukAPIRequest;
use App\Http\Requests\API\UpdatedatapendudukAPIRequest;
use App\Models\datapenduduk;
use App\Repositories\datapendudukRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class datapendudukController
 * @package App\Http\Controllers\API
 */

class datapendudukAPIController extends AppBaseController
{
    /** @var  datapendudukRepository */
    private $datapendudukRepository;

    public function __construct(datapendudukRepository $datapendudukRepo)
    {
        $this->datapendudukRepository = $datapendudukRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/datapenduduks",
     *      summary="Get a listing of the datapenduduks.",
     *      tags={"datapenduduk"},
     *      description="Get all datapenduduks",
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
     *                  @SWG\Items(ref="#/definitions/datapenduduk")
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
        $this->datapendudukRepository->pushCriteria(new RequestCriteria($request));
        $this->datapendudukRepository->pushCriteria(new LimitOffsetCriteria($request));
        $datapenduduks = $this->datapendudukRepository->all();

        return $this->sendResponse($datapenduduks->toArray(), 'Datapenduduks retrieved successfully');
    }

    /**
     * @param CreatedatapendudukAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/datapenduduks",
     *      summary="Store a newly created datapenduduk in storage",
     *      tags={"datapenduduk"},
     *      description="Store datapenduduk",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="datapenduduk that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/datapenduduk")
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
     *                  ref="#/definitions/datapenduduk"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatedatapendudukAPIRequest $request)
    {
        $input = $request->all();

        $datapenduduks = $this->datapendudukRepository->create($input);

        return $this->sendResponse($datapenduduks->toArray(), 'Datapenduduk berhasil ditambahkan');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/datapenduduks/{id}",
     *      summary="Display the specified datapenduduk",
     *      tags={"datapenduduk"},
     *      description="Get datapenduduk",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of datapenduduk",
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
     *                  ref="#/definitions/datapenduduk"
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
        /** @var datapenduduk $datapenduduk */
        $datapenduduk = $this->datapendudukRepository->findWithoutFail($id);

        if (empty($datapenduduk)) {
            return $this->sendError('Datapenduduk not found');
        }

        return $this->sendResponse($datapenduduk->toArray(), 'Datapenduduk retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatedatapendudukAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/datapenduduks/{id}",
     *      summary="Update the specified datapenduduk in storage",
     *      tags={"datapenduduk"},
     *      description="Update datapenduduk",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of datapenduduk",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="datapenduduk that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/datapenduduk")
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
     *                  ref="#/definitions/datapenduduk"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatedatapendudukAPIRequest $request)
    {
        $input = $request->all();

        /** @var datapenduduk $datapenduduk */
        $datapenduduk = $this->datapendudukRepository->findWithoutFail($id);

        if (empty($datapenduduk)) {
            return $this->sendError('Datapenduduk not found');
        }

        $datapenduduk = $this->datapendudukRepository->update($input, $id);

        return $this->sendResponse($datapenduduk->toArray(), 'datapenduduk berhasil diperbarui');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/datapenduduks/{id}",
     *      summary="Remove the specified datapenduduk from storage",
     *      tags={"datapenduduk"},
     *      description="Delete datapenduduk",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of datapenduduk",
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
        /** @var datapenduduk $datapenduduk */
        $datapenduduk = $this->datapendudukRepository->findWithoutFail($id);

        if (empty($datapenduduk)) {
            return $this->sendError('Datapenduduk not found');
        }

        $datapenduduk->delete();

        return $this->sendResponse($id, 'Datapenduduk deleted successfully');
    }
}
