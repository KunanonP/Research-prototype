<div class="container">
  <div class="row">
    <div class="col-md-12">
      <!-- col-md-12 -->
      <h3 class="text-dark"><i class="text-info fa fa-check-circle-o fa-3x" aria-hidden="true"></i> Receipt</h3><hr>
    </div>

    <div class="col-md-6 text-secondary">
      <h5 class="text-secondary"><i class="text-info fa fa-truck" aria-hidden="true"></i> Shipping Address Summary</h5><hr>
        Firstname:       <?php echo $shippingFirstname;?><br>
        Lastname:        <?php echo $shippingLastname;?><br>
        Address Line 1:  <?php echo $shippingAddr;?><br>
        Address Line 2:  <?php echo $shippingAddr2;?><br>
        City:            <?php echo $shippingCity;?><br>
        State:           <?php echo $shippingState;?><br>
        Postcode:        <?php echo $shippingPostcode;?><br>
        Country:         <?php echo $shippingCountry;?><br>
        Email:           <?php echo $shippingEmail;?><br>
        Contact Number:  <?php echo $shippingTel;?><br>
        <!-- <input type="text" id="payment_method" value="1"> -->
      </div>
    <div class="col-lg-6 text-secondary">


      <h5 class="text-secondary"><i class="text-info fa fa-credit-card-alt" aria-hidden="true"> Payment Summary</i> - Payment ID# <?php echo $lastPayment->PaymentID;?></h5><hr>
      <?php if (isset($paymentType)){ ?>
           <?php if ($paymentType == '1') { ?>
                  <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>visa.png" alt="">
                  <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>mastercard.png" alt="">
                  <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>american-express.png" alt="">
                  <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>discover.png" alt=""><br><br>
                  Name on card:       <?php echo $lastPayment->CardName;?><br>
                  Card Number:        <?php echo $lastPayment->CardNumber;?><br>
                  Card Expire:  <?php echo $lastPayment->CardExpire;?><br>
            <?php } else {?><img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>paypal.png" alt=""><br><?php } ?>
       <?php } ?>

    </div>
    <div class="col-lg-12 text-secondary"><hr>
      <h5 class="text-secondary"><i class="text-info fa fa-opencart" aria-hidden="true"> Item Summary</i> - OrderID# <?php echo $lastPayment->OrderID;?></h5><hr>
      <table cellpadding="6" cellspacing="1" style="width:100%" border="0">
      <tr>
           <th class="text-secondary">Product ID</th>
           <th class="text-secondary">Picture</th>
           <th class="text-secondary">Description</th>
           <th class="text-secondary">QTY</th>
           <th class="text-secondary" style="text-align:right">Item Price</th>
      </tr>
      <?php foreach ($lastOrder as $showOrder) { ?>
           <tr>
                    <td class="text-success">#<?php echo $showOrder->ProductID;?></td>
                    <td><img src="<?php echo $showOrder->ProductImage;?>" style="height:50px; width:50px"></td>
                    <td class="text-dark"><?php echo $showOrder->ProductName;?></td>
                    <td class="text-dark"><?php echo $showOrder->Quantity;?></td>
                    <td style="text-align:right"><?php echo $showOrder->Price;?></td>

           </tr>
      <?php } ?>
      </table>

    </div>
    <div class="col-lg-12 text-secondary"><hr>
      <button type="button" class="btn btn-dark pull-left" onclick="email()"><i class="fa fa-share" aria-hidden="true"></i> Email the receipt</button>
      <a href="<?php echo base_url();?>home" class="btn btn-info pull-right" role="button">Back to shopping</a>
    </div>
    <!-- /.col-lg-9 -->
  </div>
</div>
<!-- /.container -->

<!-- <script type="text/javascript">
        function back(){
            window.location = 'home';
        }
        //
        // function select_paypal(){
        //     $('#payment_method').val(2);
        // }
        //
        // function select_credit(){
        //     $('#payment_method').val(1);
        // }
        // //
        // // function payment(){
        // //     if ($('#payment_method').val()==1){
        // //         window.location = 'credit';
        // //     }else{
        // //        window.location = 'cpaypal';
        // //     }
        // //
        // // }

</script> -->
