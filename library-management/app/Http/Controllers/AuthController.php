<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AuthController extends Controller

{

public function generateUserId(): string
{
    $year = date('Y'); // 4 digits: e.g., 2025
    $random = mt_rand(100000, 999999); // 6-digit random number

    return $year . $random; // Total 10 digits
}
public function generateUniqueUserId(): string
{
    do {
        $userId = $this-> generateUserId();
    } while (User::where('member_id', $userId)->exists());

    return $userId;
}

      public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'fullname'   => 'required|string|max:255',
        'email'      => 'required|string|email|max:255|unique:users',
        'password'   => 'required|string|min:8',
        'phone'      => 'required',
        'address'    => 'required|string|min:10',
        'profession' => 'required|string|max:50',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create the user
        $user = User::create([
            'name'       => $request->fullname,
        'email'      => $request->email,
        'password'   => Hash::make($request->password),
        'phone'      => $request->phone,
        'address'    => $request->address,
        'profession' => $request->profession,
        'member_id' => $this-> generateUniqueUserId()
        ]);
        // dd($user);

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Registration successful!',
            'user' => $user
        ], 201);
    }
     public function login(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication succeeded
            $user = Auth::user();

            // Regenerate session for security
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => $user
            ]);
        }

        // Authentication failed
        return response()->json([
            'success' => false,
            'message' => 'These credentials do not match our records'
        ], 401);
    }
     public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    $user = Auth::user();
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect']);
    }

    $user->password = Hash::make($request->new_password);
var_dump($user->password);
die;

    $user->save();

    return back()->with('status', 'Password updated successfully');
}

}
