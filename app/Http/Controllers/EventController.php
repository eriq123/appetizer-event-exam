<?php

namespace App\Http\Controllers;

use App\Date;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private function getDates($request){
        $this->data['dates'] = Date::with('event')->where('month', $request->month)->where('year',$request->year)->orderBy('full_date')->get();
    }

    public function saveEvent(Request $request)
    {
        $this->data['event'] = Event::firstOrCreate([
            'name' => $request->eventName
        ]);

        foreach($request->dates as $key => $value){
            // dates i created 1 2 3 4 5 6 7 8 9 10 
            // dates i created again 2 3 4 5 6 11
            // edit this again

            Date::updateOrCreate(
                [
                    'full_date' => $value['full_date'] 
                ],
                [
                    'event_id' => $this->data['event']->id,
                    'full_date' => $value['full_date'],
                    'month' => $value['month'],
                    'date' => $value['date'],
                    'year' => $value['year'],
                ]
            );
           
        }

        $this->getDates($request);

        return response()->json($this->data);
    }

    public function listEvents(Request $request)
    {
        $this->getDates($request);

        return response()->json($this->data);

    }
}


// database structure

// new plan

// event table
// id
// name

// dates table
// id
// event_id
// month
// day
// date
// year

// add event
    // --add the event then add the dates

// update event
    // --update the event if not existing
    // --then if date didn't exist add new record
    // --else update the event_id 