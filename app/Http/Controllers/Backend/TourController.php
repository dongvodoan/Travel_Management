<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateTourRequest;
use App\Http\Requests\UpdateTourRequest;
use App\Repositories\TourRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TourController extends AppBaseController
{
    /** @var  TourRepository */
    private $tourRepository;

    public function __construct(TourRepository $tourRepo)
    {
        $this->tourRepository = $tourRepo;
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

        return view('tours.index')
            ->with('tours', $tours);
    }

    /**
     * Show the form for creating a new Tour.
     *
     * @return Response
     */
    public function create()
    {
        return view('tours.create');
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

        $tour = $this->tourRepository->create($input);

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

        return view('tours.show')->with('tour', $tour);
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

        if (empty($tour)) {
            Flash::error('Tour not found');

            return redirect(route('tours.index'));
        }

        return view('tours.edit')->with('tour', $tour);
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

        if (empty($tour)) {
            Flash::error('Tour not found');

            return redirect(route('tours.index'));
        }

        $tour = $this->tourRepository->update($request->all(), $id);

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
