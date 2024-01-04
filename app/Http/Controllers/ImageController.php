<?php

namespace App\Http\Controllers;

use App\Models\ChaletImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = ChaletImage::all();
        return response()->json($images);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jsonData = '[
            {
                "id": 1,
                "imageUrl": "/storage/rooms/1704214920_WhatsApp Image 2023-11-22 at 18.26.54_79d3a4b9.jpg",
                "room_id": 1,
                "created_at": "2024-01-02T17:02:00.000000Z",
                "updated_at": "2024-01-02T17:02:00.000000Z"
            },
            {
                "id": 2,
                "imageUrl": "/storage/rooms/1704214952_WhatsApp Image 2023-11-22 at 18.26.55_4058f3b6.jpg",
                "room_id": 1,
                "created_at": "2024-01-02T17:02:32.000000Z",
                "updated_at": "2024-01-02T17:02:32.000000Z"
            },
            {
                "id": 3,
                "imageUrl": "/storage/rooms/1704214956_WhatsApp Image 2023-11-22 at 18.26.53_ebd4902a.jpg",
                "room_id": 1,
                "created_at": "2024-01-02T17:02:36.000000Z",
                "updated_at": "2024-01-02T17:02:36.000000Z"
            },
            {
                "id": 4,
                "imageUrl": "/storage/rooms/1704214963_WhatsApp Image 2023-11-22 at 18.26.54_6f8fc7c4.jpg",
                "room_id": 1,
                "created_at": "2024-01-02T17:02:43.000000Z",
                "updated_at": "2024-01-02T17:02:43.000000Z"
            },
            {
                "id": 5,
                "imageUrl": "/storage/rooms/1704214974_WhatsApp Image 2023-11-22 at 18.26.54_b6c50392.jpg",
                "room_id": 1,
                "created_at": "2024-01-02T17:02:54.000000Z",
                "updated_at": "2024-01-02T17:02:54.000000Z"
            },
            {
                "id": 6,
                "imageUrl": "/storage/rooms/1704214985_WhatsApp Image 2023-11-22 at 18.26.54_83fa92e7.jpg",
                "room_id": 1,
                "created_at": "2024-01-02T17:03:05.000000Z",
                "updated_at": "2024-01-02T17:03:05.000000Z"
            },
            {
                "id": 7,
                "imageUrl": "/storage/rooms/1704215051_WhatsApp Image 2023-11-22 at 18.23.02_2899f6d0.jpg",
                "room_id": 2,
                "created_at": "2024-01-02T17:04:12.000000Z",
                "updated_at": "2024-01-02T17:04:12.000000Z"
            },
            {
                "id": 8,
                "imageUrl": "/storage/rooms/1704215056_WhatsApp Image 2023-11-22 at 18.23.03_e3db7945.jpg",
                "room_id": 2,
                "created_at": "2024-01-02T17:04:16.000000Z",
                "updated_at": "2024-01-02T17:04:16.000000Z"
            },
            {
                "id": 9,
                "imageUrl": "/storage/rooms/1704215060_WhatsApp Image 2023-11-22 at 18.23.03_f830aca9.jpg",
                "room_id": 2,
                "created_at": "2024-01-02T17:04:20.000000Z",
                "updated_at": "2024-01-02T17:04:20.000000Z"
            },
            {
                "id": 10,
                "imageUrl": "/storage/rooms/1704215066_WhatsApp Image 2023-11-22 at 18.23.02_5f4f7f45.jpg",
                "room_id": 2,
                "created_at": "2024-01-02T17:04:26.000000Z",
                "updated_at": "2024-01-02T17:04:26.000000Z"
            },
            {
                "id": 11,
                "imageUrl": "/storage/rooms/1704215091_WhatsApp Image 2023-11-22 at 18.24.28_512f83cf.jpg",
                "room_id": 3,
            },
            {
                "id": 12,
                "imageUrl": "/storage/rooms/1704215097_WhatsApp Image 2023-11-22 at 18.24.27_b3fdf8d3.jpg",
                "room_id": 3,
            },
            {
                "id": 13,
                "imageUrl": "/storage/rooms/1704215104_WhatsApp Image 2023-11-22 at 18.24.28_a8161dff.jpg",
                "room_id": 3,
            },
            {
                "id": 14,
                "imageUrl": "/storage/rooms/1704215108_WhatsApp Image 2023-11-22 at 18.24.28_551e151b.jpg",
                "room_id": 3,
            },
            {
                "id": 15,
                "imageUrl": "/storage/rooms/1704215112_WhatsApp Image 2023-11-22 at 18.24.28_42c08d12.jpg",
                "room_id": 3,
            },
            {
                "id": 16,
                "imageUrl": "/storage/rooms/1704215147_WhatsApp Image 2023-11-22 at 18.25.14_cff71d08.jpg",
                "room_id": 4,
            },
            {
                "id": 17,
                "imageUrl": "/storage/rooms/1704215154_WhatsApp Image 2023-11-22 at 18.25.13_111aa648.jpg",
                "room_id": 4,
            },
            {
                "id": 18,
                "imageUrl": "/storage/rooms/1704215159_WhatsApp Image 2023-11-22 at 18.25.13_116fc9f0.jpg",
                "room_id": 4,
            },
            {
                "id": 19,
                "imageUrl": "/storage/rooms/1704215163_WhatsApp Image 2023-11-22 at 18.25.14_05888fff.jpg",
                "room_id": 4,
            },
            {
                "id": 20,
                "imageUrl": "/storage/rooms/1704215166_WhatsApp Image 2023-11-22 at 18.25.14_df49bdfe.jpg",
                "room_id": 4,
            },
            {
                "id": 21,
                "imageUrl": "/storage/rooms/1704215190_WhatsApp Image 2023-11-22 at 18.26.03_ffc3d38c.jpg",
                "room_id": 5,
            },
            {
                "id": 22,
                "imageUrl": "/storage/rooms/1704215194_WhatsApp Image 2023-11-22 at 18.26.04_a4c9b881.jpg",
                "room_id": 5,
            },
            {
                "id": 23,
                "imageUrl": "/storage/rooms/1704215198_WhatsApp Image 2023-11-22 at 18.26.02_7a6594fc.jpg",
                "room_id": 5,
            },
            {
                "id": 24,
                "imageUrl": "/storage/rooms/1704215201_WhatsApp Image 2023-11-22 at 18.26.03_c2692c08.jpg",
                "room_id": 5,
            },
            {
                "id": 25,
                "imageUrl": "/storage/rooms/1704215205_WhatsApp Image 2023-11-22 at 18.26.03_fa6c0924.jpg",
                "room_id": 5,
            },
            {
                "id": 27,
                "imageUrl": "/storage/rooms/1704215241_WhatsApp Image 2023-11-22 at 18.22.06_9a62dfe8.jpg",
                "room_id": 6,
            },
            {
                "id": 28,
                "imageUrl": "/storage/rooms/1704215249_WhatsApp Image 2023-11-22 at 18.22.06_50f44883.jpg",
                "room_id": 6,
            },
            {
                "id": 29,
                "imageUrl": "/storage/rooms/1704215252_WhatsApp Image 2023-11-22 at 18.22.06_225155ad.jpg",
                "room_id": 6,
            },
            {
                "id": 30,
                "imageUrl": "/storage/rooms/1704215256_WhatsApp Image 2023-11-22 at 18.22.05_74d1cd9a.jpg",
                "room_id": 6,
            },
            {
                "id": 31,
                "imageUrl": "/storage/rooms/1704215259_WhatsApp Image 2023-11-22 at 18.22.05_90185d8b.jpg",
                "room_id": 6,
            },
            {
                "id": 32,
                "imageUrl": "/storage/rooms/1704215262_WhatsApp Image 2023-11-22 at 18.22.06_8e334e02.jpg",
                "room_id": 6,
            },
            {
                "id": 33,
                "imageUrl": "/storage/rooms/1704215680_WhatsApp Image 2023-10-18 at 10.49.56_843cceca.jpg",
                "room_id": 7,
            }
        ]';

        $imageData = json_decode($jsonData, true);

        if ($imageData === null) {
            echo "Error decoding JSON data.";
        } else {
            // Create an empty array to hold ChaletImage instances
            $chaletImages = [];

            // Iterate over each record and prepare ChaletImage instances
            foreach ($imageData as $image) {
                $chaletImages[] = new ChaletImage([
                    'id' => $image['id'],
                    'imageUrl' => $image['imageUrl'],
                    'room_id' => $image['room_id'],
                    'created_at' => $image['created_at'],
                    'updated_at' => $image['updated_at'],
                ]);
            }

            // Insert all ChaletImage instances at once
            ChaletImage::insert($chaletImages);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'room_id' => 'required|exists:rooms,id'
            ]);

            $image = $validatedData['image'];
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('rooms',$imageName,'public');

            ChaletImage::create([
                'room_id' => $validatedData['room_id'],
                'imageUrl' => '/storage/rooms/'.$imageName,
            ]);
            return response()->json(['message' => 'Successfully submitted'],200);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $images = ChaletImage::where('room_id',$id)->get();
            return response()->json($images);
        } catch (\Exception $e) {
           return response()->json('Error fetching data' . $e);
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
    public function destroy($id)
    {
        try {
            $image = ChaletImage::find($id);

            if ($image) {
                $image->delete(); // Use delete() to remove the record from the database
                return response()->json(['message' => 'Image successfully deleted']);
            } else {
                return response()->json(['message' => 'Image not found']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

}
