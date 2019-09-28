@extends('Admin.admin_dashbord')
@section('admin_content')

            <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Product</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
						
					</div>

			<p class="alert-success">
				<?php

                  $message = Session::get('message');
                  if($message){
                  	echo $message;
                  	Session::put('message',null);
                  }

				?>
			  </p>
					<div class="box-content">
						<form class="form-horizontal" action="{{ url('/save-product') }}" method="post" enctype="multipart/form-data">

							{{csrf_field()}}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" >
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Select Category</label>
								<div class="controls">
					


					<select id="selectError3" name="category_id">
                         <option>Select Category</option>
						

						<?php

                          $all_publication_category =  DB::table('category_table')
                                  ->where('publication_status',1)
                                   ->get();
                          
                          foreach ($all_publication_category as $v_category) { ?>
                        
                            <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>


                        <?php } ?>

                           </select>
						</div>
					</div>

							  <div class="control-group">
								<label class="control-label" for="selectError3">Select Brand</label>
								<div class="controls">
								  <select id="selectError3" name="menufacture_id">
									<option>Option 1</option>
									


					<?php

                          $all_publication_brand =  DB::table('manufacture_table')
                                  ->where('publication_status',1)
                                   ->get();
                          
                          foreach ($all_publication_brand as $v_category) { ?>
                                    
                                   <option value="
                                   {{$v_category->menufacture_id}}">{{$v_category->menufacture_name}}</option>

                         <?php } ?>


								  </select>
								</div>
							  </div>

							          
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_description" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_description" rows="3"></textarea>
							  </div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="date01">Product price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" >
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label">File Upload</label>
								<div class="controls">
								  <input type="file" name="product_image">
								</div>
							  </div>


							<div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size" >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Product Colour</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_colour" >
							  </div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="date01">Product status</label>
							  <div class="controls">
								<input type="checkbox"  name="publication_status"  value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@stop