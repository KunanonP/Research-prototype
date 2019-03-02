    <!-- Page Content -->
    <!-- <div class="container"> -->
      <!--Pull the updateData-->
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
        <!-- Convert rating to star ★ -->
        <?php $rating =  $ProductDetail->Ratingavg ?>
        <?php switch ($ProductDetail->Ratingavg) {
              case ($ProductDetail->Ratingavg == ' '):
                     $ProductDetail->Ratingavg = str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',5);
              break;
              case ($ProductDetail->Ratingavg == 5):
                     $ProductDetail->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',5);
              break;

              case ($ProductDetail->Ratingavg > 4):
                     $ProductDetail->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',4).
                                                     '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
              break;
              case ($ProductDetail->Ratingavg == 4):
                     $ProductDetail->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',4).
                                                     '<i class="fa fa-star-o" aria-hidden="true"></i>';
              break;

              case ($ProductDetail->Ratingavg > 3):
                     $ProductDetail->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',3).
                                                     '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',1);
              break;
              case ($ProductDetail->Ratingavg == 3):
                     $ProductDetail->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',3).
                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',2);
              break;

              case ($ProductDetail->Ratingavg > 2):
                     $ProductDetail->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',2).
                                                     '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',2);
              break;
              case ($ProductDetail->Ratingavg == 2):
                     $ProductDetail->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',2).
                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',3);
              break;

              case ($ProductDetail->Ratingavg > 1):
                     $ProductDetail->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',1).
                                                     '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',3);
              break;
              case ($ProductDetail->Ratingavg == 1):
                     $ProductDetail->Ratingavg = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',1).
                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',4);
              break;

              case ($ProductDetail->Ratingavg > 0):
                     $ProductDetail->Ratingavg =  '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',4);
              break;
              case ($ProductDetail->Ratingavg == 0):
                     $ProductDetail->Ratingavg = str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',5);
              break;
         }?>
          <!-- <div class="col-md-9"> -->
            <div class="col-md-5"><br>
                <img class="img img-responsive" src="<?php echo $ProductDetail->Picture;?>" alt="" style="width:100%;max-width:680px; height:100%; max-height:720px; object-fit: scale-down;">
            </div>
            <div class="col-md-4">
              <!-- <div class="card-body"> -->
                  <br><br> <br><br>
                    <h3 class="text-info card-title"><?php echo $ProductDetail->ProductName;?> </h3><hr>
                    <h6 class="text-muted text-white">Product ID# <?php echo $ProductDetail->ProductID;?></h6>
                    <h7 class="text-muted text-white">Category: <?php echo $ProductDetail->CategoryName;?></h7><br><br>
                    <h4 class="text-success">AUD <i class="fa fa-usd" aria-hidden="true"></i> <?php echo $ProductDetail->Price;?>.00</h4><br>
                    <label class="text-info">Overall Rating
                      <span class="text-warning"><?=$ProductDetail->Ratingavg;?></span>
                      From <?=$ProductDetail->Ratingcnt;?> Ratings<br>
                      <small>
                       <?php echo $rating;?> out of 5 stars <br>
                      </small>
                    </label>
                    <h5>Quantity:</h5>
                    <!-- <div class="col-lg-3"> -->
                  <form class="" action="<?php echo base_url()?>/addtocart" method="post">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                      <div class="btn-group mr-1" role="group" aria-label="First group" style="width:50%">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-outline-dark"  id="bnt1"> - </button>
                        </span>
                        <input type="text" class="form-control" name="qty" id="qty" value="1">
                        <input type="text" name="prodID" value="<?php echo $ProductDetail->ProductID;?>" style="display:none">
                        <input type="text" name="prodName" value="<?php echo $ProductDetail->ProductName;?>" style="display:none">
                        <input type="text" name="prodPrice" value="<?php echo $ProductDetail->Price;?>" style="display:none">
                        <input type="text" name="prodPic" value="<?php echo $ProductDetail->Picture;?>" style="display:none">
                        <input type="text" name="prodCat" value="<?php echo $ProductDetail->CategoryID;?>" style="display:none">

                        <span class="input-group-btn">
                          <button type="button" class="btn btn-outline-dark" id="bnt2"> + </button>
                        </span>
                      </div>
                      <div class="btn-group" role="group" aria-label="Second group">
                          <button  type="submit"  class="btn btn-dark pull-right"><i class="fa fa-cart-plus" aria-hidden="true"> Add to Cart</i></button>
                      </div>
                    </div><!-- /input-group -->
                    </form>
                    <div class="panel panel-info">
                      <hr>
                      <div class="panel-heading text-info">Description</div>
                      <div class="panel-body">
                        <p class="card-text text-secondary"><?php echo $ProductDetail->ProductDesc;?></p>
                      </div><hr>
                      <div class="panel-heading text-info">Recently Rating</div>
                      <div class="panel-body">
                        <div class="table-responsive" style="max-height:600px; overflow: auto">
                          <table class="table table-striped">
                           <tr class="text-info">
                             <th>No.</th>
                             <th>Rating</th>
                             <!-- <th>By</th> -->
                             <th>User ID</th>
                             <th>Date</th>
                           </tr>
                    <?php if(is_array($ProdRate) == true){
                      $No = 1; ?>
                      <?php foreach ($ProdRate as  $ProdRate) {
                            $UnixTime = $ProdRate->TimeStamp;
                            $Time = new DateTime("@$UnixTime");
                            $Rate = $ProdRate->Rating;
                            // $User = $UserRate->UserName;
                            $ID = $ProdRate->UserID;
                        ?>
                        <?php switch ($Rate) {
                              case ($Rate == ' '):
                                     $Rate = str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',5);
                              break;
                              case ($Rate == 5):
                                    $Rate = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',5);
                              break;

                              case ($Rate > 4):
                                     $Rate = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',4).
                                                                     '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
                              break;
                              case ($Rate == 4):
                                     $Rate = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',4).
                                                                     '<i class="fa fa-star-o" aria-hidden="true"></i>';
                              break;

                              case ($Rate > 3):
                                     $Rate = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',3).
                                                                     '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',1);
                              break;
                              case ($Rate == 3):
                                     $Rate = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',3).
                                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',2);
                              break;

                              case ($Rate > 2):
                                     $Rate = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',2).
                                                                     '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',2);
                              break;
                              case ($Rate == 2):
                                     $Rate = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',2).
                                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',3);
                              break;

                              case ($Rate > 1):
                                     $Rate = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',1).
                                                                     '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',3);
                              break;
                              case ($Rate == 1):
                                     $Rate = str_repeat('<i class="fa fa-star" aria-hidden="true"></i>',1).
                                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',4);
                              break;

                              case ($Rate > 0):
                                     $Rate =  '<i class="fa fa-star-half-o" aria-hidden="true"></i>'.
                                                                     str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',4);
                              break;
                              case ($Rate == 0):
                                     $Rate = str_repeat('<i class="fa fa-star-o" aria-hidden="true"></i>',5);
                              break;
                         }?>
                           <tr>
                             <td class="text-info"><?php echo $No; ?></td>
                             <td class="text-warning"><?php echo $Rate;?></td>
                             <!-- <td class="text-secondary"><?php echo $User;?></td> -->
                             <td class="text-secondary"><?php echo $ID;?></td>
                             <td class="text-secondary">   <?php echo $Time->format('M d, Y');?><td>
                           </tr>
                           <?php ++$No; ?>
                       </div>
                      <?php  } //end foreach ?>
                      <?php }else{ ?>
                      <?php echo '<tr><td colspan="7">Be the first to give rating</td></tr>'; } ?>
                       </table>
                       <!-- table div -->
                       </div>
                       <!-- panel body -->
                      </div>

                    </div> <!-- description -->
                    <br><br>
                    <br><br>
            <!-- close md5 -->
            </div>
      <!-- close row -->
      </div>
<!-- Container -->
<!-- </div> -->


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
