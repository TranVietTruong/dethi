<?php

namespace App\Http\Controllers\api;

use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth:api', ['except' => ['url', 'callback']]);

        $this->userRepository = $userRepository;
    }

    public function url($provider)
    {
        return Response::json([
            'data' => Socialite::driver($provider)->stateless()->redirect()->getTargetUrl(),
            'code' => 200
        ]);
    }

    public function callback($provider)
    {
        try
        {
            \DB::beginTransaction();

            $providerUser = Socialite::driver($provider)->stateless()->user();

            $user = $this->userRepository->getFirstBy('provider_id', $providerUser->id);
            if($user)
                $accessToken = auth()->login($user);
            else
            {
                $params = [
                    'name' => $providerUser->name,
                    'email' => $providerUser->email,
                    'avatar' => $providerUser->avatar,
                    'provider' => $provider,
                    'provider_id' => $providerUser->id
                ];

                $user = $this->userRepository->save($params);
                $accessToken = auth()->login($user);
            }
            \DB::commit();
            return Response::json([
                'data' => $accessToken,
                'code' => 200
            ]);
        }
        catch(\Exception $exception)
        {
            \DB::rollback();
            return Response::json([
                'data' => 'error',
                'code' => 500
            ]);
        }
    }

    public function me()
    {
        $user = auth()->user();
        return Response::json(['data' => $user, 'code' => 200]);
    }
}
