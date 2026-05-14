<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegister(Request $request)
    {
        return view('auth.register_form');
    }

    // 確認画面
    public function confirm(RegisterRequest $request)
    {
        // データ取得
        $validated = $request->validated();
        // セッチョン保存
        $request->session()->put('register_data',$validated);
        // 確認画面表示
        return view('auth.register_confirm',[
            'data' => $validated
        ]);
    }

    // 戻る
    public function back(Request $request)
    {
        $request -> flash();
        $data = $request->session()->get('register_data');

        return redirect()->route('register.form');
    }

    // 完了画面
    public function complete(Request $request)
    {
        $data = $request->session()->get('register_data');

        User::create([
            'name' => $data['name'],
            'name_kana'=>$data['name_kana'],
            'email'=>$data['email'],
            'password_hash' => Hash::make($data['password']),
            'role'=>'0',
            'status' => 1,
        ]);

        return view('auth.register_complete');
    }
}
