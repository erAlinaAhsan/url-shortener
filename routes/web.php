 <?php


        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\LinkController;
        /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

        Route::get('/', function () {
                return view('welcome');
        });
        Route::get('generate-shorten-link', [LinkController::class, 'index'])->name('generate-shortlink');
        Route::post('generate-shorten-link', [LinkController::class, 'store'])->name('generate.shorten.link.post');
        Route::get('{code}', [LinkController::class, 'urlShortener'])->name('url.shortener');
        Route::delete('short-urls/{id}', [LinkController::class, 'destroy'])->name('short-urls.destroy');
        Route::get('url-details/{id}', [LinkController::class, 'showDetails'])->name('url.details');
