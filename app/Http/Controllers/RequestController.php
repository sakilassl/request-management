<?php

namespace App\Http\Controllers;

use App\Models\RequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RequestModel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'created_on' => 'required|date',
            'location' => 'required|string',
            'service' => 'required|string',
            'status' => 'required|in:NEW,IN_PROGRESS,ON_HOLD,REJECTED,CANCELLED',
            'priority' => 'required|in:HIGH,MEDIUM,LOW',
            'department' => 'required|string',
            'requested_by' => 'required|string',
            'assigned_to' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $requestModel = RequestModel::create($request->all());
        return response()->json($requestModel, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return RequestModel::findOrFail($id);
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
        $requestModel = RequestModel::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'created_on' => 'required|date',
            'location' => 'required|string',
            'service' => 'required|string',
            'status' => 'required|in:NEW,IN_PROGRESS,ON_HOLD,REJECTED,CANCELLED',
            'priority' => 'required|in:HIGH,MEDIUM,LOW',
            'department' => 'required|string',
            'requested_by' => 'required|string',
            'assigned_to' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $requestModel->update($request->all());
        return response()->json($requestModel, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestModel = RequestModel::findOrFail($id);
        $requestModel->delete();
        return response()->json(null, 204);
    }
}
