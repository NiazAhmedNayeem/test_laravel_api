<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
///GET API testing
Route::get('/people/{id?}', [UserApiController::class, 'showPeople']);
///POST API testing
Route::post('/add-people', [UserApiController::class, 'addPeople']);
///POST API multiple people add testing
Route::post('/add-multiple-people', [UserApiController::class, 'addMultiplePeople']);
///PUT API for update people detail
Route::put('/update-people-detail/{id}', [UserApiController::class, 'updatePeopleDetail']);
///PATCH API for update single record
Route::patch('/update-single-record/{id}', [UserApiController::class, 'updateSingleRecord']);
///DELETE API for delete single user or people
Route::delete('/delete-user-record/{id}', [UserApiController::class, 'deleteUserRecord']);
///DELETE API for delete single user or people with json
Route::delete('/delete-user-record-with-json', [UserApiController::class, 'deleteUserRecordWithJson']);
///DELETE API for delete multiple user or people
Route::delete('/delete-multiple-user-record/{ids}', [UserApiController::class, 'deleteMultipleUserRecord']);
///DELETE API for delete multiple user or people with json
Route::delete('/delete-multiple-user-record-with-json', [UserApiController::class, 'deleteMultipleUserRecordWithJson']);

///DELETE API for delete multiple user or people with JWT Authorization(Secure API with JWT)
Route::delete('/delete-user-record-with-jwt-Authorization', [UserApiController::class, 'deleteUserRecordWithJwtAuthorization']);
