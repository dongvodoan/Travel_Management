<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreatePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Repositories\PlaceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PlaceController extends AppBaseController
{
    /** @var  PlaceRepository */
    private $placeRepository;

    public function __construct(PlaceRepository $placeRepo)
    {
        $this->middleware('auth');
        $this->placeRepository = $placeRepo;
    }

    /**
     * Display a listing of the Place.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->placeRepository->pushCriteria(new RequestCriteria($request));
        $places = $this->placeRepository->all();

        return view('backend.places.index')
            ->with('places', $places);
    }

    /**
     * Show the form for creating a new Place.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.places.create');
    }

    /**
     * Store a newly created Place in storage.
     *
     * @param CreatePlaceRequest $request
     *
     * @return Response
     */
    public function store(CreatePlaceRequest $request)
    {
        $input = $request->all();

        $place = $this->placeRepository->create($input);

        Flash::success('Place saved successfully.');

        return redirect(route('places.index'));
    }

    /**
     * Display the specified Place.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $place = $this->placeRepository->findWithoutFail($id);

        if (empty($place)) {
            Flash::error('Place not found');

            return redirect(route('places.index'));
        }

        return view('backend.places.show')->with('place', $place);
    }

    /**
     * Show the form for editing the specified Place.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $place = $this->placeRepository->findWithoutFail($id);

        if (empty($place)) {
            Flash::error('Place not found');

            return redirect(route('places.index'));
        }

        return view('backend.places.edit')->with('place', $place);
    }

    /**
     * Update the specified Place in storage.
     *
     * @param  int              $id
     * @param UpdatePlaceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlaceRequest $request)
    {
        $place = $this->placeRepository->findWithoutFail($id);

        if (empty($place)) {
            Flash::error('Place not found');

            return redirect(route('places.index'));
        }

        $place = $this->placeRepository->update($request->all(), $id);

        Flash::success('Place updated successfully.');

        return redirect(route('places.index'));
    }

    /**
     * Remove the specified Place from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $place = $this->placeRepository->findWithoutFail($id);

        if (empty($place)) {
            Flash::error('Place not found');

            return redirect(route('places.index'));
        }

        $this->placeRepository->delete($id);

        Flash::success('Place deleted successfully.');

        return redirect(route('places.index'));
    }
}
