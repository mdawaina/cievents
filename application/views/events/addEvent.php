<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content d-flex flex-row align-items-end justify-content-start">
							<div class="current_page">New Event</div>
							<div class="breadcrumbs ml-auto">
								<ul>
									<li><a href="index.html">Home</a></li>
									<li>New Event</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Contact -->

	<div class="contact">
		<div >
			<div class="row">
				<div class="col-md-5" style = "margin-left: 75px;">
					<div>
						<div class="logo_text logo_text_not_ie">New Event</div>
						<div class="validation-messages">
							<?php echo validation_errors(); ?>
						</div>
						<form action="<?=base_url()?>index.php/events/addevent" method="post" enctype="multipart/form-data" class="contact_form" id="contact_form">
							<input type="text" name="title" class="contact_input" placeholder="Event title" value="<?php echo set_value('title'); ?>">
							<label style = "font-style: italic; color:rgb(56, 55, 55);">Photo  
							 <input type="file" name="photo" placeholder="Speaker photo"  style = "margin-left:15px;"></label>
							<input type="date" name="date" class="contact_input" placeholder="Date" value="<?php echo set_value('date'); ?>" >
							<input type="text" name="city" class="contact_input" placeholder="City" value="<?php echo set_value('city'); ?>">
							<input type="text" name="address" class="contact_input" placeholder="Address" value="<?php echo set_value('address'); ?>" >
							<textarea name="about" id="contact_textarea" class="contact_textarea contact_input" placeholder="About" value="<?php echo set_value('about'); ?>"></textarea>
							<button class="button contact_button" type="submit"><span>Add Event</span></button>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div>
						<div style = "margin-left: 20px;">
							<a href="#">
								<div class="logo_container d-flex flex-row align-items-start justify-content-start">
									<!-- <div class="logo_image"><div><img src="images/logo.png" alt=""></div></div> -->
									<!-- <div class="logo_content">
										<div id="logo_text" class="logo_text logo_text_not_ie">The Conference</div>
									</div> -->
								</div>
							</a>	
						</div>
						
						<div class="logo_text logo_text_not_ie"> Speakers</div>
						<table class="table table-striped table-bordered" style = "margin-top:17px; margin-left:20px;">
							<thead style = "background-color:rgb(187, 187, 240); font-size: 20px; font-style: italic; color: black;">
								<tr>
									<th width = "20%" style="vertical-align:middle;">Speaker Name</th>
									<th width = "20%" style="vertical-align:middle;">Title</th>
									<th width = "20%" style="vertical-align:middle;">Photo</th>								
									<th width = "20%" style="vertical-align:middle;">About</th>
								</tr>
							</thead>
							<tbody style = "color: rgb(92, 89, 89);">
								<tr>
									<th>Mohamed Dawaina</th>
									<th>Software Developer</th>
									<th></th>
									<th>About</th>
									
								</tr>
								
								
								
							</tbody>	
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>