<?php

namespace App\Http\Controllers;

use App\Models\ZoomMeeting;
use App\Traits\ZoomMeetingTrait;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

        public function index()
        {
            return view('meetings.index');
        }

        public function show($id)
        {
            $meeting = $this->get($id);

            return view('meetings.index', compact('meeting'));
        }

        public function store(Request $request)
        {
            $this->create($request->all());

            return redirect()->route('meetings.index');
        }

        public function update($meeting, Request $request)
        {
            $this->update($meeting->zoom_meeting_id, $request->all());

            return redirect()->route('meetings.index');
        }

        public function destroy(ZoomMeeting $meeting)
        {
            $this->delete($meeting->id);

            return $this->sendSuccess('Meeting deleted successfully.');
        }
}