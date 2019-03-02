$(document).ready(function(){

  $('#btn-signIn').click(function(){
      SignIn();
  });

});

function SignIn(){
    // var username = $('#username').val();
    // var password = $('#password').val();
    // var csrf_test_name = $('#csrf_test_name').val();
    // alert(csrf_test_name);
    // console.log(csrf_test_name);
    // var tokenhash = <?php echo json_encode($csrf['hash']); ?>;
    // var tokenname = <?php echo json_encode($csrf['name']); ?>;
    //console.log('validated '+ username + password);
         $.ajax({
           url:'login',
           data:$('#formsignin').serialize(),
           method:"POST"
         })
         .done(function(data){
          //   alert('res'+data);
          //  console.log(data);
           if (data.trim() == 'false'){

              alert('!username or pw incorect');
           }else {
             switch (data.trim()) {
                case '':
                        //  window.location='account';
                         location.reload();
                break;

                case '1':
                        //  window.location='account';
                         location.reload();
                break;

                case '2':
                          // window.location='#';
                          // redirect('#','refresh');
                          location.reload();
                break;

                case '3':
                        // window.location='#';
                        location.reload();
                        // redirect('');
                break;
             }
           }
          //  $('#UserList').html(data);
           $('#sModal').modal('hide');
           $('body').removeClass('modal-open');
           $('.modal-backdrop').remove();
           location.reload();
         })
         .fail(function(jqXHR, textStatus){
             alert('Error:'+ jqXHR +' '+ textStatus);
         });

}
