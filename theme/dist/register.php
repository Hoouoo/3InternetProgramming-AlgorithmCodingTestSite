<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>네카라쿠배 회원가입</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap1.min.css">
        <script src="/bootstrap/js/phone.js"></script>
        <link href="css/styles.css" rel="stylesheet"/>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"></script>
        <style>
            
            body { 
                background-image:url('img/signup.gif'); 
                background-size: 100% 100%;
                }</style>
    </head>

<?php

    include('db.php');
    include('LoginCheck.php');

    $check = 0;


function validatePassword($password){
	//Begin basic testing
	if(strlen($password) < 6 || empty($password)) {
		return 0; // 6자보다 큰 비밀번호 여야 한다.
	}
	if((strlen($password) > 8)) {
		return 0; // 8자 보다 작은 비밀번호여야 한다.
	}
    
    if(preg_match('/[A-Z]/',$password) == (0 || false)){
		return 1; // 대문자 포함 x
	}
	if(!preg_match('/[\d]/',$password) != (0 || false)){
		return 2; //숫자 포함 x
	}
	if(preg_match('/[\W]/',$password) == (0 || false)){
		return 3; //특수 문자 포함 x
	}
	return true;
}

	
        if( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit']))
	{
 
        foreach ($_POST as $key => $val)
        {
            if(preg_match('#^__autocomplete_fix_#', $key) === 1){
                $n = substr($key, 19);
                if(isset($_POST[$n])) {
                    $_POST[$val] = $_POST[$n];
            }
        }
        } 

		$userid=$_POST['id'];
		$password=$_POST['pw'];
        $username=$_POST['name'];
		$userphone=$_POST['phone'];
        $useremail=$_POST['email'];

        if(validatePassword($password) == 0) {
            $errMSG = "사용불가: 6~8자의 비밀번호 재작성 필요";
            $check = 1;

        }
        else if(validatePassword($password) == 1 || validatePassword($password) == 2) {
            $errMSG = "사용불가: 비밀번호 재작성 필요 (영문 대문자 하나 이상 사용, 숫자 사용)";
            $check = 1; 
        }

        if ($_POST['pw'] != $_POST['pw2']) {
            $errMSG = "패스워드가 일치하지 않습니다.";
            $check = 1;
        }

		if(empty($userid)){
			$errMSG = "이름을 입력하세요.";
            $check = 1;
		}
		else if(empty($password)){
			$errMSG = "패스워드를 입력하세요.";
            $check = 1;
		}
		else if(empty($userphone)){
			$errMSG = "전화번호를 입력하세요.";
            $check = 1;
		} 
        else if(empty($useremail)){
			$errMSG = "이메일을 입력하세요.";
            $check = 1;
		}
		else if(empty($username)){
			$errMSG = "이름을 입력하세요.";
            $check = 1;
		}

                try { 
                    $stmt = $con->prepare('select * from nakaracubae_user where id=:id');
                    $stmt->bindParam(':id', $userid);
                    $stmt->execute();

               } catch(PDOException $e) {
                    die("Database error: " . $e->getMessage()); 
               }

               $row = $stmt->fetch();
               if ($row){
                    $errMSG = "이미 존재하는 아이디입니다.";
               }



		if(!isset($errMSG))
		{
                   try{
			$stmt = $con->prepare('INSERT INTO nakaracubae_user (id, pw, name, phone, email) VALUES(:id, :pw, :name, :phone, :email)');
			$stmt->bindParam(':id',$userid);
			$stmt->bindParam(':name',$username);
            $stmt->bindParam(':phone',$userphone);
            $stmt->bindParam(':email',$useremail);
            $stmt->bindParam(':pw', $password);	

			if($stmt->execute())
			{
				$successMSG = "새로운 사용자를 추가했습니다.";
				header("refresh:1;index.php");
			}
			else
			{
				$errMSG = "사용자 추가 에러";
			}
                     } catch(PDOException $e) {
                        die("Database error: " . $e->getMessage()); 
                     }



		}


	}
?>
    <body>
        <div id="layoutAuthentication-img">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div id="layoutAuthentication">
                            <div id="layoutAuthentication_content">
                                <main>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                                    <div class="card-header">
                                                        <h3 class="text-center font-weight-light my-4">네카라쿠배 회원가입</h3>
                                                    </div>
                                                    <?php
	if(isset($errMSG)){
			?>
                                                    <div class="alert alert-danger">
                                                        <span class="glyphicon glyphicon-info-sign"></span>
                                                        <strong><?php echo $errMSG; ?></strong>
                                                    </div>
                                                <?php
	}
	else if(isset($successMSG)){
		?>
                                                    <div class="alert alert-success">
                                                        <strong>
                                                            <span class="glyphicon glyphicon-info-sign"></span>
                                                            <?php echo $successMSG; ?></strong>
                                                    </div>
                                                    <?php
	}
	?>
                                                    <form
                                                        id="form"
                                                        method="post"
                                                        enctype="multipart/form-data"
                                                        class="form-horizontal">
                                                        <div class="card-body">
                                                            <!-- <form> -->
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <? $r3 = rmd5(rand().mocrotime(TRUE)); ?>

                                                                        <input
                                                                            class="form-control"
                                                                            name="name"
                                                                            <?php if($check == 1) {?>
                                                                            value="<?php echo $username; ?>"
                                                                            <?php } ?>
                                                                            type="text"
                                                                            placeholder="Enter your name"
                                                                            autocomplete="off"
                                                                            required="required"
                                                                            readonly="readonly"
                                                                            onfocus="this.removeAttribute('readonly');"/>
                                                                        <input type="hidden" name="__autocomplete_fix_<? echo $r3; ?>" value="name"/>
                                                                        <label for="inputName">name</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-floating">
                                                                        <? $r4 = rmd5(rand().mocrotime(TRUE)); ?>
                                                                        <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="phone"
                                                                            <?php if($check == 1) {?>
                                                                            value="<?php echo $userphone; ?>"
                                                                            <?php } ?>
                                                                            onkeyup="inputPhoneNumber(this);"
                                                                            maxlength="13"
                                                                            placeholder="010-0000-0000"
                                                                            pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}"
                                                                            autocomplete="off"
                                                                            readonly="readonly"
                                                                            onfocus="this.removeAttribute('readonly');"/>
                                                                        <input type="hidden" name="__autocomplete_fix_<? echo $r4; ?>" value="phone"/>
                                                                        <label for="inputPhone">phone</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <? $r5 = rmd5(rand().mocrotime(TRUE)); ?>
                                                                        <input
                                                                            class="form-control"
                                                                            type="email"
                                                                            name="<? echo $r5; ?>"
                                                                            <?php if($check == 1) {?>
                                                                            value="<?php echo $useremail; ?>"
                                                                            <?php } ?>
                                                                            placeholder="name@example.com"
                                                                            autocomplete="off"
                                                                            required="required"
                                                                            readonly="readonly"
                                                                            onfocus="this.removeAttribute('readonly');"/>
                                                                        <input type="hidden" name="__autocomplete_fix_<? echo $r5; ?>" value="email"/>
                                                                        <label for="inputEmail">Email address</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-floating">
                                                                        <? $r1 = rmd5(rand().mocrotime(TRUE)); ?>
                                                                        <input
                                                                            class="form-control"
                                                                            type="text"
                                                                            name="<? echo $r1; ?>"
                                                                            <?php if($check == 1) {?>
                                                                            value="<?php echo $userid; ?>"
                                                                            <?php } ?>
                                                                            placeholder="Enter your Id"
                                                                            autocomplete="off"
                                                                            required="required"
                                                                            readonly="readonly"
                                                                            onfocus="this.removeAttribute('readonly');"/>
                                                                        <input type="hidden" name="__autocomplete_fix_<? echo $r1; ?>" value="id"/>
                                                                        <label for="inputId">ID</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <? $r2 = rmd5(rand().mocrotime(TRUE)); ?>
                                                                        <input
                                                                            id="pw"
                                                                            class="form-control"
                                                                            name="<? echo $r2; ?>"
                                                                            type="password"
                                                                            placeholder="Create a password"
                                                                            autocomplete="off"
                                                                            required="required"
                                                                            readonly="readonly"
                                                                            onfocus="this.removeAttribute('readonly');"/>
                                                                        <input type="hidden" name="__autocomplete_fix_<? echo $r2; ?>" value="pw"/>
                                                                        <label for="pw">Password</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-floating mb-3 mb-md-0">
                                                                        <? $r6 = rmd5(rand().mocrotime(TRUE)); ?>
                                                                        <input
                                                                            class="form-control"
                                                                            id="pw2"
                                                                            name="pw2"
                                                                            type="password"
                                                                            placeholder="Confirm password"
                                                                            autocomplete="off"
                                                                            required="required"
                                                                            readonly="readonly"
                                                                            onfocus="this.removeAttribute('readonly');"/>
                                                                        <input type="hidden" name="__autocomplete_fix_pw2" value="pw2"/>
                                                                        <label for="pw2">Confirm Password</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4 mb-0">
                                                                <div class="d-grid">
                                                                    <button
                                                                        type="submit"
                                                                        value="submit"
                                                                        name="submit"
                                                                        class="btn btn-primary btn-block">가입하기</button>
                                                                    <!-- <a class="btn btn-primary btn-block" name="submit">Create Account</a> -->
                                                                </div>
                                                            </div>
                                                            <!-- </form> -->
                                                        </div>
                                                    </form>
                                                    <div class="card-footer text-center py-3">
                                                        <div class="small">
                                                            <a href="login.php">이미 네카라쿠배를 가입하셨나요?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                            </div>

                        </div>
                        <script
                            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                            crossorigin="anonymous"></script>
                        <script src="js/scripts.js"></script>
                    </body>
                </html>