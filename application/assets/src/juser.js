$(document).ready(function(){
  userlist();


  $('#btn-register').click(function(){
      register();
  });

  $('#btn-register2').click(function(){
      register2();
  });

  $('#btn-signIn').click(function(){
      SignIn();
  });

  $('#clk-Product').click(function(){
      showProduct();
  });

});
// show ADD new user popup modal
  function Addnewuser(){
       $('#myModalLabel').text('ADD NEW USER');
  }

  function showProduct(){
      var prod_ID = $('#prod_ID').val();
      console.log('Product ID# '+ prod_ID);
      $.ajax({
        url:'product',                                       //route
        data:{prod_ID:prod_ID},
        method:"GET"
      })
      .done(function(pResult) {
          console.log('done');
          // window.location='product';
          //  $('#prod_page').html(pResult);

      })
      .fail(function(jqXHR, textStatus){

          alert('Error:'+ jqXHR +' '+ textStatus);

      });
  }

//Edit user popup
function EditLine(UserID,Firstname,Lastname,Addr1,Addr2,City,State,Postcode,Country,Username,Password,Email,Tel,Privilege){
     $('#myModalLabel').text('EDIT USER');
     $('#sFirstname').val(Firstname);
     $('#sLastname').val(Lastname);
     $('#sAddress1').val(Addr1);
     $('#sAddress2').val(Addr2);
     $('#sCity').val(City);
     $('#sState').val(State);
     $('#sPostcode').val(Postcode);
     $('#sCountry').val(Country);
     $('#sUsername').val(Username);
     $('#sPassword').val(Password);
     $('#sEmail').val(Email);
     $('#sTel').val(Tel);
     $('#UserID').val(UserID);
     $('#action_mode').val(2);
     $('#sPrivilege option[value='+Privilege+']').attr('selected','selected');

}

function SignIn(){


         $.ajax({
           url:'login',
           data:$('#formsignin').serialize(),
           method:"POST"
         })
         .done(function(data){
           if (data.trim() == 'false'){
              alert('Incorrect username or password! Please try again.');
           }else {

           }
           switch (data.trim()) {
              case '': //customer
                      location.reload();
              break;

              case '1': //customer
                      //  window.location = 'home';
                      location.reload();
              break;

              case '2': //admin
                      // window.location = 'user';
                      location.reload();
              break;

              case '3': //super admin
                      // window.location = 'user';
                      location.reload();
              break;
           }

         })
         .fail(function(jqXHR, textStatus){
             alert('Error:'+ jqXHR +' '+ textStatus);
         });

}


// show userlist
function userlist(){
  var fristname_f = $('#fristname_f').val();
  var lastname_f = $('#lastname_f').val();
  var email_f = $('#email_f').val();

      $.ajax({
        url:'user_list',                                       //route
        data:{fristname_f:fristname_f,lastname_f:lastname_f,email_f:email_f},
        method:"GET"
      })
      .done(function(tResult) {

           $('#UserList').html(tResult);

      })
      .fail(function(jqXHR, textStatus){

          alert('Error:'+ jqXHR +' '+ textStatus);

      });
}
//register
function register(){

      if ($('#sFirstname').val().length == 0) {
          $('#sFirstname').focus();
      }

     else if ($('#sLastname').val().length == 0) {
              $('#sLastname').focus();
            }

     else if ($('#sAddress1').val().length == 0) {
              $('#sAddress1').focus();
            }
    else if ($('#sAddress2').val().length == 0) {
             $('#sAddress2').focus();
            }

     else if ($('#sCity').val().length == 0) {
              $('#sCity').focus();
              }

     else if ($('#sState').val().length == 0) {
              $('#sState').focus();
              }

     else if ($('#sPostcode').val().length == 0) {
              $('#sPostcode').focus();
              }

      else if ($('#sCountry').val().length == 0) {
              $('#sCountry').focus();
              }

     else if ($('#sUsername').val().length == 0) {
              $('#sUsername').focus();
            }

     else if ($('#sPassword').val().length == 0){
              $('#sPassword').focus();
            }

     else if ($('#sEmail').val().length == 0) {
              $('#sEmail').focus();
            }

     else if ($('#sTel').val().length == 0){
              $('#sTel').focus();

      }else{
            var UserID = $('#UserID').val();
            var sFirstname = $('#sFirstname').val();
            var sLastname = $('#sLastname').val();
            var sAddress1 = $('#sAddress1').val();
            var sAddress2 = $('#sAddress2').val();
            var sCity = $('#sCity').val();
            var sState = $('#sState').val();
            var sPostcode = $('#sPostcode').val();
            var sCountry = $('#sCountry').val();
            var sUsername = $('#sUsername').val();
            var sPassword = $('#sPassword').val();
            var sEmail = $('#sEmail').val();
            var sTel = $('#sTel').val();
            var sPrivilege = $('#sPrivilege').val();
            var action_mode = $('#action_mode').val();

            $.ajax({
              url:'save',
              data:{UserID:UserID,
                sPrivilege:sPrivilege,
                sFirstname:sFirstname,
                sLastname:sLastname,
                sAddress1:sAddress1,
                sAddress2:sAddress2,
                sCity:sCity,
                sState:sState,
                sPostcode:sPostcode,
                sCountry:sCountry,
                sUsername:sUsername,
                sPassword:sPassword,
                sEmail:sEmail,
                sTel:sTel,
                action_mode:action_mode},
              method:"POST"
            })
            .done(function(tResult) {
                  console.log('done');                        //check processing
                  if (tResult == 'error') {
                      alert('!Cannot to save.');
                  }else{
                    // clear form
                    $('#sFirstname').val('');
                    $('#sLastname').val('');
                    $('#sAddress1').val('');
                    $('#sAddress2').val('');
                    $('#sCity').val('');
                    $('#sState').val('');
                    $('#sPostcode').val('');
                    $('#sCountry').val('');
                    $('#sUsername').val('');
                    $('#sPassword').val('');
                    $('#sEmail').val('');
                    $('#sTel').val('');
                    $('#sPrivilege').val();
                    $('#action_mode').val(1);
                    // close popup form
                     $('#userform').modal('hide');
                     $('body').removeClass('modal-open');
                     $('.modal-backdrop').remove();
                  //  $('#obtcls').click();
                    //update user grid
                    userlist();
                  }

            })
            .fail(function(jqXHR, textStatus){
                alert('Error:'+ jqXHR +' '+ textStatus);
            });
      }
}
//Delete User
 function DeleteUser(UserID,Fristname){
      if (confirm('Are you sure to delete user ' + Fristname)) {
            $.ajax({
              url:'remove',
              data:{UserID:UserID,Fristname:Fristname},
              method:"GET"
            })
            .done(function(tResult) {
                 if (tResult == 'error') {
                     alert('!Cannot delete user.');
                 }else{
                     userlist();
                 }
            })
            .fail(function(jqXHR, textStatus){
                alert('Error:'+ jqXHR +' '+ textStatus);
            });
      }

}

