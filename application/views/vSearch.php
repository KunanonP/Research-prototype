    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row">
          <nav class="col-sm-2 col-md-2 d-none d-sm-block bg-light sidebar">
            <ul class="nav nav-pills flex-column">
              <!-- Category Menu-->
              <?php if(is_array($BeautyCatalog) == true){ ?>
              <?php foreach ($BeautyCatalog as  $beauty) {  $beauty->CategoryID; ?>
              <a href="<?php echo base_url();?>product_by_catalog/<?php echo $beauty->CategoryID;?>/<?php echo $beauty->CategoryName;?>"
                class="btn bg-light text-info" role="group"><?php echo $beauty->CategoryName;?>
              </a>
              <?php } //end foreach ?>
              <?php }else{ ?>
              <a href="" class="bg-dark text-light list-group-item">All Catalog</a>
              <?php } ?>
            </ul>
          </nav>
          <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
              <section class="row text-center placeholders"></section>
              <div class="col-lg-12">
                <div class="text-info" align="center"><br><hr><h5>Search</h5><hr><br></div>

                     <div class="row">
                         <?php if (is_array($searchItems)==true){?>
                         <?php foreach ($searchItems as $product){
                              $productID = $product->ProductID;
                              $productName = $product->ProductName;
                              $productDesc = $product->ProductDesc;
                              $productPrice = $product->Price;
                              $productPicture = $product->Picture;
                              $productCategoryID = $product->CategoryID;
                         ?>
                         <div class="col-lg-2" >
                           <div class="card mb-3 text-center" style="max-width: 20rem;">
                             <a href="<?php echo base_url()?>catalog_detail/<?=$productID?>" ><input type="hidden" name="" value="<?php echo $productID;?>">
                               <img class="card-img-top" src="<?php echo $productPicture;?>" alt="Card image" title="images" style="width:150px; height:200px; object-fit: scale-down;">
                             </a>
                             <div class="card-header bg-scondary">
                               <h6>
                                 <a class="text-info" href="<?php echo base_url()?>catalog_detail/<?=$productID?>" ><?php echo mb_substr($productName,0,40,'utf-8');?>...
                                   <input type="hidden" name="" value="<?php echo $productID;?>">
                                 </a><br>
                               </h6>
                               <!-- card header -->
                             </div>
                             <div class="card-body text-success text-left" style="height:200px; object-fit:scale-down">
                               <h5>AUD <i class="fa fa-usd" aria-hidden="true"></i> <?php echo $productPrice ?>.00</h5>
                               <small>
                               <p class="text-secondary" style="width:100%; height:100%; object-fit: scale-down;"><?php echo mb_substr($productDesc,0,60,'utf-8');?>...<br><br><br>
                                 <a class="text-muted pull-right" href="<?php echo base_url()?>catalog_detail/<?=$productID?>">more details...<input type="hidden" name="" value="<?php echo $productID;?>"></a>
                               </p>
                               </small>
                             <!-- card body -->
                             </div>
                             <div class="card-footer">
                               <form class="" action="<?php echo base_url()?>/addtocart" method="post">
                                 <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                   <div class="btn-group mr-1" role="group" aria-label="First group" style="width:50%">
                                     <!-- <span class="input-group-btn">
                                       <button type="button" class="btn btn-outline-dark"  id="bnt1"> - </button>
                                     </span> -->
                                     <input type="text" class="form-control" name="qty" id="qty" value="1" style="display:none">
                                     <input type="text" name="prodID" value="<?php echo $productID;?>" style="display:none">
                                     <input type="text" name="prodName" value="<?php echo $productName;?>" style="display:none">
                                     <input type="text" name="prodPrice" value="<?php echo $productPrice;?>" style="display:none">
                                     <input type="text" name="prodPic" value="<?php echo $productPicture;?>" style="display:none">
                                     <input type="text" name="prodCat" value="<?php echo $productCategoryID;?>" style="display:none">
                                     <!-- <span class="input-group-btn">
                                       <button type="button" class="btn btn-outline-dark" id="bnt2"> + </button>
                                     </span> -->
                                   </div>
                                   <div class="btn-group" role="group" aria-label="Second group">
                                     <button  type="submit"  class=" btn-sm btn btn-dark pull-right"><i class="fa fa-cart-plus" aria-hidden="true"> Add to Cart</i></button>
                                   </div>
                                 </div><!-- /input-group -->
                                 </form>
                               <small class="text-muted"></small>
                             </div>

                             <!-- content -->
                           </div>
                         </div>
                        <?php } //end foreach ?>
                      <?php }else{ //end if ?>
                      <div class="col-lg-12 text-center text-secondary" >Nothing matched your search terms. Please try again with some different keywords.</div>
                      <?php }  ?>
                    </div>

              </div>
          </main>

        </div>
        <!-- row -->
    </div>
      <!-- container-fluid -->
