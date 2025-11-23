use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Room;

Route::get('/rooms', function() {
    return Room::all();
});
