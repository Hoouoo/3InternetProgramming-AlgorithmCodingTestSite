<?php
    include('db.php'); 
    include('LoginCheck.php');

    ob_start();
    if(is_login()){
        header("Location: welcome.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    
        <link rel="stylesheet" href="bootstrap/css/bootstrap1.min.css">
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>네카라쿠배 로그인</title>
        <link href="css/styles.css" rel="stylesheet"/>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"></script>
            <style>
            
            body { 
                background-image:url('img/login.gif'); 
                background-size: 100% 100%;
                }</style>
    </head>
    <div class="card-header">
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">로그인</h3>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" method="POST">

                                            <div class="form-floating mb-3">
                                                <input
                                                    type="text"
                                                    name="user_name"
                                                    class="form-control"
                                                    id="inputID"
                                                    placeholder="아이디를 입력하세요."
                                                    required="required"
                                                    autocomplete="off"
                                                    readonly="readonly"
                                                    onfocus="this.removeAttribute('readonly');"/>
                                                <label>ID</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input
                                                    type="password"
                                                    name="user_password"
                                                    class="form-control"
                                                    id="inputPassword"
                                                    placeholder="패스워드를 입력하세요."
                                                    required="required"
                                                    autocomplete="off"
                                                    readonly="readonly"
                                                    onfocus="this.removeAttribute('readonly');"/>
                                                <label>Password</label>
                                            </div>
                                            <!-- <div class="form-check mb-3">
                                                <input
                                                    class="form-check-input"
                                                    id="inputRememberPassword"
                                                    type="checkbox"
                                                    value=""/>
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div> -->
                                            <div class="d-grid mt-0 mb-0">
                                                <button type="submit" name="login" class="btn btn-success">로그인</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            <a href="register.php">네카라쿠배 사이트가 처음이신가요?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php

    $login_ok = false;

    if ( ($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['login']) )
    {
		$username=$_POST['user_name'];  
		$userpassowrd=$_POST['user_password'];  

		if(empty($username)){
			$errMSG = "아이디를 입력하세요.";
		}else if(empty($userpassowrd)){
			$errMSG = "패스워드를 입력하세요.";
		}else{
			

			try { 

				$stmt = $con->prepare('select * from nakaracubae_user where id=:username');

				$stmt->bindParam(':username', $username);
				$stmt->execute();
			} catch(PDOException $e) {
				die("Database error. " . $e->getMessage()); 
			}

			$row = $stmt->fetch();  
			// $salt = $row['salt'];
			$password = $row['pw'];
			// $decrypted_password = decrypt(base64_decode($password), $salt);
			if ($userpassowrd == $password) {
				$login_ok = true;
			}
		}

		if(isset($errMSG)) 
			echo "<script>alert('$errMSG')</script>";
		

            if ($login_ok){
                    session_start();
                    
                    $_SESSION['user_id'] = $username;
                    // echo $_GET[$username];
                    $usr_id = $row[id];
                    $GLOBALS['usr_id'];
                    header('location:welcome.php?user_id=' .$row[id] );
                    session_write_close();
            }
            else{
                echo "<script>alert('$username 인증 오류')</script>";
            }
	}
?>