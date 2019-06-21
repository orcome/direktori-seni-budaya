<?php

namespace App\Http\Controllers;

use App\SubDistrict;
use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
    /**
     * Display a listing of the subDistrict.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $editableSubDistrict = null;
        $subDistrictQuery = SubDistrict::query();
        $subDistrictQuery->where('name', 'like', '%'.request('q').'%');
        $subDistricts = $subDistrictQuery->paginate(25);

        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableSubDistrict = SubDistrict::find(request('id'));
        }

        return view('sub_districts.index', compact('subDistricts', 'editableSubDistrict'));
    }

    /**
     * Store a newly created subDistrict in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new SubDistrict);

        $newSubDistrict = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $newSubDistrict['creator_id'] = auth()->id();

        SubDistrict::create($newSubDistrict);

        return redirect()->route('sub_districts.index');
    }

    /**
     * Update the specified subDistrict in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubDistrict  $subDistrict
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, SubDistrict $subDistrict)
    {
        $this->authorize('update', $subDistrict);

        $subDistrictData = $request->validate([
            'name'        => 'required|max:60',
            'description' => 'nullable|max:255',
        ]);
        $subDistrict->update($subDistrictData);

        $routeParam = request()->only('page', 'q');

        return redirect()->route('sub_districts.index', $routeParam);
    }

    /**
     * Remove the specified subDistrict from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubDistrict  $subDistrict
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, SubDistrict $subDistrict)
    {
        $this->authorize('delete', $subDistrict);

        $request->validate(['sub_district_id' => 'required']);

        if ($request->get('sub_district_id') == $subDistrict->id && $subDistrict->delete()) {
            $routeParam = request()->only('page', 'q');

            return redirect()->route('sub_districts.index', $routeParam);
        }

        return back();
    }
}
