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
						<div class="logo_text logo_text_not_ie">Modify Speaker Data: </div>
						<form action="<?=base_url()?>index.php/events/editspeaker" method="post" enctype="multipart/form-data" class="contact_form" id="contact_form">
							<input type="text" name="name" value="<?=$speaker->name?>" class="contact_input" placeholder="Speaker name" >
							<input type="text" name="title" value="<?=$speaker->title?>" class="contact_input" placeholder="Speaker title" >
                            <label style = "font-style: italic; color:rgb(56, 55, 55);">Speaker photo  
                            <img src="<?=base_url()?>assets/uploads/<?=$speaker->sphoto?>" alt="">
                            <br>
                            <input type="file" name="sphoto"  placeholder="Speaker photo"  style = "margin-left:15px;"></label>

							<textarea name="about" id="contact_textarea" class="contact_textarea contact_input" placeholder="About speaker"><?=$speaker->about?></textarea>
							<button type="submit" class="button contact_button"><span>Update Speaker</span></button>

                           
                            <input type="hidden" name="speaker_id" value="<?=$speaker->id?>"/>
                            <input type="hidden" name="event_id" value="<?=$speaker->event?>"/>

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