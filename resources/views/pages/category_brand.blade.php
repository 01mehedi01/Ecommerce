@section('category_brand')
    
              
                   <div class="col-sm-3">
                    
                     <div class="left-sidebar">

                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                
                           <?php

                          $all_publication_category =  DB::table('category_table')
                                  ->where('publication_status',1)
                                   ->get();
                          
                          foreach ($all_publication_category as $v_category) { ?>
                        
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/product-category/'.$v_category->category_id)}}">{{$v_category->category_name}}</a></h4>
                                </div>
                            </div>


                        <?php } ?>

                        </div><!--/category-products-->
                     </div>

                      <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                        <?php

                          $all_publication_brand =  DB::table('manufacture_table')
                                  ->where('publication_status',1)
                                   ->get();
                          
                          foreach ($all_publication_brand as $v_category) { ?>
                                    <li><a href="{{URL::to('/product-menufecture/'.$v_category->menufacture_id)}}"> <span class="pull-right">(50)</span>{{$v_category->menufacture_name}}</a></li>
                                   

                         <?php } ?>
                                </ul>
                           </div>
                        </div><!--/brands_products-->
                        
                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="{{URL::to('frontend/images/home/shipping.jpg')}}" alt="" />
                        </div><!--/shipping-->
                    
                    </div>

                </div>
                  
                
              
           
@stop