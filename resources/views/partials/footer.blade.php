<footer class="site-footer">
    <div class="container">
      
      <div class="row">
        <div class="col-md-4">
          <h3 class="footer-heading mb-4 text-white">About</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat quos rem ullam, placeat amet.</p>
          <p><a href="#" class="btn btn-primary pill text-white px-4" id="bodybtn">Read More</a></p>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-6">
              <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                <ul class="list-unstyled">
                  <li><a href="#">About</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Sustainability</a></li>
                  <li><a href="#">News</a></li>
                  <li><a href="#">Careers</a></li>
                </ul>
            </div>
            <div class="col-md-6">
              <h3 class="footer-heading mb-4 text-white">Sign Up</h3>
                <ul class="list-unstyled">
                  <li><a href="{{route('register')}}">Seeker</a></li>
                  <li><a href="{{route('employerRegister')}}">Employer</a></li>
                  {{-- <li><a href="#">Temporary</a></li>
                  <li><a href="#">Internship</a></li> --}}
                </ul>
            </div>
          </div>
        </div>

        
        <div class="col-md-2">
          <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
            <div class="col-md-12">
              <p>
                <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                <a href="#" class="p-2"><span class="icon-linkedin"></span></a>

              </p>
            </div>
        </div>
      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <p>
         
          Copyright &copy; {{date("Y") }} All Rights Reserved | Jobsite Mauritius{{-- This Website is made
          <i class="text-warning" aria-hidden="true"></i> by <a href="https://jordantech-solutions.com" target="_blank" >Jordantech-solutions</a> --}}
          
          </p>
        </div>
        
      </div>
    </div>
  </footer>
</div>

<script src="{{asset('external/js/jquery-3.6.1.min.js')}}"></script>
<script src="{{asset('external/js/jquery-ui.js')}}"></script>
<script src="{{asset('external/js/popper.min.js')}}"></script>

{{-- Data table --}}

<script src="{{asset('external/js/jquery.dataTables.min.js')}}" defer></script>
<script src="{{asset('external/js/2.2.3.dataTables.buttons.min.js')}}" defer></script>
<script src="{{asset('external/js/jszip.min.js')}}" defer></script>
<script src="{{asset('external/js/pdfmake.min.js')}}" defer></script>
<script src="{{asset('external/js/vfs_fonts.js')}}" defer></script>
<script src="{{asset('external/js/buttons.html5.min.js')}}" defer></script>
<script src="{{asset('external/js/buttons.print.min.js')}}" defer></script>

<script>
  $(document).ready(function() {
      $('#table').DataTable( {
          dom: 'frtip',
          buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
  ],
          pageLength: 3,
          
      } );
  } );
</script>
{{-- End Data table --}}

<script src="{{asset('external/js/bootstrap.min.js')}}"></script>
<script src="{{asset('external/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('external/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('external/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('external/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('external/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('external/js/aos.js')}}"></script>
<script src="{{asset('external/js/mediaelement-and-player.min.js')}}"></script>
<script src="{{asset('external/js/main.js')}}"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
              var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

              for (var i = 0; i < total; i++) {
                  new MediaElementPlayer(mediaElements[i], {
                      pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                      shimScriptAccess: 'always',
                      success: function () {
                          var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                          for (var j = 0; j < targetTotal; j++) {
                              target[j].style.visibility = 'visible';
                          }
                }
              });
              }
          });
  </script>