<br />
<b>Warning</b>:  Undefined array key "email" in <b>D:\xampp\htdocs\bnhs-enrollment\database\connection.php</b> on line <b>49</b><br />
<br />
<b>Warning</b>:  Undefined array key "name" in <b>D:\xampp\htdocs\bnhs-enrollment\database\connection.php</b> on line <b>49</b><br />
<br />
<b>Fatal error</b>:  Uncaught PHPMailer\PHPMailer\Exception: Invalid address:  (to):  in D:\xampp\htdocs\bnhs-enrollment\PHPMailer\src\PHPMailer.php:1094
Stack trace:
#0 D:\xampp\htdocs\bnhs-enrollment\PHPMailer\src\PHPMailer.php(1014): PHPMailer\PHPMailer\PHPMailer-&gt;addOrEnqueueAnAddress('to', NULL, NULL)
#1 D:\xampp\htdocs\bnhs-enrollment\database\connection.php(49): PHPMailer\PHPMailer\PHPMailer-&gt;addAddress(NULL, NULL)
#2 D:\xampp\htdocs\bnhs-enrollment\admin\controller\function_class.php(539): sendEmail(Array)
#3 D:\xampp\htdocs\bnhs-enrollment\admin\controller\function_class.php(679): Database-&gt;updateStatus(Array)
#4 {main}
  thrown in <b>D:\xampp\htdocs\bnhs-enrollment\PHPMailer\src\PHPMailer.php</b> on line <b>1094</b><br />