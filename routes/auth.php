<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/register', (new RegisteredUserController())->create(...))
    ->middleware('guest')
    ->name('register');

Route::post('/register', (new RegisteredUserController())->store(...))
    ->middleware('guest');

Route::get('/login', (new AuthenticatedSessionController())->create(...))
    ->middleware('guest')
    ->name('login');

Route::post('/login', (new AuthenticatedSessionController())->store(...))
    ->middleware('guest');

Route::get('/forgot-password', (new PasswordResetLinkController())->create(...))
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', (new PasswordResetLinkController())->store(...))
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', (new NewPasswordController())->create(...))
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', (new NewPasswordController())->store(...))
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email', EmailVerificationPromptController::class)
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', (new EmailVerificationNotificationController())->store(...))
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::get('/confirm-password', (new ConfirmablePasswordController())->show(...))
    ->middleware('auth')
    ->name('password.confirm');

Route::post('/confirm-password', (new ConfirmablePasswordController())->store(...))
    ->middleware('auth');

Route::post('/logout', (new AuthenticatedSessionController())->destroy(...))
    ->middleware('auth')
    ->name('logout');
