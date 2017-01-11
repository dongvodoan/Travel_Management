<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Repositories\ImageRepository;
use App\Repositories\ActivityRepository;
use App\Repositories\TourRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ImageController extends AppBaseController
{
    /** @var  ImageRepository */
    private $imageRepository;

    /** @var  ActivityRepository */
    private $activityRepository;

    public function __construct(ImageRepository $imageRepo, ActivityRepository $activityRepo,TourRepository $tourRepo)
    {
        $this->middleware('auth');
        $this->imageRepository = $imageRepo;
        $this->activityRepository = $activityRepo;
        $this->tourRepository = $tourRepo;
    }

    /**
     * Display a listing of the Image.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->imageRepository->pushCriteria(new RequestCriteria($request));
        $images = $this->imageRepository->all();


        return view('backend.images.index')
            ->with('images', $images);
    }

    /**
     * Show the form for creating a new Image.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $this->activityRepository->pushCriteria(new RequestCriteria($request));
        $activities = $this->activityRepository->all();
        $this->tourRepository->pushCriteria(new RequestCriteria($request));
        $tours = $this->tourRepository->all();
        
        return view('backend.images.create', compact('activities','tours'));
       // return view('backend.images.create')->with('activities', $activities);
    }

    /**
     * Store a newly created Image in storage.
     *
     * @param CreateImageRequest $request
     *
     * @return Response
     */
    public function store(CreateImageRequest $request)
    {
        $input = $request->all();
        
        if($input['tours_id']==null){
            $data = array('_token' => $input['_token'], 'activities_id'=> $input['activities_id'], 'image' => $input['image'] );
        }
        if($input['activities_id']==null){
            $data = array('_token' => $input['_token'], 'tours_id'=> $input['tours_id'], 'image' => $input['image'] );
        }
        if(($input['activities_id']==null)&&($input['tours_id']==null)){
            $data = array('_token' => $input['_token'], 'image' => $input['image'] );
        }
        if(($input['activities_id']!=null)&&($input['tours_id']!=null)){
            $data = array('_token' => $input['_token'], 'tours_id'=> $input['tours_id'], 'activities_id'=> $input['activities_id'], 'image' => $input['image'] );
        }
        $number = 0;
        if ($request->hasFile('image')) {
     
            $images = $request->file('image');
            
            foreach($images as $image){
  
                $imagename=time() .'_'.$number. '.'. $image->getClientOriginalExtension();
                $data['name'] = $imagename;

                $image->move(public_path(config('path.upload_img')), $imagename);
                
                $image = $this->imageRepository->create($data);
                $number++;
            }
        }

        Flash::success('Image saved successfully.');

        return redirect(route('images.index'));
    }

    /**
     * Display the specified Image.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image)) {
            Flash::error('Image not found');

            return redirect(route('images.index'));
        }

        return view('backend.images.show')->with('image', $image);
    }

    /**
     * Show the form for editing the specified Image.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $image = $this->imageRepository->findWithoutFail($id);
       
        $activities = $this->activityRepository->all();
       
        $tours = $this->tourRepository->all();
        if (empty($image)) {
            Flash::error('Image not found');

            return redirect(route('images.index'));
        }

        return view('backend.images.edit', compact('activities','tours', 'image'));
    }

    /**
     * Update the specified Image in storage.
     *
     * @param  int              $id
     * @param UpdateImageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImageRequest $request)
    {
        $input = $request->all();
        $activities_id = $input['activities_id'];
       
        $tours_id = $input['tours_id'];
        

        if($tours_id==null){
            $input = array('_token' => $input['_token'], 'activities_id'=> $activities_id, 'tours_id'=> null );
        }
        if($activities_id==null){
            $input = array('_token' => $input['_token'], 'tours_id'=> $tours_id, 'activities_id'=> null);
        }
        if(($activities_id==null)&&($tours_id==null)){
            $input = array('_token' => $input['_token'], 'activities_id'=> null, 'tours_id'=> null);
        }
        if(($activities_id!=null)&&($tours_id!=null)){
            $input = array('_token' => $input['_token'], 'tours_id'=> $tours_id, 'activities_id'=> $activities_id);
        }
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imagename=time().'.'. $img->getClientOriginalExtension();
            $input['name'] = $imagename;
            $img->move(public_path(config('path.upload_img')), $imagename);
            $number++;
        }
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image)) {
            Flash::error('Image not found');

            return redirect(route('images.index'));
        }

        $image = $this->imageRepository->update($input, $id);

        Flash::success('Image updated successfully.');

        return redirect(route('images.index'));
    }

    /**
     * Remove the specified Image from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image)) {
            Flash::error('Image not found');

            return redirect(route('images.index'));
        }

        $this->imageRepository->delete($id);

        Flash::success('Image deleted successfully.');

        return redirect(route('images.index'));
    }
}
