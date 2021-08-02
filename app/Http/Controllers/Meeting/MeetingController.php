<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        return Meeting::all();
    }

    public function show($id)
    {
        return Meeting::find($id);
    }

    public function store(Request $request)
    {
        $rules = [
            'userId' => 'required',
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

        $this->validate($request, $rules, $errorMessage);
        return Meeting::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'userId' => 'required',
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

        $this->validate($request, $rules, $errorMessage);

        $meeting = Meeting::findOrFail($id);
        $meeting->update($request->all());
        return $meeting;
    }


    public function delete($id)
    {
        Meeting::find($id)->delete();
        return 204;
    }


}
