<?php

    include('db.php'); 
    if(isset($_GET['user_id']) && !empty($_GET['user_id']))
{
    $user_id = $_GET['user_id'];
    $stmt_edit = $con->prepare('SELECT * FROM nakaracubae_user WHERE id = :id');
    $stmt_edit->execute(array(':id'=>$user_id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);


}
?>
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
        <title>NEKARACUBAE : 동의대학교 컴퓨터 소프트웨어공학과 네카라쿠배</title>
        <link
            href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css"
            rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"></script>
            <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/darcula.css">
        <script src="js/codemirror.js"></script>
        <script src="js/javascript.js"></script>
        <script src="js/active-line.js"></script>
        <script src="js/matchbrackets.js"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <script src="bootstrap-3.3.7/js/bootstrap.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="welcome.php?user_id=<?php echo $id?>">NAKALICOUBAE : 네카라쿠배</a>
            <!-- Sidebar Toggle-->
            <button
                class="btn btn-link btn-sm order-1 order-lg-0 ms-5 me-lg-0"
                id="sidebarToggle"
                href="#!">
                <i class="fas fa-bars"></i>
            </button>
            <!-- Navbar Search-->
            <form
                class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        id="navbarDropdown"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>

                            <a class="dropdown-item" href="Logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a
                                class="nav-link collapsed"
                                href="#"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts"
                                aria-expanded="false"
                                aria-controls="collapseLayouts">
                                <!-- <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div> USER
                                MENU <div class="sb-sidenav-collapse-arrow"><i class="fas
                                fa-angle-down"></i></div> </a> <div class="collapse" id="collapseLayouts"
                                aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion"> <nav
                                class="sb-sidenav-menu-nested nav"> <a class="nav-link" href="회원가입.php">SIGN
                                UP</a> <a class="nav-link" href="login.php">SIGN IN</a> </nav> </div> -->
                                <div class="sb-sidenav-menu-heading">CODING TEST</div>
                                <a class="nav-link" href="compiler.php?user_id=<?php echo $id?>">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    COMPILER
                                </a>
                                <a class="nav-link" href="problems.php?user_id=<?php echo $id?>">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    Probelm Archive
                                </a>
                                <a class="nav-link" href="codeboard.php?user_id=<?php echo $id?>">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-book-reader"></i>
                                    </div>
                                    Code Archive
                                </a>
                                <a class="nav-link" href="career.php?user_id=<?php echo $id?>">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    CAREER
                                </a>
                                <a class="nav-link" href="https://www.acmicpc.net/">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    BAEKJOON
                                </a>
                                <a class="nav-link" href="https://programmers.co.kr/">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    PROGRAMMERS
                                </a>
                                <!-- <div class="sb-sidenav-menu-heading">Interface</div> <a class="nav-link
                                collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                                aria-expanded="false" aria-controls="collapseLayouts"> <div
                                class="sb-nav-link-icon"><i class="fas fa-columns"></i></div> Layouts <div
                                class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion"> <nav class="sb-sidenav-menu-nested nav"> <a
                                class="nav-link" href="layout-static.html">Static Navigation</a> <a
                                class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a> </nav>
                                </div> <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapsePages" aria-expanded="false"
                                aria-controls="collapsePages"> <div class="sb-nav-link-icon"><i class="fas
                                fa-book-open"></i></div> Pages <div class="sb-sidenav-collapse-arrow"><i
                                class="fas fa-angle-down"></i></div> </a> <div class="collapse"
                                id="collapsePages" aria-labelledby="headingTwo"
                                data-bs-parent="#sidenavAccordion"> <nav class="sb-sidenav-menu-nested nav
                                accordion" id="sidenavAccordionPages"> <a class="nav-link collapsed" href="#"
                                data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth"
                                aria-expanded="false" aria-controls="pagesCollapseAuth"> Authentication <div
                                class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages"> <nav class="sb-sidenav-menu-nested
                                nav"> <a class="nav-link" href="login.html">Login</a> <a class="nav-link"
                                href="register.html">Register</a> <a class="nav-link"
                                href="password.html">Forgot Password</a> </nav> </div> <a class="nav-link
                                collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseError" aria-expanded="false"
                                aria-controls="pagesCollapseError"> Error <div
                                class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages"> <nav class="sb-sidenav-menu-nested
                                nav"> <a class="nav-link" href="401.html">401 Page</a> <a class="nav-link"
                                href="404.html">404 Page</a> <a class="nav-link" href="500.html">500 Page</a>
                                </nav> </div> </nav> </div> <div class="sb-sidenav-menu-heading">Addons</div> <a
                                class="nav-link" href="charts.html"> <div class="sb-nav-link-icon"><i class="fas
                                fa-chart-area"></i></div> Charts </a> <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div> Tables </a>
                                </div> </div> -->
                                <div class="sb-sidenav-footer">
                                    <div class="small">DONG-EUI UNIV.</div>
                                    @ComputerSoftware
                                </div>
                            </nav>
                        </div>
                        <!--스크린 영역-->
                        <div id="layoutSidenav_content">
                            <main>
                                <div class="container-fluid px-4">
                                    <h1 class="mt-4"><strong>COMPILER</strong></h1>
                                    <ol class="breadcrumb mb-4">
                                        <li class="breadcrumb-item active">✔ 별도의 IDE 설치 없이 간단하게 코딩해보세요</li>
                                        </li>
                                    </ol>
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <!-- -->
   
                                                    <div class="form-group">

                                                        <form action="compile.php?user_id=<?php echo $id?>" name="f2" method="POST">
                                                            <label for="language">Choose Language</label>

                                                            <select class="form-control" name="language" id="language">
                                                                <option value="0">C</option>
                                                                <option value="1">C++</option>
                                                                <option value="2">C++11</option>
                                                                <option value="3">Java</option>

                                                            </select><br><br>

                                                            <label for="ta">Write Your Code</label>
                                                            <link rel="stylesheet" href="./codemirror/lib/codemirror.css">
                                                            <link rel="stylesheet" href="./codemirror/theme/darcula.css">
                                                            <script src="./codemirror/lib/codemirror.js"></script>
                                                            <script src="./codemirror/mode/clike/clike.js"></script>
                                                            <script src="./codemirror/mode/javascript/javascript.js"></script>
                                                            <script src="./codemirror/addon/selection/active-line.js"></script>
                                                            <script src="./codemirror/addon/edit/matchbrackets.js"></script>
                                                            <br>

                                                            <textarea
                                                                cols="80"
                                                                rows="20"
                                                                class="form-control"
                                                                id="code"
                                                                name="code"
                                                                style="font-family: &quot;Courier New&quot;; display: none;">#include<stdio.h>
#include <stdlib.h>
int main(){
    //TODO : 여기에 코드를 작성하세요
	return 0; 
}
                                                                </textarea>

                                                            <script>

                                                                var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                                                                    lineNumbers: true,
                                                                    styleActiveLine: true,
                                                                    matchBrackets: true,
                                                                    mode: "text/x-csrc",
                                                                    theme: "darcula"
                                                                });
                                                            </script>

                                                            <script>

                                                                function getLangMode() {
                                                                    var mode = $("#language").val();

                                                                    if (mode == 3) {
                                                                        editor.setOption("mode", "text/x-java");
                                                                        editor.getDoc().setValue("public class Main {\n\tpublic static void main(String[] args) {\n\t//TODO : 여기에 코드를 작성하세요 "
                                                                        +"\n\t}\n}");
                                                                    }
                                                                    else {
                                                                        editor.setOption("mode", "text/x-c++src");
                                                                        editor.getDoc().setValue("#include <stdio.h>"+"\n#include <stdlib.h>"
                                                                        +"\nint main(){\n//TODO : 여기에 코드를 작성하세요 " + "\n\treturn 0; \n}");
                                                                    }
                                                                }
                                                                
                                                                $("#language").change(function () {
                                                                    getLangMode();
                                                                });
                                                            </script>
                                                            <br><br>
                                                            <label for="in">Enter Your Input</label>
                                                            <textarea class="form-control" name="input" rows="10" cols="50"></textarea><br><br>
                                                            <div class="d-grid mt-0 mb-0">
                                                            <input type="submit" class="btn btn-success" value="코드 실행"><br><br><br>
                                                            </div>
                                                    
                                            </div>

                                            <!-- -->
                                        </div>
                                    </div>
                                </div>
                            </main>
                            <footer class="py-4 bg-light mt-auto">
                                <div class="container-fluid px-4">
                                    <div class="d-flex align-items-center justify-content-between small">
                                        <div class="text-muted">Copyright &copy; NAKALICOUBAE 2021</div>
                                        <div>
                                            <a href="#">Privacy Policy</a>
                                            &middot;
                                            <a href="#">Terms &amp; Conditions</a>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>

                        <script
                            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                            crossorigin="anonymous"></script>
                        <script src="js/scripts.js"></script>
                        <script
                            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
                            crossorigin="anonymous"></script>
                        <script src="assets/demo/chart-area-demo.js"></script>
                        <script src="assets/demo/chart-bar-demo.js"></script>
                        <script
                            src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"
                            crossorigin="anonymous"></script>
                        <script src="js/datatables-simple-demo.js"></script>
                    </body>
                </html>