<?php 
$to = "amahi.wp@gmail.com";
$from="mailattach@example.com";
$subject = "William Shakespeare Poems\n";
$mainMessage ="A Small poems book of William Shakespeare.\r\n";
$fileName="./william_shakespeare.pdf";
$fileNewName ="book.pdf";

$fileData = file_get_contents($filename);
$boundary = "Hear is Boundary";

$headers = "From :{$from}";
$headers .= "MIME-Version :1.0 \r\n";
$headers .= "Content-type:multipart/mixed; \r\n";
$headers .= "boundary = \"{$boundary}\";\r\n";

$message = "This is Multipart-message\r\n";
$message .= "--{$boundary}\r\n";
$message .= "Content-type:text/plain; charset = UTF-8;\r\n";
$message .= "Content-Transfar-Encodeing : 7bit \r\n";
$message .= $mainMessage."\r\n";

$encodeFileData =  chunk_split(base64_encode($fileData));
$message .= "--{$boundary}\r\n";
$message .= "Content-type:aaplication/pdf\r\n";
$message .= "name = {$fileName} \r\n";
$message .= "Content-Transfar-Encodeing :base64 \r\n";
$message .= $encodeFileData ."\r\n";
$message .= "--{$boundary}--\r\n";

$mailsend = mail($to,$subject,$message,$headers);
if(!$mailsend){
    die("Sending mail Failed\n");
    exit();
}else {
    echo "Mail send Sucessfully\n";
}
//happy codeing.
