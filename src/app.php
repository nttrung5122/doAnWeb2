<?php

require_once __DIR__ . '/route/router.php';

// ##################################################
// ##################################################
// ##################################################

function Authentication(){
    session_start();
    if (!isset($_SESSION['user'])) {
      return "./View/index.php";
    } else if ($_SESSION['user']['loaiTk'] == 'gv') {
      return "./View/teacherPage.php";
    } else if ($_SESSION['user']['loaiTk'] == 'sv') {
      return "./View/studentPage.php";
    } else if ($_SESSION['user']['loaiTk'] == 'admin') {
      return "./View/Admin.php";
    }
  
}
get('/ontest/src', Authentication());
get('/ontest/src/Profile',"./View/Profile.php" );

post('/ontest/src/api/signUp','./Controller/authController.php');
post('/ontest/src/api/signIn','./Controller/authController.php');
post('/ontest/src/api/logOut','./Controller/authController.php');

get('/ontest/src/api/renderClassTable','./Controller/adminController.php');
get('/ontest/src/api/renderQuestionTable','./Controller/adminController.php');
get('/ontest/src/api/renderAccountTable','./Controller/adminController.php');
get('/ontest/src/api/renderGroupQuestionTable','./Controller/adminController.php');
get('/ontest/src/api/renderAnswer','./Controller/adminController.php');

post('/ontest/src/api/activeAll','./Controller/adminController.php');
post('/ontest/src/api/unActiveAll','./Controller/adminController.php');
post('/ontest/src/api/createGroupQuestion','./Controller/adminController.php');
post('/ontest/src/api/active','./Controller/adminController.php');
post('/ontest/src/api/deleteAcc','./Controller/adminController.php');
post('/ontest/src/api/editAccount','./Controller/adminController.php');
post('/ontest/src/api/editClass','./Controller/adminController.php');
post('/ontest/src/api/editQuestion','./Controller/adminController.php');
post('/ontest/src/api/editGroupQuestion','./Controller/adminController.php');

get('/ontest/src/api/renderReport','./Controller/reportController.php');
get('/ontest/src/api/renderReportContent','./Controller/reportController.php');

post('/ontest/src/api/verify','./Controller/reportController.php');
post('/ontest/src/api/createReport','./Controller/reportController.php');

get('/ontest/src/api/renderAnnounment','./Controller/classController.php');
get('/ontest/src/api/renderMember','./Controller/classController.php');
get('/ontest/src/api/renderListClass','./Controller/classController.php');
get('/ontest/src/api/getClassforteacher','./Controller/classController.php');
get('/ontest/src/api/renderContainerInfoClass','./Controller/classController.php');
get('/ontest/src/api/getStudentInClass','./Controller/classController.php');
get('/ontest/src/api/getClass','./Controller/classController.php');
get('/ontest/src/api/renderListClassOfStudent','./Controller/classController.php');

post('/ontest/src/api/createClass','./Controller/classController.php');
post('/ontest/src/api/createNotice','./Controller/classController.php');
post('/ontest/src/api/editAnnouncement','./Controller/classController.php');
post('/ontest/src/api/deleteAnnouncement','./Controller/classController.php');
post('/ontest/src/api/addListstudenttoclass','./Controller/classController.php');
post('/ontest/src/api/deleteClass','./Controller/classController.php');
post('/ontest/src/api/removeStudentsfromclass','./Controller/classController.php');
post('/ontest/src/api/delete_listStudent','./Controller/classController.php');
post('/ontest/src/api/addStudentToClass','./Controller/classController.php');
post('/ontest/src/api/removeStudent','./Controller/classController.php');


post('/ontest/src/api/createQuestion','./Controller/questionController.php');

get('/ontest/src/api/renderSltGroupQuestion','./Controller/questionController.php');
get('/ontest/src/api/renderContainerbankquestion','./Controller/questionController.php');
get('/ontest/src/api/renderBankQuestion','./Controller/questionController.php');
get('/ontest/src/api/renderQuestionInSettingTest','./Controller/questionController.php');

post('/ontest/src/api/saveQuestionInTest','./Controller/testController.php');
post('/ontest/src/api/createTest','./Controller/testController.php');
post('/ontest/src/api/deleteTest','./Controller/testController.php');
post('/ontest/src/api/alterInfoTest','./Controller/testController.php');
post('/ontest/src/api/chamBai','./Controller/testController.php');

get('/ontest/src/api/getTest','./Controller/testController.php');
get('/ontest/src/api/renderInfoTest','./Controller/testController.php');
get('/ontest/src/api/renderListTest','./Controller/testController.php');
get('/ontest/src/api/showTestscores','./Controller/testController.php');
get('/ontest/src/api/showDetailstestscores','./Controller/testController.php');
get('/ontest/src/api/getDetialtest','./Controller/testController.php');
get('/ontest/src/api/getDetailstestscores','./Controller/testController.php');
get('/ontest/src/api/getTestscores','./Controller/testController.php');
get('/ontest/src/api/renderListTestInStudentPage','./Controller/testController.php');
get('/ontest/src/api/renderInfoTestNoSubmit','./Controller/testController.php');
get('/ontest/src/api/renderInfoTestSubmited','./Controller/testController.php');
get('/ontest/src/api/takeATest','./Controller/testController.php');
get('/ontest/src/api/getListQuestionInTest','./Controller/testController.php');

get('/ontest/src/api/renderStudentAnnounment','./Controller/announcementController.php');
get('/ontest/src/api/renderAnnoucementContent','./Controller/announcementController.php');


post('/ontest/src/api/saveBasic','./Controller/profileController.php');
post('/ontest/src/api/saveContact','./Controller/profileController.php');
post('/ontest/src/api/savePass','./Controller/profileController.php');


post('/ontest/src/api/upload','./Controller/upload.php');
// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404', './View/404.php');
