<?php
use App\Http\Controllers\ArticleCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\UserCategoryController;

Route::middleware([\App\Http\Middleware\Authenticate::class])->group(function () {

    Route::middleware('admin')->group(function () {
        Route::get('dashboard/articles', [ArticleController::class, 'index'])->name('dashboard.articles.index');
        Route::get('dashboard/articles/create', [ArticleController::class, 'create'])->name('dashboard.articles.create');
        Route::get('dashboard/articles/store', [ArticleController::class, 'store'])->name('dashboard.articles.store');
        Route::post('dashboard/articles', [ArticleController::class, 'store'])->name('dashboard.articles.store');
        Route::get('dashboard/articles/{article}', [ArticleController::class, 'show'])->name('dashboard.articles.show');
        Route::get('dashboard/articles/{article}/edit', [ArticleController::class, 'edit'])->name('dashboard.articles.edit');
        Route::put('dashboard/articles/{article}', [ArticleController::class, 'update'])->name('dashboard.articles.update');
        Route::delete('dashboard/articles/{article}', [ArticleController::class, 'destroy'])->name('dashboard.articles.destroy');
        Route::get('dashboard/categories', [CategoryController::class, 'index'])->name('dashboard.categories');
        Route::get('dashboard/categories/create', [CategoryController::class, 'create'])->name('dashboard.categories.create');
        Route::post('dashboard/categories/store', [CategoryController::class, 'store'])->name('dashboard.categories.store');
        Route::get('dashboard/categories/show/{categoryID}', [CategoryController::class, 'show'])->name('dashboard.categories.show');
        Route::get('dashboard/categories/edit/{categoryID}', [CategoryController::class, 'edit'])->name('dashboard.categories.edit');
        Route::put('dashboard/categories/update/{categoryID}', [CategoryController::class, 'update'])->name('dashboard.categories.update');
        Route::delete('dashboard/categories/delete/{categoryID}', [CategoryController::class, 'destroy'])->name('dashboard.categories.delete');
        Route::get('dashboard/subcategories', [SubcategoryController::class, 'index'])->name('dashboard.subcategories');
        Route::get('dashboard/subcategories/create', [SubcategoryController::class, 'create'])->name('dashboard.subcategories.create');
        Route::post('dashboard/subcategories/store', [SubcategoryController::class, 'store'])->name('dashboard.subcategories.store');
        Route::get('dashboard/subcategories/show/{subcategoryID}', [SubcategoryController::class, 'show'])->name('dashboard.subcategories.show');
        Route::get('dashboard/subcategories/edit/{subcategoryID}', [SubcategoryController::class, 'edit'])->name('dashboard.subcategories.edit');
        Route::put('dashboard/subcategories/update/{subcategoryID}', [SubcategoryController::class, 'update'])->name('dashboard.subcategories.update');
        Route::delete('dashboard/subcategories/delete/{subcategoryID}', [SubcategoryController::class, 'destroy'])->name('dashboard.subcategories.delete');
    });

//    Route::resource('articles', ArticleCartController::class);

    Route::resource('cart', CartController::class);
    Route::resource('orders', OrderController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/userhome', [App\Http\Controllers\HomeController::class, 'userindex'])->name('userhome');
    Route::post('/cartitem/create/{articleid}', [App\Http\Controllers\ArticleCartController::class, 'create'])->name('cartitem.create');
    Route::delete('/cartitem/remove/{cartid}/{articleid}', [App\Http\Controllers\ArticleCartController::class, 'remove'])->name('cartitem.remove');
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/profile/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('/user/orders', [App\Http\Controllers\OrderController::class, 'user_orders'])->name('user.orders');
});

Route::get('/', function () {
    return view('userhome');
});

Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/{categoryName}/{subcategoryName}', [App\Http\Controllers\ArticleCartController::class, 'show'])->name('articles.cat');
Route::resource('categories', UserCategoryController::class);
Route::resource('details', DetailController::class);
Route::resource('bills', BillController::class);
Auth::routes();

