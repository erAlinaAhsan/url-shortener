 <?php


        use Illuminate\Support\Facades\Route;
        use App\Http\Controllers\UrlShortenerController;
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
        Route::get('generate-shorten-link', [UrlShortenerController::class, 'index'])->name('generate-shortlink');
        Route::post('generate-shorten-link', [UrlShortenerController::class, 'store'])->name('generate.shorten.link.post');
        Route::get('{code}', [UrlShortenerController::class, 'urlShortener'])->name('url.shortener');
        Route::delete('short-urls/{id}', [UrlShortenerController::class, 'destroy'])->name('short-urls.destroy');
        Route::get('url-details/{id}', [UrlShortenerController::class, 'showDetails'])->name('url.details');
