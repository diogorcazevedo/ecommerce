angular.module('starter.controllers')
    .controller('ClientViewProductsCtrl',[
        '$scope','$state','Product','$ionicLoading','cart',
        function($scope,$state,Product,$ionicLoading,cart) {
            window.localStorage['cart']=JSON.stringify({
                name:'ionic',
                version:'1.1.0'
            });
            $scope.products = [];
            $ionicLoading.show({
                template:'Carregando ...'
            });
            Product.query({},function(data){
                $scope.products = data.data;
                $ionicLoading.hide();
            },function(dataError){
                $ionicLoading.hide();
            });

            $scope.addItem = function(item){
                cart.items.push(item);
                $state.go('client.checkout');
            };
    }]);