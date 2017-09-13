<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
//login pakai email dan password
Route::post('/Login', 'Auth\LoginController@login');
//Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth:api');
// Route::post('/addAdmin','UserController@storeAdmin');
Route::post('/registerStudent','UserController@storeStudent');
Route::post('/registerEmployer','UserController@storeEmployer');

Route::get('/roles','RoleController@getAllRole');
Route::get('/role/{id?}','RoleController@getRole');
Route::get('/createRole','RoleController@addRole')->middleware('role:admin');

//fungsi admin
//get list registrasi
Route::get('/UnapprovedUsers','UserController@getUnapprovedUsers')->middleware('role:admin');
Route::put('/{user_id}/approve','UserController@approveUser')->middleware('role:admin');


//core
// 1 employer, 2 student, 3 admin
Route::group(['prefix' => 'users'], function () {
  //just approved user
  Route::get('/allStudent','UserController@getAllStudent');
  Route::get('/allEmployer','UserController@getAllEmployer');

	Route::get('/{id?}','UserController@getUserDetail');
  Route::put('/{id}/update','UserController@updateUser');
	Route::delete('{id}/delete','UserController@DeleteUser')->middleware('role:admin');
});

//show employer's jobs
Route::get('/employerJobs/{employer_id?}','UserController@getEmployerJobs');


Route::group(['prefix' => 'usersProfile'], function () {
  Route::get('/all','UserProfileController@getAllProfile');
	Route::get('/{user_id?}','UserProfileController@getProfileDetail');
	Route::post('/store','UserProfileController@storeProfile');
  //check token id yg update sama parameter user_id sama?
	Route::put('/{user_id?}/update','UserProfileController@updateProfile')->middleware('role:student');
  //delete  butuh??
	//Route::delete('{user_id?}/delete','UserProfileController@DeleteProfile');
});


Route::group(['prefix' => 'companies'], function () {
  Route::get('/all','CompanyController@getAllCompany');
	Route::get('/{employer_id?}','CompanyController@getCompanyDetail');
  //employer_id from token.just user with employer role
	Route::post('/store','CompanyController@storeCompany');
	Route::put('/{employer_id?}/update','CompanyController@updateCompany')->middleware('role:employer');
  //delete company butuh??
	//Route::delete('{employer_id?}/delete','CompanyController@DeleteCompany');
});


Route::group(['prefix' => 'jobs'], function () {
  Route::get('/all','JobController@getAllJob');
	Route::get('/{job_id?}','JobController@getJobDetail');
  //get students who make contract with job
  Route::get('/students/{job_id?}','JobController@getJobStudents'); //blm
  //get job applications
  Route::get('/applies/{job_id?}','JobController@getJobApplies');
	Route::post('/store','JobController@storeJob')->middleware('role:employer');
	Route::put('/{job_id?}/update','JobController@updateJob')->middleware('role:employer');
	Route::delete('{job_id?}/delete','JobController@DeleteJob');
});


Route::group(['prefix' => 'contracts'], function () {
  Route::get('/all','ContractController@getAllContract');
	Route::get('/{contract_id?}','ContractController@getContractDetail');
  //buat contract ??
	//Route::post('/store/{job_id}/{student_id?}','ContractController@storeContract');
	//Route::put('/{contract_id?}/update','ContractController@updateContract');
	Route::delete('{contract_id?}/delete','ContractController@DeleteContract');

});

Route::group(['prefix' => 'feedbacks'], function () {
  Route::get('/all','FeedbackController@getAllFeedback');
	Route::get('/{contract_id?}','FeedbackController@getFeedbackDetail');
  //show all feedback(review and rating) of user
  Route::get('/userFeedbacks/{user_id}','FeedbackController@getstudentFeedback');
	Route::post('/store/{contract_id?}','FeedbackController@storeFeedback');
	Route::put('/{contract_id?}/update','FeedbackController@updateFeedback');
	Route::delete('{contract_id?}/delete','FeedbackController@deleteFeedback');

});

Route::group(['prefix' => 'invitations'], function () {
//  Route::get('/all','ContractController@getAllContract');
	Route::get('/{invitation_id?}','InvitationController@getInvitationDetail');
  //just employer who can invite, check from token
	Route::post('/store/{job_id}/{student_id}','InvitationController@storeInvitation');
	Route::delete('{invitation_id?}/delete','InvitationController@DeleteInvitation');
  //just student, accept is delete invitation then make contract
  Route::delete('/{invitation_id?}/accept','ContractController@AcceptInvitation');//belum
});

Route::group(['prefix' => 'applies'], function () {
  //get all student application (student_id from token).just student.
  Route::get('/studentApplications','ApplyController@getstudentApplications');
	Route::get('/{apply_id?}','ApplyController@getApplyDetail');
  //student_id from token
	Route::post('/store/{job_id?}','ApplyController@storeApply');
  //reject apply.just employer who have the job
	Route::delete('{apply_id?}/delete','ApplyController@DeleteApply');
  //just employer, accept is delete apply then make contract
  Route::delete('/{apply_id?}/accept','ApplyController@AcceptApply');
});




//social

