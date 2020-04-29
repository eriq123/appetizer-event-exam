<?php

namespace App\Http\Controllers;

use App\Date;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function saveEvent(Request $request)
    {
        // save event
            // check if has child
                // yes = [
                    // fetch all old child
                    // delete old child then create new child
                // ] 
                // no = create child
                // 
        
        // isOldEvent
        $event = Event::with('dates')->where('name',$request->eventName)->first();
        if($event){
            Date::where('event_id',$event->id)->delete();
            Event::destroy($event->id);
        }

            $this->data['event'] = Event::create([
                'name' => $request->eventName
            ]);

            // // delete all dates in db if exist
            foreach($request->dates as $key => $value)
            {
                // isOldDate
                $date = Date::where('full_date',$value['full_date'])->delete();

                // if($date){
                //     Date::destroy($date->id);
                // } 
                    
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
        // $this->data['dates'] = Date::with('event')->where('month', $this->request->month)->where('year',$this->request->year)->orderBy('full_date')->get();
    }

    public function listEvents(Request $request)
    {
        // $this->request = $request;
        $this->getDates($request);

        return response()->json($this->data);

    }
}
