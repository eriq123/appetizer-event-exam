<?php

namespace App\Http\Controllers;

use App\Date;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function saveEvent(Request $request)
    {
        $this->data['event'] = Event::firstOrCreate([
            'name' => $request->eventName
        ]);

        Date::where('event_id',$this->data['event']->id)->delete();
        
        foreach($request->dates as $key => $value)
        {
            Date::updateOrCreate([
                'full_date' => $value['full_date'],
                'month' => $value['month'],
                'date' => $value['date'],
                'year' => $value['year'],
            ],[
                'event_id' => $this->data['event']->id,
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
