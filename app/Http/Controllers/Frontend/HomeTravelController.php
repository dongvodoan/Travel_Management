<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Http\Controllers\AppBaseController;
use App\Models\Tour;
use App\Repositories\TourRepository;
use App\Repositories\ImageRepository;
use App\Repositories\AboutRepository;

class HomeTravelController extends AppBaseController
{
        /** @var  TravelRepository */
        private $travelRepository;
        
        /** @var  ImageRepository */
        private $imageRepository;

        /** @var  TourRepository */
        private $tourRepository;

        public function __construct(TourRepository $tourRepo, ImageRepository $imageRepo)
        {
            $this->tourRepository = $tourRepo;
            $this->imageRepository = $imageRepo;
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tours = $this->tourRepository->all();
        $tour_hot = $this->tourRepository->findWithoutFail(1);
        $images = $this->imageRepository->all();
        $types = Activity::select('types_id')->distinct()->get();
        $categories = Tour::select('category_tours_id')->distinct()->get();

        return view('frontend.index', compact('types', 'categories', 'tours', 'images', 'tour_hot'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
