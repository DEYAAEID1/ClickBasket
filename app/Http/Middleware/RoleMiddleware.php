<?php 
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        /** @var User $user */
        $user = Auth::user();
        if (Auth::check() && $user->hasRole($role)) {
            return $next($request);
        }

        return redirect('/'); // أو يمكنك توجيه المستخدم إلى صفحة أخرى إذا لم يكن لديه الدور المناسب
    }
}