<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerRegister extends Controller
{
    //
    public function store(Request $request)
    {
        $nama = $request->input('nama');
        $email = $request->input('email');
        $email_verified = $request->input('email_verified');
        $remember_token = $request->input('token');
        $password = $request->input('password');

        if (\App\Models\User::where('email', $email)->first() != null) {
            $res['message'] = "duplicate";
            return response($res);
        } else {
            $data = new \App\Models\User();
            $data->name = $nama;
            $data->email = $email;
            $data->email_verified_at = $email_verified;
            $data->remember_token = $remember_token;
            $data->password = $password;


            if ($data->save()) {
                $res['message'] = "success";
                $res['value'] = "$data";
                return response($res);
            } else {
                $res['message'] = "failed";
                return response($res);
            }
        }
    }
}
