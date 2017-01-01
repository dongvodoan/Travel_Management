<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateItineraryAPIRequest;
use App\Http\Requests\API\UpdateItineraryAPIRequest;
use App\Models\Itinerary;
use App\Repositories\ItineraryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ItineraryController
 * @package App\Http\Controllers\API
 */

class ItineraryAPIController extends AppBaseController
{
    /** @var  ItineraryRepository */
    private $itineraryRepository;

    public function __construct(ItineraryRepository $itineraryRepo)
    {
        $this->itineraryRepository = $itineraryRepo;
    }

    /**
     * Display a listing of the Itinerary.
     * GET|HEAD /itineraries
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->itineraryRepository->pushCriteria(new RequestCriteria($request));
        $this->itineraryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $itineraries = $this->itineraryRepository->all();

        return $this->sendResponse($itineraries->toArray(), 'Itineraries retrieved successfully');
    }

    /**
     * Store a newly created Itinerary in storage.
     * POST /itineraries
     *
     * @param CreateItineraryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateItineraryAPIRequest $request)
    {
        $input = $request->all();

        $itineraries = $this->itineraryRepository->create($input);

        return $this->sendResponse($itineraries->toArray(), 'Itinerary saved successfully');
    }

    /**
     * Display the specified Itinerary.
     * GET|HEAD /itineraries/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Itinerary $itinerary */
        $itinerary = $this->itineraryRepository->findWithoutFail($id);

        if (empty($itinerary)) {
            return $this->sendError('Itinerary not found');
        }

        return $this->sendResponse($itinerary->toArray(), 'Itinerary retrieved successfully');
    }

    /**
     * Update the specified Itinerary in storage.
     * PUT/PATCH /itineraries/{id}
     *
     * @param  int $id
     * @param UpdateItineraryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItineraryAPIRequest $request)
    {
        $input = $request->all();

        /** @var Itinerary $itinerary */
        $itinerary = $this->itineraryRepository->findWithoutFail($id);

        if (empty($itinerary)) {
            return $this->sendError('Itinerary not found');
        }

        $itinerary = $this->itineraryRepository->update($input, $id);

        return $this->sendResponse($itinerary->toArray(), 'Itinerary updated successfully');
    }

    /**
     * Remove the specified Itinerary from storage.
     * DELETE /itineraries/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Itinerary $itinerary */
        $itinerary = $this->itineraryRepository->findWithoutFail($id);

        if (empty($itinerary)) {
            return $this->sendError('Itinerary not found');
        }

        $itinerary->delete();

        return $this->sendResponse($id, 'Itinerary deleted successfully');
    }
}
