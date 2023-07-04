@include('frontend.layouts.header')

    @include('frontend.layouts.css')
    {{-- @include('frontend.layouts.js') --}}
   
   <!-- Carousel Start -->
   @include('frontend.blocs.Carousel')
   <!-- Carousel End -->




 

    

    <!-- About Start -->
    @include('frontend.blocs.About')
    <!-- About End -->


    <!-- Facts Start -->
    @include('frontend.blocs.Facts')
    <!-- Facts End -->


    <!-- Features Start -->
      @include('frontend.blocs.features') 
 
    <!-- Features End -->


    <!-- Video Modal Start -->
    @include('frontend.blocs.Video')
    <!-- Video Modal End -->


    <!-- Service Start -->
    @include('frontend.blocs.Service')
    <!-- Service End -->


    <!-- Project Start -->
    @include('frontend.blocs.Project')
    <!-- Project End -->


    <!-- Team Start -->
    @include('frontend.blocs.Team')

    <!-- Team End -->


    <!-- Testimonial Start -->
    @include('frontend.blocs.Testimonial')
             
    <!-- Testimonial End -->


   
    @include('frontend.layouts.footer')
             


    <!-- JavaScript Libraries -->
   
    @include('frontend.layouts.js')
