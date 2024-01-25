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
        <h1 class="page-title">Services Management</h1>
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

                
                <div class="ibox-title">Services</div>
                <button class="btn btn-info "
                
                data-toggle="modal" data-target="#exampleModalAdd"
                >Create</button>
            </div>
            <div class="ibox-body">
             
                @include('shared.messages')     


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                          
                                <th>ID</th>
                                <th>Title (English)</th>
                                <th>Title (Arabic)</th>
                                <th>Content (English)</th>
                                <th>Content (Arabic)</th>
                                <th>Image</th>
                                <th>Icon</th>
                                <th>File</th>
                                <th>Actions</th>
                        
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $data = \App\Models\Service::orderBy('id' ,'desc')->paginate(10);
                                foreach ($data as $d) { ?>
                                <tr>
                              
                                    <td><?php echo $d->id; ?></td>
                                    <td><?php echo $d->name_en; ?></td>
                                    <td style="text-align: right; direction: rtl;"><?php echo $d->name_ar; ?></td>
                                    <td><?php if (strlen($d->desc_en) > 100){ echo substr(strip_tags($d->desc_en) ,0,100)."..";} else{echo strip_tags($d->desc_en);}  ?></td>
                                    <td style="text-align: right; direction: rtl;"><?php if (strlen($d->desc_ar) > 100){ echo substr(strip_tags($d->desc_ar) ,0,100)."..";} else{echo strip_tags($d->desc_ar);}  ?></td>
                                    <td>
                                        <img class="comp-icon" src="
                                        <?php echo $d->buildImage() ?>" />
                                    </td>
                                    <td>
                                        <img class="comp-icon" src="
                                        <?php echo $d->buildIcon() ?>" width=40 />
                                    </td>
                                    
                                    <td>
                                

                                        <!--<a target="blank" href="<?php echo asset('storage/services/files/'.$d->service_file); ?>">Download</a> <span>|</span>-->
                                        

                                        <button class="btn btn-default btn-sm m-r-5" data-toggle="modal" data-target="#example_Modal<?php echo $d->id; ?>" style="margin-bottom: 3px">
                                         <i class="fa fa-eye font-14"></i>
                                         <!--<i>View</i>-->
                                        </button>
                                         
                                    </td>
                                    
                                    <td>
                                        <button class="btn btn-default btn-md m-r-5"
                                       
                                        data-toggle="modal" data-target="#exampleModal<?php echo $d->id; ?>"
                                        style="margin-bottom: 3px">
                                         <i class="fa fa-pencil font-14"></i></button>



                                         <form method="post" action="{{url('admin/backend/services/delete')}}">
                                            {{csrf_field()}}
                                        <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                        <button class="btn btn-danger btn-md" type="submit"
                                           onclick="return confirm('Are you sure  ? ')"

                                         data-toggle="tooltip" data-original-title="Delete">
                                         <i class="fa fa-trash font-14"></i></button>
                                   
                                         </form>
                                         
                                         
                                         <div class="modal fade" id="example_Modal<?php echo $d->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">


                                                  <!--<form method="post" action="" enctype="multipart/form-data"> -->
                                                  <!--  {{csrf_field()}}-->
                                                  
                                                <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                                
                                                    <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">View   <?php echo $d->name_en; ?>'s file</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                 

                                                  
                                                    <div class="form-group">
                                                        
                                                        <iframe src=
                                                        
                                                        "<?php
                                                        $filename = asset('storage/services/files/'.$d->service_file);
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







                                        <div class="modal fade" id="exampleModal<?php echo $d->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">


                                                  <form method="post" action="{{url('admin/backend/services/edit')}}" enctype="multipart/form-data"> 
                                                    {{csrf_field()}}
                                                <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                                    <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Edit   <?php echo $d->name_en; ?></h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                 
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Title (En)</label>
                                                        <input type="text" class="form-control" name="name_en" required
                                                        value="<?php echo $d->name_en; ?>"
                                                         aria-describedby="emailHelp" placeholder="English">
                                                        <small id="emailHelp" class="form-text text-muted"></small>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Title (Ar)</label>
                                                        <input type="text" name="name_ar" class="form-control" required
                                                        value="<?php echo $d->name_ar; ?>"
                                                        placeholder="Arabic">
                                                      </div>

                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Content (En)</label>
                                                        <textarea name="desc_en" class="form-control" required
                                                        placeholder="English" rows="5"><?php echo $d->desc_en; ?></textarea>
                                                      </div>

                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Content (AR)</label>
                                                        <textarea name="desc_ar" class="form-control" required
                                                        placeholder="Arabic" rows="5"><?php echo $d->desc_ar; ?></textarea>
                                                      </div>

                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Service image</label>
                                                        <!--<input type="file"  name="image" class="form-control">-->
                                                        
                                                        <!--<input type="file" onchange="readURL_(this);" name="image" class="form-control">-->
                                                        <!--<img id="blah_" src="<?php echo $d->buildImage() ?>" />-->
                                                        
                                                        <input type="file" onchange="readURL(this);" name="image" class="form-control">
                                                        <img class="blah" src="<?php echo $d->buildImage() ?>" />
                                                    
                                                      </div>

                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Service icon</label>
                                                        <!--<input type="file"  name="icon" class="form-control">-->
                                                        
                                                        <!--<input type="file" onchange="readURL1_(this);" name="icon" class="form-control">-->
                                                        <!--<img id="blah1_" src="<?php echo $d->buildIcon() ?>" />-->
                                                        
                                                        <input type="file" onchange="readURL_(this);" name="icon" class="form-control">
                                                        <img class="blah_" src="<?php echo $d->buildIcon() ?>" />
                                                    
                                                      </div>
                                                      
                                                      
                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Service file</label>
                                                        <input type="file" name="service_file" class="form-control">
                                                        
                                                      </div>


                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>

                                            </form>



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
  


    <div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">


              <form method="post" action="{{url('admin/backend/services/add')}}"  enctype="multipart/form-data">
                {{csrf_field()}}
     
                <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new service</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title (En)</label>
                    <input type="text" class="form-control" name="name_en" required
                  
                     aria-describedby="emailHelp" placeholder="English">
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Title (Ar)</label>
                    <input type="text" name="name_ar" class="form-control" required
                   
                    placeholder="Arabic">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Content (En)</label>
                    <Textarea class="form-control" name="desc_en" required
                  
                     aria-describedby="emailHelp" placeholder="English" rows="5"></Textarea>
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Content (Ar)</label>
                    <Textarea class="form-control" name="desc_ar" required
                  
                     aria-describedby="emailHelp" placeholder="Arabic" rows="5"></Textarea>
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Service image</label>
                    <!--<input type="file" onchange="readURL(this);" name="image" class="form-control" required>-->
                    <!--<img id="blah"  />-->
                    
                    <input type="file" onchange="readURL(this);" name="image" class="form-control" required>
                    <img class="blah"  />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Service icon</label>
                    <!--<input type="file" onchange="readURL1(this);" name="icon" class="form-control" required>-->
                    <!--<img id="blah1"  />-->
                    
                    <input type="file" onchange="readURL_(this);" name="icon" class="form-control" required>
                    <img class="blah_"  />
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Service file</label>
                    
                    <input type="file"  name="service_file" class="form-control" required>
                    <!--<img class="blah"  />-->
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>

        </form>



          </div>
        </div>
      </div>




      {{$data->links()}}
      
      <p style="margin-top: 15px; float:right;" <?php if($data->lastPage() == 1){echo "hidden";} ?>>
         
                <span> << </span>
                <a href="{{url("admin/services")}}<?php echo "?page=1"; ?>">First Page</a>
                <span <?php if($data->lastPage() == 2){echo "hidden";} ?>> | </span>
                <a href="{{url("admin/services")}}<?php echo "?page=".round($data->lastPage()/2); ?>" <?php if($data->lastPage() == 2){echo "hidden";} ?>>Middle Page</a>
                <span> | </span>
                <a href="{{url("admin/services")}}<?php echo "?page=".$data->lastPage(); ?>">Last Page</a>
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
      
      
      
    @include('shared.footer')
</div>
</div>     
@include('shared.js')

<script>


function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('.blah').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}



function readURL_(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('.blah_').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

// function readURL(input) {
//   if (input.files && input.files[0]) {
//     var reader = new FileReader();

//     reader.onload = function (e) {
//       $('#blah').attr('src', e.target.result);
//     };

//     reader.readAsDataURL(input.files[0]);
//   }
// }

// function readURL1(input) {
//   if (input.files && input.files[0]) {
//     var reader = new FileReader();

//     reader.onload = function (e) {
//       $('#blah1').attr('src', e.target.result);
//     };

//     reader.readAsDataURL(input.files[0]);
//   }
// }

// function readURL_(input) {
//   if (input.files && input.files[0]) {
//     var reader = new FileReader();

//     reader.onload = function (e) {
//       $('#blah_').attr('src', e.target.result);
//     };

//     reader.readAsDataURL(input.files[0]);
//   }
// }

// function readURL1_(input) {
//   if (input.files && input.files[0]) {
//     var reader = new FileReader();

//     reader.onload = function (e) {
//       $('#blah1_').attr('src', e.target.result);
//     };

//     reader.readAsDataURL(input.files[0]);
//   }
// }
</script>
</body>

</html>