<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminPostController;

use App\Http\Controllers\AdminAuthorController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\JournalinfoController;


Route::get('/', [HomeController::class, 'main'])->name('home');

Route::redirect('/tg', '/');

Route::group(['prefix' => '{lang}',
            'where' => [
                'lang' => 'tg|ru|en'
            ],
    ], function () {
        Route::get('', [HomeController::class, 'main'])->name('home2');
        Route::get('articles/{category?}', [ArticleController::class, 'index'])->name('articles');
        Route::get('articles-search', [ArticleController::class, 'search'])->name('articles.search');
        Route::get('article/{article:slug}', [ArticleController::class, 'show'])->name('article');

        Route::get('posts/{category?}', [PostController::class, 'index'])->name('posts');
        Route::get('posts-search', [PostController::class, 'search'])->name('posts.search');
        Route::get('post-type/{type}/{category?}', [PostController::class, 'post_type'])->name('post.type');
        Route::get('post/{post:slug}', [PostController::class, 'show'])->name('post');

        Route::get('books/{category?}', [BookController::class, 'index'])->name('books');
        Route::get('books-search', [BookController::class, 'search'])->name('books.search');
        Route::get('book/{book:slug}', [BookController::class, 'show'])->name('book');

        Route::get('about', [AboutController::class, 'index'])->name('abouts');

        Route::get('profile/{author}/{type?}', [AuthorController::class, 'show'])->name('profile');
    });


    Route::get('pdf/{article:slug}', [ArticleController::class, 'export'])->name('pdf');
    Route::get('book-pdf/{book:slug}', [BookController::class, 'export'])->name('book.pdf');
    Route::get('journal-pdf/{journal:slug}', [JournalController::class, 'export'])->name('journal.pdf');


    Route::get('journal', [JournalController::class, 'index']);
    Route::redirect('journal/tg', '/journal');

    Route::group(['prefix' => 'journal/{lang}',
            'where' => [
                'lang' => 'tg|ru|en'
            ],
    ], function () {
        Route::get('', [JournalController::class, 'index'])->name('journal');
        Route::get('/archive', [JournalController::class, 'archive'])->name('archive');
        Route::get('/{title_en}', [JournalinfoController::class, 'show'])->name('journalinfo');

    });


