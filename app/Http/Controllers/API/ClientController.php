<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\ClientModel;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = ClientModel::get();
        $data['message'] = "Data fetched Successfully.";
        return response()->json($data, 200);
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
        $input = $request->all();
        $duplicateCliname = ClientModel::where('clientName', '=', $input['clientName'])->exists();
        $duplicateEmamil = ClientModel::where('email', '=', $input['email'])->exists();
        $duplicateMobile = ClientModel::where('mobile', '=', $input['mobile'])->exists();
        if ($duplicateCliname || $duplicateEmamil || $duplicateMobile) {
            $data['data'] = [];
            if($duplicateCliname)
            $data['data'][] = "ClientName already exists.";
            if($duplicateEmamil)
            $data['data'][] = "Email already exists.";
            if($duplicateMobile)
            $data['data'][] = "Mobile already exists.";

            $data['message'] = 'Client already exists.';
            return response()->json($data, 409);    
        } else {
            $input['password'] = Hash::make($input['password']);
            $client = ClientModel::create($input);
            $data['data'] = array();
            $data['message'] = "Client Created Successfully.";
            return response()->json($data, 200);
        }
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
