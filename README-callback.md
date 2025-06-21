## Callback Example Controller

```php
// app/Http/Controllers/MpesaCallbackController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaCallbackController extends Controller
{
    public function handle(Request $request)
    {
        if ($request->query('secret') !== env('MPESA_CALLBACK_SECRET')) {
            abort(403, 'Invalid secret');
        }
        Log::info('M-Pesa Callback', ['data' => $request->all()]);
        // Update payment status as needed
        return response()->json(['result' => 'success']);
    }
}
```

## Sample Route

```php
// routes/api.php
use App\Http\Controllers\MpesaCallbackController;
Route::post('/mpesa/callback', [MpesaCallbackController::class, 'handle']);
```

## Testing

- Use [Ngrok](https://ngrok.com/) to expose your local server for callback testing.
- Check `storage/logs/laravel.log` for callback and STK Push debug info.
