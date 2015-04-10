// Prepared statement mysqli procedure for DB Interaction

<?php
$oDB=new PDO('... your connection details... ');
$hStmt=$oDB->prepare("select name, age from users where userid=:userid");
$hStmt->execute(array(':userid',$nUserID));
/>