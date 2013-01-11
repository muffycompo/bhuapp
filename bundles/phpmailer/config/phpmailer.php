<?php

/**
 * Default Configuration
 *
 * For every option that is set here, if the value isn't null,
 * then that setting will be passed to the constructor when
 * starting a new mailer.
 *
 * For example, if the configuration contains:
 *
 *   array(
 *     'SetFrom'   => array('colin@example.com', 'Colin Viebrock'),
 *     'IsSMTP' => null,
 *     'Host'   => 'smtp@example.com',
 *   )
 *
 * that would be equivalent to running this when starting
 * a new mailer instance:
 *
 *   $mailer->SetFrom('Colin@example.com', 'Colin Viebrock');
 *   $mailer->IsSMTP();
 *   $mailer->Host = 'smtp@example.com';
 *
 * Sadly, this is a bit limited, mostly because of how PHPMailer handles
 * setting values.  Sometimes it's:
 *
 *    $foo->bar = $value
 *
 * and sometimes it's:
 *
 *    $foo->bar($value);
 *
 * Suggestions on how to better handle this are welcome, although the
 * most common elements that you might want to prepopulate (from address,
 * SMTP host and info) can be configured.
 */

return array(
	'SetFrom'    	=> array('bhuns@binghamuni.edu.ng', 'Bingham University'),
	'Host'       	=> 'smtp.gmail.com',
	'IsSMTP'		=> null,
	'Username'		=> 'bhuns@binghamuni.edu.ng',
	'Password'		=> 'Bingham@123',
	'SMTPAuth'		=> true,
	'SMTPSecure'	=> 'tls',
	'Port'			=> '587',
	// 'SMTPSecure'	=> 'ssl', // problems with Namecheap Hosting
	// 'Port'			=> '465', // problems with Namecheap Hosting
);