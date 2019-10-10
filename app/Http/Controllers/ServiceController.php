<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Service;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("admin.serviceList");
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
        $return_arr = array();
        $checkServiceExist = Service::where('name', $request['name'])->get();
        if(empty($checkServiceExist)){
            $request['created_by'] = Auth::id();
            if(Auth::user()->role == 1){
                $request['approved_by'] = Auth::id();
                $request['status'] = 1;
            } else {
                $request['approved_by'] = 0;
            }
            // print_r($request->all()); die();
            $service = Service::create($request->all());
            $return_arr = array('status' => 'success');
        } else {
            $return_arr = array('status' => 'error', 'msg' => 'Service already exist!!');
        }
        
        return Response::json($return_arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
