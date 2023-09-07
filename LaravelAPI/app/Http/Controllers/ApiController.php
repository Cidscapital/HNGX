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

        // Get current UTC time with validation of +/-2 minutes
        $currentUtcTime = gmdate('Y-m-d\TH:i:s\Z');

        // Define GitHub URLs
        $githubFileUrl = 'https://github.com/username/repo/blob/main/file_name.ext';
        $githubRepoUrl = 'https://github.com/username/repo';

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

