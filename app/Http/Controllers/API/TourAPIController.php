<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTourAPIRequest;
use App\Http\Requests\API\UpdateTourAPIRequest;
use App\Models\Tour;
use App\Repositories\TourRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TourController
 * @package App\Http\Controllers\API
 */

class TourAPIController extends AppBaseController
{
    /** @var  TourRepository */
    private $tourRepository;

    public function __construct(TourRepository $tourRepo)
    {
        $this->tourRepository = $tourRepo;
    }

    /**
     * Display a listing of the Tour.
     * GET|HEAD /tours
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tourRepository->pushCriteria(new RequestCriteria($request));
        $this->tourRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tours = $this->tourRepository->all();

        return $this->sendResponse($tours->toArray(), 'Tours retrieved successfully');
    }

    /**
     * Store a newly created Tour in storage.
     * POST /tours
     *
     * @param CreateTourAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTourAPIRequest $request)
    {
        $input = $request->all();

        $tours = $this->tourRepository->create($input);

        return $this->sendResponse($tours->toArray(), 'Tour saved successfully');
    }

    /**
     * Display the specified Tour.
     * GET|HEAD /tours/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Tour $tour */
        $tour = $this->tourRepository->findWithoutFail($id);

        if (empty($tour)) {
            return $this->sendError('Tour not found');
        }

        return $this->sendResponse($tour->toArray(), 'Tour retrieved successfully');
    }

    /**
     * Update the specified Tour in storage.
     * PUT/PATCH /tours/{id}
     *
     * @param  int $id
     * @param UpdateTourAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTourAPIRequest $request)
    {
        $input = $request->all();

        /** @var Tour $tour */
        $tour = $this->tourRepository->findWithoutFail($id);

        if (empty($tour)) {
            return $this->sendError('Tour not found');
        }

        $tour = $this->tourRepository->update($input, $id);

        return $this->sendResponse($tour->toArray(), 'Tour updated successfully');
    }

    /**
     * Remove the specified Tour from storage.
     * DELETE /tours/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Tour $tour */
        $tour = $this->tourRepository->findWithoutFail($id);

        if (empty($tour)) {
            return $this->sendError('Tour not found');
        }

        $tour->delete();

        return $this->sendResponse($id, 'Tour deleted successfully');
    }
}
