// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'

angular.module('starter.controllers', []);
angular.module('starter.services', []);
angular.module('starter', [
    'ionic', 'starter.controllers','starter.services', 'angular-oauth2','ngResource','ngCordova'
])

    .constant('appConfig', {
        baseUrl: 'http://192.168.0.12:8000/'
    })


    .run(function ($ionicPlatform) {

        $ionicPlatform.ready(function () {
            // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
            // for form inputs)
            if (window.cordova && window.cordova.plugins.Keyboard) {
                cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
            }
            if (window.StatusBar) {
                StatusBar.styleDefault();
            }
        });
    })

    .config(function ($stateProvider,
                      $urlRouterProvider,
                      OAuthProvider,
                      OAuthTokenProvider, appConfig) {


        OAuthProvider.configure({
            baseUrl: appConfig.baseUrl,
            clientId: 'appid01',
            clientSecret: 'secret', // optional
            grantPath: 'oauth/access_token',

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

            .state('login', {
                url: '/login',
                templateUrl: "templates/login.html",
                controller: 'LoginCtrl'
            })

            .state('home', {
                url: '/home',
                templateUrl: "templates/home.html",
                controller: function ($scope) {

                }
            })

            //ABSTRATA

            .state('client', {
                abstract: true,
                url: '/client',
                template: '<ion-nav-view/>'
            })
            .state('client.checkout', {
                cache:false,
                url: '/checkout',
                templateUrl: "templates/client/checkout.html",
                controller: 'ClientCheckoutCtrl'
            })


            .state('client.checkout_item_detail', {
                url: '/checkout/detail/:index',
                templateUrl: "templates/client/checkout_item_detail.html",
                controller: 'ClientCheckoutDetailCtrl'
            })

            .state('client.checkout_successful', {
                cache:false,
                url: '/checkout/successful',
                templateUrl: "templates/client/checkout_successful.html",
                controller: 'ClientCheckoutSuccessfulCtrl'
            })

            .state('client.view_products', {
                url: '/view_products',
                templateUrl: "templates/client/view_products.html",
                controller: 'ClientViewProductsCtrl'
            })
        //
        // For any unmatched url, redirect to /state1
          $urlRouterProvider.otherwise("/login");
    })