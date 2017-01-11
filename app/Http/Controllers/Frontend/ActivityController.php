<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ActivityRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Activity;
use App\Repositories\ImageRepository;
use App\Models\Tour;
use App\Models\Image;

class ActivityController extends AppBaseController
{
    /** @var  ActivityRepository */
    private $activityRepository;

    /** @var  ImageRepository */
    private $imageRepository;

    public function __construct(ActivityRepository $activityRepo, ImageRepository $imageRepo)
    {
        $this->activityRepository = $activityRepo;
        $this->imageRepository = $imageRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = $this->activityRepository->all();

        $types = Activity::select('types_id')->distinct()->get();

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $images = Image::select('activities_id')->distinct()->get();
        $i=0;
        foreach($images as $image){
            $first_image = $this->imageRepository->findWhere(['activities_id' => $image->activities_id])->first();
            $data_images[$i] = $first_image;
            $i++;
        }

        return view('frontend.activities.index', compact('activities', 'types', 'data_images', 'categories'));
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
        $item = $this->activityRepository->findWithoutFail($id);

        $types = Activity::select('types_id')->distinct()->get();

        $categories = Tour::select('category_tours_id')->distinct()->get();

        if (empty($item)) {
            Flash::error('About not found');

            return redirect(route('things-to-do.index'));
        }

        return view('frontend.activities.show', compact('item', 'types', 'categories'));
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
     * find to type.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter($id)
    {
        
        $activities = $this->activityRepository->findWhere(['types_id' => $id]);

        $types = Activity::select('types_id')->distinct()->get();

        $images = Image::select('activities_id')->distinct()->get();
        $i=0;
        foreach($images as $image){
            $first_image = $this->imageRepository->findWhere(['activities_id' => $image->activities_id])->first();
            $data_images[$i] = $first_image;
            $i++;
        }

        $categories = Tour::select('category_tours_id')->distinct()->get();

        return view('frontend.activities.index', compact('activities', 'types', 'data_images', 'categories'));
    }
}
