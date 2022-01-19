<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Spotify\Spotify;

class AuthenticatorController extends Controller
{
    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/login';
	const SPOTIFY_ACCOUNTS_BASE_URI = 'https://accounts.spotify.com';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 protected $client_id;
    protected $client_Secret;
    protected $redirect_URL;

   
    public function __construct()
    {
       
       	$this->client_id = env('SPOTIFY_CLIENT_ID');
        $this->client_Secret = env('SPOTIFY_CLIENT_SECRET');
        $this->redirect_URL = env('SPOTIFY_REDIRECT_URL');
		$this->spotify_api_url = env('SPOTIFY_BASE_URL');
    }
    
	public function verifylogin(Request $request)
    {
        if (empty($request->get('code'))) {
            return redirect('/login');
        }

        $spotifyAuthenticator = new Spotify('https://accounts.spotify.com','Basic ' . base64_encode("{$this->client_id}:{$this->client_Secret}"));

       
		$params = array(
            'grant_type' => 'authorization_code',
            'code' => $request->get('code'),
            'redirect_uri' => $this->redirect_URL
        );

        $token = $spotifyAuthenticator->apiconnect('POST', '/api/token', array(), $params, true);
		
        session(array('token' => $token));

        return redirect('/');
    }
	
}
