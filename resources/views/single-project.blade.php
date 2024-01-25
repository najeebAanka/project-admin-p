<!DOCTYPE html>
<html lang="en">
<?php 
$project  = App\Models\Project::find(Route::input('id'));

$d = $project;
?>
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
        <h1 class="page-title">{{$project->name_en}} Management</h1>
        @include('shared.messages') 
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

                
                <div class="ibox-title">Project details</div>
             
            </div>

            <div class="ibox-body">

<div class="row">
    <div class="col-md-6">
        <form method="post" action="{{url('admin/backend/projects/edit')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
            {{-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create new project</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> --}}
        <div class="modal-body">
         
              <div class="form-group">
                <label for="exampleInputEmail1">Name (En)</label>
                <input type="text" class="form-control" name="name_en" value="<?php echo $d->name_en; ?>" required
                 aria-describedby="emailHelp" placeholder="English">
                <small id="emailHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Name (Ar)</label>
                <input type="text" name="name_ar" value="<?php echo $d->name_ar; ?>" class="form-control" required
                placeholder="Arabic">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Short description (En)</label>
                <Textarea class="form-control" name="short_desc_en"  required
                 aria-describedby="emailHelp" placeholder="English" rows="5"><?php echo $d->short_desc_en; ?></Textarea>
                <small id="emailHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Short description (Ar)</label>
                <Textarea class="form-control" name="short_desc_ar"  required
                 aria-describedby="emailHelp" placeholder="Arabic" rows="5"><?php echo $d->short_desc_ar; ?></Textarea>
                <small id="emailHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Description (En)</label>
                <Textarea class="form-control" name="desc_en"  required
                 aria-describedby="emailHelp" placeholder="English" rows="5"><?php echo $d->desc_en; ?></Textarea>
                <small id="emailHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Description (Ar)</label>
                <Textarea class="form-control" name="desc_ar"  required
                 aria-describedby="emailHelp" placeholder="Arabic" rows="5"><?php echo $d->desc_ar; ?></Textarea>
                <small id="emailHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Client (En)</label>
                <input type="text" class="form-control" name="client_en" value="<?php echo $d->client_en; ?>" required
                 aria-describedby="emailHelp" placeholder="English">
                <small id="emailHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Client (Ar)</label>
                <input type="text" name="client_ar" value="<?php echo $d->client_ar; ?>" class="form-control" required
                placeholder="Arabic">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Status (En)</label>
                <input type="text" class="form-control" name="status_en" value="<?php echo $d->status_en; ?>" required
                 aria-describedby="emailHelp" placeholder="English">
                <small id="emailHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Status (Ar)</label>
                <input type="text" name="status_ar" value="<?php echo $d->status_ar; ?>" class="form-control" required
                placeholder="Arabic">
              </div>
              <div class="form-group">
                {{-- <label for="exampleInputEmail1">Start date (Current date is <b><?php echo strtok($d->start_date, " ");?></b>, confirm or change before continuing)</label> --}}
                <label for="exampleInputEmail1">Start date </label>
                <input type="date" class="form-control" name="start_date" value="<?php echo $d->start_date; ?>" required
                 aria-describedby="emailHelp" placeholder="date">
                <small id="emailHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                {{-- <label for="exampleInputPassword1">End date (Current date is <b><?php echo strtok($d->end_date, " ");?></b>, confirm or change before continuing)</label> --}}
                <label for="exampleInputPassword1">End date</label>
                <input type="date" name="end_date" value="<?php echo $d->end_date; ?>" class="form-control" required
                placeholder="Date">
              </div>

              <div class="form-group">
                {{-- <label for="exampleInputEmail1">Category (Current category is <b><?php
                    $data = \App\Models\ProjectCategory::find($d->category_id);
                             

                             echo $data->name_en; ?></b>
                            
                            , confirm or change before continuing)</label> --}}
                <label for="exampleInputEmail1">Category</label>

                 
                 <select id="sort-item" name="category_id" class="form-control" required>
                  


                           <?php
                    $data = \App\Models\ProjectCategory::get();
                             foreach ($data as $do) { ?>

                            <option <?php if($d->category_id == $do->id) echo "selected" ; ?>
                            value="<?php echo $do->id; ?>"><?php echo $do->name_en; ?></option>


                            <?php
                            }
                              ?>
                 </select>


                <small id="emailHelp" class="form-text text-muted"></small>
              </div>


              <div class="form-group">
                <label for="exampleInputPassword1">Cover image</label>
                <!--<input type="file"  name="image" class="form-control">-->
                
                <input type="file" onchange="readURL_(this);" name="image" class="form-control">
                    <img id="blah_"  src="<?php echo $d->buildImage() ?>"/>
                
            </div>

            


        </div>


        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
    </div>
    <div class="col-md-6">
        
        <div class="form-group">
            <label><b>Cover image</b></label></br></br>
            <?php
            // $da = \App\Models\Project::get();
            $da = \App\Models\Project::find(Route::input('id'));
            ?>
            <img class="" width="300" src="<?php echo $da->buildImage() ?>" />  
        </div>

        <div class="form-group">
          

        <div class="page-content fade-in-up">
          <div class="ibox">
              <div class="ibox-head">
  
                  
                  <div class="ibox-title">Project images</div>
                  <button class="btn btn-info "
                  
                  data-toggle="modal" data-target="#exampleModalAdd"
                  >Add new</button>
              </div>
              <div class="ibox-body">
               
                  {{-- @include('shared.messages')      --}}
  
  
                  <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                            
                                  {{-- <th>ID</th> --}}
                                  <th>Image</th>
                                  <th>Actions</th>
                          
                              </tr>
                          </thead>
                          <tbody>

                              <?php 
                                  //$data = \App\Models\ProjectImage::orderBy('id' ,'desc')->get();
                                  $data = \App\Models\ProjectImage::where('project_id' ,Route::input('id'))->orderBy('id' ,'desc')->get();
                                  foreach ($data as $d) { ?>
                                  
                                  <tr>

                                      {{-- <td><?php echo $d->id; ?></td> --}}
                                      <td>
                                          <img class="" style="width : 100px" src="
                                          <?php echo $d->buildIcon() ?>" />
                                      </td>
                                      
                                      <td style="vertical-align: middle;text-align : center">
                            
                                           <form method="post" action="{{url('admin/backend/project-images/delete')}}">
                                              {{csrf_field()}}
                                          <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                          <button class="btn btn-danger " type="submit"
                                             onclick="return confirm('Are you sure  ? ')"
  
                                           data-toggle="tooltip" data-original-title="Delete">
                                           <i class="fa fa-trash font-14"></i></button>
                                     
                                           </form>
                                     
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





          
      </div>
        

    </div>
</div>


                

             
                {{-- @include('shared.messages')      --}}
            </div>
        </div>
       
      
        


     </div>
     <!-- END PAGE CONTENT-->


     <div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">


            <form method="post" action="{{url('admin/backend/project-images/add')}}"  enctype="multipart/form-data">
              {{csrf_field()}}
   
              <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              {{-- <label for="exampleInputEmail1">Project Name</label> --}}

               
               <select name="project_id" class="form-control" required hidden>
                
                <?php
                $dd = \App\Models\Project::find(Route::input('id'));
                ?>

                         {{-- <?php
                  $data = \App\Models\Project::get();
                           foreach ($data as $d) { ?> --}}

                          <option value="<?php echo $dd->id; ?>"><?php echo $dd->name_en; ?></option>

                          {{-- <?php
                          }
                            ?> --}}
               </select>


              <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            
           
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Image</label>
                  <input type="file" onchange="readURL(this);" name="image" class="form-control" required>
                  <img id="blah"  />
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>

      </form>



        </div>
      </div>
    </div>
  

    
     @include('shared.footer')
    </div>
    </div>     
     @include('shared.js')

<!-- <script>
    window.onload = function() {
    var selItem = sessionStorage.getItem("SelItem");  
     $('#sort-item').val(selItem);
   }
    $('#sort-item').change(function() { 
         var selVal = $(this).val();
         sessionStorage.setItem("SelItem", selVal);
     });
 </script>-->

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
  
  function readURL_(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
  
      reader.onload = function (e) {
        $('#blah_').attr('src', e.target.result);
      };
  
      reader.readAsDataURL(input.files[0]);
    }
  }
  
  </script>
     

</body>

</html>