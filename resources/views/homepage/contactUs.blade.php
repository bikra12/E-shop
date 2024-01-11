 @extends('LoginMaster')

 @section('content')
 @if(session('message'))
 <div class="alert alert-success">
     {{ session('message') }}
 </div>
@endif

@if(session('error'))
 <div class="alert alert-danger">
     {{ session('error') }}
 </div>
@endif

     <section class="background-radial-gradient overflow-hidden text-black">
         <style>
             .background-radial-gradient {
                 background-color: hsla(221, 57%, 78%, 0.049);

             }
         </style>
         <section id="contact" class="contact">
             <div class="container aos-init aos-animate" data-aos="fade-up">

                 <div class="section-header">
                     <h2>Contact</h2>
                     <p>Need Help? <span>Contact Us</span></p>
                 </div>

                 <div class="mb-3">
                     <iframe style="border:0; width: 100%; height: 350px;"
                         src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14359.496150230358!2d87.83538855074252!3d25.873622843358184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e54784f020ef75%3A0x2465464e31e2286a!2sDalkhola%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1693309327929!5m2!1sen!2sin"
                         frameborder="0" allowfullscreen=""></iframe>
                 </div><!-- End Google Maps -->

                 <div class="row gy-4">

                     <div class="col-md-6">
                         <div class="info-item  d-flex align-items-center ">
                             <i class="icon bi bi-map flex-shrink-0"></i>
                             <div>
                                 <h3>Our Address</h3>
                                 <p>Dalkhola, WestBengal, India</p>
                             </div>
                         </div>
                     </div><!-- End Info Item -->

                     <div class="col-md-6">
                         <div class="info-item d-flex align-items-center">
                             <i class="icon bi bi-envelope flex-shrink-0"></i>
                             <div>
                                 <h3>Email Us</h3>
                                 <p>bikrambaidya301@gmail.com</p>
                             </div>
                         </div>
                     </div><!-- End Info Item -->

                     <div class="col-md-6">
                         <div class="info-item  d-flex align-items-center">
                             <i class="icon bi bi-telephone flex-shrink-0"></i>
                             <div>
                                 <h3>Call Us</h3>
                                 <p>+91 7365833004</p>
                             </div>
                         </div>
                     </div><!-- End Info Item -->

                     <div class="col-md-6">
                         <div class="info-item  d-flex align-items-center">
                             <i class="icon bi bi-share flex-shrink-0"></i>
                             <div>
                                <h3>LinkedIn</h3>
                                <p>"https://www.linkedin.com/in/bikram-baidya-004055241/ <a href="https://www.linkedin.com/in/bikram-baidya-004055241/" target="_blank"> Profile</a></p>

                                
                                 {{-- <div><strong>Mon-Sat:</strong> 11AM - 23PM;
              <strong>Sunday:</strong> Closed
            </div> --}}
                             </div>
                         </div>
                     </div><!-- End Info Item -->

                 </div>
            
                 @if (session('message'))
                 <div class="alert alert-success">
                     {{ session('message') }}
                 </div>
             @endif             
                 <form action="{{ route('contact.send') }}" method="post" role="form" class="php-email-form p-3 p-md-4" enctype="multipart/form-data">
                    @csrf 
                    
                    <div class="row">
                         <div class="col-xl-6 form-group">
                             <input type="text" name="name" class="form-control" id="name"
                                 placeholder="Your Name" required="">
                         </div>
                         <div class="col-xl-6 form-group">
                             <input type="email" class="form-control" name="email" id="email"
                                 placeholder="Your Email" required="">
                         </div>
                     </div>
                     <div class="form-group">
                         <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                             required="">
                     </div>
                     <div class="form-group">
                         <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
                     </div>
                     {{-- <div class="my-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your message has been sent. Thank you!</div>
      </div> --}}
                     <div class="text-center"><button type="submit">Send Message</button></div>
                 </form><!--End Contact Form -->

             </div>
         </section>
     </section>
 @endsection
