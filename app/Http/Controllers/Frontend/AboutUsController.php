<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AboutRepository;
use App\Repositories\TravelRepository;
use App\Models\Tour;
use Flash;
use App\Models\Activity;
use App\Repositories\TimeRepository;

class AboutUsController extends AppBaseController
{
    /** @var  AboutRepository */
    private $aboutRepository;

    /** @var  TravelRepository */
    private $travelRepository;

    /** @var  TimeRepository */
    private $timeRepository;

    public function __construct(AboutRepository $aboutRepo, TravelRepository $travelRepo, TimeRepository $timeRepo)
    {
        $this->aboutRepository = $aboutRepo;
        $this->travelRepository = $travelRepo;
        $this->timeRepository = $timeRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $abouts = $this->aboutRepository->findWhere(['check' => '1']);

        $travels = $this->travelRepository->findWhere(['check' => '1']);

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $about_us = $this->aboutRepository->findWhere(['title' => 'about us']);

        $types = Activity::select('types_id')->distinct()->get();

        $day_tour = $this->timeRepository->findWhere(['time' => 'Day tour' ])->first();
               
        return view('frontend.abouts.index', compact('abouts', 'travels', 'categories', 'about_us', 'types', 'day_tour'));
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
        $item = $this->aboutRepository->findWithoutFail($id);

        $abouts = $this->aboutRepository->findWhere(['check' => '1']);

        $travels = $this->travelRepository->findWhere(['check' => '1']);

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $types = Activity::select('types_id')->distinct()->get();

        $day_tour = $this->timeRepository->findWhere(['time' => 'Day tour' ])->first();

        if (empty($item)) {
            Flash::error('About not found');

            return redirect(route('about-us.index'));
        }

        return view('frontend.abouts.show', compact('abouts', 'travels', 'categories', 'item', 'types', 'day_tour'));
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
