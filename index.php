<?php require 'pes_navbar.php'; ?>
<?php require 'pes_lista.php'; ?>
<script>
var app = angular.module("pendientes", ["ngRoute"]);
app.config(function($routeProvider){
    $routeProvider.when("/", {
        templateUrl : "pes_input.php"
    });
});
</script>

