// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', ['ionic','starter.controllers','angular-oauth2'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if(window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
})

.config(function($stateProvider,$urlRouterProvider,OAuthProvider,OAuthTokenProvider){

        OAuthProvider.configure({
            baseUrl: 'http://localhost/ecommerce/public/',
            clientId: 'appid01',
            clientSecret: 'secret', // optional
            grantPath:'/oauth/access_token'
        });

        OAuthTokenProvider.configure({
            name: 'token',
            options: {
                secure: false
            }
        });


        //
        // Now set up the states
        $stateProvider

            .state('login',{
                url:'/login',
                templateUrl:"templates/login.html",
                controller: 'LoginCtrl'
            })

            .state('home',{
                url:'/home',
                templateUrl:"templates/home.html",
                controller: function($scope){

                }
            });

        //
        // For any unmatched url, redirect to /state1
      //  $urlRouterProvider.otherwise("/");
});