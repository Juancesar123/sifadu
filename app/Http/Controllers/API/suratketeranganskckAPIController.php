<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesuratketeranganskckAPIRequest;
use App\Http\Requests\API\UpdatesuratketeranganskckAPIRequest;
use App\Models\suratketeranganskck;
use App\Repositories\suratketeranganskckRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class suratketeranganskckController
 * @package App\Http\Controllers\API
 */

class suratketeranganskckAPIController extends AppBaseController
{
    /** @var  suratketeranganskckRepository */
    private $suratketeranganskckRepository;

    public function __construct(suratketeranganskckRepository $suratketeranganskckRepo)
    {
        $this->suratketeranganskckRepository = $suratketeranganskckRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketeranganskcks",
     *      summary="Get a listing of the suratketeranganskcks.",
     *      tags={"suratketeranganskck"},
     *      description="Get all suratketeranganskcks",
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
     *                  @SWG\Items(ref="#/definitions/suratketeranganskck")
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
        $this->suratketeranganskckRepository->pushCriteria(new RequestCriteria($request));
        $this->suratketeranganskckRepository->pushCriteria(new LimitOffsetCriteria($request));
        $suratketeranganskcks = $this->suratketeranganskckRepository->all();

        return $this->sendResponse($suratketeranganskcks->toArray(), 'Suratketeranganskcks retrieved successfully');
    }

    /**
     * @param CreatesuratketeranganskckAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/suratketeranganskcks",
     *      summary="Store a newly created suratketeranganskck in storage",
     *      tags={"suratketeranganskck"},
     *      description="Store suratketeranganskck",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketeranganskck that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketeranganskck")
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
     *                  ref="#/definitions/suratketeranganskck"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesuratketeranganskckAPIRequest $request)
    {
        $input = $request->all();

        $suratketeranganskcks = $this->suratketeranganskckRepository->create($input);

        return $this->sendResponse($suratketeranganskcks->toArray(), 'Suratketeranganskck saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratketeranganskcks/{id}",
     *      summary="Display the specified suratketeranganskck",
     *      tags={"suratketeranganskck"},
     *      description="Get suratketeranganskck",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketeranganskck",
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
     *                  ref="#/definitions/suratketeranganskck"
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
        /** @var suratketeranganskck $suratketeranganskck */
        $suratketeranganskck = $this->suratketeranganskckRepository->findWithoutFail($id);

        if (empty($suratketeranganskck)) {
            return $this->sendError('Suratketeranganskck not found');
        }

        return $this->sendResponse($suratketeranganskck->toArray(), 'Suratketeranganskck retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesuratketeranganskckAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/suratketeranganskcks/{id}",
     *      summary="Update the specified suratketeranganskck in storage",
     *      tags={"suratketeranganskck"},
     *      description="Update suratketeranganskck",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketeranganskck",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratketeranganskck that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratketeranganskck")
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
     *                  ref="#/definitions/suratketeranganskck"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesuratketeranganskckAPIRequest $request)
    {
        $input = $request->all();

        /** @var suratketeranganskck $suratketeranganskck */
        $suratketeranganskck = $this->suratketeranganskckRepository->findWithoutFail($id);

        if (empty($suratketeranganskck)) {
            return $this->sendError('Suratketeranganskck not found');
        }

        $suratketeranganskck = $this->suratketeranganskckRepository->update($input, $id);

        return $this->sendResponse($suratketeranganskck->toArray(), 'suratketeranganskck updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/suratketeranganskcks/{id}",
     *      summary="Remove the specified suratketeranganskck from storage",
     *      tags={"suratketeranganskck"},
     *      description="Delete suratketeranganskck",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratketeranganskck",
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
        /** @var suratketeranganskck $suratketeranganskck */
        $suratketeranganskck = $this->suratketeranganskckRepository->findWithoutFail($id);

        if (empty($suratketeranganskck)) {
            return $this->sendError('Suratketeranganskck not found');
        }

        $suratketeranganskck->delete();

        return $this->sendResponse($id, 'Suratketeranganskck deleted successfully');
    }
}
