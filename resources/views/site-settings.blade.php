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
        <h1 class="page-title">Site Settings</h1>
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

                
                <div class="ibox-title">Settings</div>
                <button class="btn btn-info "
                
                data-toggle="modal" data-target="#exampleModalAdd" disabled
                >Create</button>
            </div>
            <div class="ibox-body">
             
                @include('shared.messages')     


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                          
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content (English)</th>
                                <th>Content (Arabic)</th>
                                {{-- <th>Image</th> --}}
                                <th>Actions</th>
                        
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $data = \App\Models\SiteSetting::orderBy('id','desc')->paginate(10);
                                foreach ($data as $d) { ?>
                                <tr>
                              
                                    <td><?php echo $d->id; ?></td>
                                    <td><?php echo $d->key; ?></td>
                                    <td><?php if (strlen($d->value_en) > 100){ echo substr(strip_tags($d->value_en) ,0,100)."..";} else{echo $d->value_en;}  ?></td>
                                    <td><?php if (strlen($d->value_ar) > 100){ echo substr(strip_tags($d->value_ar) ,0,100)."..";} else{echo $d->value_ar;}  ?></td>


                                    {{-- <td>
                                        <img class="comp-icon" src="
                                        <?php echo $d->buildIcon() ?>" />
                                    </td> --}}
                                    
                                    <td>
                                        <button class="btn btn-default btn-md m-r-5"
                                       
                                        data-toggle="modal" data-target="#exampleModal<?php echo $d->id; ?>"
                                        style="margin-bottom: 3px">
                                         <i class="fa fa-pencil font-14"></i></button>



                                         <form method="post" action="{{url('admin/backend/site-settings/delete')}}">
                                            {{csrf_field()}}
                                        <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                        <button class="btn btn-danger btn-md" type="submit" 
                                           onclick="return confirm('Are you sure  ? ')"

                                         data-toggle="tooltip" data-original-title="Delete" disabled>
                                         <i class="fa fa-trash font-14"></i></button>
                                   
                                         </form>







                                        <div class="modal fade" id="exampleModal<?php echo $d->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">


                                                  <form method="post" action="{{url('admin/backend/site-settings/edit')}}" > 
                                                    {{csrf_field()}}
                                                <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                                    <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Edit   <?php echo $d->key; ?></h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                
                             
                                                <!--<div class="ibox">-->
                    
                                                <!-- <div class="ibox-body">-->
                                                <!--    <div id="summernote" data-plugin="summernote" data-air-mode="true">-->
                  
                                                <!--    </div>-->
                                                <!-- </div>-->
                                                 
                                                <!--</div>-->
                                                
                                                
                                                <div class="modal-body">
                                                    
                                                  <div class="form-group" hidden>
                                                    <label for="exampleInputEmail1">Title (not changable)</label>
                                                    <input id="code<?php echo $d->id; ?>" type="text" class="form-control" name="key" required
                                                    value="<?php echo $d->key; ?>"
                                                     aria-describedby="emailHelp" >
                                                    <small id="emailHelp" class="form-text text-muted"></small>
                                                  </div>
                                                 
                                                      <!--<div class="form-group">-->
                                                      <!--  <label for="exampleInputEmail1">Content (En)</label>-->
                                                      <!--  <textarea class="form-control" name="value_en" required-->
                                                      <!--   aria-describedby="emailHelp" placeholder="English" rows="5"><?php echo $d->value_en; ?></textarea>-->
                                                        
                                                      <!--  <small id="emailHelp" class="form-text text-muted"></small>-->
                                                      <!--</div>-->
                                                      
                                                      
                                                      <div id="input_en_<?php echo $d->id; ?>" class="form-group">
                                                        <label for="exampleInputEmail1">Content (En)</label>
                                                        <textarea class="form-control" name="value_en" required
                                                         aria-describedby="emailHelp" placeholder="English" ><?php echo $d->value_en; ?></textarea>
                                                         
                                                        <small id="emailHelp" class="form-text text-muted"></small>
                                                      </div>
                                                      
                                                      <div id="input_ar_<?php echo $d->id; ?>" class="form-group">
                                                        <label for="exampleInputPassword1">Content (Ar)</label>
                                                        <textarea class="form-control" name="value_ar" required
                                                        
                                                        placeholder="Arabic"><?php echo $d->value_ar; ?></textarea>
                                                  
                                                        
                                                      </div>

                                                      {{-- <div class="form-group">
                                                        <label for="exampleInputPassword1">URL</label>
                                                        <input type="text" name="url" class="form-control" required
                                                        value="<?php echo $d->url; ?>"
                                                        placeholder="http://">
                                                      </div> --}}

                                                      {{-- <div class="form-group">
                                                        <label for="exampleInputPassword1">Company icon</label>
                                                        <input type="file"  name="image" class="form-control">
                                                    
                                                      </div> --}}


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


              <form method="post" action="{{url('admin/backend/site-settings/add')}}"  enctype="multipart/form-data">
                {{csrf_field()}}
     
                <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new Entry</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <label for="exampleInputPassword1">Title</label>
                <input type="text" name="key" class="form-control" required>
              </div>
             
                  <div class="form-group">
                    <label for="exampleInputEmail1">Content (En)</label>
                    <input type="text" class="form-control" name="value_en" required
                  
                     aria-describedby="emailHelp" placeholder="English">
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Content (Ar)</label>
                    <input type="text" name="value_ar" class="form-control" required
                   
                    placeholder="Arabic">
                  </div>
                  {{-- <div class="form-group">
                    <label for="exampleInputPassword1">URL</label>
                    <input type="text" name="url" class="form-control" required
                   
                    placeholder="http://">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Company icon</label>
                    <input type="file" onchange="readURL(this);" name="image" class="form-control" required>
                    <img id="blah"  />
                  </div> --}}
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
                <a href="{{url("admin/site-settings")}}<?php echo "?page=1"; ?>">First Page</a>
                <span <?php if($data->lastPage() == 2){echo "hidden";} ?>> | </span>
                <a href="{{url("admin/site-settings")}}<?php echo "?page=".round($data->lastPage()/2); ?>" <?php if($data->lastPage() == 2){echo "hidden";} ?>>Middle Page</a>
                <span> | </span>
                <a href="{{url("admin/site-settings")}}<?php echo "?page=".$data->lastPage(); ?>">Last Page</a>
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

<?php
         $data = \App\Models\SiteSetting::get();
              foreach ($data as $d) {  ?>

$('#exampleModal<?php echo $d->id; ?>').on('shown.bs.modal', function (e) {

if (document.getElementById("code<?php echo $d->id; ?>").value == "third_slider_button_link") {

    // document.getElementById('input_en_<?php echo $d->id; ?>').innerHTML = '<label for="exampleInputEmail1">Content (En)</label> <input value="<?php echo $d->value_en; ?>" type="text" class="form-control" name="value_en" required placeholder="English" />';
    // document.getElementById('input_ar_<?php echo $d->id; ?>').innerHTML = '<label for="exampleInputEmail1">Content (Ar)</label> <input value="<?php echo $d->value_ar; ?>" type="text" class="form-control" name="value_ar" required placeholder="Arabic"  />';


  }

})

<?php
      }
?>
    
</script>


<script>

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#blah').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
</body>

</html>