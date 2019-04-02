<?php

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

Route::group(['namespace'=>'Frontend'], function(){
    Route::any('/', 'ApplicationController@index')->name('index');
    Route::any('user-login', 'ApplicationController@userLogin')->name('login-user');
});


Route::group(['namespace'=>'Frontend', 'prefix'=>'user', ], function(){
    Route::any('/', 'HomeController@index')->name('home');
    Route::any('portfolio', 'HomeController@portfolio')->name('gallery');
    Route::any('teachers', 'HomeController@teacher')->name('teachers');
    Route::any('contact-us', 'HomeController@contactUs')->name('contact-us');
    Route::any('send-message', 'HomeController@addMessage')->name('send-message');
    Route::any('about-us', 'HomeController@aboutUs')->name('about-us');
    Route::any('subjects', 'HomeController@subject')->name('subject');
    Route::any('students', 'HomeController@students')->name('students');

    Route::group(['prefix'=>'event', 'middleware' => 'auth:student'], function (){
        Route::any('events', 'HomeController@notice')->name('events');
        Route::any('event-detail/{id?}', 'HomeController@eventDetail')->name('read-more');
        Route::any('notice-detail/{id?}', 'HomeController@noticeDetail')->name('view-more');
    });

    Route::group(['prefix'=>'event', 'middleware' => 'auth:student'], function (){
        Route::any('notes', 'HomeController@notes')->name('notes');
        Route::any('note-download/{id?}', 'HomeController@notesDownload')->name('note-download');
        Route::any('search-note-get','HomeController@searchData')->name('search-note-get');
    });

    Route::group(['prefix' => 'subjects'], function (){
        Route::any('class-one-subjects', 'SubjectController@oneIndex')->name('class-one-subjects');
        Route::any('class-one-subjects-detail/{id?}', 'SubjectController@oneDetail')->name('subject-one-read-more');

        Route::any('class-two-subjects', 'SubjectController@twoIndex')->name('class-two-subjects');
        Route::any('class-two-subjects-detail/{id?}', 'SubjectController@twoDetail')->name('subject-two-read-more');

        Route::any('class-three-subjects', 'SubjectController@threeIndex')->name('class-three-subjects');
        Route::any('class-three-subjects-detail/{id?}', 'SubjectController@threeDetail')->name('subject-three-read-more');

        Route::any('class-four-subjects', 'SubjectController@fourIndex')->name('class-four-subjects');
        Route::any('class-four-subjects-detail/{id?}', 'SubjectController@fourDetail')->name('subject-four-read-more');

        Route::any('class-five-subjects', 'SubjectController@fiveIndex')->name('class-five-subjects');
        Route::any('class-five-subjects-detail/{id?}', 'SubjectController@fiveDetail')->name('subject-five-read-more');

        Route::any('class-six-subjects', 'SubjectController@sixIndex')->name('class-six-subjects');
        Route::any('class-six-subjects-detail/{id?}', 'SubjectController@sixDetail')->name('subject-six-read-more');

        Route::any('class-seven-subjects', 'SubjectController@sevenIndex')->name('class-seven-subjects');
        Route::any('class-seven-subjects-detail/{id?}', 'SubjectController@sevenDetail')->name('subject-seven-read-more');

        Route::any('class-eight-subjects', 'SubjectController@eightIndex')->name('class-eight-subjects');
        Route::any('class-eight-subjects-detail/{id?}', 'SubjectController@eightDetail')->name('subject-eight-read-more');

        Route::any('class-nine-subjects', 'SubjectController@nineIndex')->name('class-nine-subjects');
        Route::any('class-nine-subjects-detail/{id?}', 'SubjectController@nineDetail')->name('subject-nine-read-more');

        Route::any('class-ten-subjects', 'SubjectController@tenIndex')->name('class-ten-subjects');
        Route::any('class-ten-subjects-detail/{id?}', 'SubjectController@tenDetail')->name('subject-ten-read-more');
    });

    Route::group(['prefix' => 'class', 'middleware' => 'auth:student'], function (){
        Route::any('one', 'ClassController@indexOne')->name('one');
        Route::any('two', 'ClassController@indexTwo')->name('two');
        Route::any('three', 'ClassController@indexThree')->name('three');
    });

    Route::group(['prefix' => 'tuition', 'middleware' => 'auth:student'], function (){
        Route::any('tuition-detail/{id?}', 'TuitionController@TuitionDetail')->name('tuition-detail');
        Route::any('tuition-enroll/{id?}', 'TuitionController@enroll')->name('tuition-enroll');
        Route::any('add-enroll', 'TuitionController@addEnroll')->name('add-enroll');

    });


    Route::any('user-logout', 'ApplicationController@userLogout')->name('logout-user');
});





