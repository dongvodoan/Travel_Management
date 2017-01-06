<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateTourRequest;
use App\Http\Requests\UpdateTourRequest;
use App\Repositories\TourRepository;
use App\Repositories\TimeRepository;
use App\Repositories\PriceRepository;
use App\Repositories\ItineraryRepository;
use App\Repositories\CategoryTourRepository;
use App\Repositories\PlaceRepository;
use App\Repositories\ImageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use File;

class TourController extends AppBaseController
{
    /** @var  TourRepository */
    private $tourRepository;

    /** @var  TimeRepository */
    private $timeRepository;

    /** @var  PriceRepository */
    private $priceRepository;

    /** @var  CategoryTourRepository */
    private $categoryTourRepository;

    public function __construct(TourRepository $tourRepo, TimeRepository $timeRepo, PriceRepository $priceRepo, ItineraryRepository $itineraryRepo, CategoryTourRepository $categoryTourRepo, PlaceRepository $placeRepo, ImageRepository $imageRepo)
    {
        $this->tourRepository = $tourRepo;
        $this->timeRepository = $timeRepo;
        $this->priceRepository = $priceRepo;
        $this->itineraryRepository = $itineraryRepo;
        $this->categoryTourRepository = $categoryTourRepo;
        $this->placeRepository = $placeRepo;
        $this->imageRepository = $imageRepo;
    }

    /**
     * Display a listing of the Tour.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tourRepository->pushCriteria(new RequestCriteria($request));
        $tours = $this->tourRepository->all();

        return view('backend.tours.index')
            ->with('tours', $tours);
    }

    /**
     * Show the form for creating a new Tour.
     *
     * @return Response
     */
    public function create()
    {
        $times = $this->timeRepository->all();

        $prices = $this->priceRepository->all();

        $itineraries = $this->itineraryRepository->all();

        $categoryTours = $this->categoryTourRepository->all();

        $places = $this->placeRepository->all();

        return view('backend.tours.create', compact('times', 'prices', 'itineraries', 'categoryTours', 'places'));
    }

    /**
     * Store a newly created Tour in storage.
     *
     * @param CreateTourRequest $request
     *
     * @return Response
     */
    public function store(CreateTourRequest $request)
    {
        $input = $request->all();

        $token = $input['_token']; 

        $check = $request->input('check_list');
               
        if ($request->hasFile('image')) {
            $tour = $this->tourRepository->create($input);

            $tour = $this->tourRepository->all()->last();

            $tour->places()->attach($check);

            $tours_id = $tour['id'];

            $data = array('_token' => $token,'name' => '', 'tours_id'=> $tours_id);
        
            $images = $request->file('image');
            
            foreach($images as $image){
                $imagename=time() . '_'.$input['title'] .'.'. $image->getClientOriginalExtension();
                $data['name'] = $imagename;

                $image->move(public_path(config('path.upload_img')), $imagename);
                
                $image = $this->imageRepository->create($data);
            }       
        }

        Flash::success('Tour saved successfully.');

        return redirect(route('tours.index'));
    }

    /**
     * Display the specified Tour.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tour = $this->tourRepository->findWithoutFail($id);

        if (empty($tour)) {
            Flash::error('Tour not found');

            return redirect(route('tours.index'));
        }

        return view('backend.tours.show')->with('tour', $tour);
    }

    /**
     * Show the form for editing the specified Tour.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tour = $this->tourRepository->findWithoutFail($id);

        $times = $this->timeRepository->all();

        $prices = $this->priceRepository->all();

        $itineraries = $this->itineraryRepository->all();

        $categoryTours = $this->categoryTourRepository->all();

        $places = $this->placeRepository->all();

        if (empty($tour)) {
            Flash::error('Tour not found');

            return redirect(route('tours.index'));
        }

        return view('backend.tours.edit', compact('tour', 'times', 'prices', 'itineraries', 'categoryTours', 'places'));
    }

    /**
     * Update the specified Tour in storage.
     *
     * @param  int              $id
     * @param UpdateTourRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTourRequest $request)
    {
        $tour = $this->tourRepository->findWithoutFail($id);

        $check = $request->input('check_list');

        if (empty($tour)) {
            Flash::error('Tour not found');

            return redirect(route('tours.index'));
        }

        $tour = $this->tourRepository->update($request->all(), $id);

        $tour->places()->sync($check);

        Flash::success('Tour updated successfully.');

        return redirect(route('tours.index'));
    }

    /**
     * Remove the specified Tour from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tour = $this->tourRepository->findWithoutFail($id);

        if (empty($tour)) {
            Flash::error('Tour not found');

            return redirect(route('tours.index'));
        }

        $this->tourRepository->delete($id);

        Flash::success('Tour deleted successfully.');

        return redirect(route('tours.index'));
    }
}
