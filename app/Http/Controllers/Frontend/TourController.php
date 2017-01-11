<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TourRepository;
use Flash;
use App\Models\Tour;
use App\Models\Activity;
use App\Models\Image;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ImageRepository;
use App\Repositories\PriceRepository;
use App\Repositories\TimeRepository;
use App\Repositories\PlaceRepository;

class TourController extends AppBaseController
{
    /** @var  TourRepository */
    private $tourRepository;

    /** @var  ImageRepository */
    private $imageRepository;

    /** @var  TimeRepository */
    private $timeRepository;

    /** @var  PlaceRepository */
    private $placeRepository;

    public function __construct(TourRepository $tourRepo, ImageRepository $imageRepo
    , TimeRepository $timeRepo, PlaceRepository $placeRepo)
    {
        $this->tourRepository = $tourRepo;
        $this->imageRepository = $imageRepo;
        $this->timeRepository = $timeRepo;
        $this->placeRepository = $placeRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = $this->tourRepository->all();

        $images = Image::select('tours_id')->distinct()->get();
        $i=0;
        foreach($images as $image){
            $first_image = $this->imageRepository->findWhere(['tours_id' => $image->tours_id])->first();
            $data_images[$i] = $first_image;
            $i++;
        }

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $types = Activity::select('types_id')->distinct()->get();

        $day_tour = $this->timeRepository->findWhere(['time' => 'Day tour' ])->first();

        return view('frontend.tours.index', compact('tours', 'categories', 'types', 'data_images', 'day_tour'));
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
    public function show($id)
    {
        $tour = $this->tourRepository->findWithoutFail($id);

        $images = $this->imageRepository->findWhere(['tours_id' => $id]);

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $types = Activity::select('types_id')->distinct()->get();

        $day_tour = $this->timeRepository->findWhere(['time' => 'Day tour' ])->first();

        return view('frontend.tours.show', compact('categories', 'types', 'tour', 'images', 'day_tour'));
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
    public function filter($id)
    {
        $tours = $this->tourRepository->findWhere(['category_tours_id' => $id]);

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $types = Activity::select('types_id')->distinct()->get();

        $images = Image::select('tours_id')->distinct()->get();

        $day_tour = $this->timeRepository->findWhere(['time' => 'Day tour' ])->first();

        $i=0;
        foreach($images as $image){
            $first_image = $this->imageRepository->findWhere(['tours_id' => $image->tours_id])->first();
            $data_images[$i] = $first_image;
            $i++;
        }

        return view('frontend.tours.index', compact('tours', 'categories', 'types', 'data_images', 'day_tour'));
    }

     /**
     * find to category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterTime($id)
    {
        $tours = $this->tourRepository->findWhere(['times_id' => $id]);

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $types = Activity::select('types_id')->distinct()->get();

        $images = Image::select('tours_id')->distinct()->get();

        $day_tour = $this->timeRepository->findWhere(['time' => 'Day tour' ])->first();
       
        $i=0;
        foreach($images as $image){
            $first_image = $this->imageRepository->findWhere(['tours_id' => $image->tours_id])->first();
            $data_images[$i] = $first_image;
            $i++;
        }

        return view('frontend.tours.index', compact('tours', 'categories', 'types', 'data_images', 'day_tour'));
    }

    /**
     * find to category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterAddress($id)
    {
        $list_tours = $this->tourRepository->all();
        $i=0;
        foreach($list_tours as $tour){
            foreach($tour->places as $place){
                if($place->id==$id) {
                    $tours[$i] = $tour;
                }
            }
            $i++;
        }

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $types = Activity::select('types_id')->distinct()->get();

        $images = Image::select('tours_id')->distinct()->get();

        $day_tour = $this->timeRepository->findWhere(['time' => 'Day tour' ])->first();
       
        $i=0;
        foreach($images as $image){
            $first_image = $this->imageRepository->findWhere(['tours_id' => $image->tours_id])->first();
            $data_images[$i] = $first_image;
            $i++;
        }

        return view('frontend.tours.index', compact('tours', 'categories', 'types', 'data_images', 'day_tour'));
    }

    /**
     * find to category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterChoiceTime($id)
    {
        $tours = $this->tourRepository->findWhere(['times_id' => $id]);

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $types = Activity::select('types_id')->distinct()->get();

        $images = Image::select('tours_id')->distinct()->get();

        $day_tour = $this->timeRepository->findWhere(['time' => 'Day tour' ])->first();
       
        $i=0;
        foreach($images as $image){
            $first_image = $this->imageRepository->findWhere(['tours_id' => $image->tours_id])->first();
            $data_images[$i] = $first_image;
            $i++;
        }

        return view('frontend.tours.index', compact('tours', 'categories', 'types', 'data_images', 'day_tour'));
    }
}
