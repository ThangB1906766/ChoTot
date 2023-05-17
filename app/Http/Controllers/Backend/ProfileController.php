<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



use Carbon\Carbon;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(){
        
        $user = Auth::user();

        $viewData = [
            'user' => $user
        ];

        return view('backend.profile.index',  $viewData);
    }

    public function updateProfile(Request $request, $id)
    {
        try {
            $data               = $request->except('_token', 'avatar');
            $data['updated_at'] = Carbon::now();

            if ($request->avatar) {
                $file = upload_image('avatar');
                if (isset($file['code']) && $file['code'] == 1) $data['avatar'] = $file['name'];
            }

            $update = User::find($id)->update($data);
            toastr()->success('Cập nhật thành công!', 'Thông báo', ['timeOut' => 2000]);
        } catch (\Exception $exception) {
            Log::error("ERROR => ProfileController@store => " . $exception->getMessage());
            toastr()->error('Cập nhật thất bại!', 'Thông báo', ['timeOut' => 2000]);
            return redirect()->route('post_admin.profile.update', $id);
        }
        return redirect()->route('get_admin.profile.index');
    }

    public function updatePassword(){
          
        $user = Auth::user();

        $viewData = [
            'user' => $user
        ];

        return view('backend.profile.update_password',  $viewData);
    }

    public function processUpdatePassword(UpdatePasswordRequest $request, $id){

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->updated_at = Carbon::now();

        $user->save(); // Lỗi nhưng kh sao ??

        return redirect()->back(); 
    }
}
