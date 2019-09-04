<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateanggotabpdAPIRequest;
use App\Http\Requests\API\UpdateanggotabpdAPIRequest;
use App\Models\anggotabpd;
use App\Repositories\anggotabpdRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class anggotabpdController
 * @package App\Http\Controllers\API
 */

class anggotabpdAPIController extends AppBaseController
{
    /** @var  anggotabpdRepository */
    private $anggotabpdRepository;

    public function __construct(anggotabpdRepository $anggotabpdRepo)
    {
        $this->anggotabpdRepository = $anggotabpdRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/anggotabpds",
     *      summary="Get a listing of the anggotabpds.",
     *      tags={"anggotabpd"},
     *      description="Get all anggotabpds",
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
     *                  @SWG\Items(ref="#/definitions/anggotabpd")
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
        $this->anggotabpdRepository->pushCriteria(new RequestCriteria($request));
        $this->anggotabpdRepository->pushCriteria(new LimitOffsetCriteria($request));
        $anggotabpds = $this->anggotabpdRepository->all();

        return $this->sendResponse($anggotabpds->toArray(), 'Anggotabpds retrieved successfully');
    }

    /**
     * @param CreateanggotabpdAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/anggotabpds",
     *      summary="Store a newly created anggotabpd in storage",
     *      tags={"anggotabpd"},
     *      description="Store anggotabpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="anggotabpd that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/anggotabpd")
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
     *                  ref="#/definitions/anggotabpd"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateanggotabpdAPIRequest $request)
    {
        $input = $request->all();

        $anggotabpds = $this->anggotabpdRepository->create($input);

        return $this->sendResponse($anggotabpds->toArray(), 'Anggotabpd saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/anggotabpds/{id}",
     *      summary="Display the specified anggotabpd",
     *      tags={"anggotabpd"},
     *      description="Get anggotabpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of anggotabpd",
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
     *                  ref="#/definitions/anggotabpd"
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
        /** @var anggotabpd $anggotabpd */
        $anggotabpd = $this->anggotabpdRepository->findWithoutFail($id);

        if (empty($anggotabpd)) {
            return $this->sendError('Anggotabpd not found');
        }

        return $this->sendResponse($anggotabpd->toArray(), 'Anggotabpd retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateanggotabpdAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/anggotabpds/{id}",
     *      summary="Update the specified anggotabpd in storage",
     *      tags={"anggotabpd"},
     *      description="Update anggotabpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of anggotabpd",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="anggotabpd that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/anggotabpd")
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
     *                  ref="#/definitions/anggotabpd"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateanggotabpdAPIRequest $request)
    {
        $input = $request->all();

        /** @var anggotabpd $anggotabpd */
        $anggotabpd = $this->anggotabpdRepository->findWithoutFail($id);

        if (empty($anggotabpd)) {
            return $this->sendError('Anggotabpd not found');
        }

        $anggotabpd = $this->anggotabpdRepository->update($input, $id);

        return $this->sendResponse($anggotabpd->toArray(), 'anggotabpd updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/anggotabpds/{id}",
     *      summary="Remove the specified anggotabpd from storage",
     *      tags={"anggotabpd"},
     *      description="Delete anggotabpd",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of anggotabpd",
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
        /** @var anggotabpd $anggotabpd */
        $anggotabpd = $this->anggotabpdRepository->findWithoutFail($id);

        if (empty($anggotabpd)) {
            return $this->sendError('Anggotabpd not found');
        }

        $anggotabpd->delete();

        return $this->sendResponse($id, 'Anggotabpd deleted successfully');
    }
}