function register2(){

      if ($('#sFirstname').val().length == 0) {
          $('#sFirstname').focus();
          alert('Firstname missing');
      }

     else if ($('#sLastname').val().length == 0) {
              $('#sLastname').focus();
              alert('Lastname missing');
            }
            else if ($('#sAddress1').val().length == 0) {
                     $('#sAddress1').focus();
                     alert('Address1 missing');
                   }
            else if ($('#sAddress2').val().length == 0) {
                    $('#sAddress2').focus();
                    alert('Address2 missing');
                   }

            else if ($('#sCity').val().length == 0) {
                     $('#sCity').focus();
                       alert('City missing');
                     }

            else if ($('#sState').val().length == 0) {
                     $('#sState').focus();
                     alert('State missing');
                     }

            else if ($('#sPostcode').val().length == 0) {
                     $('#sPostcode').focus();
                     alert('Postcode missing');
                     }

             else if ($('#sCountry').val().length == 0) {
                     $('#sCountry').focus();
                     alert('Country missing');
                     }

            else if ($('#sUsername').val().length == 0) {
                     $('#sUsername').focus();
                     alert('Username missing');
                   }

            else if ($('#sPassword').val().length == 0){
                     $('#sPassword').focus();
                     alert('Password missing');
                   }

            else if ($('#sEmail').val().length == 0) {
                     $('#sEmail').focus();
                     alert('Email missing');
                   }

            else if ($('#sTel').val().length == 0){
                     $('#sTel').focus();
                     alert('Tel missing');

             }else{
                   console.log('validate done');                      //validate process
                   var UserID = $('#UserID').val();
                   var sFirstname = $('#sFirstname').val();
                   var sLastname = $('#sLastname').val();
                   var sAddress1 = $('#sAddress1').val();
                   var sAddress2 = $('#sAddress2').val();
                   var sCity = $('#sCity').val();
                   var sState = $('#sState').val();
                   var sPostcode = $('#sPostcode').val();
                   var sCountry = $('#sCountry').val();
                   var sUsername = $('#sUsername').val();
                   var sPassword = $('#sPassword').val();
                   var sEmail = $('#sEmail').val();
                   var sTel = $('#sTel').val();
                   var sPrivilege = $('#sPrivilege').val();
                   var action_mode = $('#action_mode').val();
                   console.log(action_mode);                          //check mode 1 add or 2 edit
                   console.log('firstname: ' + sFirstname + ' lastname: ' + sLastname + ' username: ' + sUsername + ' password: ' +  sPassword + ' Email: '+ sEmail + ' Tel: ' + sTel + sPrivilege);                     //check dob and gender parameter
                   $.ajax({
                     url:'save',
                     data:{UserID:UserID,
                       sPrivilege:sPrivilege,
                       sFirstname:sFirstname,
                       sLastname:sLastname,
                       sAddress1:sAddress1,
                       sAddress2:sAddress2,
                       sCity:sCity,
                       sState:sState,
                       sPostcode:sPostcode,
                       sCountry:sCountry,
                       sUsername:sUsername,
                       sPassword:sPassword,
                       sEmail:sEmail,
                       sTel:sTel,
                       action_mode:action_mode},
                     method:"post"
                   })
                   .done(function(tResult) {
                         console.log('done');                        //check processing
                         if (tResult == 'error') {
                             alert('!Cannot to save.');
                         }else{
                           // clear form
                           $('#sFirstname').val('');
                           $('#sLastname').val('');
                           $('#sAddress1').val('');
                           $('#sAddress2').val('');
                           $('#sCity').val('');
                           $('#sState').val('');
                           $('#sPostcode').val('');
                           $('#sCountry').val('');
                           $('#sUsername').val('');
                           $('#sPassword').val('');
                           $('#sEmail').val('');
                           $('#sTel').val('');
                           $('#sPrivilege').val();
                           $('#action_mode').val(1);
          // close popup form
          $('#userform').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
          alert('Thank you ' + sFirstname + ', your account successfully created !');
          window.location = 'home';
          }
        })
        .fail(function(jqXHR, textStatus){
            alert('Error:'+ jqXHR +' '+ textStatus);
        });
      }
}
