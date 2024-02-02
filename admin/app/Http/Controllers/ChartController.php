<?php
namespace App\Http\Controller;
use Illuminate\Support\Facades\Http;

class ChartController extends Controller
{
    public function fetchData()
    {
        $apiKey = 'PAXRVBG4VX4FEN5EH2A4HMZTT';
        $location = 'New York, NY';
        $startDateTime = '2023-01-01T00:00:00';
        $endDateTime = '2023-01-05T23:59:59';
    
        $response = Http::get("https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/weatherdata/history?key={$apiKey}&location={$location}&aggregateHours=24&startDateTime={$startDateTime}&endDateTime={$endDateTime}");
    
        $apiResponse = $response->body();
        Log::info($apiResponse); // Add this line to log the response
        if ($response->successful()) {
            $data = $response->json()['locations'][$location]['values'];
    
            $chartData = $this->processData($data);
    
            return response()->json($chartData);
        }
    
        return response()->json(['error' => $apiResponse]);
    }
    
}

