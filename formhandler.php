<?php

/*CREATE TABLE `USER` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`phone` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
)*/

$recepient = "ystal@mail.ru";
$sitename = "Название сайта";

$name = trim($_POST["name"]);
$phone = trim($_POST["phone"]);
$email = trim($_POST["email"]);
$message = "Имя: $name \nТелефон: $phone \nE-mail: $email\n";
echo $message;

$sql = "INSERT INTO `USER` (`name`, `phone`, `email`) VALUES('$name', '$phone', '$email');";
$conn  = new mysqli("doom4.beget.com", "ystalmko_beton", "igogo12345", "ystalmko_beton");
if ($conn ->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

// send email
$result = mail($recepient, "Обратный звонок", $message);
if ($result) {
    echo 'все путем';
} else {
    echo 'что-то не так';
}

?>