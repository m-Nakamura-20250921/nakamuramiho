<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    //ログイン画面表示
    public function showLogin(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        // バリテーション済みデータ取得
        $credentials = $request->validated();

        // 認証
        if (Auth::attempt($credentials)){
            $request -> session() -> regenerate();
            // ユーザーは認証のみ
            $user = Auth::user(); // 現在のユーザー情報を取得

            // 管理者だったら
            if ($user->role === User::ROLE_ADMIN){
                // return redirect() -> route('admin.index');
                return redirect() -> route('user');
            }
            // 一般ユーザー
            return redirect() -> route('user');
        }

        // エラー
        return back()->withErrors([
            'password' => 'パスワードが異なります。正しいパスワードを入力してください。',
        ])->withInput();
    }
}
