  <!-- <body> -->
  <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-1 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>user">Overview </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Reports <span class="sr-only">(current)</span></a>
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
        <main class="col-sm-12 ml-sm-auto col-md-10 pt-3" role="main">
            <h1 class="my-4 text-primary"><?php echo $top; ?> Dashboard</h1>
            
            <section class="row text-center placeholders">
              <div class="col-lg-12">
                  <h4 class="text-secondary"><i class="fa fa-bar-chart text-info" aria-hidden="true"></i> Recently Order Report<hr><br></h4>


                    <?php if (is_array($orderRecently)==true){?>

                      <table class="table table-striped" cellpadding="6" cellspacing="1" style="width:100%" border="0">
                      <tr>
                        <th class="text-secondary">Purchase Date</th>
                        <th class="text-secondary">Order ID</th>
                        <th class="text-secondary">Order Total quantity</th>
                        <th class="text-secondary">Total Price</th>
                        <th class="text-secondary">Product ID</th>
                        <th class="text-secondary">Product Name</th>
                        <th class="text-secondary">Quantity</th>
                        <th class="text-secondary">Product Price</th>
                        <th class="text-secondary">Payment Method</th>
                        <th class="text-secondary">Shipping First Name</th>
                        <th class="text-secondary">Shipping Last Name</th>
                        <th class="text-secondary">Shipping Address1</th>
                        <th class="text-secondary">Shipping Address2</th>
                        <th class="text-secondary">Shipping City</th>
                        <th class="text-secondary">Shipping State</th>
                        <th class="text-secondary">Shipping Postcode</th>
                        <th class="text-secondary">Shipping Country</th>
                        <th class="text-secondary">Shipping Email</th>
                        <th class="text-secondary">Shipping Tel</th>
                      </tr>
                    <?php foreach ($orderRecently as $reportRecently) { ?>
                      <?php switch ($reportRecently->PaymentType) {
                            case 1:
                                   $reportRecently->PaymentType = 'Credit Card';
                            break;
                            case 2:
                                   $reportRecently->PaymentType = 'Paypal';
                            break;
                      }?>
                         <tr>
                                  <td class="text-success">#<?php echo $reportRecently->OrderDate;?></td>
                                  <td class="text-info">#<?php echo $reportRecently->OrderID;?></td>
                                  <td class="text-secondary"><?php echo $reportRecently->OrderQTY;?></td>
                                  <td class="text-secondary">$<?php echo $reportRecently->OrderTotal;?></td>
                                  <td class="text-secondary">#<?php echo $reportRecently->ProductID;?></td>
                                  <td class="text-secondary"><?php echo mb_substr($reportRecently->ProductName,0,40,'utf-8');?>...</td>
                                  <td class="text-secondary"><?php echo $reportRecently->Quantity;?></td>
                                  <td class="text-secondary">$<?php echo $reportRecently->Price;?></td>
                                  <td class="text-secondary"><?php echo $reportRecently->PaymentType;?></td>
                                  <td class="text-secondary"><?php echo $reportRecently->ShippingFirstName;?></td>
                                  <td class="text-secondary"><?php echo $reportRecently->ShippingLastName;?></td>
                                  <td class="text-secondary"><?php echo $reportRecently->ShippingAddress1;?></td>
                                  <td class="text-secondary"><?php echo $reportRecently->ShippingAddress2;?></td>
                                  <td class="text-secondary"><?php echo $reportRecently->ShippingCity;?></td>
                                  <td class="text-secondary"><?php echo $reportRecently->ShippingState;?></td>
                                  <td class="text-secondary"><?php echo $reportRecently->ShippingPostcode;?></td>
                                  <td class="text-secondary"><?php echo $reportRecently->ShippingCountry;?></td>
                                  <td class="text-secondary"><?php echo $reportRecently->ShippingEmail;?></td>
                                  <td class="text-secondary"><?php echo $reportRecently->ShippingTel;?></td>


                         </tr>

                    <?php } ?>
                    <!-- end foreach -->
                  <?php }else{ //end if ?>
                  <div class="col-lg-12" >No order within 2 hours</div>
                  <?php }  ?>
                  <!--end if-->

                    </table>

                  </div>
            </section>
            <br><br>

            <section class="row text-center placeholders">
            <div class="col-lg-12">
                <h4 class="text-secondary"><i class="text-info fa fa-list-alt" aria-hidden="true"></i> Orders Detail Report<hr><br></h4>

                  <?php if (is_array($orderReport)==true){?>
                    <table class="table table-striped" cellpadding="6" cellspacing="1" style="width:100%" border="0">

                    <tr>
                         <th class="text-secondary">Purchase Date</th>
                         <th class="text-secondary">Order ID</th>
                         <th class="text-secondary">Order Total quantity</th>
                         <th class="text-secondary">Total Price</th>
                         <th class="text-secondary">Product ID</th>
                         <th class="text-secondary">Product Name</th>
                         <th class="text-secondary">Quantity</th>
                         <th class="text-secondary">Product Price</th>
                         <th class="text-secondary">Payment Method</th>
                         <th class="text-secondary">Shipping First Name</th>
                         <th class="text-secondary">Shipping Last Name</th>
                         <th class="text-secondary">Shipping Address1</th>
                         <th class="text-secondary">Shipping Address2</th>
                         <th class="text-secondary">Shipping City</th>
                         <th class="text-secondary">Shipping State</th>
                         <th class="text-secondary">Shipping Postcode</th>
                         <th class="text-secondary">Shipping Country</th>
                         <th class="text-secondary">Shipping Email</th>
                         <th class="text-secondary">Shipping Tel</th>
                    </tr>
                  <?php foreach ($orderReport as $report) { ?>
                    <?php switch ($report->PaymentType) {
                          case 1:
                                 $report->PaymentType = 'Credit Card';
                          break;
                          case 2:
                                 $report->PaymentType = 'Paypal';
                          break;
                    }?>
                       <tr>
                                <td class="text-success">#<?php echo $report->OrderDate;?></td>
                                <td class="text-info">#<?php echo $report->OrderID;?></td>
                                <td class="text-secondary"><?php echo $report->OrderQTY;?></td>
                                <td class="text-secondary">$<?php echo $report->OrderTotal;?></td>
                                <td class="text-secondary">#<?php echo $report->ProductID;?></td>
                                <td class="text-secondary"><?php echo mb_substr($report->ProductName,0,40,'utf-8');?>...</td>
                                <td class="text-secondary"><?php echo $report->Quantity;?></td>
                                <td class="text-secondary">$<?php echo $report->Price;?></td>
                                <td class="text-secondary"><?php echo $report->PaymentType;?></td>
                                <td class="text-secondary"><?php echo $report->ShippingFirstName;?></td>
                                <td class="text-secondary"><?php echo $report->ShippingLastName;?></td>
                                <td class="text-secondary"><?php echo $report->ShippingAddress1;?></td>
                                <td class="text-secondary"><?php echo $report->ShippingAddress2;?></td>
                                <td class="text-secondary"><?php echo $report->ShippingCity;?></td>
                                <td class="text-secondary"><?php echo $report->ShippingState;?></td>
                                <td class="text-secondary"><?php echo $report->ShippingPostcode;?></td>
                                <td class="text-secondary"><?php echo $report->ShippingCountry;?></td>
                                <td class="text-secondary"><?php echo $report->ShippingEmail;?></td>
                                <td class="text-secondary"><?php echo $report->ShippingTel;?></td>


                       </tr>

                  <?php } ?>
                  <!-- end foreach -->
                <?php }else{ //end if ?>
                <div class="col-lg-12" >No orders</div>
                <?php }  ?>
                </table>
              </div>
            </section>
        </main>
           <!--  form Add User modal-->

      </div>
      <!-- container-fluid -->
</div>