// Auth::routes();
Auth::routes(['register' => false]);
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('', [App\Http\Controllers\AdminAuthorController::class, 'stats'])->name('admin');

    Route::get('authors', [App\Http\Controllers\AdminAuthorController::class, 'index'])->name('admin.authors');
    Route::get('author/create', [App\Http\Controllers\AdminAuthorController::class, 'create'])->name('admin.author.create');
    Route::post('author/store', [App\Http\Controllers\AdminAuthorController::class, 'store'])->name('admin.author.store');
    Route::get('author/edit/{author}', [App\Http\Controllers\AdminAuthorController::class, 'edit'])->name('admin.author.edit');
    Route::put('author/update/{author}', [App\Http\Controllers\AdminAuthorController::class, 'update'])->name('admin.author.update');
    Route::delete('author/delete/{author}', [App\Http\Controllers\AdminAuthorController::class, 'destroy'])->name('admin.author.delete');
    
    Route::get('articles', [App\Http\Controllers\AdminArticleController::class, 'index'])->name('admin.articles');
    Route::get('article/create', [App\Http\Controllers\AdminArticleController::class, 'create'])->name('admin.article.create');
    Route::post('article/store', [App\Http\Controllers\AdminArticleController::class, 'store'])->name('admin.article.store');
    Route::get('article/edit/{article}', [App\Http\Controllers\AdminArticleController::class, 'edit'])->name('admin.article.edit');
    Route::put('article/update/{article}', [App\Http\Controllers\AdminArticleController::class, 'update'])->name('admin.article.update');
    Route::delete('article/delete/{article}', [App\Http\Controllers\AdminArticleController::class, 'destroy'])->name('admin.article.delete');
    
    Route::get('posts', [App\Http\Controllers\AdminPostController::class, 'index'])->name('admin.posts');
    Route::get('post/create', [App\Http\Controllers\AdminPostController::class, 'create'])->name('admin.post.create');
    Route::post('post/store', [App\Http\Controllers\AdminPostController::class, 'store'])->name('admin.post.store');
    Route::get('post/edit/{post}', [App\Http\Controllers\AdminPostController::class, 'edit'])->name('admin.post.edit');
    Route::put('post/update/{post}', [App\Http\Controllers\AdminPostController::class, 'update'])->name('admin.post.update');
    Route::delete('post/delete/{post}', [App\Http\Controllers\AdminPostController::class, 'destroy'])->name('admin.post.delete');
    
    Route::get('books', [App\Http\Controllers\AdminBookController::class, 'index'])->name('admin.books');
    Route::get('book/create', [App\Http\Controllers\AdminBookController::class, 'create'])->name('admin.book.create');
    Route::post('book/store', [App\Http\Controllers\AdminBookController::class, 'store'])->name('admin.book.store');
    Route::get('book/edit/{book}', [App\Http\Controllers\AdminBookController::class, 'edit'])->name('admin.book.edit');
    Route::put('book/update/{book}', [App\Http\Controllers\AdminBookController::class, 'update'])->name('admin.book.update');
    Route::delete('book/delete/{book}', [App\Http\Controllers\AdminBookController::class, 'destroy'])->name('admin.book.delete');
    Route::get('book/create', [App\Http\Controllers\AdminBookController::class, 'create'])->name('admin.book.create');

    Route::get('about', [AboutController::class, 'admin_index'])->name('admin.abouts');
    Route::get('about/create', [App\Http\Controllers\AboutController::class, 'create'])->name('admin.about.create');
    Route::post('about/store', [App\Http\Controllers\AboutController::class, 'store'])->name('admin.about.store');
    Route::get('about/edit/{about}', [App\Http\Controllers\AboutController::class, 'edit'])->name('admin.about.edit');
    Route::put('about/update/{about}', [App\Http\Controllers\AboutController::class, 'update'])->name('admin.about.update');
    Route::delete('about/delete/{about}', [App\Http\Controllers\AboutController::class, 'destroy'])->name('admin.about.delete');

    Route::get('institutions', [InstitutionController::class, 'index'])->name('admin.institutions');
    Route::get('institution/create', [App\Http\Controllers\InstitutionController::class, 'create'])->name('admin.institution.create');
    Route::post('institution/store', [App\Http\Controllers\InstitutionController::class, 'store'])->name('admin.institution.store');
    Route::get('institution/edit/{institution}', [App\Http\Controllers\InstitutionController::class, 'edit'])->name('admin.institution.edit');
    Route::put('institution/update/{institution}', [App\Http\Controllers\InstitutionController::class, 'update'])->name('admin.institution.update');
    Route::delete('institution/delete/{institution}', [App\Http\Controllers\InstitutionController::class, 'destroy'])->name('admin.institution.delete');

    Route::get('journals', [App\Http\Controllers\JournalController::class, 'admin_index'])->name('admin.journals');
    Route::get('journal/create', [App\Http\Controllers\JournalController::class, 'create'])->name('journal.create');
    Route::post('journal/store', [App\Http\Controllers\JournalController::class, 'store'])->name('journal.store');
    Route::get('journal/edit/{journal}', [App\Http\Controllers\JournalController::class, 'edit'])->name('journal.edit');
    Route::put('journal/update/{journal}', [App\Http\Controllers\JournalController::class, 'update'])->name('journal.update');
    Route::delete('journal/delete/{journal}', [App\Http\Controllers\JournalController::class, 'destroy'])->name('journal.delete');
    
    Route::get('journalinfos', [App\Http\Controllers\JournalinfoController::class, 'admin_index'])->name('admin.journalinfos');
    Route::get('journalinfo/create', [App\Http\Controllers\JournalinfoController::class, 'create'])->name('journalinfo.create');
    Route::post('journalinfo/store', [App\Http\Controllers\JournalinfoController::class, 'store'])->name('journalinfo.store');
    Route::get('journalinfo/edit/{journalinfo}', [App\Http\Controllers\JournalinfoController::class, 'edit'])->name('journalinfo.edit');
    Route::put('journalinfo/update/{journalinfo}', [App\Http\Controllers\JournalinfoController::class, 'update'])->name('journalinfo.update');
    Route::delete('journalinfo/delete/{journalinfo}', [App\Http\Controllers\JournalinfoController::class, 'destroy'])->name('journalinfo.delete');
});

