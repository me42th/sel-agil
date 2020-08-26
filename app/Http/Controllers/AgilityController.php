<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgilityRequest;
use App\Http\Requests\UpdateAgilityRequest;
use App\Repositories\AgilityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Agility;
use Flash;
use Response;

class AgilityController extends AppBaseController
{
    /** @var  AgilityRepository */
    private $agilityRepository;

    public function __construct(AgilityRepository $agilityRepo)
    {
        $this->agilityRepository = $agilityRepo;
    }

    /**
     * Display a listing of the Agility.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $agilities = $this->agilityRepository->all()->sortBy('costumer');

        return view('agilities.index')
            ->with('agilities', $agilities);
    }

    public function search(Request $request)
    {
        $query = $request->q;
        $agilities = Agility::where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhere('costumer', 'like', '%' . $query . '%')
            ->get()
            ->sortBy('costumer');
            return view('agilities.index')
            ->with('agilities', $agilities);
    }

    /**
     * Show the form for creating a new Agility.
     *
     * @return Response
     */
    public function create()
    {
        Agility::refreshData();
        return redirect(route('agilities.index'));
    }

    /**
     * Store a newly created Agility in storage.
     *
     * @param CreateAgilityRequest $request
     *
     * @return Response
     */
    public function store(CreateAgilityRequest $request)
    {
        $input = $request->all();

        $agility = $this->agilityRepository->create($input);

        Flash::success('Agility saved successfully.');

        return redirect(route('agilities.index'));
    }

    /**
     * Display the specified Agility.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agility = $this->agilityRepository->find($id);

        if (empty($agility)) {
            Flash::error('Agility not found');

            return redirect(route('agilities.index'));
        }

        return view('agilities.show')->with('agility', $agility);
    }

    /**
     * Show the form for editing the specified Agility.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        return redirect(route('agilities.index'));

    }

    /**
     * Update the specified Agility in storage.
     *
     * @param int $id
     * @param UpdateAgilityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgilityRequest $request)
    {
        $agility = $this->agilityRepository->find($id);

        if (empty($agility)) {
            Flash::error('Agility not found');

            return redirect(route('agilities.index'));
        }

        $agility = $this->agilityRepository->update($request->all(), $id);

        Flash::success('Agility updated successfully.');

        return redirect(route('agilities.index'));
    }

    /**
     * Remove the specified Agility from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agility = $this->agilityRepository->find($id);

        if (empty($agility)) {
            Flash::error('Agility not found');

            return redirect(route('agilities.index'));
        }

        $this->agilityRepository->delete($id);

        Flash::success('Agility deleted successfully.');

        return redirect(route('agilities.index'));
    }
}
