<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $meetings = Meeting::where('userId', $userId)->get();
        return response()->json(['meetings'=>$meetings, 'status'=>'success'], 200);
    }

    public function show(Request $request, $id)
    {
        $userId = $request->user()->id;
        $meeting = Meeting::find($id);

        if ($meeting)
            return response()->json(['meeting'=>$meeting, 'status'=>'success'], 200);
        else 
            return response()->json(['status'=>'failed'], 404);
    }

    public function store(Request $request)
    {
        //
        // Validate request
        //
        $rules = [
            'topic' => 'required|min:6',
            'when' => 'required',
            'duration' => 'required',
            'passcode' => 'required',
            'hostVideo' => 'required',
            'participantVideo' => 'required',
            'meetingLink' => 'required'
        ];

        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];

        $userId = $request->user()->id;
        $request->validate($rules, $errorMessage);
        
        //
        // Create new meeting record
        //
        $meeting = Meeting::firstOrCreate(
            [ 'userId' => $userId , 
              'topic' => $request->topic, 
              'description' => $request->description,
              'when' => $request->when,
              'duration' => $request->duration,
              'passcode' => $request->passcode,
              'hostVideo' => $request->hostVideo,
              'participantVideo' => $request->participantVideo,
              'meetingLink' => $request->meetingLink]
        );

        $meeting->save();
        return response()->json(['meeting'=>$meeting, 'status'=>'success'], 201);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'topic' => 'required|min:6',
            'when' => 'required',
            'duration' => 'required',
            'passcode' => 'required',
            'hostVideo' => 'required',
            'participantVideo' => 'required',
            'meetingLink' => 'required'
        ];

        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];

        $request->validate($rules, $errorMessage);

        $meeting = Meeting::findOrFail($id);
        $meeting->update($request->all());
        return response()->json(['meeting'=>$meeting, 'status'=>'success'], 200);
    }


    public function destroy(Request $request, $id)
    {
        $meeting = Meeting::find($id);
        if ($meeting) {
            $meeting->delete();
            return response()->json(['message' => 'Deleted'], 200);
        }
        else {
            return response()->json(['message' => 'Deleted'], 404);
        }
    }


}
