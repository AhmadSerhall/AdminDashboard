<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class ChartController extends Controller
{
    public function fetchData()
    {
        $apiKey = 'PAXRVBG4VX4FEN5EH2A4HMZTT';
        $location = 'New York, NY';
        $startDateTime = '2023-01-01T00:00:00';
        $endDateTime = '2023-01-05T23:59:59';
    
        $response = Http::withoutVerifying()->get("https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/weatherdata/history?key={$apiKey}&location={$location}&aggregateHours=24&startDateTime={$startDateTime}&endDateTime={$endDateTime}");
    
        $apiResponse = $response->body();
        Log::info($apiResponse); 
        if ($response->successful()) {
            $data = $this->parseCsvData($apiResponse);
    
            if (!empty($data)) {
                $chartData = $this->processData($data);
    
                
                return View::make('chart')->with('chartData', $chartData);
            }
        }
    
        return response()->json(['error' => $apiResponse]);
    }
    
    private function parseCsvData($csvString)
    {
        $lines = explode("\n", trim($csvString));
        $header = str_getcsv(array_shift($lines));
    
        $data = [];
        foreach ($lines as $line) {
            $row = array_combine($header, str_getcsv($line));
            $data[] = $row;
        }
        
        Log::info('Parsed CSV Data:', ['data' => $data]);
        return $data;
    }
    


    private function processData($data)
    {

        $labels = ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5'];
        $values = [25, 28, 22, 30, 27];

        return ['labels' => $labels, 'values' => $values];
    }
}
