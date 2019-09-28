@extends('Admin.admin_dashbord')
@section('admin_content')

          <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Orders</a></li>
			</ul>
           
          


			<div class="row-fluid sortable">		
				<div class="box span12">
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order ID</th>
								  <th>Customer Name</th>
								  <th>Order Total</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>  

						   @foreach($allorder_info as $order_list) 

						  <tbody>
							<tr>
								<td>{{$order_list->order_id}}</td>
								<td class="center">{{$order_list->customer_name}}</td>
								<td class="center">{{$order_list->order_total}}</td>
								<td class="center">{{$order_list->order_status}}</td>
								<td class="center">

									
									  <span class="label label-success">Active</span>
                                    
                                   


								</td>
								<td class="center">

								   

                                    
                                      <a class="btn btn-success" href="{{URL::to('/active-bra/'.$order_list->order_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									 </a>

                                   

									<a class="btn btn-info" href="{{URL::to('/edit-bra/'.$order_list->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-bra/'.$order_list->order_id)}}">
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