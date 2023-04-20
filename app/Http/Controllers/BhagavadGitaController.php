<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class BhagavadGitaController extends Controller
{
    public function index()
    {
       
        $client = new Client();
        $response = $client->request('GET', 'https://bhagavadgitaapi.in/api/v1/chapters');
        $data = json_decode($response->getBody(), true);
        return view('welcome', ['data' => $data]);
    }
}
