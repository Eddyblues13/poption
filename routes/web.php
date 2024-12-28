<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;

Route::get('/', function () {
    return view('homepage.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/trade', [App\Http\Controllers\HomeController::class, 'trade'])->name('trade');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/bank-deposit', [App\Http\Controllers\HomeController::class, 'bankDeposit'])->name('bank.deposit');
Route::get('/crypto-deposit', [App\Http\Controllers\HomeController::class, 'cryptoDeposit'])->name('crypto.deposit');
Route::post('/crypto-deposit', [App\Http\Controllers\HomeController::class, 'submitCryptoDeposit'])->name('submit.crypto.deposit');
Route::post('/make-deposit', [App\Http\Controllers\HomeController::class, 'depositPage'])->name('deposit.page');
Route::get('/withdrawal', [App\Http\Controllers\HomeController::class, 'withdrawal'])->name('withdrawal');
// Payment Routes

Route::get('/tax', [PaymentController::class, 'showPaymentForm'])->name('tax.payment'); // Show payment form
Route::post('/initiate', [PaymentController::class, 'initiatePayment'])->name('payment.initiate'); // Initiate payment
Route::get('/callback', [PaymentController::class, 'paymentCallback'])->name('payment.callback'); // Handle payment callback

Route::get('/testing', [App\Http\Controllers\HomeController::class, 'testing'])->name('testing');
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::post('/save-currency', [App\Http\Controllers\HomeController::class, 'saveCurrency'])->name('saveCurrency');
Route::post('/saveCountry', [App\Http\Controllers\HomeController::class, 'saveCountry'])->name('saveCountry');
Route::get('user/logout', [App\Http\Controllers\HomeController::class, 'UserLogout'])->name('user.logout');







Route::get('admin/login', [AdminLoginController::class, 'adminLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('login.submit');



// Admin Routes
Route::prefix('admin')->group(function () {
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Protecting admin routes using the 'admin' middleware
    Route::middleware(['admin'])->group(function () { // Admin Profile Routes
        Route::get('/profile', [AdminController::class, 'editProfile'])->name('admin.profile');
        Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::post('/profile/password', [AdminController::class, 'updatePassword'])->name('admin.profile.password.update');
        Route::put('/admin/user/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');

        Route::get('/change/user/password/page/{id}', [AdminController::class, 'showResetPasswordForm'])->name('admin.change.user.password.page');
        Route::post('/user-password-reset', [AdminController::class, 'resetPassword'])->name('admin.user.password_reset');


        Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
        Route::get('/manage-users', [AdminController::class, 'manageUsersPage'])->name('manage.users.page');
        Route::get('/manage-deposit', [AdminController::class, 'manageDepositsPage'])->name('manage.deposits.page');
        Route::get('/manage-withdrawals', [AdminController::class, 'manageWithdrawalsPage'])->name('manage.withdrawals.page');
        Route::get('/view-deposit/{id}/', [AdminController::class, 'viewDeposit']);
        Route::get('process-deposit/{id}', [AdminController::class, 'processDeposit'])->name('admin.process-deposit');
        Route::get('delete-deposit/{id}', [AdminController::class, 'deleteDeposit'])->name('admin.delete-deposit');
        Route::get('/view-withdrawal/{user_id}/{withdrawal_id}', [AdminController::class, 'viewWithdrawal']);
        Route::get('/manage-kyc', [AdminController::class, 'manageKycPage'])->name('manage.kyc.page');
        Route::get('/accept-kyc/{id}/', [AdminController::class, 'acceptKyc']);
        Route::get('/reject-kyc/{id}/', [AdminController::class, 'rejectKyc']);
        Route::get('/reset-password/{user}', [AdminController::class, 'resetUserPassword'])->name('reset.password');
        Route::get('/clear-account/{id}', [AdminController::class, 'clearAccount'])->name('clear.account');

        Route::get('/{user}/impersonate',  [AdminController::class, 'impersonate'])->name('users.impersonate');
        Route::get('/leave-impersonate',  [AdminController::class, 'leaveImpersonate'])->name('users.leave-impersonate');

        Route::post('/edit-user/{user}', [AdminController::class, 'editUser'])->name('edit.user');
        Route::post('/add-new-user',  [AdminController::class, 'newUser'])->name('add.user');
        Route::get('/delete-user/{user}',  [AdminController::class, 'deleteUser'])->name('delete.user');
        Route::match(['get', 'post'], '/send-mail', [AdminController::class, 'sendMail'])->name('admin.send.mail');
        // Route for viewing user details
        Route::get('/user/{id}', [AdminController::class, 'viewUser'])->name('admin.user.view');
        Route::post('/transfer/suspend/{id}', [AdminController::class, 'suspendTransfer'])->name('transfer.suspend');
        Route::post('/transfer/unblock/{id}', [AdminController::class, 'unblockTransfer'])->name('transfer.unblock');
        Route::post('/account/suspend/{id}', [AdminController::class, 'suspendAccount'])->name('account.suspend');
        Route::post('/account/unblock/{id}', [AdminController::class, 'unblockAccount'])->name('account.unblock');

        // Define the route for opening an account
        Route::get('/user/open', [AdminController::class, 'openAccount'])->name('admin.user.open');



        // Route for viewing user details
        Route::get('/credit-user/{id}', [AdminController::class, 'creditUserPage'])->name('admin.credit.user.page');

        Route::post('credit-debit', [AdminController::class, 'creditDebit'])->name('credit-debit');


        // Route::post('/credit-user', [AdminController::class, 'creditUser'])->name('credit_user');


        // Route for updating user details
        Route::post('/user/update/{id}', [AdminController::class, 'updateUserDetail'])->name('update_user_detail');

        // Route for updating bank details
        Route::post('/user/update/bank/{id}', [AdminController::class, 'updateBankDetail'])->name('update_bank_detail');

        // Route for fund user
        Route::get('/user/fund/{accountnumber}/{id}', [AdminController::class, 'fundUser'])->name('fund_user');

        // Route for user transaction history
        Route::get('/user/transaction/{id}', [AdminController::class, 'userTransaction'])->name('user_transaction');

        // Route for user transfer tracking
        Route::get('/user/transfer/tracking/{id}', [AdminController::class, 'userTransferTracking'])->name('user_transfer_tracking');

        // Route for debit user
        Route::get('/user/debit/{accountnumber}/{id}', [AdminController::class, 'debitUser'])->name('debit_user');

        // Route for changing user photo
        Route::get('/user/photo/{id}', [AdminController::class, 'updatePhoto'])->name('update_photo');

        // Route for user activity
        Route::get('/user/activity/{id}', [AdminController::class, 'userActivity'])->name('user_activity');

        // Route for user password reset
        Route::get('/user/password/reset/{userid}', [AdminController::class, 'userPasswordReset'])->name('user_password_reset');


        // Route for changing email user
        Route::get('/send/email', [AdminController::class, 'sendEmailPage'])->name('send.email');
        Route::post('/send/email', [AdminController::class, 'sendEmail'])->name('send.mail');

        // logo favicon settings
        Route::get('/branding', [BrandingController::class, 'index'])->name('branding.index');
        Route::post('/branding/update', [BrandingController::class, 'update'])->name('branding.update');

        Route::get('/smtp-settings', [SmtpSettingController::class, 'index'])->name('smtp.settings');
        Route::post('/smtp-settings', [SmtpSettingController::class, 'update'])->name('smtp.update');

        // Wallet resource routes
        Route::resource('wallets', WalletController::class);
        // Deposit resource routes
        Route::resource('deposits', DepositController::class);
        Route::patch('deposits/{deposit}/approve', [DepositController::class, 'approve'])->name('deposits.approve');

        // Withdrawal resource routes
        Route::resource('withdrawals', WithdrawalController::class);
        Route::patch('withdrawals/{withdrawal}/approve', [WithdrawalController::class, 'approve'])->name('withdrawals.approve');

        //kyc resource routes
        Route::resource('kyc', KycController::class);
        Route::get('kyc/{id}/approve', [KycController::class, 'approve'])->name('kyc.approve');

        //trade resource routes
        // Resource routes for Stock
        Route::resource('stock', StockController::class);
        Route::resource('traders', TraderController::class);
        Route::resource('payment', PaymentSettingController::class);

        // Route::get('admin/stock/{stock}/edit', [StockController::class, 'edit'])->name('stock.edit');

        // Route::get('/stock/{stock}/edit', [StockController::class, 'edit'])->name('stock.edit'); // Edit route
        // Route::delete('/stock/{stock}', [StockController::class, 'destroy'])->name('stock.destroy'); // Destroy route

        Route::get('/stock-history', [AdminController::class, 'viewStockHistory'])->name('admin.stock.history');

        Route::get('/trade-histories', [AdminController::class, 'viewTradeHistory'])->name('admin.trade_histories');

        Route::get('/trading-plans/create', [TradingPlanController::class, 'create'])->name('admin.create-trading-plan');
        Route::post('/trading-plans/store', [TradingPlanController::class, 'store'])->name('admin.store-trading-plan');
        Route::get('/trading-plans', [TradingPlanController::class, 'index'])->name('admin.view-trading-plans');
        Route::get('/trading-plans/edit/{id}', [TradingPlanController::class, 'edit'])->name('admin.edit-trading-plan');
        Route::post('/trading-plans/update/{id}', [TradingPlanController::class, 'update'])->name('admin.update-trading-plan');
        Route::delete('/trading-plans/delete/{id}', [TradingPlanController::class, 'destroy'])->name('admin.delete-trading-plan');
        Route::post('/add-signal-strength', [AdminController::class, 'addSignalStrength'])->name('admin.add_signal_strength');
        Route::get('/user/{id}/trades', [TradeController::class, 'index'])->name('admin.user.trades');
        Route::post('/trades', [TradeController::class, 'store'])->name('admin.trades.store');
        Route::put('/trades/{trade}', [TradeController::class, 'update'])->name('admin.trades.update');
        Route::delete('/trades/{trade}', [TradeController::class, 'destroy'])->name('admin.trades.destroy');
    });
});





//flutter wave payment integration
Route::get('/flutterwave/pay', [App\Http\Controllers\FlutterwavePaymentController::class, 'index'])->name('flutterwave.index');
Route::post('/flutterwave/pay', [App\Http\Controllers\FlutterwavePaymentController::class, 'initiatePayment'])->name('flutterwave.pay');
Route::get('/flutterwave/callback', [App\Http\Controllers\FlutterwavePaymentController::class, 'handleCallback'])->name('flutterwave.callback');
