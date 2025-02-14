<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ==================== REGISTER ==================== 
    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone_number' => 'required|numeric',
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Manual hashing
            'phone_number' => $request->phone_number,
            'level' => 'user', // Default user biasa
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat, silakan login!');
    }

    // ==================== LOGIN ==================== 

    public function index()
    {
        return view('auth.login'); // Sesuaikan dengan tampilan yang ingin ditampilkan
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Data akun admin
        $adminEmail = 'KandaniMin@lovehijab.com';
        $adminPassword = 'lovehijab';
    
        if ($request->email === $adminEmail && $request->password === $adminPassword) {
            $admin = DB::table('users')->where('email', $adminEmail)->first();
    
            if (!$admin) {
                DB::table('users')->insert([
                    'name' => 'Admin',
                    'email' => $adminEmail,
                    'password' => Hash::make($adminPassword),
                    'phone_number' => '08123456789',
                    'level' => 'admin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
    
            // Login admin
            $admin = DB::table('users')->where('email', $adminEmail)->first();
            Session::put('user_id', $admin->id);
            Session::put('user_name', $admin->name);
            Session::put('user_level', $admin->level);
    
            return redirect('/admin')->with('success', 'Login sebagai Admin');
        }
    
        // Cek user biasa
        $user = DB::table('users')->where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            Session::put('user_level', $user->level);
    
            if ($user->level == 'admin') {
                return redirect('/admin')->with('success', 'Login sebagai Admin');
            } else {
                return redirect('/dashboard')->with('success', 'Login berhasil');
            }
        } else {
            return back()->with('failed', 'Email atau password salah');
        }
    }
    

    // ==================== LOGOUT ==================== 
    public function logout(Request $request) 
    {
        Auth::logout(); // Logout user dari sistem
        $request->session()->invalidate(); // Hapus sesi
        $request->session()->regenerateToken(); // Regenerasi token CSRF
    
        return redirect('/login')->with('success', 'Anda telah logout.');
    }
    // ==================== RANDOM ==================== 
    public function dashboard()
    {
        return view('dashboard'); // Sesuaikan dengan tampilan yang ingin ditampilkan
    }
    public function admindashboard()
    {
        return view('admin.dashboard'); // Sesuaikan dengan tampilan yang ingin ditampilkan
    }
}
