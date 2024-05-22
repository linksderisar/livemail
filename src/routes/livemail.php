<?php

use Illuminate\Support\Facades\Route;

if (config('mail.default') == 'livemail') {
    Route::prefix('livemail')->middleware(['web'])->group(function () {
        Route::get('inbox', function () {
            return view('livemail::inbox', [
                'count' => \Linksderisar\Livemail\Models\Livemail::count(),
            ]);
        });

        Route::get('render/{mail_id}', function ($mailId) {
            return view('livemail::render', [
                'mail' => \Linksderisar\Livemail\Models\Livemail::findOrFail($mailId),
            ]);
        })->name('livemail.render');
    });
}
