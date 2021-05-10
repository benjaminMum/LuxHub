<?php
function home(){
    require_once "view/home.php";
    homeView();
}
function login($logOrRegis){
    if ($logOrRegis!='displayRegister' && $logOrRegis!='displayLogin' ){


    }else{
        require_once "view/login.php";
        loginView($logOrRegis);
    }
}
function lost(){

}