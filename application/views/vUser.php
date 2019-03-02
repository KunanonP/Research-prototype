  <!-- <body> -->
  <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-2 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>report">Reports</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Analytics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Export</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">Nav item</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Nav item again</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">One more nav</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Another nav item</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">Nav item again</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">One more nav</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Another nav item</a>
            </li>
          </ul>
        </nav>
        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <h1 class="my-4 text-primary"><?php echo $top; ?> Dashboard</h1>
            <section class="row text-center placeholders">
              <div class="col-6 col-sm-3 placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                <h4>Label</h4>
                <div class="text-muted">Something else</div>
              </div>
              <div class="col-6 col-sm-3 placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                <h4>Label</h4>
                <span class="text-muted">Something else</span>
              </div>
              <div class="col-6 col-sm-3 placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                <h4>Label</h4>
                <span class="text-muted">Something else</span>
              </div>
              <div class="col-6 col-sm-3 placeholder">
                <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
                <h4>Label</h4>
                <span class="text-muted">Something else</span>
              </div>
              <div class="col-md-12 row"><br><br><br>
                  <div class="col-md-3">
                     <input type="text" name="fristname_f" id="fristname_f" placeholder="firstname" class="form-control pull-left">
                  </div>
                  <div class="col-md-3">
                    <input type="text" name="lastname_f" id="lastname_f" placeholder="lastname" class="form-control">
                  </div>
                  <div class="col-md-3">
                    <input type="text" name="email_f" id="email_f" placeholder="email" class="form-control">
                  </div>
                <div class="col-md-3">
                    <button type="button" name="button" class="btn btn-info " onclick="userlist()">Search</button>
                    <button type="button" name="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#userform" onclick="Addnewuser()">Register</button><br>
                </div>
              </div><br><br><br>
              <div class="col-md-12 UserList" id="UserList">Load...</div>
            </section>
        </main>
           <!--  form Add User modal-->
        <div class="modal fade" id="userform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-info" id="myModalLabel">ADD NEW USER</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          </div>
                          <!--popup form-->
                          <div class="modal-body text-secondary">
                              <form method="post" id="formadduser"  enctype="multipart/form-data">
                                First name:<br>
                                <input type="text" name="sFirstname" id="sFirstname" class="form-control" required autocomplete="false" placeholder="Firstname" maxlength="20"><br>
                                Last name:<br>
                                <input type="text" name="sLastname" id="sLastname" class="form-control" required placeholder = "Lastname" maxlength="20"><br>
                                Address1:<br>
                                <input type="text" name="sAdd1" id="sAddress1" class="form-control" required  placeholder="Address Line 1" maxlength="100"><br>
                                Address Line 2<br>
                                <input type="text" name="sAddr2" id="sAddress2" class="form-control" required  placeholder="Address Line 2" maxlength="100"><br>
                                <div class="form-group row">
                                  <label class="col-md-12 col-form-label">City</label>
                                  <div class="col-md-12">
                                    <input type="text" name="sCity" id="sCity" class="form-control" required  placeholder="City" maxlength="100"><br>
                                  </div>
                                  <label class="col-md-6 col-form-label">State</label>
                                  <label class="col-md-6 col-form-label">Postcode</label>
                                  <div class="col-md-6">
                                    <input type="text" name="sState" id="sState" class="form-control" required placeholder="State" maxlength="10" >
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" name="sPostcode" id="sPostcode" class="form-control" required placeholder="Postcode" maxlength="10">
                                  </div>

                                  <label class="col-md-12 col-form-label">Country</label>
                                  <div class="col-md-12">
                                    <input type="text" name="sCountry" id="sCountry" class="form-control" required placeholder="Country" maxlength="20">
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label class="col-md-6 col-form-label">Username</label>
                                  <label class="col-md-6 col-form-label">Password</label>
                                  <div class="col-md-6">
                                    <input type="text" name="sUsername" id="sUsername" class="form-control" required placeholder="Username" maxlength="20" aria-describedby="usernameHelpInline">
                                    <small id="usernameHelpInline" class="text-muted">
                                      Maximum 20 characters long.
                                    </small>
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" name="sPassword" id="sPassword" class="form-control" required placeholder="Password" maxlength="20" aria-describedby="passwordHelpInline">
                                    <small id="passwordHelpInline" class="text-muted">
                                      Maximum 20 characters long.
                                    </small>
                                  </div>
                                </div>

                                  <div class="form-group row">
                                    <label class="col-md-6 col-form-label">Email</label>
                                    <label class="col-md-6 col-form-label">Contact Number</label>
                                    <div class="col-md-6">
                                    <input type="text" name="sEmail" id="sEmail" class="form-control" required placeholder="Example@email.com" maxlength="50" aria-describedby="emailHelpInline">
                                    <small id="emailHelpInline" class="text-muted">
                                        Must be available email.
                                    </small>
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" name="sTel" id="sTel" class="form-control" required placeholder="Contact number" maxlength="20" aria-describedby="telHelpInline">
                                    <small id="telHelpInline" class="text-muted">
                                        eg. 0412 345 678.
                                    </small>
                                  </div>

                                  <div class="col-md-6">
                                    <label class="col-md-6 col-form-label">Privilege</label>
                                    <!-- <input type="text" name="sPrivilege" id="sPrivilege" class="form-control" required placeholder="Privilege" maxlength="2"><br>
                                    <?php echo $PrivilegeID?> -->
                                    <!-- </?php echo $PrivDesc?> -->
                                  <select class="form-control" id="sPrivilege">
                                      <option>Privilege</option>
                                      <?php foreach ($PrivList as $pvl) {?>
                                        <option value="<?php echo $pvl->PrivilegeID;?>"><?php echo $pvl->PrivilegeDesc;?></option>
                                      <?php } ?>
                                  </select>
                                  </div>
                                </div>
                                <input type="hidden" name="" id="UserID">
                                <!-- <input type="hidden" name="" id="sPrivilegeID" value="1"> -->
                                <!--  mode 1 = add 2=edit-->
                                <input type="hidden" name="" id="action_mode" value="1"><br>
                                <div class="pull-right">
                                  <input type="button" value="Save" class="btn btn-success" id="btn-register">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal" id="obtcls">Close</button>
                                </div>
                                <br><hr>
                              </form>
                          </div>
                     </div>
                </div>
           </div>
           <!--  End Modal Form-->
      </div>
      <!-- container-fluid -->
</div>
