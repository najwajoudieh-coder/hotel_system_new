<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

use App\Models\Room;

use App\Models\Booking;

use App\Models\Contact;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details',compact('room'));

    }

    public function add_booking(Request $request,$id)
    {
        $request->validate([
            // we are saying that if the startDate is the same as endDate then it should return an error
            'startDate'=> 'required|date',
            'endDate'=> 'date|after:startDate',
        ]);
        // we are storing the data in the database from the user input
        $data = new Booking;
        $data->room_id = $id;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;

        // Here we are checking if the room is already booked by using room-id and then we are saying that if
        // if the start date is less or on the same end date AND if the end date is on the enddate or greater then the user can't book 
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id',$id)
        ->where('start_date','<=',$endDate)
        ->where('end_date','>=',$startDate)->exists();

        if($isBooked)
        {
            return redirect()->back()->with('message','Room is already booked please try different date');
        }
        else
        {
            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;
            $data->save();
            return redirect()->back()->with('message','Room Booked Successfully ');
        }
    }
    public function contact(Request $request)
    {
        $contact = new Contact;
        // here we are taking the info that is in the table to our contact 
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('message','Message Sent Successfully ');
    }
    public function our_rooms(){
        $room= Room::all(); 
        return view('home.our_rooms',compact('room'));
    }

    public function hotel_gallery(){
        $gallery =  Gallery::all();
        return view('home.hotel_gallery',compact('gallery'));
    }

    public function contact_us(){
        return view('home.contact_us');
    }
}
