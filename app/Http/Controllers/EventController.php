<?php

namespace App\Http\Controllers;

use App\Date;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function saveEvent(Request $request)
    {
        Event::with('dates')->where('name',$request->eventName)->delete();
        $this->data['event'] = Event::create([
            'name' => $request->eventName
        ]);
        foreach($request->dates as $key => $value)
        {
            Date::where('full_date',$value['full_date'])->delete();
            Date::create([
                'event_id' => $this->data['event']->id,
                'full_date' => $value['full_date'],
                'month' => $value['month'],
                'date' => $value['date'],
                'year' => $value['year'],
            ]);
        }
        $this->getDates($request);
        return response()->json($this->data);
    }
    
    private function getDates($request)
    {
        $this->data['dates'] = Date::with('event')->where('month', $request->month)->where('year',$request->year)->orderBy('full_date')->get();
    }

    public function listEvents(Request $request)
    {
        $this->getDates($request);
        return response()->json($this->data);
    }
}
