<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;

use App\Http\Middleware\Admin;


route::get('/',[AdminController::class,'home']);

route::get('/home',[AdminController::class,'index'])->name('home');

route::get('/create_room',[AdminController::class,'create_room'])
->middleware(['auth', Admin::class]);

route::post('/add_room',[AdminController::class,'add_room'])
->middleware(['auth', Admin::class]);

route::get('/view_room',[AdminController::class,'view_room'])
->middleware(['auth', Admin::class]);

route::get('/room_delete/{id}',[AdminController::class,'room_delete'])
->middleware(['auth', Admin::class]);

route::get('/room_update/{id}',[AdminController::class,'room_update'])
->middleware(['auth', Admin::class]);

route::post('/edit_room/{id}',[AdminController::class,'edit_room'])
->middleware(['auth', Admin::class]);

route::get('/room_details/{id}',[HomeController::class,'room_details']);

route::post('/add_booking/{id}',[HomeController::class,'add_booking']);

route::get('/bookings',[AdminController::class,'bookings'])
->middleware(['auth', Admin::class]);

route::get('/users',[AdminController::class,'users'])
->middleware(['auth', Admin::class]);


route::get('/delete_user/{id}', [AdminController::class, 'delete_user'])
    ->middleware(['auth', Admin::class])
    ->name('admin.delete_user');

route::get('/delete_booking/{id}',[AdminController::class,'delete_booking'])
->middleware(['auth', Admin::class]);

route::get('/delete_email/{id}',[AdminController::class,'delete_email_info'])
->middleware(['auth', Admin::class]);

route::get('/approve_booking/{id}',[AdminController::class,'approve_booking'])
->middleware(['auth', Admin::class]);

route::get('/reject_booking/{id}',[AdminController::class,'reject_booking'])
->middleware(['auth', Admin::class]);

route::get('/view_gallery',[AdminController::class,'view_gallery'])
->middleware(['auth', Admin::class]);

route::post('/upload_gallery',[AdminController::class,'upload_gallery'])
->middleware(['auth', Admin::class]);

route::get('/delete_gallery/{id}',[AdminController::class,'delete_gallery'])
->middleware(['auth', Admin::class]);

route::post('/contact',[HomeController::class,'contact']);

route::get('/all_messages',[AdminController::class,'all_messages'])
->middleware(['auth', Admin::class]);

route::get('/send_mail/{id}',[AdminController::class,'send_mail'])
->middleware(['auth', Admin::class]);

route::post('/mail/{id}',[AdminController::class,'mail'])
->middleware(['auth', Admin::class]);

route::get('/our_rooms',[HomeController::class,'our_rooms']);

route::get('/hotel_gallery',[HomeController::class,'hotel_gallery']);

route::get('/contact_us',[HomeController::class,'contact_us']);