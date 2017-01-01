<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTravelAPIRequest;
use App\Http\Requests\API\UpdateTravelAPIRequest;
use App\Models\Travel;
use App\Repositories\TravelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TravelController
 * @package App\Http\Controllers\API
 */

class TravelAPIController extends AppBaseController
{
    /** @var  TravelRepository */
    private $travelRepository;

    public function __construct(TravelRepository $travelRepo)
    {
        $this->travelRepository = $travelRepo;
    }

    /**
     * Display a listing of the Travel.
     * GET|HEAD /travels
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->travelRepository->pushCriteria(new RequestCriteria($request));
        $this->travelRepository->pushCriteria(new LimitOffsetCriteria($request));
        $travels = $this->travelRepository->all();

        return $this->sendResponse($travels->toArray(), 'Travels retrieved successfully');
    }

    /**
     * Store a newly created Travel in storage.
     * POST /travels
     *
     * @param CreateTravelAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTravelAPIRequest $request)
    {
        $input = $request->all();

        $travels = $this->travelRepository->create($input);

        return $this->sendResponse($travels->toArray(), 'Travel saved successfully');
    }

    /**
     * Display the specified Travel.
     * GET|HEAD /travels/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Travel $travel */
        $travel = $this->travelRepository->findWithoutFail($id);

        if (empty($travel)) {
            return $this->sendError('Travel not found');
        }

        return $this->sendResponse($travel->toArray(), 'Travel retrieved successfully');
    }

    /**
     * Update the specified Travel in storage.
     * PUT/PATCH /travels/{id}
     *
     * @param  int $id
     * @param UpdateTravelAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTravelAPIRequest $request)
    {
        $input = $request->all();

        /** @var Travel $travel */
        $travel = $this->travelRepository->findWithoutFail($id);

        if (empty($travel)) {
            return $this->sendError('Travel not found');
        }

        $travel = $this->travelRepository->update($input, $id);

        return $this->sendResponse($travel->toArray(), 'Travel updated successfully');
    }

    /**
     * Remove the specified Travel from storage.
     * DELETE /travels/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Travel $travel */
        $travel = $this->travelRepository->findWithoutFail($id);

        if (empty($travel)) {
            return $this->sendError('Travel not found');
        }

        $travel->delete();

        return $this->sendResponse($id, 'Travel deleted successfully');
    }
}
