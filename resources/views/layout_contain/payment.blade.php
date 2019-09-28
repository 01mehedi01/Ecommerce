@extends('welcome')

@section('content')
                
       <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">

                <?php 
                  $content = Cart::content();
                  // echo "<pre>";
                  // print_r($content);
                  // echo "</pre>";
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                          foreach ($content as $v_content) {     
                            ?>

                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{URL::to($v_content->options->image)}}" height="80px" width="80px" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{$v_content->name}}"></a></h4>
                                
                            </td>
                            <td class="cart_price">
                                <p>{{$v_content->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                 <form action="{{url('/update-cart')}}" method="post">
                                    {{csrf_field()}}    
                                    
                                    <input class="cart_quantity_input" type="text" name="qty" value="{{$v_content->qty}}" autocomplete="off" size="2">
                                    <input type="hidden" name="rowId" value="{{$v_content->rowId}}">
                                    <input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
                                    
                                 </form>

                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$v_content->total}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{URL::to('/delect-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                        <?php
                          }
                            ?>

                            

                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items--> <!--/#cart_items-->
    <h3 class="headingTop text-center">Select Your Payment Method</h3> 
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-1">
                    
                       
                        
                        <form action="{{url('/order-place')}}" method="post">
                            {{csrf_field()}}

                            <input type="radio" name="payment_gateway" value="handcash" checked><img src="{{URL::to('frontend/images/home/handtocash.jpg')}}" style="height: 100px; width: 150px ; margin: 15px;"  alt="">
                            


                            <input type="radio" name="payment_gateway" value="card"><img src="{{URL::to('frontend/images/home/card.jpg')}}" style="height: 100px; width: 150px ; margin: 15px;"  alt="">

                            <input type="radio" name="payment_gateway" value="bkash"><img src="{{URL::to('frontend/images/home/bkash.jpg')}}" style="height: 100px; width: 150px ; margin: 15px;"  alt=""><br>
                            
                            <button type="submit" class="btn btn-default">Done</button>
                        </form>
                   
                </div>
                
            </div>
        </div>
    </section><!--/form-->


@stop
