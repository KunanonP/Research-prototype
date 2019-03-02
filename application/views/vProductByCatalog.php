<!-- Page Content -->
<!-- <div class="container"> -->





    <!-- /.col-lg-3 -->


  <!-- /.row -->
<!-- </div> -->
<!-- /.container -->
<div class="container-fluid">
    <div class="row">
      <nav class="col-sm-2 col-md-2 d-none d-sm-block bg-light sidebar">
        <ul class="nav nav-pills flex-column">
          <!-- Category Menu-->
          <?php if(is_array($Catalog) == true){ ?>
          <?php foreach ($Catalog as  $beauty) {  $beauty->CategoryID; ?>
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


          <!-- <div class="row"> -->
            <div class="col-lg-12">
              <div class="text-info" align="center"><br><hr><h5><?php echo $TitleGroup; ?></h5><hr><br></div>
              <div class="row">
                  <?php if (is_array($products)==true){?>
                  <?php foreach ($products as $product){
                       $productID = $product->ProductID;
                       $productName = $product->ProductName;
                       $productDesc = $product->ProductDesc;
                       $productPrice = $product->Price;
                       $productPicture = $product->Picture;
                       $productCategoryID = $product->CategoryID;

               ?>


                <div class="col-lg-3" >
                  <div class="card mb-4 text-center" style="max-width: 30rem;">
                    <a href="<?php echo base_url()?>catalog_detail/<?=$productID?>" ><input type="hidden" name="" value="<?php echo $productID;?>">
                      <img class="card-img-top" src="<?php echo $productPicture;?>" alt="Card image" title="images" style="width:200px; height:250px; object-fit: scale-down;">
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
                      <p class="text-secondary" style="width:100%; height:100%; object-fit: scale-down;"><?php echo mb_substr($productDesc,0,200,'utf-8');?>...<br><br><br>
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
              <?php } ?>
              <!-- end foreach -->
            <?php } ?>
            <!-- end if -->
              </div>

              <div class="text-success" align="center"><br><hr><h5><?php echo $TitleGroup; ?> Recommended products</h5><hr><br></div>
              <!-- <div class="row"> -->
                <section class="row text-center placeholders">
                  <?php if (is_array($productsRec)==true){?>
                  <?php foreach ($productsRec as $productRec){
                       $productRecID = $productRec->ProductID;
                       $productRecName = $productRec->ProductName;
                       $productRecDesc = $productRec->ProductDesc;
                       $productRecPrice = $productRec->Price;
                       $productRecPicture = $productRec->Picture;
                       $productRecCategoryID = $productRec->CategoryID;
                       $productRecRating = $productRec->Ratingavg;
                       $productRecRatingcnt = $productRec->Ratingcnt;
               ?>
               <!-- Convert rating to star ★ -->
               <?php switch ($productRecRating) {
                     case ($productRecRating == ' '):
                            $productRecRating = str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',5);
                     break;
                     case ($productRecRating == 5):
                            $productRecRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',5);
                     break;

                     case ($productRecRating > 4):
                            $productRecRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',4).
                                                            '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
                     break;
                     case ($productRecRating == 4):
                            $productRecRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',4).
                                                            '<i class="fa fa-star-o" aria-hidden="true"></i>';
                     break;

                     case ($productRecRating > 3):
                            $productRecRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',3).
                                                            '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                            str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',1);
                     break;
                     case ($productRecRating == 3):
                            $productRecRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',3).
                                                            str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',2);
                     break;

                     case ($productRecRating > 2):
                            $productRecRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',2).
                                                            '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                            str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',2);
                     break;
                     case ($productRecRating == 2):
                            $productRecRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',2).
                                                            str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',3);
                     break;

                     case ($productRecRating > 1):
                            $productRecRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',1).
                                                            '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                            str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',3);
                     break;
                     case ($productRecRating == 1):
                            $productRecRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',1).
                                                            str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',4);
                     break;

                     case ($productRecRating > 0):
                            $productRecRating =  '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                            str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',4);
                     break;
                     case ($productRecRating == 0):
                            $productRecRating = str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',5);
                     break;
                }?>

                <div class="col-lg-2" >
                  <div class="card mb-3" style="max-width: 20rem;">
                    <a href="<?php echo base_url()?>catalog_detail/<?=$productRecID?>" ><input type="hidden" name="" value="<?php echo $productRecID;?>">
                      <img class="card-img-top" src="<?php echo $productRecPicture;?>" alt="Card image" title="images" style="width:150px; height:200px; object-fit: scale-down;">
                    </a>
                    <div class="card-header bg-scondary">
                      <h6>
                        <a class="text-info" href="<?php echo base_url()?>catalog_detail/<?=$productRecID?>" ><?php echo mb_substr($productRecName,0,40,'utf-8');?>...
                          <input type="hidden" name="" value="<?php echo $productRecID;?>">
                        </a>
                        <h5 class="text-success">AUD <i class="fa fa-usd" aria-hidden="true"></i> <?php echo $productRecPrice ?>.00</h5>
                        <br>
                        <small>
                          <label class="text-info">Rating
                            <span class="text-warning"> <?=$productRecRating;?></span>
                                <span class="text-info">
                                <a class="text-primary" href="<?php echo base_url()?>catalog_detail/<?=$productRecID?>">
                                    <input type="hidden" name="" value="<?=$productRecID?>">
                                    (<?=$productRecRatingcnt;?>)
                                </span>
                                </a>
                          </label>
                        </small>
                      </h6>
                      <!-- card header -->

                      <form class="" action="<?php echo base_url()?>/addtocart" method="post">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                          <div class="btn-group mr-1" role="group" aria-label="First group" style="width:50%">
                            <!-- <span class="input-group-btn">
                              <button type="button" class="btn btn-outline-dark"  id="bnt1"> - </button>
                            </span> -->
                            <!-- <lable class="text-info">Rating <?=$productRecRating;?><span class="text-warning"> ★ </span> -->
                            <input type="text" class="form-control" name="qty" id="qty" value="1" style="display:none">
                            <input type="text" name="prodID" value="<?php echo $productRecID;?>" style="display:none">
                            <input type="text" name="prodName" value="<?php echo $productRecName;?>" style="display:none">
                            <input type="text" name="prodPrice" value="<?php echo $productRecPrice;?>" style="display:none">
                            <input type="text" name="prodPic" value="<?php echo $productRecPicture;?>" style="display:none">
                            <input type="text" name="prodCat" value="<?php echo $productRecCategoryID;?>" style="display:none">

                          </div>

                        </div><!-- /input-group -->
                        </form>
                      <small class="text-muted"></small>
                      </div>

                    <!-- content -->
                  </div>
                </div>
              <?php } ?>
              <!-- end foreach -->
              <?php } ?>
                </section>
                <?php if (isset($custname)){ ?>
                     <?php if ($custname == '') { ?>
                               <div class="text-success" align="center"><br><hr><h5>Recommended products related to items most people viewed</h5><hr><br></div>
                      <?php } else{?><div class="text-success" align="center"><br><hr><h5>Recommended products related to items you've viewed</h5><hr><br></div><?php } ?>
                 <?php } ?>
                <!-- <div class="row"> -->
                <div class="row">
                    <?php if (is_array($HistoryRecommend)==true){?>
                    <?php foreach ($HistoryRecommend as $Historyproduct){
                         $HistoryproductID = $Historyproduct->ProductID;
                         $HistoryproductName = $Historyproduct->ProductName;
                         $HistoryproductDesc = $Historyproduct->ProductDesc;
                         $HistoryproductPrice = $Historyproduct->Price;
                         $HistoryproductPicture = $Historyproduct->Picture;
                         $HistoryproductCategoryID = $Historyproduct->CategoryID;
                         $HistoryproductRating = $Historyproduct->Ratingavg;
                         $HistoryproductRatingcnt = $Historyproduct->Ratingcnt;
                 ?>
                 <!-- Convert rating to star ★ -->
                 <?php switch ($HistoryproductRating) {
                       case ($HistoryproductRating == ' '):
                              $HistoryproductRating = str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',5);
                       break;
                       case ($HistoryproductRating == 5):
                              $HistoryproductRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',5);
                       break;

                       case ($HistoryproductRating > 4):
                              $HistoryproductRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',4).
                                                              '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
                       break;
                       case ($HistoryproductRating == 4):
                              $HistoryproductRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',4).
                                                              '<i class="fa fa-star-o" aria-hidden="true"></i>';
                       break;

                       case ($HistoryproductRating > 3):
                              $HistoryproductRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',3).
                                                              '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                              str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',1);
                       break;
                       case ($HistoryproductRating == 3):
                              $HistoryproductRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',3).
                                                              str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',2);
                       break;

                       case ($HistoryproductRating > 2):
                              $HistoryproductRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',2).
                                                              '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                              str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',2);
                       break;
                       case ($HistoryproductRating == 2):
                              $HistoryproductRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',2).
                                                              str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',3);
                       break;

                       case ($HistoryproductRating > 1):
                              $HistoryproductRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',1).
                                                              '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                              str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',3);
                       break;
                       case ($HistoryproductRating == 1):
                              $HistoryproductRating = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',1).
                                                              str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',4);
                       break;

                       case ($HistoryproductRating > 0):
                              $HistoryproductRating =  '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                              str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',4);
                       break;
                       case ($HistoryproductRating == 0):
                              $HistoryproductRating = str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',5);
                       break;
                  }?>

                    <div class="col-lg-2" >
                      <div class="card mb-3 text-center" style="max-width: 20rem;">
                        <a href="<?php echo base_url()?>catalog_detail/<?=$HistoryproductID?>" ><input type="hidden" name="" value="<?php echo $HistoryproductID;?>">
                          <img class="card-img-top" src="<?php echo $HistoryproductPicture;?>" alt="Card image" title="images" style="width:150px; height:200px; object-fit: scale-down;">
                        </a>
                        <div class="card-header bg-scondary">
                          <h6>
                            <a class="text-info" href="<?php echo base_url()?>catalog_detail/<?=$HistoryproductID?>" ><?php echo mb_substr($HistoryproductName,0,40,'utf-8');?>...
                              <input type="hidden" name="" value="<?php echo $HistoryproductID;?>">
                            </a><br>
                          </h6>
                          <h5 class="text-success">AUD <i class="fa fa-usd" aria-hidden="true"></i> <?php echo $HistoryproductPrice ?>.00</h5>
                          <label class="text-info">Rating
                            <span class="text-warning"> <?=$HistoryproductRating;?></span>
                                <span class="text-info">
                                <a class="text-primary" href="<?php echo base_url()?>catalog_detail/<?=$HistoryproductID?>">
                                    <input type="hidden" name="" value="<?=$HistoryproductID?>">
                                    (<?=$HistoryproductRatingcnt;?>)
                                </span>
                                </a>
                          </label>
                          <!-- card header -->
                        </div>




                        <!-- content -->
                      </div>
                    </div>
                   <?php } //end foreach ?>
                 <?php }else{ //end if ?>
                 <div class="col-lg-12" >Empty Data</div>
                 <?php }  ?>
               </div>


              <!-- /.row -->
            </div>
            <!-- /.col-lg-9 -->
          </div>




      </main>
    <!-- </div> -->
    <!-- row -->
</div>
<!-- </div> -->
        <!-- container-fluid -->
