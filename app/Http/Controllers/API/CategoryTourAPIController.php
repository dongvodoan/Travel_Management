<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCategoryTourAPIRequest;
use App\Http\Requests\API\UpdateCategoryTourAPIRequest;
use App\Models\CategoryTour;
use App\Repositories\CategoryTourRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CategoryTourController
 * @package App\Http\Controllers\API
 */

class CategoryTourAPIController extends AppBaseController
{
    /** @var  CategoryTourRepository */
    private $categoryTourRepository;

    public function __construct(CategoryTourRepository $categoryTourRepo)
    {
        $this->categoryTourRepository = $categoryTourRepo;
    }

    /**
     * Display a listing of the CategoryTour.
     * GET|HEAD /categoryTours
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryTourRepository->pushCriteria(new RequestCriteria($request));
        $this->categoryTourRepository->pushCriteria(new LimitOffsetCriteria($request));
        $categoryTours = $this->categoryTourRepository->all();

        return $this->sendResponse($categoryTours->toArray(), 'Category Tours retrieved successfully');
    }

    /**
     * Store a newly created CategoryTour in storage.
     * POST /categoryTours
     *
     * @param CreateCategoryTourAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryTourAPIRequest $request)
    {
        $input = $request->all();

        $categoryTours = $this->categoryTourRepository->create($input);

        return $this->sendResponse($categoryTours->toArray(), 'Category Tour saved successfully');
    }

    /**
     * Display the specified CategoryTour.
     * GET|HEAD /categoryTours/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CategoryTour $categoryTour */
        $categoryTour = $this->categoryTourRepository->findWithoutFail($id);

        if (empty($categoryTour)) {
            return $this->sendError('Category Tour not found');
        }

        return $this->sendResponse($categoryTour->toArray(), 'Category Tour retrieved successfully');
    }

    /**
     * Update the specified CategoryTour in storage.
     * PUT/PATCH /categoryTours/{id}
     *
     * @param  int $id
     * @param UpdateCategoryTourAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryTourAPIRequest $request)
    {
        $input = $request->all();

        /** @var CategoryTour $categoryTour */
        $categoryTour = $this->categoryTourRepository->findWithoutFail($id);

        if (empty($categoryTour)) {
            return $this->sendError('Category Tour not found');
        }

        $categoryTour = $this->categoryTourRepository->update($input, $id);

        return $this->sendResponse($categoryTour->toArray(), 'CategoryTour updated successfully');
    }

    /**
     * Remove the specified CategoryTour from storage.
     * DELETE /categoryTours/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CategoryTour $categoryTour */
        $categoryTour = $this->categoryTourRepository->findWithoutFail($id);

        if (empty($categoryTour)) {
            return $this->sendError('Category Tour not found');
        }

        $categoryTour->delete();

        return $this->sendResponse($id, 'Category Tour deleted successfully');
    }
}
