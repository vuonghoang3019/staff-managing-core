<?php

namespace Admin\Services;

use Admin\Http\Requests\Login\LoginRequest;
use Admin\Models\User;
use Admin\Repos\LoginRepo;
use Admin\Repos\UserRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginService extends BaseService
{
    protected UserRepo $userRepo;
    protected LoginRepo $loginRepo;

    public function __construct(UserRepo $userRepo, LoginRepo $loginRepo)
    {
        parent::__construct();
        $this->userRepo = $userRepo;
        $this->loginRepo = $loginRepo;
    }

    public function login(LoginRequest $request)
    {
        try {
            $username = explode('@', $request->get('Username'));
            $username = array_shift($username);
            $user = $this->userRepo->getAccountByCode($username);

            if (!$user || $user->removed()) return $this->response->unauthorized(__('Account not exists.'));

            if ($user->disabled()) return $this->response->unauthorized(__('Account has been blocked.'));

            if ($user->maxAttempts()) return $this->response->unauthorized(__('Login failed too many times.Your account has been blocked.'));

            $logon = $user->loginDB(request('Password'));

            if (!$logon) {
                $user->increaseAttempts();

                return $this->response->unauthorized(__('Password is invalid.'));
            }

            $user->clearAttempts();

            $tokenInfo = $this->createNewToken(create_token());

            $token = $tokenInfo->original['access_token'];

            $this->loginRepo->create($request->data($user->Id, $token));

            $login = attempt_login($token);

            return $this->response->success(['Token' => $token, 'User' => $login]);
        } catch (\Exception $ex) {
            return $this->response->serverError($ex->getMessage());
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
//            'expires_in' => auth()->factory()->getTTL() * 60,
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    public function changePassWord(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string|min:6',
            'new_password' => 'required|string|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $userId = auth()->user()->id;

        $user = User::where('id', $userId)->update(
            ['password' => bcrypt($request->new_password)]
        );

        return response()->json([
            'message' => 'User successfully changed password',
            'user' => $user,
        ], 201);
    }
}
