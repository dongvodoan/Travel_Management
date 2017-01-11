<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TourRepository;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Tour;
use App\Models\Activity;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ImageRepository;
use App\Repositories\PriceRepository;

class TourController extends AppBaseController
{
    /** @var  TourRepository */
    private $tourRepository;

    /** @var  ImageRepository */
    private $imageRepository;

    /** @var  PriceRepository */
    private $priceRepository;


    public function __construct(TourRepository $tourRepo, ImageRepository $imageRepo, PriceRepository $priceRepo)
    {
        $this->tourRepository = $tourRepo;
        $this->imageRepository = $imageRepo;
        $this->priceRepository = $priceRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->tourRepository->pushCriteria(new RequestCriteria($request));
        $tours = $this->tourRepository->all();

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $types = Activity::select('types_id')->distinct()->get();
        $prices = Price::select('price')->distinct()->get();

        return view('frontend.tours.index', compact('tours', 'categories', 'types', 'prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $tour = $this->tourRepository->findWithoutFail($id);

        $images = $this->imageRepository->findWhere(['tours_id' => $id]);

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $types = Activity::select('types_id')->distinct()->get();

        return view('frontend.tours.show', compact('categories', 'types', 'tour', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * find to category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter($id, Request $request)
    {
        $this->tourRepository->pushCriteria(new RequestCriteria($request));
        $tours = $this->tourRepository->findWhere(['category_tours_id' => $id]);

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $types = Activity::select('types_id')->distinct()->get();

        return view('frontend.tours.index', compact('tours', 'categories', 'types'));
    }
}
