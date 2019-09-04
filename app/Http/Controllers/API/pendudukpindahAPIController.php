<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatependudukpindahAPIRequest;
use App\Http\Requests\API\UpdatependudukpindahAPIRequest;
use App\Models\pendudukpindah;
use App\Repositories\pendudukpindahRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class pendudukpindahController
 * @package App\Http\Controllers\API
 */

class pendudukpindahAPIController extends AppBaseController
{
    /** @var  pendudukpindahRepository */
    private $pendudukpindahRepository;

    public function __construct(pendudukpindahRepository $pendudukpindahRepo)
    {
        $this->pendudukpindahRepository = $pendudukpindahRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/pendudukpindahs",
     *      summary="Get a listing of the pendudukpindahs.",
     *      tags={"pendudukpindah"},
     *      description="Get all pendudukpindahs",
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
     *                  @SWG\Items(ref="#/definitions/pendudukpindah")
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
        $this->pendudukpindahRepository->pushCriteria(new RequestCriteria($request));
        $this->pendudukpindahRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pendudukpindahs = $this->pendudukpindahRepository->all();

        return $this->sendResponse($pendudukpindahs->toArray(), 'Pendudukpindahs retrieved successfully');
    }

    /**
     * @param CreatependudukpindahAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/pendudukpindahs",
     *      summary="Store a newly created pendudukpindah in storage",
     *      tags={"pendudukpindah"},
     *      description="Store pendudukpindah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="pendudukpindah that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/pendudukpindah")
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
     *                  ref="#/definitions/pendudukpindah"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatependudukpindahAPIRequest $request)
    {
        $input = $request->all();

        $pendudukpindahs = $this->pendudukpindahRepository->create($input);

        return $this->sendResponse($pendudukpindahs->toArray(), 'Pendudukpindah saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/pendudukpindahs/{id}",
     *      summary="Display the specified pendudukpindah",
     *      tags={"pendudukpindah"},
     *      description="Get pendudukpindah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pendudukpindah",
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
     *                  ref="#/definitions/pendudukpindah"
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
        /** @var pendudukpindah $pendudukpindah */
        $pendudukpindah = $this->pendudukpindahRepository->findWithoutFail($id);

        if (empty($pendudukpindah)) {
            return $this->sendError('Pendudukpindah not found');
        }

        return $this->sendResponse($pendudukpindah->toArray(), 'Pendudukpindah retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatependudukpindahAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/pendudukpindahs/{id}",
     *      summary="Update the specified pendudukpindah in storage",
     *      tags={"pendudukpindah"},
     *      description="Update pendudukpindah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pendudukpindah",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="pendudukpindah that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/pendudukpindah")
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
     *                  ref="#/definitions/pendudukpindah"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatependudukpindahAPIRequest $request)
    {
        $input = $request->all();

        /** @var pendudukpindah $pendudukpindah */
        $pendudukpindah = $this->pendudukpindahRepository->findWithoutFail($id);

        if (empty($pendudukpindah)) {
            return $this->sendError('Pendudukpindah not found');
        }

        $pendudukpindah = $this->pendudukpindahRepository->update($input, $id);

        return $this->sendResponse($pendudukpindah->toArray(), 'pendudukpindah updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/pendudukpindahs/{id}",
     *      summary="Remove the specified pendudukpindah from storage",
     *      tags={"pendudukpindah"},
     *      description="Delete pendudukpindah",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pendudukpindah",
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
        /** @var pendudukpindah $pendudukpindah */
        $pendudukpindah = $this->pendudukpindahRepository->findWithoutFail($id);

        if (empty($pendudukpindah)) {
            return $this->sendError('Pendudukpindah not found');
        }

        $pendudukpindah->delete();

        return $this->sendResponse($id, 'Pendudukpindah deleted successfully');
    }
}
