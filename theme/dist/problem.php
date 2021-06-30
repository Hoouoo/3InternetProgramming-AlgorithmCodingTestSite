<!--문제 조회 및 출력-->

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
        <link href="css/button.css" rel="stylesheet"/>
        <script src="ckeditor.js"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"></script>
    </head>
    <?php

include('db.php');

if(isset($_GET['problem_title']) && !empty($_GET['problem_title']))
{
    $problem_title = $_GET['problem_title'];
    $stmt_edit = $con->prepare('SELECT * FROM nakaracubae_board WHERE title = :title');
    $stmt_edit->execute(array(':title'=>$problem_title));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
}

if(isset($_GET['user_id']) && !empty($_GET['user_id']))
{
    $user_id = $_GET['user_id'];
    $stmt_edit = $con->prepare('SELECT * FROM nakaracubae_user WHERE id = :id');
    $stmt_edit->execute(array(':id'=>$user_id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
}


    if( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit']))
{

    $username=$_POST['name'];
    $usertitle=$_POST['title'];
    $usercontent=$_POST['content'];


            try { 
                $stmt = $con->prepare('select * from nakaracubae_board where title=:title');
                $stmt->bindParam(':title', $title);
                $stmt->execute();

           } catch(PDOException $e) {
                die("Database error: " . $e->getMessage()); 
           }



}
?>
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

                        <div id="layoutSidenav_content">
                            <main>
                                <div class="container-fluid px-4">
                                    <h1 class="mt-4"><strong><?php echo $title; ?></strong></h1>

                                    <ol class="breadcrumb mb-4">
                                    
                                    <li class="breadcrumb-item">☑️ 난이도: <?php echo $solved; ?></li>
                                    
                                        </li>
                                        <div class="button-8">
                                                    <div class="eff-8"></div>
                                                    <a href="coderegister.php?register_name=<?php echo $name ?>&problem_title=<?php echo $title ?>&user_id=<?php echo $id ?>"> 코드 구현</a>
                                                </div>
                                    </ol>
 
                                    <form id="myform" method="post">
                                        <div class="form-floating mb-3">
                                            <label class="col-md-2 control-label" for="board_subject"></label>

                                        </div>
                                        <div class="card mb-4">
                                        <textarea readonly="readonly" name="content" id="editor" style="width:500px;" content = CKEDITOR.instances.editor.getData();> <?php echo $content ?>
                                        </textarea>
                                        <script>
                                        ClassicEditor
                                                .create(document.querySelector('#editor'), {
                                                    toolbar: {
                                                        items: [
                                                            
                                                        ]
                                                    },
                                                    language: 'ko',
                                                    image: {
                                                        toolbar: ['imageTextAlternative', 'imageStyle:full', 'imageStyle:side']
                                                    },
                                                    table: {
                                                        contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                                                    },
                                                    licenseKey: '',
                                                })
                                                .then(editor => {
                                                    window.editor = editor;
                                                    
                                                    editor.isReadOnly =true;
                                                })
                                                .catch(error => {
                                                    console.error('Oops, something went wrong!');
                                                    console.warn('Build id: 3be23cbehbaj-icjn4xl9x7b4');
                                                    console.error(error);
                                                }
                                                );
    </script>
                                    </div>
                                    <div style="height: 100vh"></div>
                                    <div class="card mb-4">
                                        <div class="card-body">When scrolling, the navigation stays at the top of the
                                            page. This is the end of the static navigation demo.</div>
                                    </div>
                                </div>

                            </main>
                            <footer class="py-4 bg-light mt-auto">
                                <div class="container-fluid px-4">
                                    <div class="d-flex align-items-center justify-content-between small">
                                        <div class="text-muted">Copyright &copy; NAKARACUBAE 2021</div>
                                        <div>
                                            <a href="#">Privacy Policy</a>
                                            &middot;
                                            <a href="#">Terms &amp; Conditions</a>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                      </form>
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