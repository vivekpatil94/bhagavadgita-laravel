<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chapter;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
   
    
    public function index(Request $request)
    {
          $this->fetchAndSaveChapters();

		 $chapters = Chapter::all();

          foreach ($chapters as $chapter) {
        $meaning = json_decode($chapter->meaning);
        $summary = json_decode($chapter->summary);

        // Add the parsed data to the chapter object
        $chapter->meaning_en = $meaning->en;
        $chapter->meaning_hi = $meaning->hi;
        $chapter->summary_en = $summary->en;
        $chapter->summary_hi = $summary->hi;
        }


        //return view('welcome', compact('chapters'));
        return view('welcome', ['chapters' => $chapters]);
    }
    public function fetchAndSaveChapters()
    {
         // Check if chapters already exist in the database
    $chaptersExist = Chapter::exists();

    // If chapters do not exist, fetch data from API and save to database
    if (!$chaptersExist) {
        $response = Http::get('https://bhagavadgitaapi.in/chapters')->json();
        foreach ($response as $chapterData) {
            $chapter = new Chapter;
            $chapter->chapter_number = $chapterData['chapter_number'];
            $chapter->verses_count = $chapterData['verses_count'];
            $chapter->name = $chapterData['name'];
            $chapter->translation = $chapterData['translation'];
            $chapter->transliteration = $chapterData['transliteration'];
            $chapter->meaning_en = $chapterData['meaning']['en'];
            $chapter->meaning_hi = $chapterData['meaning']['hi'];
            $chapter->summary_en = $chapterData['summary']['en'];
            $chapter->summary_hi = $chapterData['summary']['hi'];
            $chapter->save();
        }
    }
    }

    public function nextpage(Request $request)
    {
		
        $data = array();
        
        return view('home.nextpage' ,$data);
    }
}
