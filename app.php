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
get('/ontest', Authentication());
get('/ontest/Profile',"./View/Profile.php" );

post('/ontest/api/signUp','./Controller/authController.php');
post('/ontest/api/signIn','./Controller/authController.php');
post('/ontest/api/logOut','./Controller/authController.php');

get('/ontest/api/renderClassTable','./Controller/adminController.php');
get('/ontest/api/renderQuestionTable','./Controller/adminController.php');
get('/ontest/api/renderAccountTable','./Controller/adminController.php');
get('/ontest/api/renderGroupQuestionTable','./Controller/adminController.php');
get('/ontest/api/renderAnswer','./Controller/adminController.php');

post('/ontest/api/activeAll','./Controller/adminController.php');
post('/ontest/api/unActiveAll','./Controller/adminController.php');
post('/ontest/api/createGroupQuestion','./Controller/adminController.php');
post('/ontest/api/active','./Controller/adminController.php');
post('/ontest/api/deleteAcc','./Controller/adminController.php');
post('/ontest/api/editAccount','./Controller/adminController.php');
post('/ontest/api/editClass','./Controller/adminController.php');
post('/ontest/api/editQuestion','./Controller/adminController.php');
post('/ontest/api/editGroupQuestion','./Controller/adminController.php');

get('/ontest/api/renderReport','./Controller/reportController.php');
get('/ontest/api/renderReportContent','./Controller/reportController.php');

post('/ontest/api/verify','./Controller/reportController.php');
post('/ontest/api/createReport','./Controller/reportController.php');

get('/ontest/api/renderAnnounment','./Controller/classController.php');
get('/ontest/api/renderMember','./Controller/classController.php');
get('/ontest/api/renderListClass','./Controller/classController.php');
get('/ontest/api/getClassforteacher','./Controller/classController.php');
get('/ontest/api/renderContainerInfoClass','./Controller/classController.php');
get('/ontest/api/getStudentInClass','./Controller/classController.php');
get('/ontest/api/getClass','./Controller/classController.php');
get('/ontest/api/renderListClassOfStudent','./Controller/classController.php');

post('/ontest/api/createClass','./Controller/classController.php');
post('/ontest/api/createNotice','./Controller/classController.php');
post('/ontest/api/editAnnouncement','./Controller/classController.php');
post('/ontest/api/deleteAnnouncement','./Controller/classController.php');
post('/ontest/api/addListstudenttoclass','./Controller/classController.php');
post('/ontest/api/deleteClass','./Controller/classController.php');
post('/ontest/api/removeStudentsfromclass','./Controller/classController.php');
post('/ontest/api/delete_listStudent','./Controller/classController.php');
post('/ontest/api/addStudentToClass','./Controller/classController.php');
post('/ontest/api/removeStudent','./Controller/classController.php');


post('/ontest/api/createQuestion','./Controller/questionController.php');

get('/ontest/api/renderSltGroupQuestion','./Controller/questionController.php');
get('/ontest/api/renderContainerbankquestion','./Controller/questionController.php');
get('/ontest/api/renderBankQuestion','./Controller/questionController.php');
get('/ontest/api/renderQuestionInSettingTest','./Controller/questionController.php');

post('/ontest/api/saveQuestionInTest','./Controller/testController.php');
post('/ontest/api/createTest','./Controller/testController.php');
post('/ontest/api/deleteTest','./Controller/testController.php');
post('/ontest/api/alterInfoTest','./Controller/testController.php');
post('/ontest/api/chamBai','./Controller/testController.php');

get('/ontest/api/getTest','./Controller/testController.php');
get('/ontest/api/renderInfoTest','./Controller/testController.php');
get('/ontest/api/renderListTest','./Controller/testController.php');
get('/ontest/api/showTestscores','./Controller/testController.php');
get('/ontest/api/showDetailstestscores','./Controller/testController.php');
get('/ontest/api/getDetialtest','./Controller/testController.php');
get('/ontest/api/getDetailstestscores','./Controller/testController.php');
get('/ontest/api/getTestscores','./Controller/testController.php');
get('/ontest/api/renderListTestInStudentPage','./Controller/testController.php');
get('/ontest/api/renderInfoTestNoSubmit','./Controller/testController.php');
get('/ontest/api/renderInfoTestSubmited','./Controller/testController.php');
get('/ontest/api/takeATest','./Controller/testController.php');
get('/ontest/api/getListQuestionInTest','./Controller/testController.php');

get('/ontest/api/renderStudentAnnounment','./Controller/announcementController.php');
get('/ontest/api/renderAnnoucementContent','./Controller/announcementController.php');


post('/ontest/api/saveBasic','./Controller/profileController.php');
post('/ontest/api/saveContact','./Controller/profileController.php');
post('/ontest/api/savePass','./Controller/profileController.php');


post('/ontest/api/upload','./Controller/upload.php');
// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404', './View/404.php');
