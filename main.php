<doctype html>
<html>
<head>
<title>sign up page</title>
</head>
<body>
<form name="join" method="post" action="dbconn.php">
 <h1>input your information</h1>
 <table border="1">
  <tr>

   <td>ID</td>
   <td><input type="text" size="30" name="name"></td>
  </tr>
  <tr>
   <td>gender</td>
   <td><input type="text" size="40" name="gender"></td>
  </tr>
  <tr>
   <td>phone</td>
   <td><input type="password" size="30" name="phone"></td>
  </tr>
  
  <tr>
   <td>email</td>
   <td><input type="text" size="12" maxlength="10" name="email"></td>
  </tr>
  <tr>
   <td>Password</td>
   <td><input type="password" size="30" name="pw"></td>
  </tr>


 </table>
 <input type=submit value="submit"><input type=reset value="rewrite">
</form>
</body>
</html>