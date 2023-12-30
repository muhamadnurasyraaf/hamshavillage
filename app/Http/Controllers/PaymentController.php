<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Dotenv\Exception\InvalidFileException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\PostTooLargeException;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    public function store(Request $request)
    {
      try {
        // Validate request
        $request->validate([
          'payment_receipt' => 'required|file|mimes:pdf,jpeg,png|max:10240',
          'booking_id' => 'required|numeric', // Validation for booking_id
        ]);
        $booking = Booking::find($request['booking_id']);
        // Process file upload
        $file = $request->file('payment_receipt');
        if (!$file->isValid()) {
          throw new InvalidFileException('Invalid file');
        }
        $room = $booking->room;

        $room->isBooked = 1;
        $room->save();
        // Save file and update database
        $filePath = $file->store('receipts','public');
        $pay = new Payment();
        $pay->file_url = $filePath;
        $pay->booking_id = $request->input('booking_id');
        $pay->save();
        $booking->paid = 1;
        $booking->save();
        // Return success response
        return response()->json(['message' => 'File uploaded successfully']);
      } catch (InvalidFileException $e) {
        // Handle invalid file exception
        return response()->json(['error' => $e->getMessage()], 400);
      } catch (Exception $e) {
        // Handle other exceptions
        return response()->json(['error' => 'An unexpected error occurred'], 500);
      }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
