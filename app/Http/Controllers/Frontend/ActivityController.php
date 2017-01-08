<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ActivityRepository;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Controllers\AppBaseController;
use App\Models\Activity;
use App\Repositories\ImageRepository;

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
    public function index(Request $request)
    {
        $this->activityRepository->pushCriteria(new RequestCriteria($request));
        $activities = $this->activityRepository->all();

        $types = Activity::select('types_id')->distinct()->get();

        $this->imageRepository->pushCriteria(new RequestCriteria($request));
        $images = $this->imageRepository->all();

        return view('frontend.activities.index', compact('activities', 'types', 'images'));
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
        $item = $this->activityRepository->findWithoutFail($id);

        $this->imageRepository->pushCriteria(new RequestCriteria($request));
        $images = $this->imageRepository->all();

        $types = Activity::select('types_id')->distinct()->get();

        if (empty($item)) {
            Flash::error('About not found');

            return redirect(route('things-to-do.index'));
        }

        return view('frontend.activities.show', compact('item', '$images', 'types'));
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter($id, Request $request)
    {
        $this->activityRepository->pushCriteria(new RequestCriteria($request));
        $activities = $this->activityRepository->findWhere(['types_id' => $id]);

        $types = Activity::select('types_id')->distinct()->get();

        $this->imageRepository->pushCriteria(new RequestCriteria($request));
        $images = $this->imageRepository->all();

        return view('frontend.activities.index', compact('activities', 'types', 'images'));
    }
}
