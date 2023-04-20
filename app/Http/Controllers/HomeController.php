<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chapter;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
   
    
    // public function index(Request $request)
    // {
	// 	  $client = new Client();
    //     $response = $client->request('GET', "https://bhagavadgitaapi.in/chapters");
    //     $data = json_decode($response->getBody(), true);
    //     return view('welcome', ['data' => $data]);
    // }
    public function index()
    {
        $response = Http::get('https://bhagavadgitaapi.in/chapters');

        $chapters = $response->json();

        foreach ($chapters as $chapter) {
            Chapter::updateOrCreate(['chapter_number' => $chapter['chapter_number']], [
                'verses_count' => $chapter['verses_count'],
                'name' => $chapter['name'],
                'translation' => $chapter['translation'],
                'transliteration' => $chapter['transliteration'],
                'meaning' => json_encode($chapter['meaning']),
                'summary' => json_encode($chapter['summary'])
            ]);
        }

        return view('welcome', ['chapters' => $chapters]);
    }

    public function nextpage(Request $request)
    {
		
        $data = array();
        
        return view('home.nextpage' ,$data);
    }
}
