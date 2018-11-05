<!-- Events -->

					
					<!-- Event -->
					<div class="event">
						<div class="row row-lg-eq-height">
							<div class="col-lg-6 event_col">
								<div class="event_image_container">
									<div class="background_image" style="background-image:url(<?=base_url()?>assets/uploads/<?php echo $event_item->photo?>)"></div>
									<div class="date_container">
										<a href="#">
											<span class="date_content d-flex flex-column align-items-center justify-content-center">
												<div class="date_day"><?php echo date_format(date_create($event_item->date),"d")?></div>
												<div class="date_month"><?php echo date_format(date_create($event_item->date),"F")?></div>
											</span>
										</a>	
									</div>
								</div>
							</div>
							<div class="col-lg-6 event_col">
								<div class="event_content">
									<div class="event_title"><?php echo $event_item->title?></div>
									<div class="event_location">@ <?php echo $event_item->city?></div>
									<div class="event_text">
										<p><?php echo $event_item->about?></p>
									</div>
									<div class="event_speakers">

									<?php foreach ($speakers as $speaker) { ?>
									
										<!-- Event Speaker -->
										<div class="event_speaker d-flex flex-row align-items-center justify-content-start">
											<div><div class="event_speaker_image"><img src="<?php echo base_url()?>assets/uploads/<?php echo $speaker->sphoto?>" alt=""></div></div>
											<div class="event_speaker_content">
												<div class="event_speaker_name"><?php echo $speaker->name?></div>
												<div class="event_speaker_title"><?php echo $speaker->title?></div>
											</div>
										</div>
									<?php } ?>
									</div>
									<div class="event_buttons">
										<div class="button event_button event_button_1"><a href="#">Buy Tickets Now!</a></div>
										<div class="button_2 event_button event_button_2"><a href="#">Read more</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
