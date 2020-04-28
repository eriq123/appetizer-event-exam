<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function saveEvent(Request $request)
    {
        // days = array of days 1-7
        // event name
        // from 
        // to

        // array of dates from-to from the form
        // array of dates from database 

        // save the event 
            // loop all days from - to
                // check if day is in database if so
                    // update the record

                    // check if days matches the current day then add to database
            
        // format the response
            // if the current year && month from the calendar(parent component) matches --- so we can limit the response to max 31 items 
                // i need the event name
                // the day
                // the dates

        return response()->json($request->all());
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