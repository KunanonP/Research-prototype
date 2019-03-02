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
              <section class="row text-center placeholders">
                <div class="col-12 col-sm-12 placeholder">
                  <a href="<?php echo base_url()?>catalog_detail/<?=$productRecImage->ProductID?>"><input type="hidden" name="" value="<?php echo $productRecImage->ProductID;?>">
                    <img class="" src="<?=$productRecImage->Picture;?>" alt="" style="width:250px; height:300px;">
                  </a>
                  <br><br>
                  <h3 class="text-dark"><?=mb_substr($productRecImage->ProductName,0,50,'utf-8');?></h3><br><br>
                  <p class="text-dark"><?=mb_substr($productRecImage->ProductDesc,0,100,'utf-8');?>...</p><br>
                  <p><br>
                    <a class=" btn btn-lg btn-outline-secondary  btn-sm " href="<?php echo base_url()?>catalog_detail/<?=$productRecImage->ProductID?>" role="button">More details
                      <input class="" type="hidden" name="" value="<?php echo $productRecImage->ProductID;?>">
                    </a>
                  </p>
                </div>
              </section>
              <?php if (isset($groupRecommend)){ ?>
                   <?php if ($groupRecommend == '') { ?>
                             <div class="text-success" align="center"><br><hr><h5>Products Recommendation</h5><hr><br></div>
                    <?php } else{?><div class="text-success" align="center"><br><hr><h5>Recommended products related to items you've purchased</h5><hr><br></div>
               <?php } ?>
               <!-- end else -->
              <!-- <?php } ?> -->
              <!-- end if -->
              <div class="row">
                <?php if (is_array($productRecommend)){?>
                  <?php foreach($productRecommend as $prodRec){?>
                    <!-- Convert rating to star ★ -->
                      <?php switch ($prodRec->Ratingavg) {
                            case ($prodRec->Ratingavg == ' '):
                                   $prodRec->Ratingavg = str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',5);
                            break;
                            case ($prodRec->Ratingavg == 5):
                                   $prodRec->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',5);
                            break;

                            case ($prodRec->Ratingavg > 4):
                                   $prodRec->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',4).
                                                                   '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
                            break;
                            case ($prodRec->Ratingavg == 4):
                                   $prodRec->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',4).
                                                                   '<i class="fa fa-star-o" aria-hidden="true"></i>';
                            break;

                            case ($prodRec->Ratingavg > 3):
                                   $prodRec->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',3).
                                                                   '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                                   str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',1);
                            break;
                            case ($prodRec->Ratingavg == 3):
                                   $prodRec->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',3).
                                                                   str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',2);
                            break;

                            case ($prodRec->Ratingavg > 2):
                                   $prodRec->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',2).
                                                                   '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                                   str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',2);
                            break;
                            case ($prodRec->Ratingavg == 2):
                                   $prodRec->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',2).
                                                                   str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',3);
                            break;

                            case ($prodRec->Ratingavg > 1):
                                   $prodRec->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',1).
                                                                   '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                                   str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',3);
                            break;
                            case ($prodRec->Ratingavg == 1):
                                   $prodRec->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',1).
                                                                   str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',4);
                            break;

                            case ($prodRec->Ratingavg > 0):
                                   $prodRec->Ratingavg =  '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                                   str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',4);
                            break;
                            case ($prodRec->Ratingavg == 0):
                                   $prodRec->Ratingavg = str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',5);
                            break;
                       }?>

                <div class="col-lg-2">

                  <div class="card mb-3 text-center" style="max-width: 20rem;">
                    <a href="<?php echo base_url()?>catalog_detail/<?=$prodRec->ProductID?>"><input type="hidden" name="" value="<?php echo $prodRec->ProductID;?>">
                      <img class="card-img-top" src="<?=$prodRec->Picture?>" alt="" style="width:150px; height:200px; object-fit: scale-down;">
                    </a>
                    <div class="card-header bg-scondary">
                      <h6 class="card-title" >
                        <a class="text-info" href="<?php echo base_url()?>catalog_detail/<?=$prodRec->ProductID?>">
                          <?=mb_substr($prodRec->ProductName,0,35,'utf-8');?>...
                          <input type="hidden" name="" value="<?php echo $prodRec->ProductID;?>">
                        </a><br>
                          <small>
                            <label class="text-info">Rating
                              <span class="text-warning"><strong><?=$prodRec->Ratingavg;?></strong></span>
                              <span class="text-primary">
                              <a class="text-primary" href="<?php echo base_url()?>catalog_detail/<?=$prodRec->ProductID?>">
                                  <input type="hidden" name="" value="<?php echo $prodRec->ProductID;?>">
                                  (<?=$prodRec->Ratingcnt;?>)
                              </span>
                              </a>
                            </label>
                          </small>

                      </h6>
                    </div>
                    <div class="card-body text-success text-left" style="height:200px; object-fit: scale-down;">
                      <h5>AUD $ <?=$prodRec->Price;?>.00</h5>
                      <small>
                        <p class="text-secondary" style="width:100%; height:100%; object-fit: scale-down;"><?=mb_substr($prodRec->ProductDesc,0,80,'utf-8');?>...<br><br>
                          <a class="text-muted pull-right" href="<?php echo base_url()?>catalog_detail/<?=$prodRec->ProductID?>">more details...<input type="hidden" name="" value="<?php echo $prodRec->ProductID;?>"></a>
                        </p>
                      </small>
                    </div>
                    <div class="card-footer">
                      <form class="" action="<?php echo base_url()?>/addtocart" method="post">
                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                          <div class="btn-group mr-1" role="group" aria-label="First group" style="width:60%;">

                            <input type="text" class="form-control" name="qty" id="qty" value="1" style="display:none">
                            <input type="text" name="prodID" value="<?php echo $prodRec->ProductID;?>" style="display:none">
                            <input type="text" name="prodName" value="<?php echo $prodRec->ProductName;?>" style="display:none">
                            <input type="text" name="prodPrice" value="<?php echo $prodRec->Price;?>" style="display:none">
                            <input type="text" name="prodPic" value="<?php echo $prodRec->Picture;?>" style="display:none">
                            <input type="text" name="prodCat" value="<?php echo $prodRec->CategoryID;?>" style="display:none">
                          </div>
                          <div class="btn-group" role="group" aria-label="Second group">
                            <button  type="submit"  class=" btn-sm btn btn-dark pull-right"><i class="fa fa-cart-plus" aria-hidden="true"> Add to Cart</i></button>
                          </div>
                        </div><!-- /input-group -->
                        </form>
                      <small class="text-muted"></small>
                    </div>
                  </div>
                </div>
              <?php }?>
                <?php } ?>
                </div>
                <?php if (isset($custname)){ ?>
                     <?php if ($custname == '') { ?>
                               <div class="text-success" align="center"><br><hr><h5>Recommended products related to items most people viewed</h5><hr><br></div>
                      <?php } else{?><div class="text-success" align="center"><br><hr><h5>Recommended products related to items you've viewed</h5><hr><br></div><?php } ?>
                 <?php } ?>

                <!-- <div class="text-success" align="center"><br><hr><h5>Recommended products related to items you've viewed</h5><hr><br></div> -->
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

          </main>


        <!-- row -->
    </div>
            <!-- container-fluid -->
  </div>
  <script type="text/javascript">
        $(document).ready(function(){
            $('#bnt1').click(function(){
                 var qty = parseInt($('#qty').val());
                 if (qty > 0) {
                     var cqty  = qty - 1;
                     $('#qty').val(cqty);
                 }
            });
            $('#bnt2').click(function(){
                //alert('bnt2');
                 var qty = parseInt($('#qty').val());

                     var cqty  = qty + 1;
                     $('#qty').val(cqty);
            });
        });
  </script>
