<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChartController extends Controller
{
    public function fetchData()
    {
        $apiKey = 'TD9MZFLUBN88NX7FSMZUJBWAS';
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

                return response()->json($chartData);
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
        $labels = [];
        $values = [];
    
        foreach ($data as $entry) {
            $labels[] = $entry['Date time'];
            $values[] = floatval($entry['Temperature']);
        }
    
        Log::info('Processed Data:', ['labels' => $labels, 'values' => $values]);
    
        return ['labels' => $labels, 'values' => $values];
    }
    //first api done


    public function fetchSecondChartData()
    {   //key 1
        // $apiKey = 'PAXRVBG4VX4FEN5EH2A4HMZTT';
        
        $apiKey = 'TD9MZFLUBN88NX7FSMZUJBWAS';
         $startDateTime = '2023-01-01T00:00:00';
        $endDateTime = '2023-01-05T23:59:59';
        $response = Http::withoutVerifying()->get("https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Denver,CO?unitGroup=metric&key={$apiKey}&contentType=csv&include=days&elements=datetime,temp");
        $apiResponse = $response->body();
        Log::info($apiResponse);

        if ($response->successful()) {
            $data = $this->parseSecondCsvData($apiResponse);

            if (!empty($data)) {
                $chartData = $this->processSecondData($data);

                return response()->json($chartData);
            }
        }

        return response()->json(['error' => $apiResponse]);
    }
    private function parseSecondCsvData($csvString)
    {
        $lines = explode("\n", trim($csvString));
        $header = str_getcsv(array_shift($lines));

        $data = [];
        foreach ($lines as $line) {
            $row = array_combine($header, str_getcsv($line));
            if (isset($row['datetime'])) {
                $data[] = $row;
            } else {
                Log::warning('Key "datetime" not found in CSV row', ['row' => $row]);
            }
        }

        Log::info('Parsed Visual Crossing CSV Data:', ['data' => $data]);
        return $data;
    }

    private function processSecondData($data)
    {
        $labels = [];
        $values = [];

        foreach ($data as $entry) {
            $labels[] = $entry['datetime'];
            $values[] = floatval($entry['temp']);
        }

        Log::info('Processed Visual Crossing Data:', ['labels' => $labels, 'values' => $values]);

        return ['labels' => $labels, 'values' => $values];
    }
    //second api done 

// public function fetchThirdChartData()
// {
//     $apiKey = 'TD9MZFLUBN88NX7FSMZUJBWAS';
//     $response = Http::withoutVerifying()->get("https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/New York City,NY?unitGroup=metric&key={$apiKey}&contentType=json&elements=datetime,pm1,pm2p5,pm10,o3,no2,so2,co,aqius,aqieur");
//     $apiResponse = $response->body();
//     Log::info($apiResponse);

//     if ($response->successful()) {
//         $data = $this->parseThirdCsvData($apiResponse);

//         if (!empty($data)) {
//             $chartData = $this->processThirdData($data);

//             return response()->json($chartData);
//         }
//     }

//     return response()->json(['error' => $apiResponse]);
// }

// private function parseThirdCsvData($csvString)
// {
//     $lines = explode("\n", trim($csvString));
//     $header = str_getcsv(array_shift($lines));

//     $data = [];
//     foreach ($lines as $line) {
//         $row = array_combine($header, str_getcsv($line));
//         if (isset($row['datetime'])) {
//             $data[] = $row;
//         } else {
//             Log::warning('Key "datetime" not found in CSV row', ['row' => $row]);
//         }
//     }

//     Log::info('Parsed Third Chart CSV Data:', ['data' => $data]);
//     return $data;
// }

// private function processThirdData($data)
// {
//     $labels = [];
//     $values = [];

//     foreach ($data as $entry) {
//         $labels[] = $entry['datetime'];
//         $values[] = floatval($entry['temp']);
//     }

//     Log::info('Processed Third Chart Data:', ['labels' => $labels, 'values' => $values]);

//     return ['labels' => $labels, 'values' => $values];
// }

}
