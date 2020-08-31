<!DOCTYPE html>
<html lang="en">
<head>
<title>TEDxCSUF</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
<body>
    <section id="main">
        <div class="inner">
        <?php
            $message_sent = false;

            if(isset($_POST['submit']) && isset($_POST['email']) && $_POST['email'] != '' ){
                
                if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
                    $name = $_POST['name'];
                    $subject = $_POST['subject'];
                    $mailFrom = $_POST['email'];
                    $message = $_POST['message'];
                    
                    $mailTo = "contact@tedxcsuf.org";
                    $headers = "From: " .$mailFrom;
                    $txt = "You have received an e-mail from " .$name. ".\nSender email: " .$mailFrom. ".\n\n" .$message; 

                    if( !empty($_POST["subscribe"]) ) { 
                        $txt.= "\n\nPlease add me to the TEDx Email List"; 
                     }
                    

                    mail($mailTo, $subject, $txt, $headers);
                    $message_sent = true;
                }
            }
        
    ?>

    <?php
        if($message_sent):
    ?>
        <h3>Thanks we will respond as soon as possible</h3>

    <?php
        else:
    ?>
        <h3>The email was not submitted</h3>
    <?php
        endif
    ?>

        </div>


    </section>

</body>
</html>

<?php $referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);
	
	if (!empty($referer)) {
		
		echo '<p><a href="'. $referer .'" title="Return to the previous page">&laquo; Go back</a></p>';
		
	} else {
		
		echo '<p><a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a></p>';
		
	}
?>