<!DOCTYPE html>
<html lang="en">

<head>
    @include('shared.css')
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
 @include('shared.top-nav')       
        <!-- END HEADER-->

        <!-- START SIDEBAR-->
 @include('shared.side-nav')       
        <!-- END SIDEBAR-->


        <div class="content-wrapper">



     <!-- START PAGE CONTENT-->
     <div class="page-heading">
        <h1 class="page-title">Job Requests Management</h1>
        {{-- <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Project Categories</li>
        </ol> --}}
    </div>
    <div class="page-content fade-in-up">
       
        
       
        <div class="ibox">
            <div class="ibox-head">

                
                <div class="ibox-title">Job Requests</div>
                {{-- <button class="btn btn-info "
                
                data-toggle="modal" data-target="#exampleModalAdd"
                >Create</button> --}}
            </div>
            <div class="ibox-body">
             
                @include('shared.messages')     


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                          
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <!--<th>Message</th>-->
                                <th>Job</th>
                                <th>CV</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $data = \App\Models\JobRequest::orderBy('id' ,'desc')->paginate(10);
                                foreach ($data as $d) { 
                                $d->seen = 1;
                                $d->save();
                                ?>
                                <tr>
                              
                                    <td><?php echo $d->id; ?></td>
                                    <td><?php echo $d->name; ?></td>
                                    <td><?php echo $d->email; ?></td>
                                    <td><?php echo $d->phone; ?></td>
                                    <!--<td><?php echo $d->message; ?></td>-->
                                    <td><?php
                                    $dat = \App\Models\Job::find($d->job_id);
                                    echo $dat->title_en; ?></td>

                                    <td>
                                

                                        <a target="blank" href="<?php echo asset('storage/job-requests/'.$d->cv); ?>">Download</a> <span>|</span>
                                        

                                        <button class="btn btn-default btn-sm m-r-5" data-toggle="modal" data-target="#exampleModal<?php echo $d->id; ?>" style="margin-bottom: 3px">
                                         <i class="fa fa-eye font-14"></i>
                                         <!--<i>View</i>-->
                                        </button>
                                         
                                    </td>
                                    
                                  
                                    <td>
                                    
                                         <form method="post" action="{{url('admin/backend/job-requests/delete')}}">
                                            {{csrf_field()}}
                                        <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                        <button class="btn btn-danger btn-md" type="submit"
                                           onclick="return confirm('Are you sure  ? ')"

                                         data-toggle="tooltip" data-original-title="Delete">
                                         <i class="fa fa-trash font-14"></i></button>
                                   
                                         </form>
                                         
                                         
                                         
                                         
                                         
                                         
                                          <div class="modal fade" id="exampleModal<?php echo $d->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">


                                                  <!--<form method="post" action="" enctype="multipart/form-data"> -->
                                                  <!--  {{csrf_field()}}-->
                                                  
                                                <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                                
                                                    <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">View   <?php echo $d->name; ?>'s CV</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                 

                                                  
                                                    <div class="form-group">
                                                        
                                                        <iframe src=
                                                        
                                                        "<?php
                                                        $filename = asset('storage/job-requests/'.$d->cv);
                                                        $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                                        
                                                        if( $ext == 'pdf' || $ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'svg' || $ext == 'webp' || $ext == 'jfif'){
                                                            echo $filename;
                                                        
                                                        }elseif( $ext == 'docx' || $ext == 'doc' || $ext == 'pptx' || $ext == 'ppt' || $ext == 'xlsx' || $ext == 'xls'){
                                                            echo 'https://view.officeapps.live.com/op/embed.aspx?src='.$filename;
                                                            
                                                        }else{
                                                            echo url('dist/assets/img/no_preview.png');
                                                            
                                                        }
                                                        ?>"
                                                        
                                                        height="400px" width="100%"></iframe>
                                                        
                                                    </div>
                                                      

                                

                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             
                                                </div>

                                            <!--</form>-->



                                              </div>
                                            </div>
                                          </div>
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                   
                                    </td>
                                </tr>
                             
                              
                              <?php
                                }
                                ?>
                          
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
      
        


    </div>
    <!-- END PAGE CONTENT-->

    {{$data->links()}}
    
    <p style="margin-top: 15px; float:right;" <?php if($data->lastPage() == 1){echo "hidden";} ?>>
         
                <span> << </span>
                <a href="{{url("admin/job-requests")}}<?php echo "?page=1"; ?>">First Page</a>
                <span <?php if($data->lastPage() == 2){echo "hidden";} ?>> | </span>
                <a href="{{url("admin/job-requests")}}<?php echo "?page=".round($data->lastPage()/2); ?>" <?php if($data->lastPage() == 2){echo "hidden";} ?>>Middle Page</a>
                <span> | </span>
                <a href="{{url("admin/job-requests")}}<?php echo "?page=".$data->lastPage(); ?>">Last Page</a>
                <span> >> </span>
                
      </p>
    
    <p style="margin-top: 15px;">
          <?php 
          if($data->firstItem() == $data->lastItem()){
    echo " Page {$data->currentPage()} of {$data->lastPage()} | Item {$data->lastItem()} of {$data->total()}";}
    elseif($data->lastItem() == 0){
        echo "";
    }
    else{
        echo " Page {$data->currentPage()} of {$data->lastPage()} | Items {$data->firstItem()} to {$data->lastItem()} of {$data->total()}";
       
    }
      ?>
      </p>
      
      
      <!--this <select name="test_redirect">-->
      <!--or this <select name="test_redirect" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>-->
      
      <!--  @for ($i = 1; $i <= $data->lastPage(); $i++)-->
      <!--      <option value="{{ $i }}"  <?php   if($data->currentPage() == $i){echo "selected"; }  ?>   >{{ $i }}</option>-->
      <!--  @endfor-->
      <!--</select>-->
    
    
    
    @include('shared.footer')
</div>
</div>     
@include('shared.js')

<!--//  script-->
<!--//     document.querySelectorAll("[name=test_redirect]")[0].addEventListener('change',-->
<!--//   function () {-->
<!--//       window.location = "{{url("admin/job-requests")}}?page=" + this.value;-->
<!--//   });-->
<!--// /script-->


</body>

</html>