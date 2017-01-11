<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Http\Controllers\AppBaseController;
use App\Models\Tour;
use App\Models\Image;
use App\Repositories\TourRepository;
use App\Repositories\ImageRepository;
use App\Repositories\AboutRepository;

class HomeTravelController extends AppBaseController
{ 
        /** @var  ImageRepository */
        private $imageRepository;

        /** @var  TourRepository */
        private $tourRepository;

        /** @var  AboutRepository */
        private $aboutRepository;

        public function __construct(TourRepository $tourRepo, ImageRepository $imageRepo, AboutRepository $aboutRepo)
        {
            $this->tourRepository = $tourRepo;
            $this->imageRepository = $imageRepo;
            $this->aboutRepository = $aboutRepo;
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $tours = $this->tourRepository->all();

        $abouts = $this->aboutRepository->all();

        $tour_hot = $this->tourRepository->findWithoutFail(1);

        $images = Image::select('tours_id')->distinct()->get();
        $i=0;
        foreach($images as $image){
            $first_image = $this->imageRepository->findWhere(['tours_id' => $image->tours_id])->first();
            $data_images[$i] = $first_image;
            $i++;
        }
        $hot_image = $this->imageRepository->findWhere(['tours_id' => 1])->first();
        $types = Activity::select('types_id')->distinct()->get();
        $categories = Tour::select('category_tours_id')->distinct()->get();

        return view('frontend.index', compact('types', 'categories', 'tours', 'data_images', 'tour_hot', 'hot_image', 'abouts'));
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
