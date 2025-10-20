<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserActivityLog;
use Jenssegers\Agent\Agent;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function username()
    {
        return 'login'; // your input name
    }

    protected function attemptLogin(Request $request)
    {
        $login = $request->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        return Auth::attempt([
            $field => $login,
            'password' => $request->input('password'),
        ], $request->filled('remember'));
    }



    protected function authenticated(Request $request, $user)
    {
        // Capture user details
        $agent = new Agent();
        $ipAddress = request()->ip();
        $wifiName = $this->getWifiName();
        $device = $agent->device() ?: 'Unknown Device';
        $browser = $agent->browser() ?: 'Unknown Browser';
        $platform = $agent->platform() ?: 'Unknown OS';

        // Log user login activity
        UserActivityLog::create([
            'user_id' => $user->id,
            'action' => 'User logged in',

            'ip_address' => $ipAddress,
            'wifi_name' => $wifiName ?: 'Unknown',
            'device' => "{$device} ({$platform} - {$browser})"

        ]);
    }

    /**
     * Log user activity after logout.
     */
    public function logout(Request $request)
    {
        $user = Auth::user();

        $agent = new Agent();
        $ipAddress = request()->ip();
        $wifiName = $this->getWifiName();
        $device = $agent->device() ?: 'Unknown Device';
        $browser = $agent->browser() ?: 'Unknown Browser';
        $platform = $agent->platform() ?: 'Unknown OS';

        if ($user) {
            UserActivityLog::create([
                'user_id' => $user->id,
                'action' => 'User logged out',
                'ip_address' => $ipAddress,
                'wifi_name' => $wifiName ?: 'Unknown',
                'device' => "{$device} ({$platform} - {$browser})"
            ]);
        }

        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Get connected Wi-Fi name (SSID).
     */
    private function getWiFiName()
    {
        $os = PHP_OS_FAMILY;

        if ($os === 'Windows') {
            $output = shell_exec('netsh wlan show interfaces | findstr /C:"SSID"');
            preg_match('/SSID\s*:\s*(.*)/', $output, $matches);
            return $matches[1] ?? 'Unknown';
        } elseif ($os === 'Linux' || $os === 'Darwin') {
            $output = shell_exec("iwgetid -r");
            return trim($output) ?: 'Unknown';
        }

        return 'Unknown';
    }
}
