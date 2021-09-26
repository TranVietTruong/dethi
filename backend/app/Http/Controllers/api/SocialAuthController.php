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
        $this->userRepository = $userRepository;
    }

    public function url($provider)
    {
        $providerUrl = Socialite::driver($provider)->stateless()->redirect()->getTargetUrl();
        $data = responseData($providerUrl);
        return Response::json($data, 200);
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
            $data = responseData($accessToken);

            \DB::commit();
            return Response::json($data, 200);
        }
        catch(\Exception $exception)
        {
            \DB::rollback();
            $error = responseError();
            return Response::json($error, 500);
        }
    }

    public function me()
    {
        $user = auth()->user();
        $data = responseData($user);
        return Response::json($data, 200);
    }

    public function logout()
    {
        auth()->logout();
        return Response::json(responseData(), 200);
    }
}