Route::group(['namespace'=>'Backend'], function(){
    Route::any('login-admin', 'AdminController@adminLogin')->name('login-admin');

});

Route::group(['namespace' => 'Backend','prefix' =>'@admin', 'middleware' => 'auth'], function () {
    Route::any('/', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'privilege'], function (){
        Route::any('/', 'PrivilegeController@index')->name('privilege');
        Route::any('/add-privilege', 'PrivilegeController@addPrivilege')->name('addPrivilege');
        Route::any('/delete-privilege/{id?}','privilegeController@deletePrivilege')->name('deletePrivilege');
        Route::any('/edit-privilege/{id?}','privilegeController@editPrivilege')->name('editPrivilege');
        Route::any('/edit-privilege-action','privilegeController@editPrivilegeAction')->name('editPrivilegeAction');
        Route::any('/update-privilege-status','privilegeController@updatePrivilegeStatus')->name('updatePrivilegeStatus');

    });

    Route::group(['prefix' => 'users', 'middleware' => 'status'], function (){
        Route::any('add-user','AdminController@addUser')->name('addUsers');
        Route::any('users','AdminController@index')->name('showUsers');
        Route::any('delete-user/{id?}', 'AdminController@deleteUser')->name('deleteUser');
        Route::any('edit-user/{id?}', 'AdminController@editUser')->name('editUser');
        Route::any('edit-user-action', 'AdminController@editUserAction')->name('edit-user-action');
        Route::any('update-user-status','AdminController@updateUserStatus')->name('update-user-status');

    });

    Route::group(['prefix' => 'intro & message', 'middleware' => 'status'], function (){
        Route::any('portfolio-index','IntroController@index')->name('portfolioIndex');
        Route::any('add-portfolio','IntroController@portfolio')->name('portfolio');
        Route::any('portfolio','IntroController@addPortfolio')->name('addPortfolio');
        Route::any('delete-portfolio/{id?}','IntroController@deletePortfolio')->name('deletePortfolio');
        Route::any('edit-portfolio/{id?}','IntroController@editPortfolio')->name('editPortfolio');
        Route::any('edit-portfolio-action','IntroController@editPortfolioAction')->name('edit-portfolio-action');
        Route::any('about','IntroController@about')->name('about');
        Route::any('add-about','IntroController@addAbout')->name('addAbout');
        Route::any('delete-about/{id?}','IntroController@deleteAbout')->name('deleteAbout');
        Route::any('service','IntroController@service')->name('service');
        Route::any('add-service','IntroController@addService')->name('addService');
        Route::any('delete-service/{id?}','IntroController@deleteService')->name('deleteService');
        Route::any('contact','IntroController@contact')->name('contact');
        Route::any('add-contact','IntroController@addContact')->name('addContact');
        Route::any('delete-contact/{id?}','IntroController@deleteContact')->name('deleteContact');
        Route::any('feedback-message','IntroController@feedback')->name('feedback');
        Route::any('delete-feedback-message/{id?}','IntroController@deleteFeedback')->name('delete-feedback');
    });

    Route::group(['prefix' => 'teacher', 'middleware' => 'status'], function () {
        Route::any('/', 'TeacherController@index')->name('teacher');
        Route::any('add-teacher', 'TeacherController@addTeacher')->name('add-teacher');
        Route::any('show-teachers', 'TeacherController@showTeachers')->name('show-teachers');
        Route::get('documents-downloads', 'TeacherController@getDownload')->name('get-download');
        Route::any('delete-teacher/{id?}', 'TeacherController@deleteTeacher')->name('delete-teacher');
        Route::any('edit-teacher/{id?}', 'TeacherController@editTeacher')->name('edit-teacher');
        Route::any('edit-teacher-action', 'TeacherController@editTeacherAction')->name('edit-teacher-action');
        Route::any('head', 'TeacherController@head')->name('head');
        Route::any('add-head', 'TeacherController@addHead')->name('add-head');
        Route::get('head-documents-downloads', 'TeacherController@download')->name('download');
        Route::any('delete-head/{id?}', 'TeacherController@deleteHead')->name('delete-head');
        Route::any('edit-head/{id?}', 'TeacherController@editHead')->name('edit-head');
        Route::any('edit-head-action', 'TeacherController@editHeadAction')->name('edit-head-action');


    });

    Route::group(['prefix' => 'notice', 'middleware' => 'status'], function () {
        Route::any('make-notice', 'NoticeboardController@notice')->name('notice');
        Route::any('make-notice-add', 'NoticeboardController@addNotice')->name('add-notice');
        Route::any('make-notice-delete/{id?}', 'NoticeboardController@deleteNotice')->name('delete-notice');
        Route::any('make-notice-edit/{id?}', 'NoticeboardController@editNotice')->name('edit-notice');
        Route::any('make-notice-edit-action', 'NoticeboardController@editNoticeAction')->name('edit-notice-action');
        Route::any('make-event', 'NoticeboardController@program')->name('program');
        Route::any('add-event', 'NoticeboardController@addProgram')->name('add-program');
        Route::any('delete-event/{id?}', 'NoticeboardController@deleteProgram')->name('delete-program');

    });

    Route::group(['prefix' => 'note'], function () {
        Route::any('note', 'NotesController@noteIndex')->name('note');
        Route::any('add-note', 'NotesController@addNote')->name('add-note');
        Route::any('show-note', 'NotesController@showNote')->name('show-note');
        Route::get('file-downloads', 'NotesController@getDownload')->name('get-download');
        Route::any('delete-note/{id?}', 'NotesController@deleteNote')->name('delete-note');

    });

    Route::group(['prefix' => 'extra', 'middleware' => 'status'], function () {
        Route::any('history', 'ExtraController@history')->name('history');
        Route::any('add-history', 'ExtraController@addHistory')->name('add-history');
        Route::any('delete-history/{id?}', 'ExtraController@deleteHistory')->name('delete-history');
        Route::any('why-us', 'ExtraController@why')->name('why-us');
        Route::any('add-why-us', 'ExtraController@addWhy')->name('add-why-us');
        Route::any('delete-why-us/{id?}', 'ExtraController@deleteWhy')->name('delete-why-us');
        Route::any('tuition', 'ExtraController@tuition')->name('tuition');
        Route::any('add-tuition', 'ExtraController@addTuition')->name('add-tuition');
        Route::any('delete-tuition/{id?}', 'ExtraController@deleteTuition')->name('delete-tuition');
        Route::any('show-readers', 'ExtraController@showStudents')->name('show-readers');
        Route::any('delete-reader/{id?}', 'ExtraController@deleteTuitionStudent')->name('delete-reader');
        Route::any('testimonial', 'ExtraController@testimonial')->name('testimonial');
        Route::any('add-testimonial', 'ExtraController@addTestimonial')->name('add-testimonial');
        Route::any('delete-testimonial/{id?}', 'ExtraController@deleteTestimonial')->name('delete-testimonial');
        Route::any('user-student', 'ExtraController@userStudent')->name('user-student');
        Route::any('add-user-student', 'ExtraController@addUserStudent')->name('add-user-student');


    });

    Route::group(['prefix' => 'class-one', 'middleware' => 'status'], function () {
        Route::any('/', 'ClassController@index')->name('classOneIndex');
        Route::any('class-one', 'ClassController@classOne')->name('classOne');
        Route::any('class-one-add', 'ClassController@addStudentOne')->name('class-one-add');
        Route::any('class-one-delete/{id?}', 'ClassController@deleteStudentOne')->name('class-one-delete');
        Route::any('edit-student-one/{id?}', 'classController@editStudent')->name('edit-student');
        Route::any('edit-studentOne-action', 'classController@editStudentAction')->name('edit-student-action');
    });

    Route::group(['prefix' => 'class-two', 'middleware' => 'status'], function () {
        Route::any('/', 'ClassController@indexTwo')->name('classTwoIndex');
        Route::any('class-two', 'ClassController@classTwo')->name('classTwo');
        Route::any('class-two-add', 'ClassController@addStudentTwo')->name('class-two-add');
        Route::any('class-two-delete/{id?}', 'ClassController@deleteStudentTwo')->name('class-two-delete');
        Route::any('edit-student-two/{id?}', 'classController@editStudentTwo')->name('edit-studentTwo');
        Route::any('edit-studentTwo-action', 'classController@editStudentTwoAction')->name('edit-studentTwo-action');
    });

    Route::group(['prefix' => 'class-three', 'middleware' => 'status'], function () {
        Route::any('/', 'ClassController@indexThree')->name('classThreeIndex');
        Route::any('class-three', 'ClassController@classThree')->name('classThree');
        Route::any('class-three-add', 'ClassController@addStudentThree')->name('class-three-add');
        Route::any('class-three-delete/{id?}', 'ClassController@deleteStudentThree')->name('class-three-delete');
        Route::any('edit-student-three/{id?}', 'classController@editStudentThree')->name('edit-studentThree');
        Route::any('edit-studentThree-action', 'classController@editStudentThreeAction')->name('edit-studentThree-action');
    });

    Route::group(['prefix' => 'class-four', 'middleware' => 'status'], function () {
        Route::any('/', 'ClassController@indexFour')->name('classFourIndex');
        Route::any('class-four', 'ClassController@classFour')->name('classFour');
        Route::any('class-four-add', 'ClassController@addStudentFour')->name('class-four-add');
        Route::any('class-four-delete/{id?}', 'ClassController@deleteStudentFour')->name('class-four-delete');
        Route::any('edit-student-four/{id?}', 'classController@editStudentFour')->name('edit-studentFour');
        Route::any('edit-studentFour-action', 'classController@editStudentFourAction')->name('edit-studentFour-action');
    });

    Route::group(['prefix' => 'class-five', 'middleware' => 'status'], function () {
        Route::any('/', 'ClassController@indexFive')->name('classFiveIndex');
        Route::any('class-five', 'ClassController@classFive')->name('classFive');
        Route::any('class-five-add', 'ClassController@addStudentFive')->name('class-five-add');
        Route::any('class-five-delete/{id?}', 'ClassController@deleteStudentFive')->name('class-five-delete');
        Route::any('edit-student-five/{id?}', 'classController@editStudentFive')->name('edit-studentFive');
        Route::any('edit-studentFive-action', 'classController@editStudentFiveAction')->name('edit-studentFive-action');
    });

    Route::group(['prefix' => 'class-six', 'middleware' => 'status'], function () {
        Route::any('/', 'ClassController@indexSix')->name('classSixIndex');
        Route::any('class-six', 'ClassController@classSix')->name('classSix');
        Route::any('class-six-add', 'ClassController@addStudentSix')->name('class-six-add');
        Route::any('class-six-delete/{id?}', 'ClassController@deleteStudentSix')->name('class-six-delete');
        Route::any('edit-student-six/{id?}', 'classController@editStudentSix')->name('edit-studentSix');
        Route::any('edit-studentSix-action', 'classController@editStudentSixAction')->name('edit-studentSix-action');
    });

    Route::group(['prefix' => 'class-seven', 'middleware' => 'status'], function () {
        Route::any('/', 'ClassController@indexSeven')->name('classSevenIndex');
        Route::any('class-seven', 'ClassController@classSeven')->name('classSeven');
        Route::any('class-seven-add', 'ClassController@addStudentSeven')->name('class-seven-add');
        Route::any('class-seven-delete/{id?}', 'ClassController@deleteStudentSeven')->name('class-seven-delete');
        Route::any('edit-student-seven/{id?}', 'classController@editStudentSeven')->name('edit-studentSeven');
        Route::any('edit-studentSeven-action', 'classController@editStudentSevenAction')->name('edit-studentSeven-action');
    });

    Route::group(['prefix' => 'class-eight', 'middleware' => 'status'], function () {
        Route::any('/', 'ClassController@indexEight')->name('classEightIndex');
        Route::any('class-eight', 'ClassController@classEight')->name('classEight');
        Route::any('class-eight-add', 'ClassController@addStudentEight')->name('class-eight-add');
        Route::any('class-eight-delete/{id?}', 'ClassController@deleteStudentEight')->name('class-eight-delete');
        Route::any('edit-student-eight/{id?}', 'classController@editStudentEight')->name('edit-studentEight');
        Route::any('edit-studentEight-action', 'classController@editStudentEightAction')->name('edit-studentEight-action');
    });

    Route::group(['prefix' => 'class-nine', 'middleware' => 'status'], function () {
        Route::any('/', 'ClassController@indexNine')->name('classNineIndex');
        Route::any('class-nine', 'ClassController@classNine')->name('classNine');
        Route::any('class-nine-add', 'ClassController@addStudentNine')->name('class-nine-add');
        Route::any('class-nine-delete/{id?}', 'ClassController@deleteStudentNine')->name('class-nine-delete');
        Route::any('edit-student-nine/{id?}', 'classController@editStudentNine')->name('edit-studentNine');
        Route::any('edit-studentNine-action', 'classController@editStudentNineAction')->name('edit-studentNine-action');
    });

    Route::group(['prefix' => 'class-ten', 'middleware' => 'status'], function () {
        Route::any('/', 'ClassController@indexTen')->name('classTenIndex');
        Route::any('class-ten', 'ClassController@classTen')->name('classTen');
        Route::any('class-ten-add', 'ClassController@addStudentTen')->name('class-ten-add');
        Route::any('class-ten-delete/{id?}', 'ClassController@deleteStudentTen')->name('class-ten-delete');
        Route::any('edit-student-ten/{id?}', 'classController@editStudentTen')->name('edit-studentTen');
        Route::any('edit-studentTen-action', 'classController@editStudentTenAction')->name('edit-studentTen-action');
    });


    Route::group(['prefix' => 'subject', 'middleware' => 'status'], function () {
        Route::any('one', 'SubjectController@classOne')->name('subject-one');
        Route::any('add-subject-one', 'SubjectController@addSubjectOne')->name('add-subject-one');
        Route::any('delete-subject-one/{id?}', 'SubjectController@deleteSubjectOne')->name('delete-subject-one');

        Route::any('two', 'SubjectController@classTwo')->name('subject-two');
        Route::any('add-subject-two', 'SubjectController@addSubjectTwo')->name('add-subject-two');
        Route::any('delete-subject-two/{id?}', 'SubjectController@deleteSubjectTwo')->name('delete-subject-two');

        Route::any('three', 'SubjectController@classThree')->name('subject-three');
        Route::any('add-subject-three', 'SubjectController@addSubjectThree')->name('add-subject-three');
        Route::any('delete-subject-three/{id?}', 'SubjectController@deleteSubjectThree')->name('delete-subject-three');

        Route::any('four', 'SubjectController@classFour')->name('subject-four');
        Route::any('add-subject-four', 'SubjectController@addSubjectFour')->name('add-subject-four');
        Route::any('delete-subject-four/{id?}', 'SubjectController@deleteSubjectFour')->name('delete-subject-four');

        Route::any('five', 'SubjectController@classFive')->name('subject-five');
        Route::any('add-subject-five', 'SubjectController@addSubjectFive')->name('add-subject-five');
        Route::any('delete-subject-five/{id?}', 'SubjectController@deleteSubjectFive')->name('delete-subject-five');

        Route::any('six', 'SubjectController@classSix')->name('subject-six');
        Route::any('add-subject-six', 'SubjectController@addSubjectSix')->name('add-subject-six');
        Route::any('delete-subject-six/{id?}', 'SubjectController@deleteSubjectSix')->name('delete-subject-six');

        Route::any('seven', 'SubjectController@classSeven')->name('subject-seven');
        Route::any('add-subject-seven', 'SubjectController@addSubjectSeven')->name('add-subject-seven');
        Route::any('delete-subject-seven/{id?}', 'SubjectController@deleteSubjectSeven')->name('delete-subject-seven');

        Route::any('eight', 'SubjectController@classEight')->name('subject-eight');
        Route::any('add-subject-eight', 'SubjectController@addSubjectEight')->name('add-subject-eight');
        Route::any('delete-subject-eight/{id?}', 'SubjectController@deleteSubjectEight')->name('delete-subject-eight');

        Route::any('nine', 'SubjectController@classNine')->name('subject-nine');
        Route::any('add-subject-nine', 'SubjectController@addSubjectNine')->name('add-subject-nine');
        Route::any('delete-subject-nine/{id?}', 'SubjectController@deleteSubjectNine')->name('delete-subject-nine');

        Route::any('ten', 'SubjectController@classTen')->name('subject-ten');
        Route::any('add-subject-ten', 'SubjectController@addSubjectTen')->name('add-subject-ten');
        Route::any('delete-subject-ten/{id?}', 'SubjectController@deleteSubjectTen')->name('delete-subject-ten');

    });

    Route::any('admin-logout', 'AdminController@adminLogout')->name('logout-admin');

});

