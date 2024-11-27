<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class AuthController extends Controller
{
    public function showLogin(): View|Factory|Application
    {
        return view('auth.login');
    }

    public function showRegister(): View|Factory|Application
    {
        return view('auth.register');
    }

    public function postRegister(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $input['role_type'] = User::ROLE_CUSTOMER;
            $user = new User();
            $user->fill($input);
            $user->save();
            DB::commit();
            return redirect()->route('customer.showLogin')->with('success', 'Đăng ký tài khoản thành công');
        }catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function postLogin(Request $request): ?RedirectResponse
    {
        try {
            $credentials = $request->only('email', 'password');
            if (auth()->attempt($credentials)) {
                if (auth()->user()->role_type === User::ROLE_ADMIN) {
                    return redirect()->route('user.showIndex');
                }
                return redirect()->route('customer.showIndex');
            }
            return redirect()->back();
        }catch (Exception $e) {
            return redirect()->route('customer.showLogin')->with('error', $e->getMessage());
        }
    }

    public function postLogout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('customer.showLogin');
    }
}
