<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function task1(Request $request)
    {
        // Retrieve GET parameters
        $slackName = $request->input('slack_name');
        $track = $request->input('track');

        // Get current day of the week
        $currentDay = date('l');

        // Get current UTC time in the desired format (2023-09-08T17:25:17Z)
        $currentUtcTime = now('UTC')->toIso8601ZuluString();

        // Define GitHub URLs
        $githubFileUrl = 'https://github.com/Cidscapital/HNGX/blob/main/LaravelAPI/app/Http/Controllers/ApiController.php';
        $githubRepoUrl = 'https://github.com/Cidscapital/HNGX/tree/main/LaravelAPI';

        // Create the JSON response array
        $data = [
            'slack_name' => $slackName,
            'current_day' => $currentDay,
            'utc_time' => $currentUtcTime,
            'track' => $track,
            'github_file_url' => $githubFileUrl,
            'github_repo_url' => $githubRepoUrl,
            'status_code' => '200'
        ];

        // Return the JSON response
        return response()->json($data);
    }
}

