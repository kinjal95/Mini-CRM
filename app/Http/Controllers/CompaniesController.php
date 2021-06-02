<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Model\Companies;
use validated;

class CompaniesController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $companys = Companies::paginate(10);
        return view('companies.index', compact('companys'))->with('i', (request()->input('page', 1) - 1) * 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request) {

       
        $input = $request->all();
        if (array_key_exists('logo', $input) && $input['logo']) {
            $image = $input['logo'];
            $filename = md5(uniqid(rand(), true)) . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public') . '/company/', $filename);
            $input['logo'] = '/company/' . $filename;
//            dd(storage_path('app/public'));
        } else {
            $message = 'Please Select Image';
            return back()->with('error',$message);
        }
        $company = Companies::create($input);
        return redirect('company')->with('success','Company Create Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $company) {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Companies $company) {
        
        $input = $request->all();
        if (array_key_exists('logo', $input) && $input['logo']) {
            $image = $input['logo'];
            $filename = md5(uniqid(rand(), true)) . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public') . '/company/', $filename);
            $input['logo'] = '/company/' . $filename;
        }
        $company->update($input);
        return redirect('company')->with('success','Update Successflly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $company = Companies::find($id)->delete();
        return redirect('company')->with('success', 'Company delete successfully');
    }

    

}
