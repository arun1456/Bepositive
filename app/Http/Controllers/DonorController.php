<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\District;
use App\Models\Bgroup;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function donorForm()
    {
        $districts=District::all();
        $cities=City::all();
        $bgroups=Bgroup::all();
        return view('console.donorForm',compact('districts','cities','bgroups'));
    }

    public function donorTable()
    {
        $donors=Donor::with('bgroup')->with('city.district')->get();
        return view('console.donorTable',compact('donors'));
    }

    public function selectDist($id)
    {
        $cities=City::where('district_id', $id)->get();
        return view('console.selectDist',compact('cities'));
    }

    public function store(Request $request)
    { 
        $request->validate([
            'donor_name' => 'required',
            'donor_contact' => 'required',
            'bgroup_id' => 'required',
            'city_id' => 'required',
        ]);
        if(Donor::where('contact',$request->donor_contact)->exists())
        {
            session()->flash('donor_name',$request->donor_name);
            session()->flash('donor_contact',$request->donor_contact);
            session()->flash('bgroup_id',$request->bgroup_id);
            return response()->json(['exists']);
        }
        else
        {
            $create=Donor::create([
                'donor_name'=>$request->donor_name,
                'contact'=>$request->donor_contact,
                'bgroup_id'=>$request->bgroup_id,
                'city_id'=>$request->city_id,
            ]);
        } 
    }

    public function destroy($id)
    {
        $donor=Donor::findOrFail($id);
        $delete=$donor->delete();
        if($delete)
        {
            session()->flash('status',' Donor successfully Deleted');
        }   
        else
        {    session()->flash('status',' Donor failed to delete');
        }
    }

    public function filterForm()
    {
        $districts=District::all();
        $bgroups=Bgroup::all();
        return view('console.filterForm',compact('bgroups','districts'));
    }

    public function selCity($id)
    {
        $cities=City::where('district_id', $id)->get();
        return view('console.selCity',compact('cities'));
    }

    public function selDiv(){
        return view ('console.seldiv');
    }

    public function bgfilter(Request $request)
    {
        if($request->bgfilter && $request->cityfilter && $request->dsfilter)
        {
            $donors = Donor::whereHas('city', function ($query) use ($request) {
                $query->where('district_id', $request->dsfilter);
            })->where('bgroup_id',$request->bgfilter)->where('city_id',$request->cityfilter)->with('bgroup')->with('city.district')->get();
        }
        if($request->bgfilter && $request->cityfilter=='' && $request->dsfilter=='')
        {
            $donors=Donor::where('bgroup_id',$request->bgfilter)->with('bgroup')->with('city.district')->get();
        }
        if($request->cityfilter && $request->dsfilter && $request->bgfilter=='')
        {
            $donors=Donor::where('city_id',$request->cityfilter)->with('bgroup')->with('city.district')->get();
        }
        if($request->cityfilter && $request->dsfilter='' && $request->bgfilter=='')
        {
            $donors=Donor::where('city_id',$request->cityfilter)->with('bgroup')->with('city.district')->get();
        }
        if($request->dsfilter && $request->cityfilter=='' && $request->bgfilter=='')
        {
            $donors = Donor::whereHas('city', function ($query) use ($request) {
               $query->where('district_id', $request->dsfilter);
           })->with('bgroup')->with('city.district')->get();
        }
        if($request->dsfilter && $request->cityfilter=='' && $request->bgfilter)
        {
            $donors = Donor::whereHas('city', function ($query) use ($request) {
               $query->where('district_id', $request->dsfilter);
            })->where('bgroup_id',$request->bgfilter)->with('bgroup')->with('city.district')->get();
        }
        return view('console.bgfilter',compact('donors'));
    }
    public function export()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function import()
    {
        Excel::import(new UserImport,request()->file('file'));
        return back();
    }
}
