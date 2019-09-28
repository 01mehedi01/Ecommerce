@extends('Admin.admin_dashbord')
@section('admin_content')

          <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
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
								  <th>Category ID</th>
								  <th>Category Name</th>
								  <th>Category Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  

						  @foreach( $all_category as $category_list) 

						  <tbody>
							<tr>
								<td>{{$category_list->category_id}}</td>
								<td class="center">{{$category_list->category_name}}</td>
								<td class="center">{{$category_list->category_description}}</td>
								<td class="center">

									@if($category_list->publication_status == 1)
									  <span class="label label-success">Active</span>
                                    
                                    @else
                                      <span class="label label-danger">Unactive</span>

                                    @endif


								</td>
								<td class="center">

								   @if($category_list->publication_status == 1)

									 <a class="btn btn-danger" href="{{URL::to('/unactive-category/'.$category_list->category_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									 </a>

                                    @else
                                      <a class="btn btn-success" href="{{URL::to('/active-category/'.$category_list->category_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									 </a>

                                    @endif

									<a class="btn btn-info" href="{{URL::to('/edit-category/'.$category_list->category_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-category/'.$category_list->category_id)}}">
										<i class="halflings-icon white trash" id="delete"></i> 
									</a>
								</td>
							</tr>
							
						  </tbody>

						  @endforeach

					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
@stop