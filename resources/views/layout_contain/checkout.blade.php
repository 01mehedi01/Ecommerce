@extends('welcome')

@section('content')
            
           
       <section id="cart_items">
		

			<div class="register-req">
				<p>Please fill up this form</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Shiping Details</p>
							<div class="form-one">

								<form action="{{url('/save-shidetails')}}" method="post">
									{{csrf_field()}}
									<input type="text" name="shiping_email" placeholder="Email*">
									<input type="text" name="shiping_first_name" placeholder="First Name ">
									<input type="text" name="shiping_last_name" placeholder="Last Name ">
									<input type="text" name="shiping_address" placeholder="Address 1 ">
									<input type="text" name="shiping_mobile_no" placeholder="Mobile No">
									<input type="text" name="shiping_city" placeholder="City">
									<input type="submit" class="btn btn-defult" value="Done">
									
								</form>
							</div>
							
						</div>
					</div>
									
				</div>
			</div>
			
					
		
	</section> <!--/#cart_items-->
               

@stop
