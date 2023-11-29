<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // FAMILY CHALET
    Room::create([
        'room_name' => 'FAMILY CHALET',
        'description' => 'Max 20 org. Extra charge RM15/pax akan dikenakan jika bilangan guest melebihi pax yang telah ditetapkan.',
        'price' => 300, // Adjusted price for FAMILY CHALET (for example)
        'imageUrl' => 'your_image_url_here',
    ]);

    // CHALET KAYU 1 & 2
    Room::create([
        'room_name' => 'CHALET KAYU 1 & 2',
        'description' => '2 Dewasa 1 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 250, // Adjusted price for CHALET KAYU 1 & 2 (for example)
        'imageUrl' => 'your_image_url_here',
    ]);

    // CHALET MODEN
    Room::create([
        'room_name' => 'CHALET MODEN',
        'description' => '2 Dewasa 1 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 270, // Adjusted price for CHALET MODEN (for example)
        'imageUrl' => 'your_image_url_here',
    ]);

    // TINY HOUSE
    Room::create([
        'room_name' => 'TINY HOUSE',
        'description' => '2 Dewasa 2 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 200, // Adjusted price for TINY HOUSE (for example)
        'imageUrl' => 'your_image_url_here',
    ]);

    // ENGLISH CALET
    Room::create([
        'room_name' => 'ENGLISH CALET',
        'description' => '2 Dewasa 2 Kanak2. Sekiranya ada tambahan, Extra Tilam RM20.',
        'price' => 280, // Adjusted price for ENGLISH CALET (for example)
        'imageUrl' => 'your_image_url_here',
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
