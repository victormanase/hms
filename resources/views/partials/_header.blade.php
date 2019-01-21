<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HMRS @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


   <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css')}}">

  <!--skins-->
 <link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">

  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{asset('bower_components/fullcalendar/dist/fullcalendar.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/fullcalendar/dist/fullcalendar.print.min.css')}}" media="print">
  <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">


  <link rel="stylesheet" href="{{asset('css/parsley.css')}}">

  <script src="{{asset('js/sweetAlert.min.js')}}"></script>


  <style>
    #loader1{
    visibility:hidden;
    }
    </style>

  
  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
</head>
