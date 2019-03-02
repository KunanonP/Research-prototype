      <!-- <body> -->
          <div class="container">
            <h1 class="my-4  text-info"></h1>
              <div class="row">
                <div class="col-md-12 text-secondary">
                  <hr>
                  <form method="post"  enctype="multipart/form-data" action="http://192.168.0.3/api/create">
                    First name:<br>
                    <input type="text" name="customerFirstname"  class="form-control"   autocomplete="false" placeholder="Firstname" maxlength="20"><br>
                    Last name:<br>
                    <input type="text" name="customerLastname" class="form-control"   placeholder = "Lastname" maxlength="20"><br>
                    Address1:<br>
                    <input type="text" name="customerAdd1"  class="form-control"    placeholder="Address Line 1" maxlength="100"><br>
                    Address Line 2<br>
                    <input type="text" name="customerAddr2"  class="form-control"    placeholder="Address Line 2" maxlength="100"><br>

                    <label class="col-md-12 col-form-label">City</label><br>
                      <input type="text" name="customerCity"  class="form-control"    placeholder="City" maxlength="100"><br>

                    <label class="col-md-6 col-form-label">State</label><br>
                      <input type="text" name="customerState"  class="form-control"   placeholder="State" maxlength="10" ><br>

                    <label class="col-md-6 col-form-label">Postcode</label><br>
                      <input type="text" name="customerPostcode"  class="form-control"   placeholder="Postcode" maxlength="10"><br>

                    <label class="col-md-12 col-form-label">Country</label><br>
                      <input type="text" name="customerCountry"  class="form-control"   placeholder="Country" maxlength="20"><br>

                    <label class="col-md-6 col-form-label">Username</label><br>
                      <input type="text" name="customerUsername" class="form-control"   placeholder="Username" maxlength="20" aria-describedby="usernameHelpInline"><br>


                    <label class="col-md-6 col-form-label">Password</label><br>
                      <input type="password" name="customerPassword"  class="form-control"   placeholder="Password" maxlength="20" aria-describedby="passwordHelpInline"><br>



                    <label class="col-md-6 col-form-label">Email</label><br>
                      <input type="text" name="customerEmail" class="form-control"   placeholder="Example@email.com" maxlength="50" aria-describedby="emailHelpInline"><br>


                    <label class="col-md-6 col-form-label">Contact Number</label><br>
                      <input type="text" name="customerTel"  class="form-control"   placeholder="Contact number" maxlength="20" aria-describedby="telHelpInline"><br>
                      
                      </div>
                    </div>
                    <input type="submit" value="Register New Account" class="btn btn-primary btn-lg btn-block"><br><hr>
                  </form>
                </div>
