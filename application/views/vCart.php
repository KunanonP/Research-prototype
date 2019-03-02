<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="text-dark"><i class="text-info fa fa-opencart fa-3x" aria-hidden="true"></i> Shopping Cart</h3><hr>
      <?php echo form_open('cCart/updatecart'); ?>
      <table cellpadding="6" cellspacing="1" style="width:100%" border="0">
      <tr>
           <th class="text-secondary">Product ID</th>
           <th class="text-secondary">Catgory ID</th>
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
                   <td><i class="fa fa-trash" style="cursor: pointer;" aria-hidden="true" onclick="remove_item('<?=$items['rowid']?>')"></i></td>
           </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
      <tr>
           <td colspan="3"> </td>
           <?php if (isset($items)){ ?>
                <?php if ($items == '') { ?>
                 <?php } else{?><td class="text-success right"><?php echo form_submit('','Update your Cart','class="btn btn-info"');?></td><?php } ?>
            <?php } ?>

      </tr>
      <tr>
           <td colspan="3"> </td>
           <td class="pull-right text-dark"><strong>Total</strong></td>
           <td class="" style="text-align:right"><i class="fa fa-usd text-success"></i> <?php echo $this->cart->format_number($this->cart->total()); ?></td>
      </tr>
      </table>
              <p></p>
              <button type="button" class="pull-left btn btn-secondary" onclick="back()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Shopping</button>
              <button type="button" class="pull-left btn btn-light" onclick="remove_all()">Remove All Items</button>
              <?php if (isset($items)){ ?>
                <?php if (isset($custname)){ ?>
                   <?php if ($custname == '') { ?>
                             <button type="button" class="pull-right btn btn-primary" onclick="<?php echo base_url();?>#" data-toggle="modal" data-target="#sModal">SignIn to Checkout <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                    <?php } else{?><button type="button" class="pull-right right btn btn-primary" onclick="checkout()">Checkout <i class="fa fa-arrow-right" aria-hidden="true"></i></button><?php } ?>
               <?php } ?>
             <?php }else{?><?php }?>
    </div>
    <!-- /.col-lg-9 -->
  </div>
</div>
<!-- /.container -->

<script type="text/javascript">
          function back(){
                    // window.history.back();
                    window.location='home';
          }

         function remove_item(rowid){
                  if (confirm('Remove item ?')) {
                      window.location='remove_cartitem/'+ rowid;
                  }
         }
         function remove_all(){
                   if (confirm('Remove all ?')) {
                       window.location='remove_allitem';
                   }
         }
         function checkout(){
                  window.location='shipping';
         }
</script>
