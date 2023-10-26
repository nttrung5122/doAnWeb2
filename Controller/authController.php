<?php
include './model/authModel.php';

class AuthController
{

    static public function signUp($user, $password, $maCn, $hoten, $ngaysinh, $sdt, $cv)
    {
        if (!AuthModel::checkUsersExit($user)) {
            AuthModel::createUser($user, md5($password), $maCn, $hoten, $ngaysinh, $sdt, $cv);
            // echo json_decode("Tạo tài khoản thành công");
            $data['status'] = 'success';
            $data['notice'] = "Tạo tài khoản thành công";
            // echo json_encode($data);
            return $data;
        } else {
            // echo json_decode("Email đã được sử dụng <br> Tạo tài khoản không thành công");
            $data['status'] = 'fail';
            $data['notice'] = "Email đã được sử dụng <br> Tạo tài khoản không thành công";

            return $data;
        }
    }

    static public function signIn($user, $password)
    {
        if (AuthModel::checkUsersExit($user)) {
            $dataUser = mysqli_fetch_array(AuthModel::getUsers($user));
            if ($dataUser['password'] == md5($password)) {
                if ($dataUser['active'] == "1") {

                    $data['status'] = 'success';
                    $data['notice'] = "Đăng nhập thành công thành công";
                    // session_start();
                    $_SESSION['user'] = $dataUser;
                    $data['user'] = $dataUser;
                    $data['cv'] = $dataUser['loaiTk'];
                    return $data;
                } else {
                    $data['status'] = 'fail';
                    $data['notice'] = "Tài khoản chưa được kích hoạt";
                    return $data;
                }
            }
        }
        $data['status'] = 'fail';
        $data['notice'] = "Tài khoản không tồn tại hoắc mất khẩu không chính xác";
        return $data;
    }
}

// echo end($request_url_parts) == 'login';
switch (end($request_url_parts)) {
    case "signUp": {
            $data = AuthController::signUp($_POST['user'], $_POST['password'], $_POST['maCn'], $_POST['hoten'], $_POST['ngaysinh'], $_POST['sdt'], $_POST['cv']);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        break;
    case 'signIn': {
            $data = AuthController::signIn($_POST['user'], $_POST['password']);
            // echo "signIn";
            // $data = AuthController::signIn($_GET['user'], $_GET['password']);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        break;
    case "logOut": {
            session_start();
            session_unset();
            session_destroy();
            echo json_encode("success");
        }
        break;
}
