<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Foundation\Providers\FoundationServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;/*inorder to access the users in our model*/
use Illuminate\Support\Facades\Auth;/*inorder to acces the authentication if user can login or not*/

use App\Models\Room;/*inorder to access the rooms in our model*/

use App\Models\Booking;/*inorder to access the bookings in our model*/

use App\Models\Gallery;/*inorder to access the gallery in our model*/

use App\Models\Contact;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) { // Ensure user is logged in
            $usertype = Auth::user()->usertype;
    
            if ($usertype == 'admin') {
                // Fetch dashboard statistics for admin
                $userCount = User::count();
                $roomCount = Room::count();
                $bookingCount = Booking::count();
    
                // Pass data to admin index view
                return view('admin.index', compact('userCount', 'roomCount', 'bookingCount'));
            } 
            elseif ($usertype == 'user') {
                // Fetch user dashboard data
                $room = Room::all();
                $gallery = Gallery::all();
                
                return view('home.index', compact('room', 'gallery'));
            } 
            else {
                return redirect()->back(); // Redirect if usertype is not recognized
            }
        }
    
        return redirect()->route('login'); // Redirect if not authenticated
    }
        public function home()
    {
        $room = Room :: all();//this will get all the data from the room table
        $gallery= Gallery::all();  
        return view('home.index', compact('room','gallery'));//if the admin is logged in we will redirect him to the home page which is the index page
    }
    public function create_room(){
        return view('admin.create_room');//if the user is an admin we will redirect him to the create_room page
    }
    public function add_room(Request $request){//this function will add the room info that we created before to the database
       $data = new Room;
      //this side from the database table <->this side from the blade form
       $data->room_title = $request->title;
       $data->description = $request->description;
       $data->price = $request->price;
       $data->wifi = $request->wifi;
       $data->room_type = $request->type;
       $image = $request->image;
       //incase user uploaded an image we need to save it in the database
       if ($image) {
           $imagename = time().'.'.$image->getClientOriginalExtension();
           $request->image->move('room', $imagename);
           $data->image = $imagename;
       }
       $data->save();
       return redirect()->back()->with('success', 'Room successfully added.'); //after saving the data it will keep the user on the same page
    }

    public function view_room(){
        $data = Room::all();//this will get all the data from the room table                 
        return view('admin.view_room',compact('data'));//this will return the data to the view_room page
    }

    public function room_delete($id)
{
    $room = Room::find($id);

    if (!$room) {
        return redirect()->back()->with('error', 'Room not found.');
    }

    // Delete all bookings related to this room
    Booking::where('room_id', $id)->delete();

    // Now delete the room
    $room->delete();

    return redirect()->back()->with('success', 'Room and its bookings deleted successfully.');
}


    public function room_update($id){
        $data = Room::find($id);//this will find the specific id of the room that we want to update
        return view('admin.update_room', compact('data'))->with('success','Room updated successfully');//this will redirect the user to the update_room page
    }

    public function edit_room(Request $request, $id){
        $data = Room::find($id);//this will find the specific id of the room that we want to update
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;
        $image = $request->image;
        //incase user uploaded an image we need to save it in the database
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        if ($data->save()) {
            return redirect()->back()->with('success', 'Room updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update the room.');
        }//after updating the room it will keep the user on the same page
    }
    public function bookings()
    {
        $data = Booking::all();//this will get all the data from the booking table
        return view ('admin.booking',compact('data')); //this will return the data to the booking page
    }
    public function users()
    {
        $data = User::all();//this will get all the data from the user table
        return view ('admin.users',compact('data')); //this will return the data to the user
    }

    public function delete_booking($id)
    {
        // search in the table booking for the specific id that we want to delete
        $booking = Booking::find($id);
        $booking->delete();//this will delete the booking from the database
        return redirect()->back();//after deleting the booking it will keep the user on the same page
    }
    public function delete_user($id) 
    {
        $user = User::find($id);
        if($user) {
            $user->delete(); // This will delete the user from the database
            return redirect()->back()->with('success', 'User deleted successfully');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }
    
    public function delete_email_info($id)
    {
        $email_info = Contact::find($id);
        $email_info->delete();
        return redirect()->back();
    }
    public function approve_booking($id)
    {
        // search in the table booking for the specific id that we want to approve
        $booking = Booking::find($id);
        $booking->status = 'approved';//this will change the status of the booking to approved
        $booking->save();
        return redirect()->back();//after approving the booking it will keep the user on the same page
    }
    public function reject_booking($id)
    {
        // search in the table booking for the specific id that we want to approve
        $booking = Booking::find($id);
        $booking->status = 'rejected';//this will change the status of the booking to approved
        $booking->save();
        return redirect()->back();//after approving the booking it will keep the user on the same page
    }

    public function view_gallery()

    {
        $gallery = Gallery::all();//this will get all the data from the gallery table
        return view('admin.gallery',compact('gallery'));//this will redirect the user to the gallery page
    }

    public function upload_gallery(Request $request)
    {
        $data = new Gallery;
        // we are naming it image because the name = image in the gallery.blade.php
        $image = $request->image;
        if ($image) 
        {
            // The image is saved as 1706489400.png inside public/gallery/.
            // The database stores "1706489400.png" as the image name.
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallery', $imagename);
            $data->image = $imagename;
            $data->save();
            return redirect()->back()->with('success','Gallery image uploaded');
        }

    }

    public function delete_gallery($id)
    {
        $data = Gallery::find($id);//this will find the specific id of the gallery that we want to delete
        $data->delete();//this will delete the gallery from the database
        return redirect()->back();//after deleting the gallery it will keep the user on the same page
    }

    public function all_messages()
    {
        $data = Contact::all();
        return view('admin.all_messages',compact('data'));
    }



    // these functions are used to send the info of the user with a specific id to send email to
    public function send_mail($id)
    {
        $data = Contact::find($id);
        return view('admin.send_mail',compact('data'));
    }

    public function mail(Request $request,$id)
    {
        $data = Contact::find($id);
        $details = [
            'greeting'=> $request->greeting ,
            'body' => $request->body ,
            'action_text' => $request->action_text ,
            'action_url' => $request->action_url ,
            'endline' => $request->endline ,

        ];

        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back()->with('success', 'Mail sent successfully!');

    }

}
