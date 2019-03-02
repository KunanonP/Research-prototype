<div class="container">
  <div class="row">
    <div class="col-md-12">
      <!-- col-md-12 -->
      <h3 class="text-dark"><i class="text-info fa fa-shopping-basket fa-3x" aria-hidden="true"></i> Checkout</h3><hr>
    </div>

    <div class="col-md-6 text-secondary">
      <h5 class="text-secondary"><i class="text-dark fa fa-truck" aria-hidden="true"></i> Delivery to</h5><hr>
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
        <input type="hidden" id="payment_method" value="1">
      </div>

    <div class="col-lg-6 text-secondary">
      <h5 class="text-dark"><i class="text-danger fa fa-credit-card-alt" aria-hidden="true"></i> Payment Method</h5><hr>
      <div class="custom-controls-stacked">
        <small class="text-muted">
          Choose your payment method.
        </small><br>
        <label class="custom-control custom-radio">
          <input name="payMethod" type="radio" class="custom-control-input" value="" checked onclick="select_credit()">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>visa.png" alt="">
            <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>mastercard.png" alt="">
            <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>american-express.png" alt="">
            <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>discover.png" alt=""><br>
            <small class="text-muted">
              Credit or debit card.
            </small>
          </span>
        </label><br>
        <label class="custom-control custom-radio">
          <input name="payMethod" type="radio" class="custom-control-input" value="" onclick="select_paypal()">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description">
            <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>paypal.png" alt=""><br>
            <small class="text-muted">
              Paypal.
            </small>
          </span>

        </label>
        <input type="hidden" name="" id="payMethod" value="credit">
      </div>
    </div>
    <div class="col-lg-12 text-secondary"><hr>
      <h5 class="text-secondary"><i class="text-dark fa fa-opencart" aria-hidden="true"></i> Item Summary</h5><hr>
      <table cellpadding="6" cellspacing="1" style="width:100%" border="0">
      <tr>
           <th class="text-secondary">Product ID</th>
           <th class="text-secondary">Category ID</th>
           <th class="text-secondary">Picture</th>
           <th class="text-secondary">Item Description</th>
           <th class="text-secondary">QTY</th>
           <th class="text-secondary" style="text-align:right">Item Price</th>
           <th class="text-secondary" style="text-align:right">Sub-Total</th>
      </tr>
      <?php $i = 1; ?>
      <?php foreach ($this->cart->contents() as $items): ?>
           <?php echo form_hidden('rowid'.$i, $items['rowid']); ?>
           <tr>
              <td class="text-info"># <?php echo $items['id'];?></td>
              <td class="text-info"># <?php echo $items['category'];?></td>
              <td><img src="<?php echo $items['image'];?>" style="height:50px; width:50px"></td>
                   <td class="text-dark"><h6>
                           <?php echo $items['name']; ?>
                           <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                   <p>
                                           <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                                   <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                                           <?php endforeach; ?>
                                   </p>
                           <?php endif; ?>
                   </td></h6>
                   <td><?php echo form_input(array('name' =>'qty'.$i, 'value' => $items['qty'], 'maxlength' => '3', 'size' => '3')); ?></td>
                   <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                   <td style="text-align:right"><i class="fa fa-usd text-success"></i><?php echo $this->cart->format_number($items['subtotal']); ?></td>
           </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
      <tr>
           <td colspan="3"> </td>
           <td class="pull-right text-dark"><strong>Total</strong></td>
           <td class="" style="text-align:right"><i class="fa fa-usd text-success"></i> <?php echo $this->cart->format_number($this->cart->total()); ?></td>
      </tr>
      </table>
    </div>
    <div class="col-lg-12 text-secondary"><hr>
      <button type="button" class="btn btn-light pull-left" onclick="backtoship()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Shipping Address</button>
      <button type="button" class="btn btn-primary pull-right" onclick="payment()">Confirm and Pay <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
    </div>
    <!-- /.col-lg-9 -->
  </div>
</div>
<!-- /.container -->

<script type="text/javascript">
        function backtoship(){
            window.location = 'shipping';
        }

        function select_paypal(){
            $('#payment_method').val(2);
        }

        function select_credit(){
            $('#payment_method').val(1);
        }

        function payment(){
            if ($('#payment_method').val()==1){
               window.location = 'credit';
            }else{
               window.location = 'cpaypal';
            }

        }

</script>
