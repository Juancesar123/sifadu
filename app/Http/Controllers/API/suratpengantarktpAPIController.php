<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesuratpengantarktpAPIRequest;
use App\Http\Requests\API\UpdatesuratpengantarktpAPIRequest;
use App\Models\suratpengantarktp;
use App\Repositories\suratpengantarktpRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class suratpengantarktpController
 * @package App\Http\Controllers\API
 */

class suratpengantarktpAPIController extends AppBaseController
{
    /** @var  suratpengantarktpRepository */
    private $suratpengantarktpRepository;

    public function __construct(suratpengantarktpRepository $suratpengantarktpRepo)
    {
        $this->suratpengantarktpRepository = $suratpengantarktpRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratpengantarktps",
     *      summary="Get a listing of the suratpengantarktps.",
     *      tags={"suratpengantarktp"},
     *      description="Get all suratpengantarktps",
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
     *                  @SWG\Items(ref="#/definitions/suratpengantarktp")
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
        $this->suratpengantarktpRepository->pushCriteria(new RequestCriteria($request));
        $this->suratpengantarktpRepository->pushCriteria(new LimitOffsetCriteria($request));
        $suratpengantarktps = $this->suratpengantarktpRepository->all();

        return $this->sendResponse($suratpengantarktps->toArray(), 'Suratpengantarktps retrieved successfully');
    }

    /**
     * @param CreatesuratpengantarktpAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/suratpengantarktps",
     *      summary="Store a newly created suratpengantarktp in storage",
     *      tags={"suratpengantarktp"},
     *      description="Store suratpengantarktp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratpengantarktp that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratpengantarktp")
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
     *                  ref="#/definitions/suratpengantarktp"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesuratpengantarktpAPIRequest $request)
    {
        $input = $request->all();

        $suratpengantarktps = $this->suratpengantarktpRepository->create($input);

        return $this->sendResponse($suratpengantarktps->toArray(), 'Suratpengantarktp saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/suratpengantarktps/{id}",
     *      summary="Display the specified suratpengantarktp",
     *      tags={"suratpengantarktp"},
     *      description="Get suratpengantarktp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratpengantarktp",
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
     *                  ref="#/definitions/suratpengantarktp"
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
        /** @var suratpengantarktp $suratpengantarktp */
        $suratpengantarktp = $this->suratpengantarktpRepository->findWithoutFail($id);

        if (empty($suratpengantarktp)) {
            return $this->sendError('Suratpengantarktp not found');
        }

        return $this->sendResponse($suratpengantarktp->toArray(), 'Suratpengantarktp retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesuratpengantarktpAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/suratpengantarktps/{id}",
     *      summary="Update the specified suratpengantarktp in storage",
     *      tags={"suratpengantarktp"},
     *      description="Update suratpengantarktp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratpengantarktp",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="suratpengantarktp that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/suratpengantarktp")
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
     *                  ref="#/definitions/suratpengantarktp"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesuratpengantarktpAPIRequest $request)
    {
        $input = $request->all();

        /** @var suratpengantarktp $suratpengantarktp */
        $suratpengantarktp = $this->suratpengantarktpRepository->findWithoutFail($id);

        if (empty($suratpengantarktp)) {
            return $this->sendError('Suratpengantarktp not found');
        }

        $suratpengantarktp = $this->suratpengantarktpRepository->update($input, $id);

        return $this->sendResponse($suratpengantarktp->toArray(), 'suratpengantarktp updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/suratpengantarktps/{id}",
     *      summary="Remove the specified suratpengantarktp from storage",
     *      tags={"suratpengantarktp"},
     *      description="Delete suratpengantarktp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of suratpengantarktp",
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
        /** @var suratpengantarktp $suratpengantarktp */
        $suratpengantarktp = $this->suratpengantarktpRepository->findWithoutFail($id);

        if (empty($suratpengantarktp)) {
            return $this->sendError('Suratpengantarktp not found');
        }

        $suratpengantarktp->delete();

        return $this->sendResponse($id, 'Suratpengantarktp deleted successfully');
    }
}
