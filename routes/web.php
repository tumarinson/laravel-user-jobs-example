<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'index');

Route::get('/jobs', function () {
    return view('users.jobs.list', [
        'userJobs' => \Tumarinson\UserJobs\Models\UserJob::all()
    ]);
})->name('users-jobs.list');

// create new job. Record would be created in user_jobs table automatically
Route::get('/jobs/create', function () {
    new \App\Jobs\SomeExport(rand(0, 1234567));
    return redirect()->route('users-jobs.list');
})->name('users-jobs.create');

Route::get('/jobs/create/random', function () {
    $statuses = [
        'waiting',
        'inprogress',
        'completed',
        'failed',
        'unknown',
    ];

    \Tumarinson\UserJobs\Models\UserJob::create([
        'job_class' => \Illuminate\Support\Str::random(),
        'user_id' => rand(1, 123456789),
        'status' => $statuses[rand(0, 4)],
        'payload' => [Str::random()],
    ]);
    return redirect()->route('users-jobs.list');
})->name('users-jobs.create-random');


