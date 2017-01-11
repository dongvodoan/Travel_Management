<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TravelRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Repositories\AboutRepository;
use App\Models\Tour;
use App\Models\Activity;

class TravelUsController extends AppBaseController
{
    /** @var  TravelRepository */
    private $travelRepository;

    /** @var  AboutRepository */
    private $aboutRepository;

    public function __construct(TravelRepository $travelRepo, AboutRepository $aboutRepo)
    {
        $this->travelRepository = $travelRepo;
        $this->aboutRepository = $aboutRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $item = $this->travelRepository->findWithoutFail($id);

        $abouts = $this->aboutRepository->findWhere(['check' => '1']);

        $travels = $this->travelRepository->findWhere(['check' => '1']);

        $categories = Tour::select('category_tours_id')->distinct()->get();

        $types = Activity::select('types_id')->distinct()->get();

        if (empty($item)) {
            Flash::error('About not found');

            return redirect(route('about-us.index'));
        }

        return view('frontend.travels.show', compact('abouts', 'travels', 'categories', 'item', 'types' ));
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
