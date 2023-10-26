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

post('/ontest/api/createClass','./Controller/classController.php');


post('/ontest/api/createQuestion','./Controller/questionController.php');
get('/ontest/api/renderSltGroupQuestion','./Controller/questionController.php');


// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404', './View/404.php');
