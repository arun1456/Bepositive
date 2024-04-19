<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\District;
use App\Models\Bgroup;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function locationForm()
    {
        $districts=District::all();
        return view('console.locationForm',compact('districts'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'city_name' => 'required',
            'district_id' => 'required',
        ]);
        
        $create=City::create([
            'city_name'=>$request->city_name,
            'district_id'=>$request->district_id,
        ]);
        if($create)
        {
            return redirect()->route('console')->with('success','City has been added successfully');
        }
        else
        {
            dd($create);
        }
    }
    public function locationTable()
    {
        $cities = City::with('district')->paginate(10);
        return view('console.locationTable', compact('cities'));
    }

    public function destroy($id)
    {
        $city=City::findOrFail($id);
        $city->delete();
    }
}
