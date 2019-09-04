<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatekaderpembangunanAPIRequest;
use App\Http\Requests\API\UpdatekaderpembangunanAPIRequest;
use App\Models\kaderpembangunan;
use App\Repositories\kaderpembangunanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class kaderpembangunanController
 * @package App\Http\Controllers\API
 */

class kaderpembangunanAPIController extends AppBaseController
{
    /** @var  kaderpembangunanRepository */
    private $kaderpembangunanRepository;

    public function __construct(kaderpembangunanRepository $kaderpembangunanRepo)
    {
        $this->kaderpembangunanRepository = $kaderpembangunanRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/kaderpembangunans",
     *      summary="Get a listing of the kaderpembangunans.",
     *      tags={"kaderpembangunan"},
     *      description="Get all kaderpembangunans",
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
     *                  @SWG\Items(ref="#/definitions/kaderpembangunan")
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
        $this->kaderpembangunanRepository->pushCriteria(new RequestCriteria($request));
        $this->kaderpembangunanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kaderpembangunans = $this->kaderpembangunanRepository->all();

        return $this->sendResponse($kaderpembangunans->toArray(), 'Kaderpembangunans retrieved successfully');
    }

    /**
     * @param CreatekaderpembangunanAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/kaderpembangunans",
     *      summary="Store a newly created kaderpembangunan in storage",
     *      tags={"kaderpembangunan"},
     *      description="Store kaderpembangunan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="kaderpembangunan that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/kaderpembangunan")
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
     *                  ref="#/definitions/kaderpembangunan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatekaderpembangunanAPIRequest $request)
    {
        $input = $request->all();

        $kaderpembangunans = $this->kaderpembangunanRepository->create($input);

        return $this->sendResponse($kaderpembangunans->toArray(), 'Kaderpembangunan berhasil ditambahkan');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/kaderpembangunans/{id}",
     *      summary="Display the specified kaderpembangunan",
     *      tags={"kaderpembangunan"},
     *      description="Get kaderpembangunan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of kaderpembangunan",
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
     *                  ref="#/definitions/kaderpembangunan"
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
        /** @var kaderpembangunan $kaderpembangunan */
        $kaderpembangunan = $this->kaderpembangunanRepository->findWithoutFail($id);

        if (empty($kaderpembangunan)) {
            return $this->sendError('Kaderpembangunan not found');
        }

        return $this->sendResponse($kaderpembangunan->toArray(), 'Kaderpembangunan retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatekaderpembangunanAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/kaderpembangunans/{id}",
     *      summary="Update the specified kaderpembangunan in storage",
     *      tags={"kaderpembangunan"},
     *      description="Update kaderpembangunan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of kaderpembangunan",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="kaderpembangunan that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/kaderpembangunan")
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
     *                  ref="#/definitions/kaderpembangunan"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatekaderpembangunanAPIRequest $request)
    {
        $input = $request->all();

        /** @var kaderpembangunan $kaderpembangunan */
        $kaderpembangunan = $this->kaderpembangunanRepository->findWithoutFail($id);

        if (empty($kaderpembangunan)) {
            return $this->sendError('Kaderpembangunan not found');
        }

        $kaderpembangunan = $this->kaderpembangunanRepository->update($input, $id);

        return $this->sendResponse($kaderpembangunan->toArray(), 'kaderpembangunan berhasil diperbarui');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/kaderpembangunans/{id}",
     *      summary="Remove the specified kaderpembangunan from storage",
     *      tags={"kaderpembangunan"},
     *      description="Delete kaderpembangunan",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of kaderpembangunan",
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
        /** @var kaderpembangunan $kaderpembangunan */
        $kaderpembangunan = $this->kaderpembangunanRepository->findWithoutFail($id);

        if (empty($kaderpembangunan)) {
            return $this->sendError('Kaderpembangunan not found');
        }

        $kaderpembangunan->delete();

        return $this->sendResponse($id, 'Kaderpembangunan deleted successfully');
    }
}
