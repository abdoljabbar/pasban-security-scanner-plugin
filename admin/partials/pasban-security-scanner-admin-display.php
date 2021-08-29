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
					<div class="col-md-6">
						<h3 class="progress-title">HTML5 - 60%</h3>
						<div class="progress">
							<div class="progress-bar progress-bar-danger progress-bar-striped active"
								style="width:60%;"></div>
						</div>
						<h3 class="progress-title">CSS3 - 90%</h3>
						<div class="progress">
							<div class="progress-bar progress-bar-info progress-bar-striped active" style="width:90%;">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>