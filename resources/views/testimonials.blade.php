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
        <h1 class="page-title">Testimonials Management</h1>
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

                
                <div class="ibox-title">Testimonials</div>
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
                                <th>Name (En)</th>
                                <th>Name (Ar)</th>
                                <th>Short content (En)</th>
                                <th>Short content (Ar)</th>
                                <th>Content (En)</th>
                                <th>Content (Ar)</th>
                                <th>Company (En)</th>
                                <th>Company (Ar)</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $data = \App\Models\Testimonial::orderBy('id' ,'desc')->paginate(10);
                                foreach ($data as $d) { ?>
                                <tr>
                              
                                    <td><?php echo $d->id; ?></td>
                                    <td><?php echo $d->name_en; ?></td>
                                    <td style="text-align: left; direction: rtl;"><?php echo $d->name_ar; ?></td>
                                    <td><?php if (strlen($d->short_desc_en) > 100){ echo substr($d->short_desc_en ,0,100)."..";} else{echo $d->short_desc_en;}  ?></td>
                                    <td style="text-align: left; direction: rtl;"><?php if (strlen($d->short_desc_ar) > 100){ echo substr($d->short_desc_ar ,0,100)."..";} else{echo $d->short_desc_ar;}  ?></td>
                                    <td><?php if (strlen($d->desc_en) > 100){ echo substr(strip_tags($d->desc_en) ,0,100)."..";} else{echo strip_tags($d->desc_en);}  ?></td>
                                    <td style="text-align: right; direction: rtl;"><?php if (strlen($d->desc_ar) > 100){ echo substr(strip_tags($d->desc_ar) ,0,100)."..";} else{echo strip_tags($d->desc_ar);}  ?></td>
                                    <td><?php echo $d->company_name_en; ?></td>
                                    <td style="text-align: left; direction: rtl;"><?php echo $d->company_name_ar; ?></td>
                                    <td>
                                        <button class="btn btn-default btn-md m-r-5"
                                       
                                        data-toggle="modal" data-target="#exampleModal<?php echo $d->id; ?>"
                                        style="margin-bottom: 3px">
                                         <i class="fa fa-pencil font-14"></i></button>



                                         <form method="post" action="{{url('admin/backend/testimonials/delete')}}">
                                            {{csrf_field()}}
                                        <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                        <button class="btn btn-danger btn-md" type="submit"
                                           onclick="return confirm('Are you sure  ? ')"

                                         data-toggle="tooltip" data-original-title="Delete">
                                         <i class="fa fa-trash font-14"></i></button>
                                   
                                         </form>






                                        <div class="modal fade" id="exampleModal<?php echo $d->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">


                                                  <form method="post" action="{{url('admin/backend/testimonials/edit')}}">
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
                                                        <label for="exampleInputEmail1">Name (En)</label>
                                                        <input type="text" class="form-control" name="name_en" required
                                                        value="<?php echo $d->name_en; ?>"
                                                         aria-describedby="emailHelp" placeholder="English">
                                                        <small id="emailHelp" class="form-text text-muted"></small>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Name (Ar)</label>
                                                        <input type="text" name="name_ar" class="form-control" required
                                                        value="<?php echo $d->name_ar; ?>"
                                                        placeholder="Arabic">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputEmail1">Short content (En)</label>
                                                        <input type="text" class="form-control" name="short_desc_en" required
                                                        value="<?php echo $d->short_desc_en; ?>"
                                                         aria-describedby="emailHelp" placeholder="English">
                                                        <small id="emailHelp" class="form-text text-muted"></small>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Short content (Ar)</label>
                                                        <input type="text" name="short_desc_ar" class="form-control" required
                                                        value="<?php echo $d->short_desc_ar; ?>"
                                                        placeholder="Arabic">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputEmail1">Content (En)</label>
                                                        <textarea type="text" class="form-control" name="desc_en" required
                                                         aria-describedby="emailHelp" placeholder="English" rows="5"><?php echo $d->desc_en; ?></textarea>
                                                        <small id="emailHelp" class="form-text text-muted"></small>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Content (Ar)</label>
                                                        <textarea type="text" name="desc_ar" class="form-control" required
                                                        placeholder="Arabic" rows="5"><?php echo $d->desc_ar; ?></textarea>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputEmail1">Company (En)</label>
                                                        <input type="text" class="form-control" name="company_name_en" required
                                                        value="<?php echo $d->company_name_en; ?>"
                                                         aria-describedby="emailHelp" placeholder="English">
                                                        <small id="emailHelp" class="form-text text-muted"></small>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="exampleInputEmail1">Company (Ar)</label>
                                                        <input type="text" class="form-control" name="company_name_ar" required
                                                        value="<?php echo $d->company_name_ar; ?>"
                                                         aria-describedby="emailHelp" placeholder="Arabic">
                                                        <small id="emailHelp" class="form-text text-muted"></small>
                                                      </div>
                                                      <!--<div class="form-group">-->
                                                      <!--  <label for="exampleInputPassword1">Company (Ar)</label>-->
                                                      <!--  <input type="text" name="company_name_ar" class="form-control" required-->
                                                      <!--  value="<?php echo $d->company_name_ar; ?>"-->
                                                      <!--  placeholder="Arabic">-->
                                                      <!--</div>-->
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


              <form method="post" action="{{url('admin/backend/testimonials/add')}}">
                {{csrf_field()}}
     
                <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new testimonial</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name (En)</label>
                    <input type="text" class="form-control" name="name_en" required
                     aria-describedby="emailHelp" placeholder="English">
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name (Ar)</label>
                    <input type="text" name="name_ar" class="form-control" required
                    placeholder="Arabic">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Short content (En)</label>
                    <input type="text" class="form-control" name="short_desc_en" required
                     aria-describedby="emailHelp" placeholder="English">
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Short content (Ar)</label>
                    <input type="text" name="short_desc_ar" class="form-control" required
                    placeholder="Arabic">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Content (En)</label>
                    <textarea type="text" class="form-control" name="desc_en" required
                     aria-describedby="emailHelp" placeholder="English" rows="5"></textarea>
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Content (Ar)</label>
                    <textarea type="text" name="desc_ar" class="form-control" required
                    placeholder="Arabic" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Company (En)</label>
                    <input type="text" class="form-control" name="company_name_en" required
                     aria-describedby="emailHelp" placeholder="English">
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Company (Ar)</label>
                    <input type="text" name="company_name_ar" class="form-control" required
                    placeholder="Arabic">
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
                <a href="{{url("admin/testimonials")}}<?php echo "?page=1"; ?>">First Page</a>
                <span <?php if($data->lastPage() == 2){echo "hidden";} ?>> | </span>
                <a href="{{url("admin/testimonials")}}<?php echo "?page=".round($data->lastPage()/2); ?>" <?php if($data->lastPage() == 2){echo "hidden";} ?>>Middle Page</a>
                <span> | </span>
                <a href="{{url("admin/testimonials")}}<?php echo "?page=".$data->lastPage(); ?>">Last Page</a>
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


</body>

</html>