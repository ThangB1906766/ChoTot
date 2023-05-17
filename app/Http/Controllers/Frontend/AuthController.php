<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\UserType;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('frontend.auth.login');
    }

    public function postLogin(Request $request)
    {

        // dd($request->all());
        $credentials = [
            'email' => $request->email,
            'password' =>  $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('get.home');
        }

        return redirect()->back();
    }

    public function register(){
        return view('frontend.auth.register');
    }

    public function postRegister(RegisterUserRequest $request){
        try {
            DB::beginTransaction();
            $data = $request->except('_token', 'avatar', 'user_type'); // Lấy dữ liệu từ $request gửi lên trừ _token và avatar
            $data['created_at'] = Carbon::now();
            $data['password'] = bcrypt($request->password); // Mã hóa password
            $data['status'] = $request->status ?? 1;

            if($request->avatar){
                $file = upload_image('avatar');
                if(isset($file['code']) && $file['code'] == 1){
                    $data['avatar'] = $file['name'];
                }
            }

            $userType = UserType::where('name', User::ROLE_USER)->first();

            $user = User::create($data);
            if($user){
                DB::table('user_has_types')->insert([
                    'user_type_id' => $userType->id,
                    'created_at' => Carbon::now(),
                    'user_id' => $user->id
                ]);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("ERROR => AuthController@store => ". $exception->getMessage());
            return redirect()->route('get_admin.user.index');
        }
        return redirect()->route('get.home');
    }
}
