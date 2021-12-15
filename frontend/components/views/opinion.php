<!-- Testimonials Section -->
      <div class="testimonials-container">
         <div class="container">
            <div class="row">
               <div class="col-md-12 wow fadeInUp">
                  <div class="title-un-icon"><i class="fa ion-quote"></i></div>
                  <h3 class="title-un">WHAT PEOPLE SAY?</h3>
                  <div id="owl-slide" class="testimonials owl-carousel">
                     <?php foreach ($opinions as $key => $opinion):?>
                        <div class="testimonial">
                        <p><?=$opinion->text?></p>
                        <div class="client">
                           <div class="client-info">
                              <div class="client-name">
                                 <?=$opinion->name?>
                              </div>
                           </div>
                        </div>
                     </div>
                    <?php endforeach;?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Testimonials Section -->