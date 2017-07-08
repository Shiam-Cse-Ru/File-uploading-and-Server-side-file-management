<?php 
session_start();

session_destroy();
echo"<script>alert('You are logged out')</script>";
echo"<script>window.open('?controller=pages&action=home','_self')</script>";


 ?>