<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePriceAPIRequest;
use App\Http\Requests\API\UpdatePriceAPIRequest;
use App\Models\Price;
use App\Repositories\PriceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PriceController
 * @package App\Http\Controllers\API
 */

class PriceAPIController extends AppBaseController
{
    /** @var  PriceRepository */
    private $priceRepository;

    public function __construct(PriceRepository $priceRepo)
    {
        $this->priceRepository = $priceRepo;
    }

    /**
     * Display a listing of the Price.
     * GET|HEAD /prices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->priceRepository->pushCriteria(new RequestCriteria($request));
        $this->priceRepository->pushCriteria(new LimitOffsetCriteria($request));
        $prices = $this->priceRepository->all();

        return $this->sendResponse($prices->toArray(), 'Prices retrieved successfully');
    }

    /**
     * Store a newly created Price in storage.
     * POST /prices
     *
     * @param CreatePriceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePriceAPIRequest $request)
    {
        $input = $request->all();

        $prices = $this->priceRepository->create($input);

        return $this->sendResponse($prices->toArray(), 'Price saved successfully');
    }

    /**
     * Display the specified Price.
     * GET|HEAD /prices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Price $price */
        $price = $this->priceRepository->findWithoutFail($id);

        if (empty($price)) {
            return $this->sendError('Price not found');
        }

        return $this->sendResponse($price->toArray(), 'Price retrieved successfully');
    }

    /**
     * Update the specified Price in storage.
     * PUT/PATCH /prices/{id}
     *
     * @param  int $id
     * @param UpdatePriceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePriceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Price $price */
        $price = $this->priceRepository->findWithoutFail($id);

        if (empty($price)) {
            return $this->sendError('Price not found');
        }

        $price = $this->priceRepository->update($input, $id);

        return $this->sendResponse($price->toArray(), 'Price updated successfully');
    }

    /**
     * Remove the specified Price from storage.
     * DELETE /prices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Price $price */
        $price = $this->priceRepository->findWithoutFail($id);

        if (empty($price)) {
            return $this->sendError('Price not found');
        }

        $price->delete();

        return $this->sendResponse($id, 'Price deleted successfully');
    }
}
