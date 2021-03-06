<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/abdoljabbar
 * @since      1.0.0
 *
 * @package    Pasban_Security_Scanner
 * @subpackage Pasban_Security_Scanner/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<section id="pasban-content">
	<header class="pasban-header">
		<h1>PASBAN SECURITY SCANNER</h1>
	</header>
	<div class="pasban-body">
		<section class="pasban-ready-message">
			<p>ARE YOU READY<span class="mark-question">?</span></p>
			<div class="ready-button">
				<button type="button" class="btn">
					SCAN
				</button>
			</div>

		</section>
		<section class="pasban-scan-result">
			<div class="container">
				<div class="row">
					<div class="col-md-12 pasban-scan-result-elements">
						<!-- here will be replaced the result by jquery -->
					</div>
				</div>
			</div>
		</section>
	</div>
</section>