Route::group(['prefix' => 'follows'], function () {
  Route::get('/showFollowings/{user_id?}','FollowController@showFollowings');
  Route::get('/showFollowers/{user_id?}','FollowController@showFollowers');
  //count follower and following
  Route::get('/countFollow/{user_id?}','FollowController@countFollowers');
  //following id ngambil dari token
	Route::post('/store/{followable_id?}','FollowController@storeFollow');
	Route::delete('{follow_id}/unfollow','FollowController@deleteFollow');
});

Route::group(['prefix' => 'posts'], function () {
  Route::get('/all','PostController@getAllPost');
  Route::get('/{post_id?}','PostController@getPostDetail');
  Route::get('/userPosts/{user_id?}','PostController@getUserPosts');//blm
  //hitung banyak love dari postingan
  Route::get('{post_id?}/CountPostLove','PostController@countPostLove');
  //get semua dari sebuah posting
  Route::get('/PostComments/{post_id?}','PostController@getPostComments');
  //user_id dari token
  Route::post('/store','PostController@storePost');
  Route::put('/{post_id?}/update','PostController@updatePost');
  Route::delete('{post_id?}/delete','PostController@DeletePost');
});


Route::group(['prefix' => 'comments'], function () {
  Route::get('/all','CommentController@getAllComment');
  Route::get('/{comment_id?}','CommentController@getCommentDetail');
  //Route::get('/userComments/{user_id?}','CommentController@getUserComments');
  //user_id dari token
  Route::post('/store/{post_id?}','CommentController@storeComment');
  Route::put('/{comment_id?}/update','CommentController@updateComment');
  Route::delete('{comment_id?}/delete','CommentController@DeleteComment');
});

Route::group(['prefix' => 'loves'], function () {
  //opsional
  Route::get('/{love_id?}','LoveController@getLoveDetail');
  // Route::get('/userLoves/{user_id?}','LoveController@getUserLoves');
  //user_id dari token
  Route::post('/store/{post_id?}','LoveController@storeLove');
  Route::delete('{love_id?}/delete','LoveController@DeleteLove');
});

Route::group(['prefix' => 'messages'], function () {
  //user_id dari token
  //get all message from a user
  Route::get('/messages','MessageController@getallmessage'); //blm
  Route::get('/{message_id?}','MessageController@getMessageDetail');
  //user_id dari token
  Route::post('/store/{receiver_id?}','MessageController@storeMessage');//blm
//delete masih ngganjal, masa kalo receiver hapus message, message di sender juga ilang kalo pake delete biasa
//haruskah diduplikat??
  //Route::delete('{message_id?}/delete','MessageController@deleteMessage');/blm
});

//////////////////////////////////////////////////////////
Route::group(['prefix' => 'qualifies'], function () {
  Route::get('/all','QualifyController@getAllqualify');
  Route::get('/{qualify_id?}','QualifyController@getqualifyDetail');
  Route::put('/{qualify_id?}/update','QualifyController@updatequalify');
  Route::post('/store','QualifyController@storequalify');
  Route::delete('/{qualify_id?}/delete','QualifyController@deletequalify');
});


Route::group(['prefix' => 'studentProfiles'], function () {
  Route::get('/all','StudentProfileController@getAllstudentprofile');
  Route::get('/{student_id?}','StudentProfileController@getstudentprofileDetail');
  Route::put('/{student_id_id?}/update','StudentProfileController@updatestudentprofile');
  Route::post('/store','StudentProfileController@storestudentprofile');
  Route::delete('/{student_id?}/delete','StudentProfileController@deletestudentprofile');
});

Route::group(['prefix' => 'jobQualifies'], function () {
  Route::get('/all','JobQualifyController@getAlljobqualify');
  Route::get('/{jobqualify_id?}','JobQualifyController@getjobqualifyDetail');
  Route::put('/{jobqualify_id?}/update','JobQualifyController@updatejobqualify');
  Route::post('/store','JobQualifyController@storejobqualify');
  Route::delete('/{jobqualify_id?}/delete','JobQualifyController@deletejobqualify');
});

Route::group(['prefix' => 'jobTypes'], function () {
  Route::get('/all','JobTypeController@getAlljobtype');
  Route::get('/{jobtype_id?}','JobTypeController@getjobtypeDetail');
  Route::put('/{jobtype_id?}/update','JobTypeController@updatejobtype');
  Route::post('/store','JobTypeController@storejobtype');
  Route::delete('/{jobtype_id?}/delete','JobTypeController@deletejobtype');
});

Route::group(['prefix' => 'jobTypeTable'], function () {
  Route::get('/all','JobTypeTableController@getAlljobtypetable');
  Route::get('/{jobtypetable_id?}','JobTypeTableController@getjobtypetableDetail');
  Route::put('/{jobtypetable_id?}/update','JobTypeTableController@updatejobtypetable');
  Route::post('/store','JobTypeTableController@storejobtypetable');
  Route::delete('/{jobtypetable_id?}/delete','JobTypeTableController@deletejobtypetable');
});

Route::group(['prefix' => 'studentQualify'], function () {
  Route::get('/all','StudentQualifyController@getAllstudentqualify');
  Route::get('/{studentqualify_id?}','StudentQualifyController@getstudentqualifyDetail');
  Route::put('/{studentqualify_id?}/update','StudentQualifyController@updatestudentqualify');
  Route::post('/store','StudentQualifyController@storestudentqualify');
  Route::delete('/{studentqualify_id?}/delete','StudentQualifyController@deletestudentqualify');
});
