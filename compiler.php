<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
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
        <style>
            .CodeMirror {
                border: 1px solid black;
                font-size: 13px;
            }
        </style>

    </head>
    <body>
        <div class="main">

            <div class="row">
                <div class="col-sm-12">
                    <nav class="shadow navbar navbar-inverse navbar-fixed-top nbar">
                        <div class="navbar-header">
                            <a class="navbar-brand lspace" href="index.php">NAKARAKUBAE : 네카라쿠배</a>
                            <button
                                type="button"
                                class="navbar-toggle"
                                data-toggle="collapse"
                                data-target=".navbar-menubuilder">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse navbar-menubuilder">
                            <ul class="nav navbar-nav">
                                <li class="space">
                                    <a href="compiler.php">
                                        <i class="fa fa-code ispace"></i>Compiler</a>
                                </li>
                                <li class="space">
                                    <a href="archive.php">
                                        <i class="fa fa-archive ispace"></i>Problem Archive</a>
                                </li>
                                <li class="space">
                                    <a href="contest.php">
                                        <i class="fa fa-cogs ispace"></i>Contests</a>
                                </li>
                                <li class="space">
                                    <a href="#">
                                        <i class="fa fa-check-square ispace"></i>Debug</a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row log">
            <div class="col-sm-10">
                <!--<div class=""><h1 style="text-align:center;"> Complier </h1></div>-->
            </div>

            <div class="col-sm-1"></div>

            <div class="col-sm-1"></div>

        </div>

        <div class="row cspace">
            <div class="col-sm-8">
                <div class="form-group">
                    <form action="compile.php" name="f2" method="POST">
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
                            style="font-family: &quot;Courier New&quot;; display: none;"></textarea>

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

                                if (mode == 3) 
                                    editor.setOption("mode", "text/x-java");
                                else editor.setOption("mode", "text/x-c++src");
                                }
                            
                            $("#language").change(function () {
                                getLangMode();
                            });
                        </script>
                        <br><br>
                        <label for="in">Enter Your Input</label>
                        <textarea class="form-control" name="input" rows="10" cols="50"></textarea><br><br>
                        <input type="submit" class="btn btn-success" value="Run Code"><br><br><br>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>