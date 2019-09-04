<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesuratpengantarkkAPIRequest;
use App\Http\Requests\API\UpdatesuratpengantarkkAPIRequest;
use App\Models\suratpengantarkk;
use App\Repositories\suratpengantarkkRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class suratpengantarkkController
 * @package App\Http\Controllers\API
 */

class suratpengantarkkAPIController extends AppBaseController
{
    /** @var  suratpengantarkkRepository */
    private $suratpengantarkkRepository;

    public function __construct(suratpengantarkkRepository $suratpengantarkkRepo)
    {
        $this->suratpengantarkkRepository = $suratpengantarkkRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratpengantarkks",
     *      summary="Get a listing of the suratpengantarkks.",
     *      tags={"suratpengantarkk"},
     *      description="Get all suratpengantarkks",
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
     *                  @SWG\Items(ref="#/definitions/suratpengantarkk")
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
        $this->suratpengantarkkRepository->pushCriteria(new RequestCriteria($request));
        $this->suratpengantarkkRepository->pushCriteria(new LimitOffsetCriteria($request));
        $suratpengantarkks = $this->suratpengantarkkRepository->all();

        return $this->sendResponse($suratpengantarkks->toArray(), 'Suratpengantarkks retrieved successfully');
    }

    /**
     * @param CreatesuratpengantarkkAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/suratpengantarkks",
     *      summary="Store a newly created suratpengantarkk in storage",
     *      tags={"suratpengantarkk"},
     *      description="Store suratpengantarkk",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratpengantarkk that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratpengantarkk")
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
     *                  ref="#/definitions/suratpengantarkk"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesuratpengantarkkAPIRequest $request)
    {
        $input = $request->all();

        $suratpengantarkks = $this->suratpengantarkkRepository->create($input);

        return $this->sendResponse($suratpengantarkks->toArray(), 'Suratpengantarkk saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratpengantarkks/{id}",
     *      summary="Display the specified suratpengantarkk",
     *      tags={"suratpengantarkk"},
     *      description="Get suratpengantarkk",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratpengantarkk",
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
     *                  ref="#/definitions/suratpengantarkk"
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
        /** @var suratpengantarkk $suratpengantarkk */
        $suratpengantarkk = $this->suratpengantarkkRepository->findWithoutFail($id);

        if (empty($suratpengantarkk)) {
            return $this->sendError('Suratpengantarkk not found');
        }

        return $this->sendResponse($suratpengantarkk->toArray(), 'Suratpengantarkk retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesuratpengantarkkAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/suratpengantarkks/{id}",
     *      summary="Update the specified suratpengantarkk in storage",
     *      tags={"suratpengantarkk"},
     *      description="Update suratpengantarkk",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratpengantarkk",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratpengantarkk that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratpengantarkk")
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
     *                  ref="#/definitions/suratpengantarkk"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesuratpengantarkkAPIRequest $request)
    {
        $input = $request->all();

        /** @var suratpengantarkk $suratpengantarkk */
        $suratpengantarkk = $this->suratpengantarkkRepository->findWithoutFail($id);

        if (empty($suratpengantarkk)) {
            return $this->sendError('Suratpengantarkk not found');
        }

        $suratpengantarkk = $this->suratpengantarkkRepository->update($input, $id);

        return $this->sendResponse($suratpengantarkk->toArray(), 'suratpengantarkk updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/suratpengantarkks/{id}",
     *      summary="Remove the specified suratpengantarkk from storage",
     *      tags={"suratpengantarkk"},
     *      description="Delete suratpengantarkk",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratpengantarkk",
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
        /** @var suratpengantarkk $suratpengantarkk */
        $suratpengantarkk = $this->suratpengantarkkRepository->findWithoutFail($id);

        if (empty($suratpengantarkk)) {
            return $this->sendError('Suratpengantarkk not found');
        }

        $suratpengantarkk->delete();

        return $this->sendResponse($id, 'Suratpengantarkk deleted successfully');
    }
}
