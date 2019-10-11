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


    public function getServiceData(){
        $serviceData = Service::where(['parent_id' => '0'])->get(['id', 'name', 'status'])->toArray();
        $data = array();
        $sl = 0;
        foreach ($serviceData as $key => $value) {
            $sl++;
            $data[$key]['sl'] = $sl;
            $data[$key]['name'] = $value['name'];
            if($value['status'] == 1){
               $data[$key]['status'] = '<span class="badge badge-success">Approved</span>'; 
            } else if($value['status'] == 2){
               $data[$key]['status'] = '<span class="badge badge-warning">Pending</span> '; 
            }
            if($value['status'] == 1){
                $data[$key]['action'] = '<span class="glyphicon glyphicon-plus addSubService" service_id="' . $value['id'] . '"></span>';
            } else if($value['status'] == 2){
                $data[$key]['action'] = '<span class="glyphicon glyphicon-pencil" service_id="' . $value['id'] . '"></span>';
            }
        }
        // print_r($data); die();
        return json_encode(array('data'=>$data));
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
        $checkServiceExist = Service::where('name', $request['name'])->get()->toArray();
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


    public function subSrvcStore(Request $request){
        $return_arr = array();
        $data['created_by'] = Auth::id();
        $data['approved_by'] = Auth::id();
        $data['status'] = 1;
        $data['parent_id'] = $request['parent_id'];
        foreach($request['name'] as $key => $val){
            $checkServiceExist = Service::where([
                'name' => $val,
                'parent_id' => $request['parent_id']
            ])->get()->toArray();
            $data['name'] = $val;
            // print_r($checkServiceExist); die();
            if(empty($checkServiceExist)){
                $service = Service::create($data);
            }
        }
        
        $return_arr = array('status' => 'success');
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
