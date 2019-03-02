<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
          <h3 class="text-dark"><i class="text-info fa fa-truck fa-3x" aria-hidden="true"></i> Shipping Address</h3><hr>
          <div class="modal-body text-secondary">
            <form method="post" id="formshipping"  enctype="multipart/form-data" action="checkout">
                First name<br>
                <input type="text" name="sFname" id="sFname" class="form-control" required autocomplete="false" placeholder="Firstname" value="<?=$custname?>" maxlength="20"><br>
                Last name<br>
                <input type="text" name="sLname" id="sLname" class="form-control" required placeholder = "Lastname" value="<?=$custlast?>" maxlength="20"><br>
                Address Line 1<br>
                <input type="text" name="sAddr" id="sAddr" class="form-control" required  placeholder="Address Line 1" value="<?=$custAddr1?>" maxlength="100"><br>
                Address Line 2<br>
                <input type="text" name="sAddr2" id="sAddr2" class="form-control" required  placeholder="Address Line 2" value="<?=$custAddr2?>" maxlength="100"><br>

                <div class="form-group row">
                  <label class="col-md-12 col-form-label">City</label>
                  <div class="col-md-12">
                    <input type="text" name="sCity" id="sCitys" class="form-control" required  placeholder="City" value="<?=$custCity?>" maxlength="100"><br>
                  </div>
                  <label class="col-md-6 col-form-label">State</label>
                  <label class="col-md-6 col-form-label">Postcode</label>
                  <div class="col-md-6">
                    <input type="text" name="sState" id="sStates" class="form-control" required placeholder="State" value="<?=$custState?>" maxlength="10" >
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="sPostcode" id="sPostcodes" class="form-control" required placeholder="Postcode" value="<?=$custPostcode?>" maxlength="10">
                  </div>

                  <label class="col-md-12 col-form-label">Country</label>
                  <div class="col-md-12">
                    <input type="text" name="sCountry" id="sCountrys" class="form-control" required placeholder="Country" value="<?=$custCountry?>" maxlength="20">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-6 col-form-label">Email</label>
                  <label class="col-md-6 col-form-label">Contact Number</label>
                  <div class="col-md-6">
                    <input type="text" name="sEmails" id="sEmails" class="form-control" required placeholder="Example@email.com" value="<?=$custEmail?>" maxlength="50">
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="sTels" id="sTels" class="form-control" required placeholder="Contact number" value="<?=$custTel?>" maxlength="20">
                  </div>
                </div>
                <br><hr>
                <input type="hidden" name="custID" class="form-control" id="custID" value="<?=$custID?>">
                <input type="text" name="<?=$csrf['name'];?>" id="token" value="<?=$csrf['hash'];?>" style="display:none">
          </div>
            <button type="button" class="btn btn-light pull-left" onclick="backtocart()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Cart</button>
            <button type="submit" class="btn btn-primary pull-right" >Continue to Checkout <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </form>
    </div>
    <!-- /.col-lg-9 -->
  </div>
</div>
<!-- /.container -->

<script type="text/javascript">
        function backtocart(){
          window.location = "cart";
        }
</script>
