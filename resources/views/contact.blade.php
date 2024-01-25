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
        <h1 class="page-title">Contacts Management</h1>
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

                
                <div class="ibox-title">Contacts</div>
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
                                <th>Phone</th>
                                <th>Service</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $data = \App\Models\Contact::orderBy('id' ,'desc')->paginate(10);
                                foreach ($data as $d) { 
                                $d->seen = 1;
                                $d->save();
                                ?>
                                <tr>
                              
                                    <td><?php echo $d->id; ?></td>
                                    <td><?php echo $d->name; ?></td>
                                    <td><?php echo $d->phone; ?></td>
                                    <td><?php
                                    $dat = \App\Models\Service::find($d->service_id);
                                     echo $dat->name_en; ?></td>
                                    <td><?php echo $d->message; ?></td>
                                  
                                    <td>
                                    
                                         <form method="post" action="{{url('admin/backend/contacts/delete')}}">
                                            {{csrf_field()}}
                                        <input type="hidden" name="id" value="<?php echo $d->id; ?>" />
                                        <button class="btn btn-danger btn-md" type="submit"
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
    <!-- END PAGE CONTENT-->
    {{$data->links()}}
    
    <p style="margin-top: 15px; float:right;" <?php if($data->lastPage() == 1){echo "hidden";} ?>>
         
                <span> << </span>
                <a href="{{url("admin/contact")}}<?php echo "?page=1"; ?>">First Page</a>
                <span <?php if($data->lastPage() == 2){echo "hidden";} ?>> | </span>
                <a href="{{url("admin/contact")}}<?php echo "?page=".round($data->lastPage()/2); ?>" <?php if($data->lastPage() == 2){echo "hidden";} ?>>Middle Page</a>
                <span> | </span>
                <a href="{{url("admin/contact")}}<?php echo "?page=".$data->lastPage(); ?>">Last Page</a>
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