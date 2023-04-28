<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $password = filter_input(INPUT_POST, "password");

        $user = $_GET["user"];

	var_dump(@exec("echo \"$password\n$password\" | sudo chpasswd -e $user"));

     
    }

?>

<form method="post">
    <div>
        <label>Password</label>
        <input type="password" name="=password" placeholder="Password" required>
    </div>
<input type="submit" value="Send Request" />

</form>

