<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
          <h3 class="text-dark"><i class="text-info fa fa-credit-card fa-3x" aria-hidden="true"></i> Credit or Debit Card Payment</h3><hr>
          <div class="text-secondary">

            <form method="post" id="formcredit"  enctype="multipart/form-data" action="saveorder1/1">
              <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>visa.png" alt="">
              <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>mastercard.png" alt="">
              <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>american-express.png" alt="">
              <img src="<?php echo base_url('application/assets/img/payment-methods-icons/60x40png/'); ?>discover.png" alt=""><br><br>
              <!-- <fieldset> -->
                <div class="form-group row">
                 <label for="example-date-input" class="col-2 col-form-label">Amount $</label>
                 <div class="col-5">
                    <input disabled class="form-control" type="text" value="<?php echo $this->cart->format_number($this->cart->total()); ?>" name="cAmount" id="cAmount" >
                 </div>
                </div>
              <!-- </fieldset> -->

                 <div class="form-group row">
                  <label for="example-date-input" class="col-2 col-form-label">Name on card</label>
                  <div class="col-5">
                     <input class="form-control" type="text" name="cName" id="cName" value="" >
                  </div>
                 </div>

                 <div class="form-group row">
                  <label for="example-date-input" class="col-2 col-form-label">Card number</label>
                  <div class="col-5">
                     <input class="form-control" type="text" name="cNum" id="cNum" value="" maxlength="16">
                  </div>
                 </div>

                <div class="form-group row">
                <label for="example-date-input" class="col-2 col-form-label">Epiry Date</label>
                  <div class="col-3">
                    <!-- <input class="form-control" type="date" value="" id="cEpire"> -->
                    <select class="form-control" name="cExpireM" id="cEpireM" >
                      <option value="01">January</option>
                      <option value="02">Febuary</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                    </div>
                    <div class="col-2">
                      <select class="form-control" name="cExpireY" id="cEpireY" >
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                      </select>
                    </div>
                </div>

                <div class="form-group row">
                 <label for="example-date-input" class="col-2 col-form-label">Verification code</label>
                 <div class="col-5">
                    <input class="form-control" type="text" name="cVerify" id="cVerify" value="" maxlength="3">
                 </div>
                </div>
                <br><hr>
                <input type="hidden" name="custID" class="form-control" id="custID" value="<?=$custID?>">
          </div>
            <button type="button" class="btn btn-light pull-left" onclick="backtocechkout()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Checkout</button>
            <button type="submit" class="btn btn-primary pull-right" >Confirm Payment <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </form>
    </div>
    <!-- /.col-lg-9 -->
  </div>
</div>
<!-- /.container -->

<script type="text/javascript">
        function backtocechkout(){
          window.location = "checkout";
        }
</script>
