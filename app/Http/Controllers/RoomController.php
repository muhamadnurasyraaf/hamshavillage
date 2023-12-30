<?php

namespace App\Http\Controllers;

use App\Models\ChaletImage;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ReceivingAccountBank;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $rooms = Room::with('images')->get();

       return response()->json($rooms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = ReceivingAccountBank::create([
            'Bank_Name' => 'Bank Islam',
            'number_account' => '1212 2010 011759',
            'account_name' => 'TETUAN HAMSHA BEAULICIOUS & CAFE',
        ]);

        // FAMILY CHALET
    Room::create([
        'room_name' => 'FAMILY CHALET',
        'description' => 'Max 20 org. Extra charge RM15/pax akan dikenakan jika bilangan guest melebihi pax yang telah ditetapkan.',
        'price' => 400, // Adjusted price for FAMILY CHALET (for example)
        'imageUrl' => 'your_image_url_here',
    ]);

    // CHALET KAYU 1 & 2
    Room::create([
        'room_name' => 'CHALET KAYU 1',
        'description' => '2 Dewasa 1 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 150, // Adjusted price for CHALET KAYU 1 & 2 (for example)
        'imageUrl' => 'inside_ck1.jpg',
    ]);
    Room::create([
        'room_name' => 'CHALET KAYU 2',
        'description' => '2 Dewasa 1 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 150, // Adjusted price for CHALET KAYU 1 & 2 (for example)
        'imageUrl' => 'your_image_url_here',
    ]);

    // CHALET MODEN
    Room::create([
        'room_name' => 'CHALET MODEN',
        'description' => '2 Dewasa 1 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 150, // Adjusted price for CHALET MODEN (for example)
        'imageUrl' => 'your_image_url_here',
    ]);

    // TINY HOUSE
    Room::create([
        'room_name' => 'TINY HOUSE',
        'description' => '2 Dewasa 2 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 150, // Adjusted price for TINY HOUSE (for example)
        'imageUrl' => 'your_image_url_here',
    ]);

    // ENGLISH CALET
    Room::create([
        'room_name' => 'ENGLISH CALET',
        'description' => '2 Dewasa 2 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 150,// Adjusted price for ENGLISH CALET (for example)
        'imageUrl' => 'stairs_eng.jpg',
    ]);

    return Room::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::find($id);
        $images = ChaletImage::where('room_id',$id);
        return response()->json([
            'room' => $room,
            'images' => $images,
        ]);
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
    public function destroy($id)
    {
        try {
            $room = Room::find($id);
            if (!$room) {
                return response()->json(['error' => 'Room not found'], 404);
            }

            $room->delete(); // Correct method to delete the record

            return response()->json(['message' => 'Successfully deleted a room']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete room', 'details' => $e->getMessage()], 500);
        }
    }

}
