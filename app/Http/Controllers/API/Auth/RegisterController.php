<?php
namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) :JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'gender' => 'required',
            'password' => 'required|min:8|confirmed',
            'image' => 'required|file|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);


        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['image_id'] = null;

        if($request->hasFile('image')){
            $image = Image::upload($request->file('image'));
            if($image){
                $input['image_id'] = $image->id;
            }
        }
        $user = User::create($input);
        $success['token'] = $user->createToken(config('app.name'))->accessToken;
        $success['name'] = User::find($user->id);

        return $this->sendResponse($success, 'User register successfully.');
    }
}