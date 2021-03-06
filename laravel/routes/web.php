<?php
use App\Test;
use App\Categories;

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
/*Route manager category*/
Route::get('admin',array('as'=>'admin',function(){
	return view('admin.layouts.master');
}));
Route::get('admin/login',array('as'=>'getlogin','uses'=>'LoginController@index'));
Route::post('admin/login',array('as'=>'postlogin','uses'=>'LoginController@login'));
Route::get('signout',array('as'=>'signout','uses'=>'LoginController@signout'));

Route::group(['middleware'=>['login']],function(){
	Route::group(['prefix'=>'admin'],function(){
		Route::get('category',array('as'=>'indexCategory','uses'=>'CategoryController@index'));
		Route::get('category/create',array('as'=>'getcreateCategory','uses'=>'CategoryController@getCreate'));
		Route::post('category/create',array('as'=>'postcreateCategory','uses'=>'CategoryController@postCreate'));
		Route::get('category/show/{category}',array('as'=>'showCategory','uses'=>'CategoryController@Show'));
		Route::post('category/show/{category}',array('as'=>'updateCategory','uses'=>'CategoryController@update'));
		Route::get('category/{id}',array('as'=>'destroyCategory','uses'=>'CategoryController@destroy'));

		Route::get('user',array('as'=>'indexUser','uses'=>'UserController@index'));
		Route::get('user/create',array('as'=>'getcreateUser','uses'=>'UserController@getCreate'));
		Route::post('user/create',array('as'=>'postcreateUser','uses'=>'UserController@postCreate'));
		Route::get('user/show/{user}',array('as'=>'showUser','uses'=>'UserController@Show'));
		Route::post('user/show/{user}',array('as'=>'updateUser','uses'=>'UserController@update'));
		Route::get('user/{id}',array('as'=>'destroyUser','uses'=>'UserController@destroy'));

		Route::get('role',array('as'=>'indexRole','uses'=>'RoleController@index'));
		Route::get('role/create',array('as'=>'getcreateRole','uses'=>'RoleController@getCreate'));
		Route::post('role/create',array('as'=>'postcreateRole','uses'=>'RoleController@postCreate'));
		Route::get('role/show/{role}',array('as'=>'showRole','uses'=>'RoleController@Show'));
		Route::post('role/show/{role}',array('as'=>'updateRole','uses'=>'RoleController@update'));
		Route::get('role/{id}',array('as'=>'destroyRole','uses'=>'RoleController@destroy'));
	});
});


Route::get('/', function () {
	return view('/home');
});

Route::get('login','Auth\LoginController@getLogin');

Route::post('login','Auth\LoginController@postLogin')->name('login');
Route::post('logout', 'Auth\LoginController@postLogout')->name('logout');
Route::get('register', 'Auth\LoginController@getRegister');
Route::post('register', 'Auth\RegisterController@postRegister')->name('register');
Route::get('register/comfirm', 'Auth\RegisterController@registerComfirm');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'ajax'], function() {
	Route::post('checkemail', 'Auth\RegisterController@ajaxCheckEmail');
	Route::post('checkusername', 'Auth\RegisterController@ajaxCheckUserName');
	Route::post('savetests','MultiChoiceTestController@ajaxSaveTest');
	Route::post('deletechoicetest','MultiChoiceTestController@ajaxDeleteChoiceTest');
	Route::post('savechoicetests','MultiChoiceTestController@ajaxSaveChoiceTest');
});

Route::group(['prefix' => 'users'],function(){
	Route::get('infodetail/{id}','UserController@info');
	Route::get('infoEdit','UserController@infoEdit');
	Route::post('infoEdit','UserController@editUser');
});
//tests route
Route::group(['prefix' => 'tests','middleware'=>'check_login'], function(){

	Route::get('/','TestController@index');
	Route::get('test/admin', function() {
		return view('test');
	});
	Route::get('createst1','TestController@create');
	Route::post('createst1','TestController@store');
	Route::post('/edit','TestController@edit');
	Route::get('show/{id}','TestController@show');
	Route::get('cancel/{id}','TestController@deleteTest');
	Route::post('usertest','TestController@userTest');

	Route::post('multi/savetest','MultiChoiceTestController@store');
	Route::post('ajax/savetests','MultiChoiceTestController@ajaxSaveTest');
	
	Route::post('savetest', 'WritingTestController@store')->name('save_write_test');
	Route::post('writingTest/edit','WritingTestController@update');
	Route::post('writingTest/edit/upload','WritingTestController@updateUpload');
	Route::post('writingTest/edit/upload/explan','WritingTestController@updateUploadExplan');
	Route::post('writingTest/edit/explan','WritingTestController@updateExplan');
	
	Route::get('user/created',function(){
		$listTests = Test::where('user_id',Auth::user()->id)->get();
		return view('tests.user_created_list',compact('listTests'));
	});
	Route::get('createst2/{test_id}','TestController@showCreateStep2');
	Route::get('user/created/show/{test_id}',function($test_id) {
		$test = Test::find($test_id);
		$categories = Categories::all();
		return view('tests.user_created_show',compact('test','categories'));
	});
	Route::post('usertest/submit','UserTestController@store');
	Route::post('usertest/submittestchoice','UserTestChoicedController@store');
	Route::get('usertest','UserTestController@store');

	Route::get('edit/test/{id}', function($test_id) {
		$test = Test::find($test_id);
		return view('tests.edit_test',compact('test'));
	});

});

//question-answer 
Route::group(['prefix' => 'qa'],function(){
	Route::get('/','QuestionController@index');
	Route::get('/create','QuestionController@create');
	Route::post('/create','QuestionController@store');
	Route::get('/show/{id}','QuestionController@show');
	Route::post('/answer','AnswerController@store');
	Route::post('/answer/comment','AnswerCommentController@store');
	Route::get('/myquestion','QuestionController@showMyQuestion');
	Route::get('/myfollowing','QuestionController@showMyFollowing');
	Route::get('/resolved','QuestionController@showAllResolved');
	
	Route::post('/voteanswer','VoteAnswerController@voteAnswer');
	Route::post('/unvoteanswer','VoteAnswerController@disVoteAnswer');
	Route::post('delete','QuestionController@delete');
	Route::group(['prefix' => 'ajax'],function(){
		Route::post('edit','QuestionController@edit');
		Route::post('resolve','QuestionController@resolve');
		Route::post('follows','FollowQuestionController@ajaxFollow');
		Route::post('dis_follows','FollowQuestionController@ajaxDisFollow');
		Route::post('vote','VoteQuestionController@ajaxVote');
		Route::post('dis_vote','VoteQuestionController@ajaxDisVote');
		Route::post('like','LikeAnswerCommentController@like');
		Route::post('dislike','LikeAnswerCommentController@dislike');
		Route::post('answer/edit','AnswerController@edit');
		Route::post('answercomment/edit','AnswerCommentController@edit');
		Route::post('answer/delete','AnswerController@delete');
		Route::post('answercomment/delete','AnswerCommentController@delete');
	});
});
