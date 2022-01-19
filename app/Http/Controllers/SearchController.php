<?php

namespace App\Http\Controllers;
use \App\Spotify\Spotify;
use Illuminate\Http\Request;

class SearchController extends Controller
{
     protected $Spotify;
	 public function __construct()
    {
		$this->client_id = env('SPOTIFY_CLIENT_ID');
        $this->client_Secret = env('SPOTIFY_CLIENT_SECRET');
        $this->redirect_URL = env('SPOTIFY_REDIRECT_URL');
		$this->spotify_api_url = env('SPOTIFY_BASE_URL');
		
    }
	
	public function index()
    {
		if(isset(session('token')['access_token'])){
        	return view('index');
		}else{
			return redirect('/login');			
		}
    }


    public function search(Request $request)
    {
        $query = $request->get('query');
		
		if(isset(session('token')['access_token'])){
			
			$token = session('token')['access_token'];
			$this->Spotify = new Spotify($this->spotify_api_url,'Bearer '.$token);
			$results = $this->Spotify->find($query);
			
        	return view('search')->with(['searchTerm' => $query])->with('data', $results);
		
		}else{
			return redirect('/login');	
		}
	}
	
	public function getdetail($type,$id)
    {
		
		if(isset(session('token')['access_token'])){
			
			$token = session('token')['access_token'];
			$this->Spotify = new Spotify($this->spotify_api_url,'Bearer '.$token);
			$details = $this->Spotify->getdetails($type,$id);
        	return view('details')->with('details', $details);
		
		}else{
			return redirect('/login');	
		}
		
		
    }
	
	
}
