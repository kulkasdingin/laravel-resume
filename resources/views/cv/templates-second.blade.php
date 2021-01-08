@extends('cv.base.base')

@section('header')
<style scoped>
      /*
 *  Draco HTML Template by @flamekaizar
 *  License: Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 */
    h1, h2, h3, h4, h5, h6 {
    font-family: "Playfair Display SC", serif;
    color: #333333; }

    a, p, li {
    font-family: "Lato", Arial, sans-serif;
    color: #4e4e4e;
    font-size: 1em;
    line-height: 1.75em; }

    a:hover {
    text-decoration: none !important;
    color: #333333 !important;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out; }

    .container {
    margin: auto;
    max-width: 662px;
    padding: 0 20px; }

    @media only screen and (max-width: 767px) {
    .intro img {
        display: block;
        margin-left: auto;
        margin-right: auto; }

    footer {
        text-align: center; } }
    .typed-cursor {
    opacity: 1;
    font-weight: 100;
    -webkit-animation: blink 0.7s infinite;
    -moz-animation: blink 0.7s infinite;
    -ms-animation: blink 0.7s infinite;
    -o-animation: blink 0.7s infinite;
    animation: blink 0.7s infinite; }

    @-webkit-keyframes blink {
    0% {
        opacity: 1; }
    50% {
        opacity: 0; }
    100% {
        opacity: 1; } }
    @-moz-keyframes blink {
    0% {
        opacity: 1; }
    50% {
        opacity: 0; }
    100% {
        opacity: 1; } }
    @-ms-keyframes blink {
    0% {
        opacity: 1; }
    50% {
        opacity: 0; }
    100% {
        opacity: 1; } }
    @-o-keyframes blink {
    0% {
        opacity: 1; }
    50% {
        opacity: 0; }
    100% {
        opacity: 1; } }
    .main-nav {
    background: #f4f4f4;
    padding-top: 23px; }
    .main-nav nav ul li a {
        color: #a7a7a7; }
    .main-nav nav ul li.active a {
        color: #4d4d4d; }

    .section.second {
    margin-bottom: 90px; }
    .section .container {
    position: relative; }
    .section .container:after {
        position: absolute;
        left: 20px; }
    .section .container h1 {
        text-transform: uppercase;
        margin-bottom: 30px;
        position: relative; }

    .intro {
    padding: 24px 0px 24px 0px;
    overflow-x: hidden; }
    .intro img {
        width: 81px;
        height: 81px;
        border-radius: 99px; }
    .intro .wrap {
        margin: 30px 0px; }
    .intro h1:before {
        position: absolute;
        left: -220px;
        top: -150px;
        font-size: 270px;
        z-index: -1;
        color: #f4f4f4; }
    .intro h1 span {
        font-size: 47px; }

    .work .work-list {
    margin-left: 0px; }
    .work .work-list li {
        list-style: none;
        font-size: 0.9375em;
        color: #8c8c8c; }
        .work .work-list li a {
        padding-bottom: 5px;
        font-size: 1.1875em;
        font-weight: 700;
        text-decoration: none;
        border-bottom: 1px solid #b3b3b3; }
        .work .work-list li a:hover {
            border-bottom: 1px solid #333333; }

    .award .award-list {
    margin-left: 0px; }
    .award .award-list li:first-child {
        font-size: 0.9375em;
        color: #8c8c8c; }

    .skills .skill-list {
    margin-left: 0px; }
    .skills .skill-list li:first-child {
        font-size: 0.9375em;
        color: #8c8c8c; }

    .quote {
    padding: 20px 0px;
    margin-top: 120px; }
    .quote h1 {
        margin: 100px 0px;
        padding: 40px 20px;
        border: 5px solid #fff;
        color: #fff; }

    footer {
  padding: 50px 0px 0px 0px; }
  footer .social li {
    display: inline;
    margin-left: 20px; }
    footer .social li a {
      font-size: 1.25em;
      color: #999999; }



</style>
@endsection
@section('header')
<head>
	<title>Second Template</title>
	<meta charset="utf-8" />
    <meta name="keywords" content="" />
	<meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href='https://fonts.googleapis.com/css?family=Playfair+Display+SC:700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> 
</head>
@endsection
@section('content')
<cv-template-second><cv-template-second>
@endsection
