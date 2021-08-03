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
        return response()->json($meetings);
    }

    public function show($id)
    {
        return response()->json(Meeting::find($id));
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
        return $meeting;
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
        return $meeting;
    }


    public function delete(Request $request, $id)
    {
        Meeting::findOrFail($id)->delete();

        return response(['message' => 'Deleted']);
    }


}
