<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Room;
use App\Models\User;
use App\Models\ChaletImage;
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

    $formattedRooms = $rooms->map(function ($room) {
        $firstImage = $room->images->first();

        return [
            'id' => $room->id,
            'room_name' => $room->room_name,
            'description' => $room->description,
            'price' => $room->price,
            'imageUrl' => $firstImage ? $firstImage->imageUrl : null, // Change 'url' to the actual attribute name
            'isBooked' => $room->isBooked, // Adjust as per your data structure
            // Add more room details if needed
        ];
    });

    return response()->json($formattedRooms);
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
    ]);

    // CHALET KAYU 1 & 2
    Room::create([
        'room_name' => 'CHALET KAYU 1',
        'description' => '2 Dewasa 1 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 150, // Adjusted price for CHALET KAYU 1 & 2 (for example)
    ]);
    Room::create([
        'room_name' => 'CHALET KAYU 2',
        'description' => '2 Dewasa 1 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 150, // Adjusted price for CHALET KAYU 1 & 2 (for example)
    ]);

    // CHALET MODEN
    Room::create([
        'room_name' => 'CHALET MODEN',
        'description' => '2 Dewasa 1 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 150, // Adjusted price for CHALET MODEN (for example)
    ]);

    // TINY HOUSE
    Room::create([
        'room_name' => 'TINY HOUSE',
        'description' => '2 Dewasa 2 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 150, // Adjusted price for TINY HOUSE (for example)
    ]);

    // ENGLISH CALET
    Room::create([
        'room_name' => 'ENGLISH CALET',
        'description' => '2 Dewasa 2 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 150,// Adjusted price for ENGLISH CALET (for example)
    ]);

    return Room::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
            ]);

             Room::create([
                'room_name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
            ]);

            return response()->json(['message' => 'Room created successfully'], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::find($id);
        $images = ChaletImage::where('room_id',$id)->get();
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
