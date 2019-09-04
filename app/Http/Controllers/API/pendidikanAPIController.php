<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatependidikanAPIRequest;
use App\Http\Requests\API\UpdatependidikanAPIRequest;
use App\Models\pendidikan;
use App\Repositories\pendidikanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class pendidikanController
 * @package App\Http\Controllers\API
 */

class pendidikanAPIController extends AppBaseController
{
    /** @var  pendidikanRepository */
    private $pendidikanRepository;

    public function __construct(pendidikanRepository $pendidikanRepo)
    {
        $this->pendidikanRepository = $pendidikanRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/pendidikans",
     *      summary="Get a listing of the pendidikans.",
     *      tags={"pendidikan"},
     *      description="Get all pendidikans",
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
     *                  @SWG\Items(ref="#/definitions/pendidikan")
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
        $this->pendidikanRepository->pushCriteria(new RequestCriteria($request));
        $this->pendidikanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pendidikans = $this->pendidikanRepository->all();

        return $this->sendResponse($pendidikans->toArray(), 'Pendidikans retrieved successfully');
    }

    /**
     * @param CreatependidikanAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/pendidikans",
     *      summary="Store a newly created pendidikan in storage",
     *      tags={"pendidikan"},
     *      description="Store pendidikan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="pendidikan that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/pendidikan")
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
     *                  ref="#/definitions/pendidikan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatependidikanAPIRequest $request)
    {
        $input = $request->all();

        $pendidikans = $this->pendidikanRepository->create($input);

        return $this->sendResponse($pendidikans->toArray(), 'Pendidikan saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/pendidikans/{id}",
     *      summary="Display the specified pendidikan",
     *      tags={"pendidikan"},
     *      description="Get pendidikan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pendidikan",
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
     *                  ref="#/definitions/pendidikan"
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
        /** @var pendidikan $pendidikan */
        $pendidikan = $this->pendidikanRepository->findWithoutFail($id);

        if (empty($pendidikan)) {
            return $this->sendError('Pendidikan not found');
        }

        return $this->sendResponse($pendidikan->toArray(), 'Pendidikan retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatependidikanAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/pendidikans/{id}",
     *      summary="Update the specified pendidikan in storage",
     *      tags={"pendidikan"},
     *      description="Update pendidikan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pendidikan",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="pendidikan that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/pendidikan")
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
     *                  ref="#/definitions/pendidikan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatependidikanAPIRequest $request)
    {
        $input = $request->all();

        /** @var pendidikan $pendidikan */
        $pendidikan = $this->pendidikanRepository->findWithoutFail($id);

        if (empty($pendidikan)) {
            return $this->sendError('Pendidikan not found');
        }

        $pendidikan = $this->pendidikanRepository->update($input, $id);

        return $this->sendResponse($pendidikan->toArray(), 'pendidikan updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/pendidikans/{id}",
     *      summary="Remove the specified pendidikan from storage",
     *      tags={"pendidikan"},
     *      description="Delete pendidikan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of pendidikan",
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
        /** @var pendidikan $pendidikan */
        $pendidikan = $this->pendidikanRepository->findWithoutFail($id);

        if (empty($pendidikan)) {
            return $this->sendError('Pendidikan not found');
        }

        $pendidikan->delete();

        return $this->sendResponse($id, 'Pendidikan deleted successfully');
    }
}
