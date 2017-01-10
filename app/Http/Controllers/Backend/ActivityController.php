<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Repositories\ActivityRepository;
use App\Repositories\TypeRepository;
use App\Repositories\ImageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ActivityController extends AppBaseController
{
    /** @var  ActivityRepository */
    private $activityRepository;

    public function __construct(ActivityRepository $activityRepo, TypeRepository $typeRepo, ImageRepository $imageRepo)
    {
        $this->activityRepository = $activityRepo;
        $this->typeRepository = $typeRepo;
        $this->imageRepository = $imageRepo;
    }

    /**
     * Display a listing of the Activity.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->activityRepository->pushCriteria(new RequestCriteria($request));
        $activities = $this->activityRepository->all();

        return view('backend.activities.index')
            ->with('activities', $activities);
    }

    /**
     * Show the form for creating a new Activity.
     *
     * @return Response
     */
    public function create()
    {
        $types = $this->typeRepository->all();

        return view('backend.activities.create')->with('types', $types);
    }

    /**
     * Store a newly created Activity in storage.
     *
     * @param CreateActivityRequest $request
     *
     * @return Response
     */
    public function store(CreateActivityRequest $request)
    {
        $input = $request->all();

        $token = $input['_token']; 
               
        if ($request->hasFile('image')) {
            $activities = $this->activityRepository->create($input);

            $activities = $this->activityRepository->all()->last();

            $activities_id = $activities['id'];

            $data = array('_token' => $token,'name' => '', 'activities_id'=> $activities_id);
        
            $images = $request->file('image');
            
            foreach($images as $image){
                $imagename=time() . '_'.$input['title'] .'.'. $image->getClientOriginalExtension();
                $data['name'] = $imagename;

                $image->move(public_path(config('path.upload_img')), $imagename);
                
                $image = $this->imageRepository->create($data);
            }
            Flash::success('Activity saved successfully.');

            return redirect(route('activities.index'));      
        }

        // $activity = $this->activityRepository->create($input);

        Flash::error('Activity saved unsuccessfully.');

        return redirect(route('activities.index')); 
    }

    /**
     * Display the specified Activity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activity = $this->activityRepository->findWithoutFail($id);

        $images = $this->imageRepository->findWhere(['activities_id' => $id]);


        if (empty($activity)) {
            Flash::error('Activity not found');

            return redirect(route('activities.index'));
        }

        return view('backend.activities.show', compact('activity', 'images'));
    }

    /**
     * Show the form for editing the specified Activity.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activity = $this->activityRepository->findWithoutFail($id);
        $images = $this->imageRepository->findWhere(['activities_id' => $id]);
        $types = $this->typeRepository->all();

        if (empty($activity)) {
            Flash::error('Activity not found');

            return redirect(route('activities.index'));
        }

        return view('backend.activities.edit', compact('activity', 'images', 'types'));
    }

    /**
     * Update the specified Activity in storage.
     *
     * @param  int              $id
     * @param UpdateActivityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivityRequest $request)
    {
        $activity = $this->activityRepository->findWithoutFail($id);

        $input = $request->all();
        $token = $input['_token'];
        
        $data = array('_token' => $token,'name' => '', 'activities_id'=> $id);

        if ($request->hasFile('image')) {
            $images = $this->imageRepository->findWhere(['activities_id' => $id]);
            foreach($images as $image){
                $this->imageRepository->delete($image->id);
            }

            $edit_images = $request->file('image');
            foreach($edit_images as $image){
                $imagename=time() . '_'.$input['title'] .'.'. $image->getClientOriginalExtension();
                $data['name'] = $imagename;

                $image->move(public_path(config('path.upload_img')), $imagename);
                
                $image = $this->imageRepository->create($data);
            }
        }

        if (empty($activity)) {
            Flash::error('Activity not found');

            return redirect(route('activities.index'));
        }

        $activity = $this->activityRepository->update($request->all(), $id);

        Flash::success('Activity updated successfully.');

        return redirect(route('activities.index'));
    }

    /**
     * Remove the specified Activity from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activity = $this->activityRepository->findWithoutFail($id);

        if (empty($activity)) {
            Flash::error('Activity not found');

            return redirect(route('activities.index'));
        }

        $this->activityRepository->delete($id);

        Flash::success('Activity deleted successfully.');

        return redirect(route('activities.index'));
    }
}
