use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceLocationController;
use App\Http\Controllers\ServiceReviewController;

Route::middleware('auth:sanctum')->group(function () {
    // Service Provider API Routes
    Route::apiResource('service-providers', ServiceProviderController::class);
    
    // Service API Routes
    Route::apiResource('services', ServiceController::class);
    
    // Service Category API Routes
    Route::apiResource('service-categories', ServiceCategoryController::class);
    
    // Service Location API Routes
    Route::apiResource('service-locations', ServiceLocationController::class);
    
    // Service Review API Routes
    Route::apiResource('service-reviews', ServiceReviewController::class);
}); 