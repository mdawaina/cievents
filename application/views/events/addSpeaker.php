		<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content d-flex flex-row align-items-end justify-content-start">
							<div class="current_page">New/Edit Event</div>
							<div class="breadcrumbs ml-auto">
								<ul>
									<li><a href="index.html">Home</a></li>
									<li>New/Edit Event</li>
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
						<?php if (isset($event_title)):?>
							<div class="logo_text logo_text_not_ie">Event: <?=$event_title?></div>
						<?php endif;?>
						<form action="<?=base_url()?>index.php/events/addspeaker" method="post" enctype="multipart/form-data" class="contact_form" id="contact_form">
							<input type="text" name="name" class="contact_input" placeholder="Speaker name" >
							<input type="text" name="title" class="contact_input" placeholder="Speaker title" >
							<label style = "font-style: italic; color:rgb(56, 55, 55);">Speaker photo  
                            <input type="file" name="sphoto" placeholder="Speaker photo"  style = "margin-left:15px;"></label>
							<textarea name="about" id="contact_textarea" class="contact_textarea contact_input" placeholder="About speaker"></textarea>
							<button type="submit" class="button contact_button"><span>Add Speaker</span></button>

							<input type="hidden" name="event" value="<?=$event?>"/>
							<?php if (isset($event_title)):?>
								<input type="hidden" name="event_title" value="<?=$event_title?>"/>
							<?php endif;?>

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
									<th width = "20%" style="vertical-align:middle;">Speaker Photo</th>
									
									<th width = "20%" style="vertical-align:middle;">Speaker Name</th>
									<th width = "20%" style="vertical-align:middle;">Title</th>																
									
								</tr>
							</thead>
							<tbody style = "color: rgb(92, 89, 89);">

								<?php if(isset($speakers)){ ?>
								
                                <?php foreach ($speakers as $speaker) { ?>
                                  
                                  <tr>
								  <td style="text-align:center"><img src="<?=base_url()?>assets/uploads/<?=$speaker->sphoto?>" alt=""></td>
                                    <td><?=$speaker->name?></td>
                                    <td><?=$speaker->title?></td>
                                   
                                  </tr>


                              <?php } } ?>
								
								
							</tbody>	
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>