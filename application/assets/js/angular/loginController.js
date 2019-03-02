//link to app.js
app.controller('loginController', ['$scope', function($scope) {

  $scope.loginFacebook = function(){

    FB.login(function(response){
      if(response.authResponse){

        FB.api('/me?fields=id,name', function(response){
          console.log(response);
        });
      }else{
        console.log('error');
      }
    });
  }
}]);
