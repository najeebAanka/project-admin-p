
 <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>


    <script src="{{asset("assets/vendors/jquery/dist/jquery.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/popper.js/dist/umd/popper.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/bootstrap/dist/js/bootstrap.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/metisMenu/dist/metisMenu.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js")}}"  type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{asset("assets/vendors/chart.js/dist/Chart.min.js")}}"  type="text/javascript"></script>
    <script src="{{asset("assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js")}}"  type="text/javascript"></script>
    <script src="{{asset("assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js")}}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{asset("assets/js/app.min.js")}}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{asset("assets/js/scripts/dashboard_1_demo.js")}}" type="text/javascript"></script>
    
    
    
    
    <!--<script src="{{asset("assets/vendors/summernote/dist/summernote.min.js")}}" type="text/javascript"></script>-->
    <!--<script src="{{asset("assets/vendors/bootstrap-markdown/js/bootstrap-markdown.js")}}" type="text/javascript"></script>-->
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    
    
    
    <script type="text/javascript">
    
        $(function() {
        
          // $('[id^=summernote]').summernote();
          // $('#summernote').summernote();
          $('textarea').summernote(
              
              
              {
                  placeholder: 'Start writing..',
                  
               toolbar: [
               // [groupName, [list of button]]
  
              ['style', ['style']],
              ['font', ['bold','italic', 'underline', 'clear']],
              ['fontname', ['fontname']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
        //      ['height', ['height']],
        //      ['font', ['strikethrough', 'superscript', 'subscript']],
        //      ['fontsize', ['fontsize']],
        //      ['table', ['table']],
        //      ['insert', ['link', 'picture', 'video']],
        //      ['view', ['fullscreen', 'codeview']]
              ]
             }
              
              
            );
        
        
        
        
        //$('.summernote').summernote();
            // $('.summernote').summernote({
            //     airMode: true
            // });
        });
        
  </script>
    

    <!--<script type="text/javascript">
        $(function() {
        
          // $('[id^=summernote]').summernote();
          // $('#summernote').summernote();
          $('textarea').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
  </script>-->
   
   
   
   
    <!--<script type="text/javascript">
        $(function() {
            $('#summernote').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
    </script>-->
    
    
    
    <script>
       $(document).ready(function () {
        var url = window.location.href;
        $('.page-sidebar .side-menu').find('.active').removeClass('active');
        $('.page-sidebar .side-menu li a').each(function () {
            if (this.href == url || url.includes(this.href+"?page=")) {
                $(this).parent().addClass('active');
            }
            else if(url.includes("single-project/")){
                $t = document.getElementById('set_this');
                $t.classList.add("active");
            }
            
        }); 
    });
   </script>
    
    
   
 <!-- <script>
      $(document).ready(function () {
        var url = window.location;
        var url1 = window.location.href;
        $('.page-sidebar .side-menu').find('.active').removeClass('active');
        $('.page-sidebar .side-menu li a').each(function () {
            if (this.href == url || url1.includes(this.href+"?page=")) {
                $(this).parent().addClass('active');
            }
            
        }); 
    });
  </script> -->




   
    
    
    
    
    
    
    
    
   
   