<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content d-flex flex-row align-items-end justify-content-start">
							<div class="current_page">Edit Event</div>
							<div class="breadcrumbs ml-auto">
								<ul>
									<li><a href="index.html">Home</a></li>
									<li>Edit Event</li>
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
						<div class="logo_text logo_text_not_ie">Edit Event</div>
						
						<form action="<?=base_url()?>index.php/events/editevent" method="post" enctype="multipart/form-data" class="contact_form" id="contact_form">
							<input type="text" name="title" value="<?=$event->title?>" class="contact_input" placeholder="Event title" >
                            <img src="<?=base_url()?>assets/uploads/<?=$event->photo?>" class="img-thumbnail" alt="">
                            <br>
							<label style = "font-style: italic; color:rgb(56, 55, 55); margin-top:20px;">Photo  
							 <input type="file" name="photo" placeholder="Speaker photo"  style = "margin-left:15px;"></label>
							<input type="date" name="date" value="<?=strftime('%Y-%m-%d', strtotime($event->date));?>" class="contact_input" placeholder="Date" >
							<input type="text" name="city" value="<?=$event->city?>" class="contact_input" placeholder="City" >
							<input type="text" name="address" value="<?=$event->address?>" class="contact_input" placeholder="Address" >
							<textarea name="about" id="contact_textarea" class="contact_textarea contact_input" placeholder="About" ><?=$event->about?></textarea>
							<button class="button contact_button" type="submit"><span>Update Event</span></button>

                            <input type="hidden" name="event_id" value="<?=$event->id?>">
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
						
						<div class="logo_text logo_text_not_ie"> </div>
						
					</div>
				</div>
			</div>
		</div>
	</div>