<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="text-dark"><i class="text-info fa fa-address-card-o fa-3x" aria-hidden="true"></i> My account</h1><hr><br>
    </div>
      <div class="col-lg-6 text-secondary">
        <h4 class="text-secondary"><i class="text-primary fa fa-user-circle-o" aria-hidden="true"></i> Account Details<hr></h4>
          Firstname:       <h6 class=" text-info"><?php echo $custname;?></h6>
          Lastname:        <h6 class=" text-info"><?php echo $custlast;?></h6>
          Address Line 1:  <h6 class=" text-info"><?php echo $custAddr1;?></h6>
          Address Line 2:  <h6 class=" text-info"><?php echo $custAddr2;?></h6>
          City:            <h6 class=" text-info"><?php echo $custCity;?></h6>
          State:           <h6 class=" text-info"><?php echo $custState;?></h6>
          Postcode:        <h6 class=" text-info"><?php echo $custPostcode;?></h6>
          Country:         <h6 class=" text-info"><?php echo $custCountry;?></h6>
          Email:           <h6 class=" text-info"><?php echo $custEmail;?></h6>
          Contact Number:  <h6 class=" text-info"><?php echo $custTel;?></h6>
        </div>
        <div class="col-lg-12">
            <h4 class="text-secondary"><i class="text-success fa fa-shopping-bag" aria-hidden="true"></i> Purchase history<hr><br></h4>
              <table cellpadding="6" cellspacing="1" style="width:100%" border="0">

              <tr>
                   <th class="text-secondary">Purchase Date</th>
                   <th class="text-secondary">Order ID</th>
                   <th class="text-secondary">Order quantity</th>
                   <th class="text-secondary">Total Price</th>
                   <th class="text-secondary">Shipping Name</th>
                   <th class="text-secondary">Payment Method</th>
              </tr>
              <?php if (is_array($orderHistory)==true){?>
              <?php foreach ($orderHistory as $history) { ?>
                <?php switch ($history->PaymentType) {
                      case 1:
                             $history->PaymentType = 'Credit Card';
                      break;
                      case 2:
                             $history->PaymentType = 'Paypal';
                      break;
                }?>
                   <tr>
                            <td class="text-success">#<?php echo $history->OrderDate;?></td>
                            <td class="text-secondary">#<?php echo $history->OrderID;?></td>
                            <td class="text-secondary"><?php echo $history->OrderQTY;?></td>
                            <td class="text-secondary">$<?php echo $history->OrderTotal;?></td>
                            <td class="text-secondary"><?php echo $history->ShippingFirstName;?></td>
                            <td class="text-secondary"><?php echo $history->PaymentType;?></td>
                            <td><button type="button" name="button"
                              class="btn btn-info pull-right"
                              data-toggle="modal"
                              data-target="#detailModal"
                              aria-expanded="false"
                              aria-controls="collapseExample"
                              onclick="ShowDetail('<?php echo $history->OrderDate;?>',
                                                  '<?php echo $history->OrderID;?>',
                                                  '<?php echo $history->OrderQTY;?>',
                                                  '<?php echo $history->OrderTotal;?>',
                                                  '<?php echo $history->ShippingFirstName;?>',
                                                  '<?php echo $history->PaymentType;?>',
                                                  )">More Info</button></td>
                                                  <td><button type="button" name="button2" class="btn btn-primary text-light">Give Rating</button></td>
                   </tr>
                   <!-- <td><button type="button" name="button" data-toggle="detailModal" data-target="#userform" class="btn btn-primary pull-right" onclick="ShowDetail('<?php echo $history->OrderDate;?>')">Edit</button></td> -->
<!-- <a class="nav-link" href="<?php echo base_url();?>#" data-toggle="modal" data-target="#sModal"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</a> -->
                   <!-- <div class="collapse" id="collapseExample">
                     <div class="card card-block">
                       <?php echo $history->ProductName;?>
                    </div>
                   </div> -->

              <?php } ?>
              <!-- end foreach -->
            <?php } ?>
            <!--end if-->

              </table>

            </div>
        </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- row -->
</div>
<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="sModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="detailModalLabel">Purchase Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form method="post" id="formsignin"  enctype="multipart/form-data" action="login">
      <div class="modal-body">

        <div class="form-group row">
         <label for="example-date-input" class="col-5 col-form-label">Purchase date: </label>
         <div class="col-5">
            <input class="form-control" type="text" name="cName" id="OrderDate" value="" >
         </div>
        </div>

        <div class="form-group row">
         <label for="example-date-input" class="col-5 col-form-label">OrderID</label>
         <div class="col-5">
            <input class="form-control" type="text" name="cNum" id="OrderID" value="" maxlength="16">
         </div>
        </div>

        <div class="form-group row">
         <label for="example-date-input" class="col-5 col-form-label">OrderQTY</label>
         <div class="col-5">
            <input class="form-control" type="text" name="cNum" id="OrderQTY" value="" maxlength="16">
         </div>
        </div>

        <div class="form-group row">
         <label for="example-date-input" class="col-5 col-form-label">ShippingFirstName</label>
         <div class="col-5">
            <input class="form-control" type="text" name="cNum" id="ShippingFirstName" value="" maxlength="16">
         </div>
        </div>

        <div class="form-group row">
         <label for="example-date-input" class="col-5 col-form-label">PaymentTypeDesc</label>
         <div class="col-5">
            <input class="form-control" type="text" name="cNum" id="PaymentTypeDesc" value="" maxlength="16">
         </div>
        </div>


      </div>
    </form>
    </div>
  </div>
</div>
<!-- /.container -->
<script>
  function ShowDetail(OrderDate,OrderID,OrderQTY,OrderTotal,ShippingFirstName,PaymentTypeDesc,State,Postcode,Country,Username,Password,Email,Tel,Privilege){
         $('#detailModalLabel').text('Purchase Date -'+ ' ' + OrderDate);
         $('#OrderDate').val(OrderDate);
         $('#OrderID').val(OrderID);
         $('#OrderQTY').val(OrderQTY);
         $('#ShippingFirstName').val(ShippingFirstName);
         $('#PaymentTypeDesc').val(PaymentTypeDesc);
  }
</script>
