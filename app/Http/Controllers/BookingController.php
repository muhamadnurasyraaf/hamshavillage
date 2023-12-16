<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ReceivingAccountBank;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Booking::orderBy('created_at','DESC')->get();
    }

    public function create(){
       $data = Booking::create([
            'room_id' => 1,
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'extra_mat' => 2,
            'phonenumber' => '1234567890',
            'notes' => 'This is a sample booking.',
            'checkin_date' => '2023-12-01',
            'checkout_date' => '2023-12-05',
        ]);
        return $data;
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'room_id' => 'required',
                'name' => 'required|string|min:5|max:100',
                'email' => 'required|email',
                'phonenumber' => 'required|string',
                'notes' => 'max:200|nullable',
                'checkin_date' => 'required|date',
                'checkout_date' => 'required|date|after:checkin_date',
                'paid' => 'boolean',
                'breakfast' => 'integer',
                'extra_mat' => 'integer',
            ]);
            $room = Room::find($validatedData['room_id']);
            $checkin = Carbon::parse($validatedData['checkin_date']);
            $checkout = Carbon::parse($validatedData['checkout_date']);

            $room_price = $room->price;
            $days = $checkin->diffInDays($checkout);
            $breakfast = $validatedData['breakfast'];
            $extra_mat = $validatedData['extra_mat'];

            $cost = ($room_price * $days) + ($breakfast * 10) + ($extra_mat * 20);
            $validatedData['cost'] = $cost;
            $validatedData['days'] = $days;
            $booking = Booking::create($validatedData);



            // Return a success response
            return response()->json([
                'message' => 'Booking created successfully',
                'data' => $booking,
                'id' => $booking->id,
            ],200);
        } catch (ValidationException $e) {
            // Handle the validation exception here
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422); // 422 status code represents Unprocessable Entity (validation errors)
        } catch (\Exception $e) {
            // Handle other exceptions here
            return response()->json([
                'message' => 'Something went wrong' . $e,
            ]); // 500 status code represents Internal Server Error
        }
    }


    public function show($id)
    {
        try{
            $booking = Booking::findOrFail($id);
            $room = $booking->room;
            $bank = ReceivingAccountBank::find(1);
            return response()->json([
                'success' => true,
                'data' => $booking,
                'room' => $room,
                'bank' => $bank,
            ]);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Booking not found',
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
