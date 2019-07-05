<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdatePasswordRequest;

class ChangePasswordController extends Controller
{
    public function show()
    {
        return view('users.change_password');
    }
    public function update(UpdatePasswordRequest $request)
    {
        $user = \Auth::user();
        $user->password = bcrypt($request->new_password);

        if ($user->save()) {
            $updateResponse = array('success' => __('auth.change_password_success'));
        } else {
            $updateResponse = array('error' => __('auth.change_password_error'));
        }

        flash(__('app.password_changed'), 'success');

        return redirect()->back()->with($updateResponse);
    }
}
