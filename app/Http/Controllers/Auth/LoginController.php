<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \App\Spotify\Spotify;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    protected $client_id;
    protected $client_Secret;
    protected $redirect_URL;

    protected $redirectTo = '/';

    public function __construct()
    {
        	$this->client_id = env('SPOTIFY_CLIENT_ID');
        $this->client_Secret = env('SPOTIFY_CLIENT_SECRET');
        $this->redirect_URL = env('SPOTIFY_REDIRECT_URL');
		$this->spotify_api_url = env('SPOTIFY_BASE_URL');
    }

    public function index()
    {
		
        return view('login');
    }

    public function sendloginrequest()
    {
        $parameters = array(
            'client_id' => $this->client_id,
            'scope' => 'user-read-private user-read-email',
            'response_type' => 'code',
            'redirect_uri' => $this->redirect_URL,
        );
        return redirect()->away('https://accounts.spotify.com/authorize?' . http_build_query($parameters));
    }
}
