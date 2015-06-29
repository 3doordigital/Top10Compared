<?php
	/* Don't remove this line. */
	require('../../../../wp-blog-header.php');
	
	$to = get_bloginfo('admin_email');
	$from = 'Top10Compared Newsletter Signup<noreply@top10compared.com>';
	
	$subject = 'Newsletter Signup From Top10Compared';
	
	$content = "
A new user has signed up to the newsletter please add the following email to your list:

$_POST[mailinglist]

Thank you";

	if(mail	($to,$subject,$content, 'From:'.$from)){
		echo '<div class="green">Email sent!</div>';	
	} else {
		echo '<div class="red">Email not sent!</div>';
	}
	
?>