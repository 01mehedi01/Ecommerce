@extends('Admin.admin_dashbord')
@section('admin_content')

          <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
           
           <p class="alert-success">
				<?php

                  $message = Session::get('message');
                  if($message){
                  	echo $message;
                  	Session::put('message',null);
                  }

				?>
			  </p>


			<div class="row-fluid sortable">		
				<div class="box span12">
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Slider ID</th>
								  <th>Slider Image</th>

								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  

						  @foreach( $allslider_info as $slider_list) 

						  <tbody>
                            <td>{{$slider_list->slider_id}}</td>

						  	<td> <img src="{{$slider_list->slider_image}}" style="height: 80px; width: 200px" >
                            </td>

							

								
								
								<td class="center">

									@if($slider_list->publication_status == 1)
									  <span class="label label-success">Active</span>
                                    
                                    @else
                                      <span class="label label-danger">Unactive</span>

                                    @endif


								</td>


								<td class="center">

								  <!--  @if($slider_list->publication_status == 1)

									 <a class="btn btn-danger" href="{{URL::to('/unactive-category/'.$slider_list->slider_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									 </a>

                                    @else
                                      <a class="btn btn-success" href="{{URL::to('/active-category/'.$slider_list->slider_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									 </a>

                                    @endif
 -->
									<a class="btn btn-info" href="{{URL::to('/edit-category/'.$slider_list->slider_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-slider/'.$slider_list->slider_id)}}">
										<i class="halflings-icon white trash" id="delete"></i> 
									</a>

									
								</td>
						
							
						  </tbody>

						  @endforeach

					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
@stop