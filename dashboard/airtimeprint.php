<?php
session_start();
require('../core/conn.php');
if(isset($_GET['id'])){
?>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><? echo $web['name']; ?> Receipt- <?php echo $web['name']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="keywords" content="">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
           <link rel="stylesheet" href="../upload/veriylogo.jpg">
     <link rel="icon" sizes="180x180" href="../upload/veriylogo.jpg">
    <link rel="icon" type="image/png" sizes="32x32" href="../upload/veriylogo.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="../upload/veriylogo.jpg">
        <style>       
@font-face {
    font-family: 'Roboto';
    src: url("../fonts/Roboto-Light.eot");
    src: local("Roboto Light"), local("Roboto-Light"), url("../fonts/Roboto-Light.eot?#iefix") format("embedded-opentype"), url("../fonts/Roboto-Light.woff2") format("woff2"), url("../fonts/Roboto-Light.woff") format("woff"), url("../fonts/Roboto-Light.ttf") format("truetype");
    font-weight: 300;
    font-style: normal;
}

@font-face {
    font-family: 'Roboto';
    src: url("../fonts/Roboto-Regular.eot");
    src: local("Roboto"), local("Roboto-Regular"), url("../fonts/Roboto-Regular.eot?#iefix") format("embedded-opentype"), url("../fonts/Roboto-Regular.woff2") format("woff2"), url("../fonts/Roboto-Regular.woff") format("woff"), url("../fonts/Roboto-Regular.ttf") format("truetype");
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'Roboto';
    src: url("../fonts/Roboto-Medium.eot");
    src: local("Roboto Medium"), local("Roboto-Medium"), url("../fonts/Roboto-Medium.eot?#iefix") format("embedded-opentype"), url("../fonts/Roboto-Medium.woff2") format("woff2"), url("../fonts/Roboto-Medium.woff") format("woff"), url("../fonts/Roboto-Medium.ttf") format("truetype");
    font-weight: 500;
    font-style: normal;
}

@font-face {
    font-family: 'Roboto';
    src: url("../fonts/Roboto-Bold.eot");
    src: local("Roboto Bold"), local("Roboto-Bold"), url("../fonts/Roboto-Bold.eot?#iefix") format("embedded-opentype"), url("../fonts/Roboto-Bold.woff2") format("woff2"), url("../fonts/Roboto-Bold.woff") format("woff"), url("../fonts/Roboto-Bold.ttf") format("truetype");
    font-weight: bold;
    font-style: normal;
}


/** 02.0 - RESET */

body {
    font-family: "Roboto", sans-serif;
    font-size: 14px;
    line-height: 1.7;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    position: relative;
    background: #e0e8f3;
    min-width: 320px;
    color: #495463;
}

img {
    max-width: 100%;
}

h1,
h2,
h3,
h4,
h5,
h6,
p,
ul:not([class]),
ol,
table {
    margin-bottom: 12px;
}

h1:last-child,
h2:last-child,
h3:last-child,
h4:last-child,
h5:last-child,
h6:last-child,
p:last-child,
ul:not([class]):last-child,
ol:last-child,
table:last-child {
    margin-bottom: 0;
}

h1,
h2,
h3,
h4,
h5,
h6,
label {
    font-weight: 400;
    line-height: 1.3;
}

h1,
h2,
h4,
h5 {
    color: #253992;
}

h1,
.h1 {
    font-size: 1.37em;
}

h2,
.h2 {
    font-size: 1.3em;
}

h3,
.h3 {
    font-size: 1.2em;
}

h4,
.h4 {
    font-size: 1.15em;
}

h5,
.h5 {
    font-size: 1.07em;
}

h6,
.h6 {
    font-size: .93em;
}

p {
    font-size: 1em;
}

p.lead {
    font-size: 1.15em;
}

p.large {
    font-size: 1.1em;
}

@media (min-width: 576px) {
    h1,
    .h1 {
        font-size: 1.714em;
    }
    h2,
    .h2 {
        font-size: 1.62em;
    }
    h3,
    .h3 {
        font-size: 1.52em;
    }
    h4,
    .h4 {
        font-size: 1.29em;
    }
    p.large {
        font-size: 1.2em;
    }
}

@media (min-width: 768px) {
    body {
        font-size: 15px;
    }
}

h1 span,
h2 span,
h3 span,
h4 span,
h5 span,
h6 span,
p span {
    color: #2c80ff;
}

ul,
ol {
    padding: 0px;
    margin: 0px;
}

ul li,
ol li {
    list-style: none;
}

.relative {
    position: relative;
}

p+h1,
p+h2,
p+h3,
p+h4,
p+h5,
p+h4,
ul+h1,
ul+h2,
ul+h3,
ul+h4,
ul+h5,
ul+h4,
ol+h1,
ol+h2,
ol+h3,
ol+h4,
ol+h5,
ol+h4,
table+h1,
table+h2,
table+h3,
table+h4,
table+h5,
table+h4 {
    margin-top: 30px;
}

ul+p:not([class]),
ul+ul:not([class]),
ul+ol:not([class]),
ol+ol:not([class]),
ol+ul:not([class]),
ul+table:not([class]),
ol+table:not([class]) {
    margin-top: 35px;
}

b,
b {
    font-weight: 500;
}

blockquote {
    font-size: 1.3em;
    background: #e0e8f3;
    padding: 20px 30px;
    font-style: italic;
}

a {
    outline: 0;
    transition: all 0.5s;
    color: #1c65c9;
}

a:link,
a:visited {
    text-decoration: none;
}

a:hover,
a:focus,
a:active {
    outline: 0;
    color: #253992;
}

p a {
    color: #1c65c9;
}

p a:hover,
p a:focus {
    color: #2c80ff;
    box-shadow: 0 1px 0 currentColor;
}


/* 03.0 - PLUGINS */


/** DatePicker @Plugins */

.datepicker-dropdown:before {
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
}

.datepicker-dropdown.datepicker-orient-bottom:before {
    top: -7px;
    border-bottom: 6px solid #b1becc;
}

.datepicker-dropdown.datepicker-orient-top:before {
    bottom: -7px;
    border-top: 6px solid #b1becc;
}

.datepicker-dropdown.datepicker-orient-left:before {
    left: 7px;
}

.datepicker-switch {
    padding: 6px 0;
    font-weight: 500;
    transition: all .4s;
}

.datepicker.dropdown-menu {
    border: none;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    padding: 10px;
    border: 1px solid #b1becc;
    min-width: 250px;
}

.datepicker.dropdown-menu td {
    padding: 5px;
    min-width: 32px;
    font-size: 13px;
    font-weight: 400;
    font-family: "Roboto", sans-serif;
}

.datepicker table {
    width: 100%;
}

.datepicker table thead tr th {
    padding: 6px 0;
    font-size: 13px;
    font-weight: 500;
    transition: all .4s;
    color: #758698;
}

.datepicker table thead tr th:hover {
    background: #eaf3fc !important;
}

.datepicker table thead tr th.dow {
    color: #495463;
    font-size: 11px;
    padding: 2px 0;
    text-transform: uppercase;
}

.datepicker table tfoot tr th {
    padding: 6px 0;
    font-weight: 500;
    transition: all .4s;
    color: #3c3c3c;
    text-transform: uppercase;
    font-size: 11px;
}

.datepicker table tfoot tr th:hover {
    background: #eaf3fc !important;
}

.datepicker table tr th {
    transition: all .4s;
}

.datepicker table tr td {
    transition: all .4s;
    color: #8599c6;
}

.datepicker table tr td.day:hover {
    background: #eaf3fc;
}

.datepicker table tr td.old,
.datepicker table tr td.new {
    color: rgba(133, 153, 198, 0.4);
}

.datepicker table tr td.old.year,
.datepicker table tr td.new.year {
    color: inherit;
}

.datepicker table tr td.today,
.datepicker table tr td.today.range {
    background: rgba(37, 57, 146, 0.3);
    color: #495463;
}

.datepicker table tr td.range {
    background: #eaf3fc;
}

.datepicker table tr td.range-start {
    border-radius: 4px 0 0 4px;
}

.datepicker table tr td.range-end {
    border-radius: 0 4px 4px 0;
}

.datepicker table tr td.range-start.range-end {
    border-radius: 4px;
}

.datepicker table tr td span {
    transition: all .4s;
}

.datepicker table tr td span:hover,
.datepicker table tr td span.focused {
    background: #eaf3fc;
}

.datepicker table tr td.today:hover:hover,
.datepicker table tr td.today.range:hover:hover,
.datepicker table tr td.range:hover,
.datepicker table tr td.selected,
.datepicker table tr td.selected.disabled,
.datepicker table tr td.selected.disabled:hover,
.datepicker table tr td.selected:hover,
.datepicker table tr td.selected:hover:hover,
.datepicker table tr td.active.active,
.datepicker table tr td.active.active:hover:hover,
.datepicker table tr td span.active.active,
.datepicker table tr td span.active.active:hover:hover {
    background: #2c80ff;
    color: #fff;
}

.ui-timepicker {
    text-align: left;
}

.ui-timepicker-container {
    font-family: "Roboto", sans-serif;
    font-size: 1em;
    border: 1px solid #b1becc;
    border-top: none;
    border-radius: 0 0 4px 4px;
}

.ui-timepicker-container .ui-state-hover {
    background: rgba(230, 239, 251, 0.3);
    border: none;
    font-weight: 400;
    border-radius: 4px;
}

.ui-timepicker-container li a {
    padding: 3px 14px;
    letter-spacing: 0.04em;
    transition: none;
    border: none;
    cursor: pointer;
    font-weight: 400;
}

.modal .has-timepicker {
    z-index: 1099;
}

.has-timepicker .time-picker:focus {
    border-radius: 4px 4px 0 0;
}

.input-daterange input {
    text-align: left;
}

.input-daterange input:last-child {
    border-radius: 4px;
}

.date-picker-range {
    position: relative;
}

.date-picker,
.time-picker {
    font-size: 12px;
}

@media (min-width: 480px) {
    .date-picker,
    .time-picker {
        font-size: 14px;
    }
    .datepicker.dropdown-menu {
        min-width: 270px;
    }
}


/** DropZone @Plugins */

.dz-clickable {
    border: 1px dashed #b1becc;
    background: #e0e8f3;
    border-radius: 4px;
    padding: 50px 0 20px;
    text-align: center;
}

.dz-sm {
    padding: 40px 0 20px;
}

.dz-message {
    padding-bottom: 30px;
}

.dz-message span {
    display: block;
    color: rgba(117, 134, 152, 0.6);
}

.dz-message-text {
    font-size: 13px;
}

.dz-message-or {
    font-size: 16px;
    margin-bottom: 4px;
    text-transform: uppercase;
}

.dz-sm .dz-message {
    padding-bottom: 20px;
}

.dz-preview {
    margin-top: 20px;
    margin-left: 10px;
    margin-right: 10px;
    position: relative;
    width: 120px;
    display: inline-block;
}

.dz-image img {
    border-radius: 4px;
    border: 1px solid #d3e0f3;
}

.dz-filename {
    font-size: 13px;
}

.dz-progress {
    opacity: 1;
    z-index: 1000;
    pointer-events: none;
    position: absolute;
    height: 10px;
    top: 55px;
    left: 50%;
    width: 80px;
    transform: translateX(-50%);
    background: rgba(255, 255, 255, 0.9);
    border-radius: 5px;
    overflow: hidden;
    transition: all .4s;
}

.dz-complete .dz-progress {
    opacity: 0;
}

.dz-upload {
    background: #333;
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    transition: all .3s ease-in-out;
}

.dz-error-message,
.dz-success-message {
    font-size: 13px;
}

.dz-error-mark,
.dz-success-mark {
    position: absolute;
    top: 40px;
    left: 50%;
    transform: translateX(-50%);
    display: none;
}

.dz-error-mark svg,
.dz-success-mark svg {
    height: 40px !important;
    width: 40px !important;
}

.dz-error-mark svg g,
.dz-success-mark svg g {
    stroke-opacity: .7;
    stroke-width: 2;
}

.dz-error-message {
    color: #ff6868;
}

.dz-error-mark g {
    stroke: rgba(255, 104, 104, 0.7) !important;
}

.dz-error .dz-error-mark {
    display: block;
}

.dz-success-message {
    color: #00d285;
}

.dz-success-mark g {
    stroke: rgba(0, 210, 133, 0.7) !important;
}

.dz-success .dz-success-mark {
    display: block;
}


/* Toastr */

#toast-container {
    position: fixed;
    z-index: 999999;
    margin-top: 22px;
    margin-bottom: 16px;
}

.toast-top-center {
    top: 0;
    right: 0;
    width: 100%;
}

.toast-bottom-center {
    bottom: 0;
    right: 0;
    width: 100%;
}

.toast-top-full-width {
    top: 0;
    right: 0;
    width: 100%;
}

.toast-bottom-full-width {
    bottom: 0;
    right: 0;
    width: 100%;
}

.toast-top-left {
    top: 0;
    left: 16px;
}

.toast-top-right {
    top: 0;
    right: 16px;
}

.toast-bottom-right {
    right: 16px;
    bottom: 0;
}

.toast-bottom-left {
    bottom: 0;
    left: 16px;
}

.toast-top-center>div,
.toast-bottom-center>div {
    width: 650px;
    max-width: 90%;
    margin-left: auto;
    margin-right: auto;
}

.toast-top-full-width>div,
.toast-bottom-full-width>div {
    width: 96%;
    margin-left: auto;
    margin-right: auto;
}

.toast {
    background: #fff;
    color: #fff;
    overflow: hidden;
    margin: 0 0 8px;
    padding: 15px 51px 15px 15px;
    width: 300px;
    border-radius: 5px;
    border: none;
    display: flex;
    align-items: center;
    box-shadow: 0px 2px 18px 2px rgba(73, 84, 99, 0.25);
    background: #090d1c;
    position: relative;
}

.toast-close-button {
    cursor: pointer;
    position: absolute;
    text-align: left;
    right: 15px;
    text-indent: -9999em;
    overflow: hidden;
    background: none;
    border-radius: 50%;
    border: none;
    height: 36px;
    width: 36px;
    transition: all .3s;
}

.toast-close-button:after {
    position: absolute;
    content: '\e646';
    font-family: 'themify';
    top: 0;
    right: -1px;
    text-indent: 0;
    display: block;
    font-size: 13px;
    line-height: 38px;
    height: 36px;
    width: 36px;
    text-align: center;
    color: #fff;
    transition: all .3s;
}

.toast-close-button:hover,
.toast-close-button:focus {
    background: rgba(224, 232, 243, 0.15);
    box-shadow: none;
    outline: none;
}

.toast-message {
    position: relative;
    flex-grow: 1;
    font-size: 13px;
    line-height: 17px;
    display: flex;
    align-items: center;
    padding-left: 10px;
    min-height: 30px;
}

.toast-message-icon {
    display: inline-block;
    font-size: 14px;
    margin-right: 15px;
    margin-left: -10px;
    text-align: center;
    height: 30px;
    width: 30px;
    line-height: 30px;
    border-radius: 50%;
}

.toast-message-icon.ti-alert:before {
    position: relative;
    top: -2px;
}

.toast-info .toast-message-icon {
    background: #1babfe;
}

.toast-warning .toast-message-icon {
    background: #ffc100;
}

.toast-success .toast-message-icon {
    background: #00d285;
}

.toast-error .toast-message-icon {
    background: #ff6868;
}

@media (min-width: 576px) {
    .toast-message {
        font-size: 14px;
        line-height: 18px;
    }
}


/* Sweat Alert */

.swal-footer {
    text-align: center;
    padding: 13px 16px 40px;
}

.swal-text {
    padding-left: 30px;
    padding-right: 30px;
    text-align: center;
    line-height: 1.8;
}

.swal-icon:first-child {
    margin-top: 45px;
}

.swal-icon--success__ring {
    border-color: rgba(0, 210, 133, 0.4);
}

.swal-icon--success__line {
    background: #00d285;
}

.swal-icon--info {
    border-color: rgba(27, 171, 254, 0.4);
}

.swal-icon--info:before,
.swal-icon--info:after {
    background: #1babfe;
}

.swal-icon--warning {
    border-color: rgba(255, 193, 0, 0.2);
}

.swal-icon--warning__body,
.swal-icon--warning__dot {
    background: #ffc100;
}

.swal-icon--error {
    border-color: rgba(255, 104, 104, 0.4);
}

.swal-icon--error__line {
    background: #ff6868;
}

.swal-title {
    color: #253992;
    font-size: 24px;
}

.swal-content {
    padding: 0 45px;
}

.swal-content__input {
    border-radius: 4px;
    border: 1px solid #d2dde9;
    width: 100%;
    padding: 10px 15px;
    line-height: 20px;
    font-size: .9em;
    color: rgba(73, 84, 99, 0.7);
    transition: all .4s;
}

.swal-content__input::-webkit-input-placeholder {
    color: #758698;
}

.swal-content__input::-moz-placeholder {
    color: #758698;
}

.swal-content__input:-ms-input-placeholder {
    color: #758698;
}

.swal-content__input:-moz-placeholder {
    color: #758698;
}

.swal-content__input:focus {
    box-shadow: none;
    outline: none;
    border-color: #b1becc;
}

.swal-button {
    line-height: 24px;
    padding: 9px 24px;
    transition: all .4s ease;
    background: #2c80ff;
}

.swal-button:not([disabled]):hover {
    background: #005fee;
}

.swal-button--confirm {
    background: #00d285;
}

.swal-button--confirm:not([disabled]):hover {
    background: #00b975;
}

.swal-button--cancel {
    color: #fff;
    background: #758698;
}

.swal-button--cancel:not([disabled]):hover {
    background: #68798b;
}

.swal-button:focus {
    box-shadow: none;
}

@-webkit-keyframes pulseWarning {
    0% {
        border-color: rgba(255, 193, 0, 0.2);
    }
    to {
        border-color: rgba(255, 193, 0, 0.7);
    }
}

@keyframes pulseWarning {
    0% {
        border-color: rgba(255, 193, 0, 0.2);
    }
    to {
        border-color: rgba(255, 193, 0, 0.7);
    }
}

p table.dataTable {
    width: 100%;
    overflow-x: scroll;
}

p table.dataTable th:before,
p table.dataTable th:after {
    display: none !important;
}

p table.dataTable th>span {
    position: relative;
    display: inline-block;
}

p table.dataTable th>span:before,
p table.dataTable th>span:after {
    position: absolute;
    top: 0;
    opacity: 0.3;
}

p table.dataTable th>span:before {
    content: '\2191';
    right: -20px;
}

p table.dataTable th>span:after {
    content: '\2193';
    right: -13px;
}

p table.dataTable th.sorting_asc span:before {
    opacity: 1;
}

p table.dataTable th.sorting_desc span:after {
    opacity: 1;
}

.dataTables_filter label {
    margin-bottom: 0;
}

div.dataTables_wrapper div.dataTables_filter {
    text-align: center;
}

div.dataTables_wrapper div.dataTables_filter label {
    width: 100%;
    position: relative;
}

div.dataTables_wrapper div.dataTables_filter label:before {
    position: absolute;
    height: 36px;
    width: 30px;
    text-align: center;
    line-height: 36px;
    font-family: themify;
    content: '\e610';
    color: #abbbd9;
    font-size: 15px;
}

div.dataTables_wrapper div.dataTables_filter input {
    width: 100%;
    padding: 8px 30px;
    line-height: 20px;
    font-size: 13px;
    border: none;
    background: transparent;
    height: auto;
}

div.dataTables_wrapper div.dataTables_filter input:focus {
    border: none;
    background: transparent;
    outline: none;
    box-shadow: none;
}

div.dataTables_wrapper div.dataTables_filter input:-moz-placeholder {
    opacity: 1;
    color: #abbbd9;
}

div.dataTables_wrapper div.dataTables_filter input:-ms-input-placeholder {
    opacity: 1;
    color: #abbbd9;
}

div.dataTables_wrapper div.dataTables_filter input::-webkit-input-placeholder {
    opacity: 1;
    color: #abbbd9;
}

div.dataTables_wrapper div.dataTables_length {
    text-align: center;
}

div.dataTables_wrapper div.dataTables_length label {
    color: #8599c7;
}

div.dataTables_wrapper div.dataTables_length select {
    margin-left: 10px;
}

div.dataTables_wrapper div.dataTables_info {
    color: #23406c;
    padding: 8px 0 0;
    text-align: center;
}

div.dataTables_wrapper div.dataTables_paginate {
    padding: 20px 0 0;
}

div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    justify-content: center;
}

@media (min-width: 576px) {
    div.dataTables_wrapper div.dataTables_info {
        padding-top: 18px;
    }
    div.dataTables_wrapper div.dataTables_filter {
        text-align: left;
    }
    div.dataTables_wrapper div.dataTables_filter input {
        text-align: left;
    }
    div.dataTables_wrapper div.dataTables_length {
        text-align: right;
    }
    div.dataTables_wrapper div.dataTables_info {
        text-align: right;
    }
    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        justify-content: flex-start;
    }
}

.data-table {
    width: 100%;
}

.data-table th.dataTables_empty,
.data-table td.dataTables_empty {
    background: #fff;
    border-radius: 4px !important;
    padding: 45px 0 15px;
}

.data-col {
    padding: 20px 10px 20px 0;
    border-bottom: 1px solid #e6effb;
}

.data-table:not(.dt-init) .data-item:last-child .data-col {
    border-bottom: none;
    padding-bottom: 5px;
}

.data-col:last-child {
    padding-right: 0;
}

.data-col .lead {
    font-size: 12px;
    font-weight: 600;
    color: #495463;
    letter-spacing: 0.01em;
    line-height: 1;
    display: block;
    margin-top: 0;
}

.data-col .sub {
    font-size: 10px;
    font-weight: 400;
    color: #758698;
    letter-spacing: 0.01em;
    line-height: 1;
    padding-top: 7px;
    display: block;
}

.data-col .sub-s2 {
    font-size: 12px;
    color: #495463;
    padding-top: 0;
}

.data-col .sub:first-child {
    padding-top: 0;
}

.data-item {
    background: #fff;
    margin-bottom: 3px;
    border-radius: 4px;
    position: relative;
}

.data-head .data-col {
    padding: 0 10px 0 0;
    font-size: 12px;
    line-height: 20px;
    font-weight: 700;
    letter-spacing: 0.1em;
    color: #2c80ff;
    text-transform: uppercase;
    border-bottom: none;
}

.data-state {
    height: 30px;
    width: 30px;
    line-height: 28px;
    margin-right: 12px;
    flex-shrink: 0;
}

.data-state:after {
    display: block;
    font-family: 'themify';
    color: #2c80ff;
    height: 100%;
    width: 100%;
    font-size: 14px;
    border-radius: 50%;
    text-align: center;
    border: 1px solid;
}

.data-state-sm {
    height: 24px;
    width: 24px;
    line-height: 23px;
}

.data-state-sm:after {
    font-size: 12px;
}

.data-state-approved:after {
    content: '\e64c';
    color: #00d285;
    border-color: #00d285;
}

.data-state-pending:after {
    content: '\e6c5';
    color: #ffc100;
    border-color: #ffc100;
}

.data-state-canceled:after {
    content: '\e646';
    color: #ff6868;
    border-color: #ff6868;
}

.data-state-progress:after {
    content: '\e6c6';
    color: #1babfe;
    border-color: #1babfe;
}

.data-state-missing:after {
    content: '\e69c';
    color: #b1becc;
    border-color: #b1becc;
}

.data-details {
    border-radius: 4px;
    padding: 18px 20px;
    border: 1px solid #d2dde9;
}

.data-details>div {
    flex-grow: 1;
    margin-bottom: 18px;
}

.data-details>div:last-child {
    margin-bottom: 0;
}

.data-details-title {
    font-size: 14px;
    font-weight: 600;
    color: #758698;
    line-height: 20px;
    display: block;
}

.data-details-info {
    font-size: 14px;
    font-weight: 400;
    color: #495463;
    line-height: 20px;
    display: block;
    margin-top: 6px;
}

.data-details-info.large {
    font-size: 20px;
}

.data-details-list {
    border-radius: 4px;
    border: 1px solid #d2dde9;
}

.data-details-list li {
    display: block;
}

.data-details-list li:last-child .data-details-des {
    border-bottom: none;
}

.data-details-head {
    font-size: 13px;
    font-weight: 500;
    color: #758698;
    line-height: 20px;
    padding: 15px 20px 2px;
    width: 100%;
}

.data-details-des {
    font-size: 14px;
    color: #495463;
    font-weight: 400;
    line-height: 20px;
    padding: 2px 20px 15px;
    flex-grow: 1;
    border-bottom: 1px solid #d2dde9;
    display: flex;
    justify-content: space-between;
}

.data-details-des .ti:not([data-toggle="tooltip"]),
.data-details-des [class*=fa]:not([data-toggle="tooltip"]) {
    color: #2c80ff;
}

.data-details-des span:last-child:not(:first-child) {
    font-size: 12px;
    color: #758698;
}

.data-details-des small {
    color: #758698;
}

.data-details-des span,
.data-details-des b {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.data-details-docs {
    border-top: 1px solid #d2dde9;
}

.data-details-docs-title {
    color: #495463;
    display: block;
    padding-bottom: 6px;
    font-weight: 400;
}

.data-details-docs>li {
    flex-grow: 1;
    border-bottom: 1px solid #d2dde9;
    border-left: 1px solid #d2dde9;
    padding: 20px;
}

.data-details-docs>li:last-child {
    border-bottom: none;
}

.data-details-alt {
    border-radius: 4px;
    border: 1px solid #d2dde9;
    font-weight: 400;
}

.data-details-alt li {
    line-height: 1.35;
    padding: 15px 20px;
    border-bottom: 1px solid #d2dde9;
}

.data-details-alt li:last-child {
    border-bottom: none;
}

.data-details-alt li div {
    padding: 3px 0;
}

.data-details-date {
    display: block;
    padding-bottom: 4px;
}

.data-doc-list {
    display: flex;
    margin: 0 -5px;
}

.data-doc-list>div {
    margin: 0 5px;
}

.data-doc-item {
    height: 54px;
    width: 70px;
    border-radius: 3px;
    overflow: hidden;
    position: relative;
}

.data-doc-item:hover .data-doc-actions {
    opacity: 1;
}

.data-doc-item-lg {
    width: 180px;
    height: 140px;
}

.data-doc-image {
    position: absolute;
    height: 100%;
    width: 100%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.data-doc-image img {
    width: 100%;
}

.data-doc-actions {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all .3s;
}

.data-doc-actions li {
    margin: 3px;
}

.data-doc-actions li a {
    display: inline-block;
    width: 30px;
    height: 30px;
    font-size: 14px;
    line-height: 31px;
    border-radius: 4px;
    text-align: center;
    color: #fff;
    background: rgba(44, 128, 255, 0.7);
}

.data-doc-actions li a:hover {
    background: rgba(44, 128, 255, 0.9);
}

.data-vr-list {
    display: inline-flex;
    align-items: center;
}

.data-vr-list li {
    display: inline-flex;
    align-items: center;
    margin-right: 18px;
    font-size: 12px;
    font-weight: 500;
}

.data-vr-list li:last-child {
    margin-right: 0;
}

.data-vr-list .data-state {
    margin-right: 9px;
}

.data-action-list {
    display: inline-flex;
}

.data-action-list li {
    padding: 0 5px;
}

.data-action-list li:first-child {
    padding-left: 0;
}

.data-action-list li:last-child {
    padding-right: 0;
}

.data-action-dropdown {
    position: relative;
}

@media (min-width: 576px) {
    .data-details-list>li {
        display: flex;
        align-items: center;
    }
    .data-details-docs {
        width: calc(100% - 190px);
        border-top: none;
    }
    .data-details-head {
        width: 190px;
        padding: 14px 20px;
    }
    .data-details-des {
        border-top: none;
        border-left: 1px solid #d2dde9;
        width: calc(100% - 190px);
        padding: 14px 20px;
    }
}

@media (min-width: 768px) {
    .data-item .lead {
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 0.02em;
    }
    .data-item .sub {
        font-size: 12px;
        letter-spacing: 0.02em;
        padding-top: 7px;
    }
    .data-item .sub-s2 {
        font-size: 13px;
        color: #495463;
    }
    .data-details>div {
        margin-bottom: 0;
    }
    .data-details-head {
        font-size: 14px;
    }
    .data-details-docs {
        display: flex;
    }
    .data-details-docs>li {
        width: 50%;
        border: none;
        border-left: 1px solid #d2dde9;
    }
}

@media (min-width: 992px) {
    .data-details-date {
        padding-bottom: 0;
    }
}

.pagination li {
    margin-right: 8px;
}

.pagination li:last-child {
    margin-right: 0;
}

.pagination li a,
.pagination li span {
    display: inline-block;
    height: 36px;
    min-width: 36px;
    text-align: center;
    line-height: 20px;
    padding: 8px 0;
    border-radius: 4px;
    background: #e0e8f3;
    border: none;
    color: #495463;
    font-weight: 500;
    font-size: 12px;
}

.pagination li a .ti,
.pagination li span .ti {
    position: relative;
    top: 1px;
}

.pagination li.next a,
.pagination li.previous a {
    text-transform: uppercase;
    padding-left: 20px;
    padding-right: 20px;
    font-weight: 400;
}

.pagination li.disabled a.page-link {
    background: #f7fafd;
    color: #92a0ae;
}

.pagination li a:hover,
.pagination li a:focus {
    color: #fff;
    background: #2c80ff;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.07);
}

.pagination li.active span {
    color: #fff;
    background: #2c80ff;
}

.user-list .dt-email,
.user-list .dt-verify,
.user-list .dt-login {
    display: none;
}

.user-list .dt-status-text,
.user-list .dt-status-md {
    display: none;
}

.user-tnx .dt-amount,
.user-tnx .dt-usd-amount,
.user-tnx .dt-account {
    display: none;
}

.user-tnx .dt-type-text,
.user-tnx .dt-type-md {
    display: none;
}

.kyc-list .dt-doc-type,
.kyc-list .dt-doc-front,
.kyc-list .dt-doc-back {
    display: none;
}

.kyc-list .dt-status-sm {
    display: none;
}

.kyc-list .badge {
    min-width: 80px;
}

.admin-tnx .dt-amount,
.admin-tnx .dt-usd-amount,
.admin-tnx .dt-account {
    display: none;
}

.admin-tnx .dt-type-text,
.admin-tnx .dt-type-md {
    display: none;
}

@media (min-width: 420px) {
    .user-list .dt-status-sm {
        display: none;
    }
    .user-list .dt-status-md {
        display: inline-block;
    }
    .user-tnx .dt-type-sm {
        display: none;
    }
    .user-tnx .dt-type-text,
    .user-tnx .dt-type-md {
        display: inline-block;
    }
    .kyc-list .dt-status-sm {
        display: none;
    }
    .kyc-list .dt-status-text,
    .kyc-list .dt-status-md {
        display: inline-block;
    }
    .admin-tnx .dt-type-sm {
        display: none;
    }
    .admin-tnx .dt-type-text,
    .admin-tnx .dt-type-md {
        display: inline-block;
    }
}

@media (min-width: 576px) {
    .user-tnx .dt-amount {
        display: table-cell;
    }
    .admin-tnx .dt-amount {
        display: table-cell;
    }
    .kyc-list .dt-doc-front {
        display: table-cell;
    }
}

@media (min-width: 768px) {
    .user-list .dt-verify {
        display: table-cell;
    }
    .kyc-list .dt-doc-back {
        display: table-cell;
    }
}

@media (min-width: 992px) {
    .user-list .dt-email {
        display: table-cell;
    }
    .user-tnx .dt-account {
        display: table-cell;
    }
    .user-tnx .dt-usd-amount {
        display: table-cell;
    }
    .admin-tnx .dt-account {
        display: table-cell;
    }
    .admin-tnx .dt-usd-amount {
        display: table-cell;
    }
    .kyc-list .dt-doc-type {
        display: table-cell;
    }
}

@media (min-width: 1200px) {
    .user-list .dt-login {
        display: table-cell;
    }
}


/* ScrollBar */

.scroll-wrapper {
    overflow: hidden !important;
    padding: 0 !important;
    position: relative;
}

.scroll-wrapper>.scroll-content {
    border: none !important;
    box-sizing: content-box !important;
    height: auto;
    left: 0;
    margin: 0;
    max-height: none;
    max-width: none !important;
    overflow: scroll !important;
    position: relative !important;
    top: 0;
    width: auto !important;
}

.scroll-wrapper>.scroll-content::-webkit-scrollbar {
    height: 0;
    width: 0;
}

.scroll-element {
    display: none;
}

.scroll-element,
.scroll-element div {
    box-sizing: content-box;
}

.scroll-element.scroll-x.scroll-scrollx_visible,
.scroll-element.scroll-y.scroll-scrolly_visible {
    display: block;
}

.scroll-element .scroll-bar,
.scroll-element .scroll-arrow {
    cursor: default;
}

.scroll-textarea {
    border: 1px solid #cccccc;
    border-top-color: #999999;
}

.scroll-textarea>.scroll-content {
    overflow: hidden !important;
}

.scroll-textarea>.scroll-content>textarea {
    border: none !important;
    box-sizing: border-box;
    height: 100% !important;
    margin: 0;
    max-height: none !important;
    max-width: none !important;
    overflow: scroll !important;
    outline: none;
    padding: 2px;
    position: relative !important;
    top: 0;
    width: 100% !important;
}

.scroll-textarea>.scroll-content>textarea::-webkit-scrollbar {
    height: 0;
    width: 0;
}


/*************** SIMPLE INNER SCROLLBAR ***************/

.scrollbar-inner>.scroll-element,
.scrollbar-inner>.scroll-element div {
    border: none;
    margin: 0;
    padding: 0;
    position: absolute;
    z-index: 10;
}

.scrollbar-inner>.scroll-element div {
    display: block;
    height: 100%;
    left: 0;
    top: 0;
    width: 100%;
}

.scrollbar-inner>.scroll-element.scroll-x {
    bottom: 2px;
    height: 8px;
    left: 0;
    width: 100%;
}

.scrollbar-inner>.scroll-element.scroll-y {
    height: 100%;
    right: 2px;
    top: 0;
    width: 8px;
}

.scrollbar-inner>.scroll-element .scroll-element_outer {
    overflow: hidden;
}

.scrollbar-inner>.scroll-element .scroll-element_outer,
.scrollbar-inner>.scroll-element .scroll-element_track,
.scrollbar-inner>.scroll-element .scroll-bar {
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
}

.scrollbar-inner>.scroll-element .scroll-element_track,
.scrollbar-inner>.scroll-element .scroll-bar {
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
    filter: alpha(opacity=40);
    opacity: 0.4;
}

.scrollbar-inner>.scroll-element .scroll-element_track {
    background-color: #e0e0e0;
}

.scrollbar-inner>.scroll-element .scroll-bar {
    background-color: #c2c2c2;
}

.scrollbar-inner>.scroll-element:hover .scroll-bar {
    background-color: #919191;
}

.scrollbar-inner>.scroll-element.scroll-draggable .scroll-bar {
    background-color: #919191;
}


/* update scrollbar offset if both scrolls are visible */

.scrollbar-inner>.scroll-element.scroll-x.scroll-scrolly_visible .scroll-element_track {
    left: -12px;
}

.scrollbar-inner>.scroll-element.scroll-y.scroll-scrollx_visible .scroll-element_track {
    top: -12px;
}

.scrollbar-inner>.scroll-element.scroll-x.scroll-scrolly_visible .scroll-element_size {
    left: -12px;
}

.scrollbar-inner>.scroll-element.scroll-y.scroll-scrollx_visible .scroll-element_size {
    top: -12px;
}


/** Buttons  @Elements */

.btn {
    position: relative;
    color: #fff;
    font-weight: 500;
    padding: 8px 20px;
    font-size: 13px;
    line-height: 24px;
    letter-spacing: 0.01em;
    border-radius: 4px;
    min-width: 160px;
    border: 1px solid;
    transition: all .4s ease;
}

.btn:hover,
.btn:focus,
.btn:active {
    box-shadow: none !important;
    outline: none !important;
}

.btn:disabled {
    opacity: .4;
}

.btn .ti,
.btn [class*=fa-] {
    line-height: 24px;
}

.btn span {
    display: inline-block;
}

.btn .ti+span,
.btn [class*=fa-]+span {
    margin-left: 14px;
}

.btn span+.ti,
.btn [class*=fa-]+span {
    margin-left: 14px;
}

.btn-icon,
.btn-auto {
    min-width: 0;
}

.btn-between {
    display: inline-flex;
    justify-content: space-between;
}

.btn-between .ti {
    margin-left: 20px;
}

.btn-progress:after {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    height: 20px;
    width: 20px;
    border: 2px solid #fff;
    border-left-color: transparent;
    border-bottom-color: transparent;
    content: '';
    animation: spinCenter 800ms linear infinite;
}

.btn-lg {
    padding: 10px 20px;
}

.btn-xl {
    padding: 15px 20px;
}

.btn-sm {
    padding: 7px 8px;
    line-height: 18px;
}

.btn-sm .ti,
.btn-sm [class*=fa-] {
    line-height: 18px;
    position: relative;
    top: 1px;
}

.btn-sm.btn-icon {
    padding: 7px 10px;
}

.btn-xs {
    padding: 3px 12px 4px;
    font-size: 11px;
    line-height: 19px;
    text-transform: none;
    letter-spacing: 0.025em;
}

.btn-xs .ti,
.btn-xs [class*=fa-] {
    font-size: 14px;
    line-height: 18px;
    position: relative;
    top: 2px;
}

.btn-xs .ti+span,
.btn-xs [class*=fa-]+span {
    margin-left: 14px;
}

.btn-xs span+.ti,
.btn-xs [class*=fa-] {
    margin-left: 14px;
}

.btn-xs.btn-icon {
    padding: 3px 8px 4px;
}

.btn-circle {
    padding-left: 0;
    padding-right: 0;
    border-radius: 50%;
    width: 42px;
    padding: 8px 5px 8px;
}

.btn-circle.btn-sm {
    width: 36px;
    padding: 7px 5px 6px;
}

.btn-circle.btn-xs {
    width: 30px;
    padding: 4px 5px 3px;
}

.btn-circle .ti,
.btn-circle [class*=fa-] {
    margin-right: 0;
}

.btn-block {
    display: block;
    width: 100%;
}

.btn-facebook {
    background: #3b5998;
    border-color: #3b5998;
    box-shadow: 0px 2px 18px 2px rgba(59, 89, 152, 0.25);
}

.btn-facebook:hover,
.btn-facebook:focus,
.btn-facebook:active {
    color: #fff;
    background: #344e86;
    border-color: #344e86;
}

.btn-google {
    background: #d85040;
    border-color: #d85040;
    box-shadow: 0px 2px 18px 2px rgba(216, 80, 64, 0.25);
}

.btn-google:hover,
.btn-google:focus,
.btn-google:active {
    color: #fff;
    background: #d33d2b;
    border-color: #d33d2b;
}

.btn-light {
    background: #758698;
    border-color: #758698;
}

.btn-light:disabled,
.btn-light:hover,
.btn-light:focus,
.btn-light:active,
.btn-light.active {
    color: #fff;
    background: #68798b;
    border-color: #68798b;
}

.btn-light-alt {
    color: #495463;
    background: #e6effb;
    border-color: #e6effb;
}

.btn-light-alt:disabled,
.btn-light-alt:hover,
.btn-light-alt:focus,
.btn-light-alt:active,
.btn-light-alt.active {
    color: #fff;
    background: #495463;
    border-color: #495463;
}

.btn-dark {
    background: #495463;
    border-color: #495463;
}

.btn-dark:disabled,
.btn-dark:hover,
.btn-dark:focus,
.btn-dark:active,
.btn-dark.active {
    color: #fff;
    background: #3e4854;
    border-color: #3e4854;
}

.btn-dark-alt {
    color: #495463;
    background: #e1e4e9;
    border-color: #e1e4e9;
}

.btn-dark-alt:disabled,
.btn-dark-alt:hover,
.btn-dark-alt:focus,
.btn-dark-alt:active,
.btn-dark-alt.active {
    color: #fff;
    background: #495463;
    border-color: #495463;
}

.btn-lighter {
    color: #495463;
    background: #e6effb;
    border-color: #e6effb;
}

.btn-lighter:disabled,
.btn-lighter:hover,
.btn-lighter:focus,
.btn-lighter:active,
.btn-lighter.active {
    color: #495463;
    background: #d9e7f9;
    border-color: #d9e7f9;
}

.btn-lighter-alt {
    color: #758698;
    background: #e6effb;
    border-color: #e6effb;
}

.btn-lighter-alt:disabled,
.btn-lighter-alt:hover,
.btn-lighter-alt:focus,
.btn-lighter-alt:active,
.btn-lighter-alt.active {
    color: #495463;
    background: #d0e1f7;
    border-color: #d0e1f7;
}

.btn-warning {
    background: #ffc100;
    border-color: #ffc100;
}

.btn-warning:disabled,
.btn-warning:hover,
.btn-warning:focus,
.btn-warning:active {
    color: #fff;
    background: #e6ae00;
    border-color: #e6ae00;
}

.btn-warning-alt {
    color: #cc9a00;
    background: #fff8e0;
    border-color: #fff8e0;
}

.btn-warning-alt:disabled,
.btn-warning-alt:hover,
.btn-warning-alt:focus,
.btn-warning-alt:active,
.btn-warning-alt.active {
    color: #fff;
    background: #ffc100;
    border-color: #ffc100;
}

.btn-primary {
    background: #2c80ff;
    border-color: #2c80ff;
}

.btn-primary:disabled,
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active {
    color: #fff;
    background: #005fee;
    border-color: #005fee;
}

.btn-primary-alt {
    color: #004ec5;
    background: #c5dcff;
    border: #c5dcff;
}

.btn-primary-alt:disabled,
.btn-primary-alt:hover,
.btn-primary-alt:focus,
.btn-primary-alt:active,
.btn-primary-alt.active {
    color: #fff;
    background: #2c80ff;
    border-color: #2c80ff;
}

.btn-secondary {
    background: #253992;
    border-color: #253992;
}

.btn-secondary:disabled,
.btn-secondary:hover,
.btn-secondary:focus,
.btn-secondary:active {
    color: #fff;
    background: #20317e;
    border-color: #20317e;
}

.btn-secondary-alt {
    color: #101941;
    background: #9daae6;
    border-color: #9daae6;
}

.btn-secondary-alt:disabled,
.btn-secondary-alt:hover,
.btn-secondary-alt:focus,
.btn-secondary-alt:active,
.btn-secondary-alt.active {
    color: #fff;
    background: #253992;
    border-color: #253992;
}

.btn-info {
    background: #1babfe;
    border-color: #1babfe;
}

.btn-info:disabled,
.btn-info:hover,
.btn-info:focus,
.btn-info:active {
    color: #fff;
    background: #02a2fe;
    border-color: #02a2fe;
}

.btn-info-alt {
    color: #1babfe;
    background: white;
    border-color: white;
}

.btn-info-alt:disabled,
.btn-info-alt:hover,
.btn-info-alt:focus,
.btn-info-alt:active,
.btn-info-alt.active {
    color: #fff;
    background: #1babfe;
    border-color: #1babfe;
}

.btn-success {
    background: #00d285;
    border-color: #00d285;
}

.btn-success:disabled,
.btn-success:hover,
.btn-success:focus,
.btn-success:active {
    color: #fff;
    background: #00b975;
    border-color: #00b975;
}

.btn-success-alt {
    color: #00b975;
    background: #e1fff4;
    border-color: #e1fff4;
}

.btn-success-alt:disabled,
.btn-success-alt:hover,
.btn-success-alt:focus,
.btn-success-alt:active,
.btn-success-alt.active {
    color: #fff;
    background: #00d285;
    border-color: #00d285;
}

.btn-danger {
    background: #ff6868;
    border-color: #ff6868;
}

.btn-danger:disabled,
.btn-danger:hover,
.btn-danger:focus,
.btn-danger:active {
    color: #fff;
    background: #ff4f4f;
    border-color: #ff4f4f;
}

.btn-danger-alt {
    color: #ff6868;
    background: #ffd8d8;
    border-color: #ffd8d8;
}

.btn-danger-alt:disabled,
.btn-danger-alt:hover,
.btn-danger-alt:focus,
.btn-danger-alt:active,
.btn-danger-alt.active {
    color: #fff;
    background: #ff6868;
    border-color: #ff6868;
}

.btn-outline {
    background: transparent;
    box-shadow: none;
}

.btn-outline:hover,
.btn-outline:focus,
.btn-outline:active {
    background: transparent !important;
}

.btn-outline.btn-dark {
    color: #495463;
    border-color: #d2dde9;
}

.btn-outline.btn-dark:hover,
.btn-outline.btn-dark:focus,
.btn-outline.btn-dark:active {
    color: #495463 !important;
    border-color: #b1becc;
}

.btn-outline.btn-light {
    color: #758698;
    border-color: #c9cfd6;
}

.btn-outline.btn-light:hover,
.btn-outline.btn-light:focus,
.btn-outline.btn-light:active {
    color: #68798b !important;
    border-color: #92a0ae;
}

.btn-outline.btn-lighter {
    color: #495463;
    border-color: #e6effb;
}

.btn-outline.btn-lighter:hover,
.btn-outline.btn-lighter:focus,
.btn-outline.btn-lighter:active {
    color: #3e4854 !important;
    border-color: #bad3f4;
}

.btn-outline.btn-warning {
    color: #ffc100;
}

.btn-outline.btn-warning:hover,
.btn-outline.btn-warning:focus,
.btn-outline.btn-warning:active {
    color: #cc9a00 !important;
    border-color: #cc9a00;
}

.btn-outline.btn-primary {
    color: #2c80ff;
}

.btn-outline.btn-primary:hover,
.btn-outline.btn-primary:focus,
.btn-outline.btn-primary:active {
    color: #1371ff !important;
    border-color: #1371ff;
}

.btn-outline.btn-secondary {
    color: #253992;
    border-color: #253992;
}

.btn-outline.btn-secondary:hover,
.btn-outline.btn-secondary:focus,
.btn-outline.btn-secondary:active {
    color: #0b112c !important;
    border-color: #0b112c;
}

.btn-outline.btn-info {
    color: #1babfe;
}

.btn-outline.btn-info:hover,
.btn-outline.btn-info:focus,
.btn-outline.btn-info:active {
    color: #02a2fe !important;
    border-color: #02a2fe;
}

.btn-outline.btn-success {
    color: #00d285;
}

.btn-outline.btn-success:hover,
.btn-outline.btn-success:focus,
.btn-outline.btn-success:active {
    color: #00b975 !important;
    border-color: #00b975;
}

.btn-outline.btn-danger {
    color: #ff6868;
}

.btn-outline.btn-danger:hover,
.btn-outline.btn-danger:focus,
.btn-outline.btn-danger:active {
    color: #ff4f4f !important;
    border-color: #ff4f4f;
}

.btn-outline.btn-facebook .fab {
    color: #3b5998;
}

.btn-outline.btn-google .fab {
    color: #d85040;
}

.btn-absolute {
    border: none;
    background-color: transparent;
    position: absolute;
    padding: 0 15px;
    color: #2c80ff;
}

.btn-absolute-right {
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}

.btn-grp {
    display: inline-flex;
    align-items: center;
    flex-wrap: wrap;
    margin-top: -10px;
    margin-bottom: -10px;
    margin-left: -10px;
    margin-right: -10px;
}

.btn-grp-between {
    display: flex;
    justify-content: space-between;
}

.btn-grp>li {
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    padding-right: 10px;
}

.btn-grp.no-gutters {
    margin-left: 0;
    margin-right: 0;
}

.btn-grp.no-gutters>li {
    padding-left: 0;
    padding-right: 0;
}

.btn-grp.no-gutters>li a {
    border-radius: 0;
}

.btn-grp.no-gutters>li:first-child .btn {
    border-radius: 4px 0 0 4px;
}

.btn-grp.no-gutters>li:last-child .btn {
    border-radius: 0 4px 4px 0;
}

@media (min-width: 480px) {
    .btn {
        padding: 8px 20px;
        font-size: 14px;
    }
    .btn-lg {
        padding: 10px 20px;
    }
    .btn-sm {
        padding: 7px 18px;
    }
    .btn-xs {
        padding: 3px 12px 4px;
        font-size: 11px;
    }
    .btn-xs.btn-icon {
        padding: 3px 8px 4px;
    }
    .btn-xl {
        padding: 18px 30px;
    }
    .btn-circle {
        padding-left: 5px;
        padding-right: 5px;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .btn-xl {
        padding: 18px 20px;
    }
}

@keyframes spinCenter {
    0% {
        transform: translate(-50%, -50%) rotate(0deg);
    }
    100% {
        transform: translate(-50%, -50%) rotate(360deg);
    }
}

.link {
    font-size: 12px;
    display: inline-flex;
    align-items: center;
    font-family: "Roboto", sans-serif;
    font-weight: 600;
    transition: all .2s;
}

.link:hover {
    font-family: #253992;
}

.link .ti {
    font-size: 14px;
    margin-right: 8px;
}

.link-thin {
    font-weight: 400;
}

.link-ucap {
    text-transform: uppercase;
    letter-spacing: 0.1em;
}

.link-dim {
    opacity: .7;
}

.link-dim:hover {
    opacity: 1;
}

.link-light {
    color: #758698;
}

.link-light:hover,
.link-light:focus,
.link-light:active {
    color: #5d6d7d;
}

.link-primary {
    color: #2c80ff;
}

.link-primary:hover,
.link-primary:focus,
.link-primary:active {
    color: #0063f8;
}

.link-danger {
    color: #ff6868;
}

.link-danger:hover,
.link-danger:focus,
.link-danger:active {
    color: #ff3535;
}


/** Forms @Element */

.input-item {
    position: relative;
    padding-bottom: 20px;
}

.input-item-sm {
    padding-bottom: 6px;
}

.input-item-label {
    font-size: 14px;
    font-weight: 500;
    color: #495463;
    line-height: 1.1;
    margin-bottom: 12px;
    display: inline-block;
}

.input-sub-label {
    text-transform: uppercase;
    font-weight: 500;
    font-size: 13px;
    color: #6e81a9;
}

.input-wrap {
    position: relative;
}

.input-bordered {
    border-radius: 4px;
    border: 1px solid #d2dde9;
    width: 100%;
    padding: 10px 15px;
    line-height: 20px;
    font-size: .9em;
    color: rgba(73, 84, 99, 0.7);
    transition: all .4s;
}

.input-bordered::-webkit-input-placeholder {
    color: #758698;
}

.input-bordered::-moz-placeholder {
    color: #758698;
}

.input-bordered:-ms-input-placeholder {
    color: #758698;
}

.input-bordered:-moz-placeholder {
    color: #758698;
}

.input-bordered:focus {
    box-shadow: none;
    outline: none;
    border-color: #b1becc;
}

.input-bordered:disabled {
    background: rgba(230, 239, 251, 0.2);
}

.input-bordered~.error {
    color: #ff6868;
    margin-bottom: 0;
    position: relative;
    top: 7px;
}

.validate-modern .input-bordered~.error {
    position: absolute;
    right: -10px;
    top: -15px;
    background: #ff6868;
    color: #fff;
    font-size: 11px;
    line-height: 18px;
    padding: 2px 10px;
    border-radius: 2px;
}

.validate-modern .input-bordered~.error:after {
    position: absolute;
    content: '';
    height: 0;
    width: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid #ff6868;
    border-bottom: 5px solid transparent;
    bottom: -5px;
    left: 3px;
}

.input-solid {
    border-radius: 4px;
    border: none;
    width: 100%;
    padding: 10px 15px;
    line-height: 20px;
    font-size: .9em;
    color: #6e81a9;
    background: #e0e8f3;
    border: 1px solid #e0e8f3;
    transition: all .4s;
}

.input-solid::-webkit-input-placeholder {
    color: #6e81a9;
}

.input-solid::-moz-placeholder {
    color: #6e81a9;
}

.input-solid:-ms-input-placeholder {
    color: #6e81a9;
}

.input-solid:-moz-placeholder {
    color: #6e81a9;
}

.input-solid:focus {
    box-shadow: none;
    outline: none;
    border-color: #b1becc;
}

.validate-modern .input-solid~.error {
    position: absolute;
    right: -10px;
    top: -15px;
    background: #ff6868;
    color: #fff;
    font-size: 11px;
    line-height: 18px;
    padding: 2px 10px;
    border-radius: 2px;
}

.validate-modern .input-solid~.error:after {
    position: absolute;
    content: '';
    height: 0;
    width: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid #ff6868;
    border-bottom: 5px solid transparent;
    bottom: -5px;
    left: 3px;
}

.input-textarea {
    height: 136px;
    display: block;
    resize: none;
}

.input-textarea-sm {
    height: 80px;
}

.input-file {
    opacity: 0;
    height: 42px;
}

.input-file-icon {
    position: absolute;
    top: 0;
    right: 0;
    height: 44px;
    width: 44px;
    line-height: 44px;
    text-align: center;
}

.input-file~label {
    position: absolute;
    top: 0;
    left: 0;
    height: 42px;
    border-radius: 4px;
    border: 1px solid #d2dde9;
    width: 100%;
    padding: 10px 15px;
    line-height: 20px;
    font-size: 14px;
    color: #495463;
    transition: all .4s;
}

.input-switch {
    display: none;
}

.input-switch~label:not(.error) {
    line-height: 20px;
    padding-top: 5px;
    padding-bottom: 5px;
    cursor: pointer;
    padding-left: 70px;
    min-height: 30px;
    min-width: 50px;
    border-radius: 12px;
    margin-bottom: 0;
    display: flex;
    align-items: center;
    position: relative;
    color: #495463;
}

.input-switch~label:not(.error).no-text {
    padding-left: 56px;
}

.input-switch~label:not(.error):before,
.input-switch~label:not(.error):after {
    position: absolute;
    content: '';
    transition: all .4s;
}

.input-switch~label:not(.error):before {
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    height: 30px;
    width: 56px;
    border-radius: 15px;
    background: #d3e0f3;
}

.input-switch~label:not(.error):after {
    left: 29px;
    top: 50%;
    transform: translateY(-50%);
    height: 24px;
    width: 24px;
    border-radius: 50%;
    background: #fff;
}

.input-switch~label:not(.error) span {
    transition: all .4s;
    opacity: 1;
}

.input-switch~label:not(.error) span.over {
    position: absolute;
    left: 70px;
}

.input-switch~label:not(.error) span:last-child {
    opacity: 0;
}

.input-switch:disabled~label {
    opacity: .5;
}

.input-switch:checked~label:before {
    background: #2c80ff;
}

.input-switch:checked~label:after {
    left: 3px;
}

.input-switch:checked~label span {
    opacity: 0;
}

.input-switch:checked~label span:last-child {
    opacity: 1;
}

.input-switch-alt~label {
    padding-right: 70px;
    padding-left: 0;
}

.input-switch-alt~label:before {
    left: auto;
    right: 0;
}

.input-switch-alt~label:after {
    left: auto;
    right: 3px;
}

.input-switch-alt~label span {
    text-align: right;
}

.input-switch-alt~label span.over {
    left: auto;
    right: 70px;
}

.input-switch-alt:checked~label:after {
    left: auto;
    right: 29px;
}

.input-switch-sm~label:not(.error) {
    min-height: 24px;
    line-height: 20px;
    padding-top: 2px;
    padding-bottom: 2px;
    padding-left: 62px;
}

.input-switch-sm~label:not(.error).no-text {
    padding-left: 50px;
}

.input-switch-sm~label:not(.error):before {
    height: 24px;
    width: 50px;
    border-radius: 12px;
}

.input-switch-sm~label:not(.error):after {
    left: 29px;
    height: 18px;
    width: 18px;
}

.input-switch-sm:checked~label:after {
    left: auto;
    left: 3px;
}

.input-switch-sm.input-switch-alt~label {
    padding-right: 60px;
}

.input-switch-sm.input-switch-alt~label:before {
    left: auto;
    right: 0;
}

.input-switch-sm.input-switch-alt~label:after {
    left: auto;
    right: 3px;
}

.input-switch-sm.input-switch-alt~label span {
    text-align: right;
}

.input-switch-sm.input-switch-alt~label span.over {
    left: auto;
    right: 60px;
}

.input-switch-sm.input-switch-alt:checked~label:after {
    left: auto;
    right: 25px;
}

.input-switch-middle {
    height: 44px;
    display: flex;
    align-items: center;
}

.input-checkbox,
.input-radio {
    position: absolute;
    opacity: 0;
    height: 1px;
    width: 1px;
}

.input-checkbox~label:not(.error),
.input-radio~label:not(.error) {
    font-size: 14px;
    line-height: 30px;
    margin-bottom: 0;
    color: #495463;
    padding-left: 42px;
    position: relative;
    cursor: pointer;
    transition: all .4s;
    text-transform: capitalize;
    display: block;
}

.input-checkbox~label:not(.error):before,
.input-checkbox~label:not(.error):after,
.input-radio~label:not(.error):before,
.input-radio~label:not(.error):after {
    position: absolute;
    top: 0;
    left: 0;
    height: 30px;
    width: 30px;
    border-radius: 3px;
    transition: all .4s;
}

.input-checkbox~label:not(.error):before,
.input-radio~label:not(.error):before {
    content: '';
    border: 2px solid #d2dde9;
}

.input-checkbox~label:not(.error):after,
.input-radio~label:not(.error):after {
    line-height: 30px;
    text-align: center;
    font-family: themify;
    content: '\e64c';
    font-size: 14px;
    font-weight: 900;
    color: #fff;
    background: #2c80ff;
    opacity: 0;
}

.input-checkbox:disabled~label:not(.error),
.input-radio:disabled~label:not(.error) {
    opacity: .5;
}

.input-checkbox:checked~label:not(.error):after,
.input-radio:checked~label:not(.error):after {
    opacity: 1;
}

.input-checkbox~.error,
.input-radio~.error {
    position: absolute;
    left: 1px;
    color: #fff;
    font-size: 12px;
    bottom: 100%;
    background: #ff6868;
    padding: 5px 10px;
    z-index: 1;
    border-radius: 2px;
    white-space: nowrap;
}

.input-checkbox~.error:before,
.input-radio~.error:before {
    position: absolute;
    content: '';
    height: 0;
    width: 0;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-top: 6px solid #ff6868;
    bottom: -6px;
    left: 8px;
}

.validate-modern .input-checkbox~.error,
.validate-modern .input-radio~.error {
    position: absolute;
    left: -8px;
    top: -26px;
    bottom: auto;
    background: #ff6868;
    color: #fff;
    font-size: 11px;
    line-height: 18px;
    padding: 2px 10px;
    border-radius: 2px;
    transform: translate(0, 0);
}

.validate-modern .input-checkbox~.error:after,
.validate-modern .input-radio~.error:after {
    position: absolute;
    content: '';
    height: 0;
    width: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid #ff6868;
    border-bottom: 5px solid transparent;
    bottom: -5px;
    left: 3px;
}

.validate-modern .input-checkbox~.error:before,
.validate-modern .input-radio~.error:before {
    display: none;
}

.input-checkbox-sm~label:not(.error),
.input-radio-sm~label:not(.error) {
    font-size: 12px;
    line-height: 20px;
    padding-left: 30px;
}

.input-checkbox-sm~label:not(.error):before,
.input-checkbox-sm~label:not(.error):after,
.input-radio-sm~label:not(.error):before,
.input-radio-sm~label:not(.error):after {
    height: 20px;
    width: 20px;
}

.input-checkbox-sm~label:not(.error):after,
.input-radio-sm~label:not(.error):after {
    line-height: 20px;
    font-size: 10px;
}

.input-checkbox-sm~.error,
.input-radio-sm~.error {
    left: -3px;
}

.input-checkbox-md~label:not(.error),
.input-radio-md~label:not(.error) {
    font-size: 14px;
    line-height: 24px;
    padding-left: 36px;
}

.input-checkbox-md~label:not(.error):before,
.input-checkbox-md~label:not(.error):after,
.input-radio-md~label:not(.error):before,
.input-radio-md~label:not(.error):after {
    height: 24px;
    width: 24px;
}

.input-checkbox-md~label:not(.error):after,
.input-radio-md~label:not(.error):after {
    line-height: 24px;
    font-size: 10px;
}

.input-checkbox-md~.error,
.input-radio-md~.error {
    left: -2px;
}

.input-radio~label:not(.error):before,
.input-radio~label:not(.error):after {
    border-radius: 50%;
}

.input-radio~label:not(.error):after {
    content: '';
    height: 16px;
    width: 16px;
    top: 7px;
    left: 7px;
}

.input-radio:checked~label:not(.error):before {
    border-color: #2c80ff;
}

.input-radio-md~label:not(.error):after {
    height: 14px;
    width: 14px;
    top: 5px;
    left: 5px;
}

.input-radio-sm~label:not(.error):after {
    height: 12px;
    width: 12px;
    top: 4px;
    left: 4px;
}

.input-with-hint {
    padding-right: 75px;
}

.input-hint {
    position: absolute;
    right: 2px;
    top: 9px;
    color: #758698;
    font-size: 13px;
    font-weight: 500;
    z-index: 1;
    padding: 0 10px;
    background: #fff;
}

.input-hint span {
    color: #2c80ff;
}

.input-hint-lg {
    font-size: 18px;
}

.input-hint-sap {
    border-left: 1px solid #d2dde9;
}

.input-note {
    font-size: 12px;
    line-height: 1.5em;
    color: #758698;
    font-weight: 400;
    display: block;
    padding: 8px 0 0;
}

.input-note span {
    color: #2c80ff;
}

.input-note-icon {
    padding-left: 15px;
    position: relative;
}

.input-note [class*=fa] {
    position: absolute;
    left: 0;
    top: 7.2px;
}

.input-note-danger {
    color: #ff6868;
}

.input-icon {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 15px;
    opacity: .7;
}

.input-icon-lg {
    font-size: 13px;
    line-height: 15px;
    left: 12px;
}

.input-icon-left {
    left: 15px;
}

.input-icon-left~.input-solid,
.input-icon-left+.input-bordered {
    padding-left: 35px;
}

.input-icon-right {
    right: 15px;
    left: auto;
}

.input-icon-right~.input-solid,
.input-icon-right+.input-bordered {
    padding-right: 30px;
}

.checkbox-list li {
    margin-right: 50px;
}

.checkbox-list li:last-child {
    margin-right: 0;
}

@media (min-width: 576px) {
    .input-icon-lg {
        font-size: 18px;
        line-height: 15px;
        left: 20px;
    }
    .input-icon-left~.input-solid,
    .input-icon-left+.input-bordered {
        padding-left: 50px;
    }
    .input-icon-right {
        right: 15px;
        left: auto;
    }
    .input-icon-right~.input-solid,
    .input-icon-right+.input-bordered {
        padding-right: 50px;
    }
    .input-bordered~.error,
    .input-solid~.error,
    .input-checkbox~.error,
    .input-radio~.error {
        font-size: 12px;
    }
}

.simple-switch {
    flex-shrink: 0;
    min-height: 24px;
    width: 50px;
    border-radius: 12px;
    display: inline-block;
    background: #d3e0f3;
    position: relative;
}

.simple-switch:after {
    position: absolute;
    content: '';
    transition: all .4s;
    left: 3px;
    top: 3px;
    height: 18px;
    width: 18px;
    border-radius: 50%;
    background: #fff;
}

.simple-switch.active {
    background: #2c80ff;
}

.simple-switch.active:after {
    left: calc(100% - 21px);
}

.steps ul {
    display: flex;
}

.steps ul li {
    flex-grow: 1;
}

.steps .current-info {
    display: none;
}

.actions ul {
    display: flex;
    margin: -10px;
    padding-top: 20px;
}

.actions ul li {
    padding: 10px;
}

.actions ul li:first-child {
    order: 1;
}

.actions ul li a {
    position: relative;
    color: #fff;
    font-weight: 500;
    padding: 12px 20px;
    font-size: 14px;
    line-height: 24px;
    letter-spacing: 0.01em;
    border-radius: 4px;
    border: 1px solid;
    transition: all .4s ease;
    border-color: #2c80ff;
    background: #2c80ff;
}

.actions ul li.disabled {
    display: none;
}

.wizard-simple .steps {
    margin-bottom: 20px;
}

.wizard-simple .steps ul li {
    position: relative;
    padding-bottom: 5px;
}

.wizard-simple .steps ul li h5 {
    border: none;
    padding: 0 0 6px 0;
    letter-spacing: 0.02em;
    font-size: 13px;
    text-transform: uppercase;
    font-weight: 500;
    color: #758698;
}

.wizard-simple .steps ul li .number {
    font-size: 13px;
    color: #758698;
    font-weight: 700;
}

.wizard-simple .steps ul li:after {
    position: absolute;
    height: 2px;
    width: 0;
    left: 0;
    bottom: 0;
    background: #2c80ff;
    content: '';
    transition: all .4s;
}

.wizard-simple .steps ul li.done:after,
.wizard-simple .steps ul li.current:after {
    width: 100%;
}

.wizard-simple .steps ul li.done h5,
.wizard-simple .steps ul li.done .number,
.wizard-simple .steps ul li.current h5,
.wizard-simple .steps ul li.current .number {
    color: #2c80ff;
}

.wizard-simple .steps ul li.current~.done:after {
    width: 0;
}

.wizard-simple .steps ul li.current~.done h5,
.wizard-simple .steps ul li.current~.done .number {
    color: #758698;
}

.wizard-simple .steps .current-info {
    display: none;
}

.wizard-kyc .steps {
    margin-bottom: 30px;
}

.wizard-kyc .steps ul {
    margin: 0 -15px;
}

.wizard-kyc .steps ul li {
    position: relative;
    padding: 0 15px;
}

.wizard-kyc .steps ul li .number {
    display: none;
}

.wizard-kyc .steps ul li .step-number {
    font-size: 18px;
    transition: all .4s;
}

.wizard-kyc .steps ul li .step-head {
    display: block;
}

.wizard-kyc .steps ul li .step-head-text h4 {
    color: #253992;
    padding: 7px 0;
    font-size: 1.19em;
}

.wizard-kyc .steps ul li .step-head-text p {
    color: #758698;
    font-size: 0.9em;
    line-height: 1.5;
}

.wizard-kyc .steps ul li.done .step-number,
.wizard-kyc .steps ul li.current .step-number {
    color: #fff;
    border-color: #2c80ff;
    background: #2c80ff;
}

.wizard-kyc .steps ul li.current~.done .step-number {
    color: #758698;
    border-color: #b1becc;
    background: none;
}

.wizard-kyc .steps .current-info {
    display: none;
}

select {
    width: 100%;
    line-height: 20px;
    padding: 10px 20px 10px 15px;
    border: none;
    border-radius: 4px;
    height: 42px !important;
    font-size: 14px;
    color: #6e81a9;
    background: transparent;
    vertical-align: top;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

select:focus {
    outline: none;
}

select.select-sm {
    height: 37px;
}

.select-wrapper {
    position: relative;
}

.select-wrapper:after {
    position: absolute;
    height: 42px;
    width: 44px;
    line-height: 44px;
    text-align: center;
    top: 50%;
    right: 0;
    font-family: 'themify';
    transform: translateY(-50%);
    content: '\e64b';
    font-size: 12px;
}

.select2-container .select2-selection--single .select2-selection__rendered,
.select2-container .select2-selection--multiple .select2-selection__rendered {
    line-height: 20px;
    font-size: .9em;
    padding: 10px 40px 10px 15px;
    font-weight: 400;
}

.select2-container .select2-selection--multiple .select2-selection__rendered {
    padding-top: 6px;
    padding-bottom: 6px;
}

.select2-container--flat .select2-selection--single .select2-selection__rendered,
.select2-container--flat .select2-selection--multiple .select2-selection__rendered {
    color: #495463;
}

.select-sm+.select2-container .select2-selection--single .select2-selection__rendered,
.select-sm+.select2-container .select2-selection--multiple .select2-selection__rendered {
    padding: 7px 38px 7px 15px;
}

.select2-container .select2-selection--single,
.select2-container .select2-selection--multiple {
    height: 42px;
}

.select-sm+.select2-container .select2-selection--single,
.select-sm+.select2-container .select2-selection--multiple {
    height: 36px;
}

.select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered,
.select2-container[dir="rtl"] .select2-selection--multiple .select2-selection__rendered {
    padding-right: 30px;
    padding-left: 40px;
}

.select-sm+.select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered,
.select-sm+.select2-container[dir="rtl"] .select2-selection--multiple .select2-selection__rendered {
    padding-right: 18px;
    padding-left: 37px;
}

.select2-container--flat .select2-results__option--highlighted[aria-selected] {
    background: rgba(230, 239, 251, 0.7);
    color: #495463;
}

.select2-container--flat .select2-results__option[aria-selected=true] {
    background: rgba(230, 239, 251, 0.7);
    color: #495463;
}

.select2-results__option {
    padding: 8px 20px;
    border-bottom: 1px solid #e0e8f3;
}

.select2-results__option:last-child {
    border-bottom: none;
}

.select2-container--flat .select2-selection--single,
.select2-container--flat .select2-selection--multiple {
    background: #fff;
    color: #8599c6;
    border: 1px solid #fff;
    border-radius: 4px;
    transition: all .4s;
    box-shadow: 0px 2px 18px 2px rgba(211, 224, 243, 0.25);
}

.select2-container--flat .select2-selection--single:focus,
.select2-container--flat .select2-selection--multiple:focus {
    outline: none;
}

.select-bordered+.select2-container--flat .select2-selection--single,
.select-bordered+.select2-container--flat .select2-selection--multiple {
    box-shadow: none;
    border-color: #d2dde9;
}

.select-bordered+.select2-container--flat.select2-container--open .select2-selection--single,
.select-bordered+.select2-container--flat.select2-container--open .select2-selection--multiple {
    border-color: #b1becc;
}

.select2-container--open.select2-container--below .select2-selection--single,
.select2-container--open.select2-container--below .select2-selection--multiple {
    border-radius: 4px 4px 0 0;
}

.select2-container--open.select2-container--above .select2-selection--single,
.select2-container--open.select2-container--above .select2-selection--multiple {
    border-radius: 0 0 4px 4px;
}

.select2-selection--single .select2-selection__arrow,
.select2-selection--multiple .select2-selection__arrow {
    position: absolute;
    height: 44px;
    width: 40px;
    top: 0;
    right: 0;
    transition: all .5s ease;
}

.select2-selection--single .select2-selection__arrow:after,
.select2-selection--multiple .select2-selection__arrow:after {
    position: absolute;
    top: 50%;
    left: 50%;
    font-family: 'themify';
    transform: translate(-50%, -50%);
    content: '\e64b';
    font-size: 12px;
}

.select2-selection--single .select2-selection__arrow b,
.select2-selection--multiple .select2-selection__arrow b {
    display: none;
}

.select-sm+.select2-container .select2-selection--single .select2-selection__arrow,
.select-sm+.select2-container .select2-selection--multiple .select2-selection__arrow {
    height: 37px;
    width: 37px;
}

.select-sm+.select2-container .select2-selection--single .select2-selection__arrow:after,
.select-sm+.select2-container .select2-selection--multiple .select2-selection__arrow:after {
    font-size: 12px;
}

.select2-container--flat.select2-container--open .select2-selection--single .select2-selection__arrow,
.select2-container--flat.select2-container--open .select2-selection--multiple .select2-selection__arrow {
    transform: rotate(-180deg);
}

.select2-container--flat .select2-results>.select2-results__options {
    max-height: 400px;
    overflow: auto;
    background: #fff;
}

.select2-dropdown--below .select2-results__options {
    border-radius: 0 0 4px 4px;
}

.select2-dropdown--above .select2-results__options {
    border-radius: 4px 4px 0 0;
}

.select2-dropdown.select2-dropdown--below {
    border-radius: 0 0 4px 4px;
}

.select2-dropdown.select2-dropdown--above {
    border-radius: 4px 4px 0 0;
}

.select2-search,
.select2-search--dropdown {
    display: none;
}

.select2-dropdown {
    border-radius: 0;
    border: none;
    background: transparent;
    box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.03);
}

.bordered .select2-dropdown {
    border: 1px solid #b1becc;
}

.bordered .select2-dropdown.select2-dropdown--above {
    border-bottom: none;
}

.bordered .select2-dropdown.select2-dropdown--below {
    border-top: none;
}

.select2-results__option {
    padding: 6px 20px;
    font-size: .9em;
    white-space: nowrap;
    transition: all .5s ease;
}

.select2-selection__choice {
    display: inline-block;
    padding: 4px 8px 4px 2px;
    background: #e6effb;
    border-radius: 3px;
    margin-right: 6px;
}

.select2-selection__choice__remove {
    padding: 2px 6px;
}

.select2-selection__choice__remove:hover {
    color: #ff6868;
}

.select-block+.select2-container.select2 {
    width: 100% !important;
}


/** Alerts  @Elements */

.alert {
    position: relative;
    font-weight: 400;
    color: #fff;
    border: none;
}

.alert a,
.alert .alert-link {
    color: inherit;
    font-weight: inherit;
    box-shadow: 0 1px 0 currentColor;
    transition: box-shadow .3s;
}

.alert a:hover,
.alert .alert-link:hover {
    box-shadow: 0 0 0;
}

.alert .close {
    color: inherit;
    transition: all .4s;
    height: 30px;
    width: 30px;
    padding: 0;
    background: none;
    position: absolute;
    top: 50%;
    border-radius: 50%;
    transform: translateY(-50%);
    right: 10px;
    text-shadow: none;
    opacity: .7;
}

.alert .close:not(:disabled):not(.disabled):focus,
.alert .close:not(:disabled):not(.disabled):hover,
.alert .close:hover,
.alert .close:focus {
    color: currentColor;
    box-shadow: none;
    outline: none;
    opacity: 1;
}

.alert .close:after {
    position: absolute;
    font-family: 'themify';
    content: '\e646';
    top: 0;
    left: 0;
    color: currentColor;
    font-size: 12px;
    line-height: 30px;
    text-align: center;
    width: 100%;
}

.alert .close span {
    display: none;
}

.alert-xs {
    padding: 5px 12px;
    font-size: 11px;
    line-height: 18px;
    text-transform: none;
    letter-spacing: 0.025em;
}

.alert-center {
    text-align: center;
}

.alert-primary {
    color: #004ec5;
    background: #cfe2ff;
}

.alert-primary .close {
    background: #92bdff;
}

.alert-primary-alt {
    background: #2c80ff;
}

.alert-primary-alt .close {
    background: #0059df;
}

.alert-secondary {
    color: #101941;
    background: #ced4f3;
}

.alert-secondary .close {
    background: #8999e1;
}

.alert-secondary-alt {
    background: #253992;
}

.alert-secondary-alt .close {
    background: #162155;
}

.alert-success {
    color: #00b975;
    background: #cdffed;
}

.alert-success .close {
    background: #06ffa4;
}

.alert-success-alt {
    background: #00d285;
}

.alert-success-alt .close {
    background: #009f65;
}

.alert-danger {
    color: #ff6868;
    background: #ffeded;
}

.alert-danger .close {
    background: #ffcece;
}

.alert-danger-alt {
    background: #ff6868;
}

.alert-danger-alt .close {
    background: #e80000;
}

.alert-info {
    color: #1babfe;
    background: #cdecff;
}

.alert-info .close {
    background: #81d0fe;
}

.alert-info-alt {
    background: #1babfe;
}

.alert-info-alt .close {
    background: #0171b2;
}

.alert-warning {
    color: #cc9a00;
    background: #fff3cc;
}

.alert-warning .close {
    background: #ffd44d;
}

.alert-warning-alt {
    background: #ffc100;
}

.alert-warning-alt .close {
    background: #cc9a00;
}

.alert-light {
    color: #758698;
    background: #e7eaed;
}

.alert-light .close {
    background: #afb9c4;
}

.alert-light-alt {
    background: #758698;
}

.alert-light-alt .close {
    background: #475360;
}

.alert-dark {
    color: #495463;
    background: #e1e4e9;
}

.alert-dark .close {
    background: #9aa6b5;
}

.alert-dark-alt {
    background: #495463;
}

.alert-dark-alt .close {
    background: #1e2228;
}

.alert-box {
    text-align: center;
    border-radius: 4px;
    padding: 15px;
    display: block;
    border: 1px solid;
    margin-bottom: 30px;
}

.alert-txt {
    display: flex;
    align-items: center;
    justify-content: center;
    padding-bottom: 20px;
    font-size: 12px;
}

.alert-txt .ti,
.alert-txt .iconfont,
.alert-txt [class*=fa-] {
    margin-right: 10px;
    line-height: 36px;
    width: 36px;
    border-radius: 50%;
    text-align: center;
    background: #f2b2a7;
    color: #af4038;
    flex-shrink: 0;
}

@media (min-width: 768px) {
    .alert-box {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .alert-txt {
        padding-bottom: 0;
        font-size: 14px;
        justify-content: flex-start;
    }
}

.note {
    padding: 15px 15px 15px 45px;
    border-radius: 4px;
    position: relative;
    line-height: 1.4;
}

.note-no-icon {
    padding: 15px;
}

.note-no-icon.note-lg {
    padding: 15px 25px;
}

.note [class*=fa] {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 0;
    font-size: 11px;
    width: 44px;
    text-align: center;
    line-height: inherit;
}

.note p,
.note .note-text {
    font-size: 11px !important;
    line-height: inherit;
    display: block;
}

.note-md p,
.note-md .note-text {
    font-size: 14px !important;
}

.note-md [class*=fa] {
    font-size: 12px;
}

.note-plane {
    padding: 0 0 0 18px;
    background: transparent !important;
}

.note-plane [class*=fa] {
    top: 0;
    line-height: 14px;
    transform: translateY(1px);
    width: 18px;
    text-align: left;
}

.note-light p,
.note-light .note-text {
    color: #495463;
}

.note-light [class*=fa] {
    color: #2c80ff;
}

.note-light-alt p,
.note-light-alt .note-text {
    color: #758698;
}

.note-light-alt [class*=fa] {
    color: #758698;
}

.note-info {
    background: #e6f6ff;
}

.note-info p,
.note-info .note-text {
    color: rgba(27, 171, 254, 0.9) !important;
}

.note-info [class*=fa] {
    color: #1babfe;
}

.note-success {
    background: rgba(0, 210, 133, 0.15);
}

.note-success p,
.note-success .note-text {
    color: rgba(0, 210, 133, 0.9) !important;
}

.note-success [class*=fa] {
    color: #00d285;
}

.note-danger {
    background: rgba(255, 104, 104, 0.05);
}

.note-danger p,
.note-danger .note-text {
    color: rgba(255, 104, 104, 0.9) !important;
}

.note-danger [class*=fa] {
    color: rgba(255, 104, 104, 0.9);
}

@media (min-width: 576px) {
    .note p,
    .note .note-text {
        font-size: 12px !important;
    }
}


/** Modals @Elements */

.modal-dialog {
    margin: 35px 16px;
    min-width: 280px;
}

.modal-dialog-bottom {
    display: flex;
    align-items: flex-end;
    min-height: calc(100% - (.5rem * 2));
}

.modal.fade .modal-dialog-bottom {
    -webkit-transform: translate(0, 25%);
    transform: translate(0, 25%);
}

.modal.show .modal-dialog-bottom {
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
}

.modal-content {
    position: relative;
    border-radius: 8px;
    padding: 6px 0;
    box-shadow: 0px 10px 55px 0px rgba(0, 0, 0, 0.2);
    border: 0;
}

.modal-close {
    position: absolute;
    top: -14px;
    right: -14px;
    display: inline-block;
}

.modal-close .ti {
    font-size: 13px;
    height: 32px;
    width: 32px;
    line-height: 32px;
    text-align: center;
    background: #fff;
    border-radius: 50%;
    color: #495463;
    text-shadow: none;
    display: block;
    transition: all .4s;
    box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.3);
}

.modal .more-tigger {
    width: 32px;
    height: 32px;
}

.modal .more-tigger .ti {
    line-height: 32px;
}

.modal-backdrop {
    background: #090d1c;
}

@media (min-width: 576px) {
    .modal-dialog {
        margin: 35px auto;
    }
    .modal-dialog-sm {
        min-width: 500px;
    }
    .modal-dialog-md {
        min-width: 90%;
    }
    .modal-dialog-lg {
        min-width: 540px;
    }
    .modal-dialog-bottom {
        min-height: calc(100% - (1.75rem * 2));
    }
}

@media (min-width: 768px) {
    .modal-dialog-md {
        min-width: 620px;
    }
    .modal-dialog-lg {
        min-width: 740px;
    }
    .modal-close {
        top: -22px;
        right: -22px;
    }
    .modal-close .ti {
        font-size: 20px;
        height: 44px;
        width: 44px;
        line-height: 44px;
    }
}

@media (min-width: 992px) {
    .modal-dialog-lg {
        min-width: 880px;
    }
}

.popup-header {
    padding: 10px 18px 25px;
    border-bottom: 1px solid #e6effb;
}

.popup-body {
    padding: 10px 20px 12px;
}

.popup-body-innr {
    padding-left: 18px;
    padding-right: 18px;
}

.popup-body-full {
    padding-left: 0;
    padding-right: 0;
}

.popup-body-lg {
    padding: 14px 18px 7px;
}

.popup-body p {
    font-weight: 400;
}

.popup-body .lead b {
    color: #1c65c9;
}

.popup-title {
    color: #253992;
    font-weight: 500;
    padding-right: 40px;
    margin-bottom: 8px;
    font-size: 1.3em;
}

.popup-title .ti {
    font-size: 70%;
    color: #6e81a9;
}

.popup-title small {
    color: #758698;
}

.popup-title-action {
    position: absolute;
    right: 0;
    top: 50%;
    margin-top: 2px;
    transform: translateY(-50%);
}

.popup-subtitle {
    text-transform: uppercase;
    font-weight: 500;
    color: #6e81a9;
    letter-spacing: 0.1em;
    margin-bottom: 0;
    font-size: 12px;
    margin-bottom: 10px;
}

.popup-subtitle-s2 {
    color: #495463;
    margin-bottom: 8px;
    font-size: 14px;
    font-weight: 500;
}

.popup-footer {
    padding: 15px 18px 0;
}

@media (min-width: 480px) {
    .popup-title-action {
        margin-top: 0;
    }
    .popup-header {
        padding: 30px 42px 25px;
    }
    .popup-body {
        padding: 30px 50px 35px;
    }
    .popup-body-innr {
        padding-left: 42px;
        padding-right: 42px;
    }
    .popup-body-lg {
        padding: 30px 40px;
    }
    .popup-footer {
        padding: 30px 42px;
    }
}

@media (min-width: 768px) {
    .popup-body-lg {
        padding: 30px 45px 30px;
    }
}


/** Tabs @Elements */

.nav-tabs {
    border-bottom: none;
    margin: 0 -15px;
    margin-bottom: 10px;
}

.nav-tabs .nav-link {
    border: none;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 0.05em;
    color: #758698;
    padding: 6px 15px;
}

.nav-tabs .nav-link.active {
    color: #2c80ff;
}

.nav-tabs-line {
    margin: 0;
    margin-bottom: 20px;
    border-bottom: 2px solid #d3e0f3;
}

.nav-tabs-line.nav-tabs-vr {
    border-bottom: none;
}

.nav-tabs-line .nav-item {
    padding: 0 12px 0 0;
    margin-bottom: 0;
}

.nav-tabs-line .nav-item:last-child {
    padding: 0;
}

.nav-tabs-line .nav-link {
    border: none;
    padding: 6px 3px;
    letter-spacing: 0.02em;
    font-size: 11px;
    text-transform: uppercase;
    font-weight: 500;
    color: #758698;
    position: relative;
}

.nav-tabs-line .nav-link:after {
    position: absolute;
    left: 0;
    bottom: -2px;
    content: '';
    width: 0;
    height: 2px;
    background: #2c80ff;
    transition: all .4s;
}

.nav-tabs-line .nav-link.active {
    cursor: default;
    color: #2c80ff;
}

.nav-tabs-line .nav-link.active:after {
    width: 100%;
}

.nav-tabs-bordered {
    display: block;
    margin: 0 -7px;
    border-bottom: 0;
    display: flex;
}

.nav-tabs-bordered .nav-item {
    margin-bottom: 0;
    flex-grow: 1;
    padding: 0 7px;
    text-transform: uppercase;
    font-weight: 600;
    margin-bottom: 20px;
    width: 100%;
}

.nav-tabs-bordered .nav-link {
    text-align: center;
    display: block;
    border: 2px solid #d2dde9;
    border-radius: 4px;
    color: #758698;
    padding: 8px 18px;
    font-size: 11px;
    height: 100%;
}

.nav-tabs-bordered .nav-link span {
    font-size: 12px;
    display: inline-block;
    margin-left: 15px;
    color: #758698;
}

.nav-tabs-bordered .nav-link.active {
    border: 2px solid #2c80ff;
    color: #2c80ff;
}

.nav-tabs-bordered .nav-link.active span {
    color: #495463;
}

.nav-tabs-icon {
    position: relative;
    width: 44px;
    flex-shrink: 0;
}

.nav-tabs-icon img {
    transition: all .4s;
    width: 100%;
}

.nav-tabs-icon img:first-of-type {
    opacity: 1;
}

.nav-tabs-icon img:last-of-type {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
}

.active>.nav-tabs-icon img:first-of-type {
    opacity: 0;
}

.active>.nav-tabs-icon img:last-of-type {
    opacity: 1;
}

.nav-tabs-vr {
    border-top: 1px solid #f8fafe;
    margin: 0;
}

.nav-tabs-vr .nav-item {
    width: 100%;
    padding: 0;
    margin-bottom: 0;
}

.nav-tabs-vr.rad .nav-item {
    overflow: hidden;
}

.nav-tabs-vr.rad .nav-item:first-child {
    border-radius: 4px 4px 0 0;
}

.nav-tabs-vr.rad .nav-item:last-child {
    border-radius: 0 0 4px 4px;
}

.nav-tabs-vr .nav-link {
    border-radius: 0;
    padding: 10px 20px;
    border-bottom: 1px solid #f8fafe;
}

.nav-tabs-vr .nav-link:hover,
.nav-tabs-vr .nav-link.active {
    border-bottom: 1px solid #f8fafe;
}

@media (min-width: 480px) {
    .nav-tabs-line .nav-item {
        padding: 0 30px 0 0;
    }
    .nav-tabs-line .nav-link {
        font-size: 13px;
    }
    .nav-tabs-vr .nav-item {
        padding: 0;
    }
    .nav-tabs-bordered .nav-item {
        width: auto;
    }
}

@media (min-width: 576px) {
    .nav-tabs .nav-item {
        width: auto;
    }
    .nav-tabs .nav-link {
        font-size: 13px;
    }
    .nav-tabs-bordered .nav-item {
        padding: 0 15px;
        margin-bottom: 25px;
    }
    .nav-tabs-bordered .nav-link {
        font-size: 14px;
    }
    .nav-tabs-vr .nav-item {
        padding: 0;
        width: 100%;
    }
}

@media (min-width: 768px) {
    .nav-tabs-line .nav-item {
        padding: 0 40px 0 0;
    }
    .nav-tabs-line .nav-link {
        font-size: 14px;
    }
    .nav-tabs-vr .nav-item {
        padding: 0;
    }
}

@media (min-width: 992px) {
    .nav-tabs .nav-link {
        font-size: 14px;
    }
}


/** Accordions @Elements */

[class*=collapse-icon] {
    position: relative;
}

[class*=collapse-icon]:after {
    position: absolute;
    top: 50%;
    content: '\f107';
    font-family: 'Font Awesome';
    font-weight: 700;
    transform: translateY(-50%) rotate(-180deg);
    transition: all .4s;
    color: #758698;
}

[class*=collapse-icon].collapsed:after {
    transform: translateY(-50%) rotate(0deg);
}

[class*=collapse-icon].active:after {
    transform: translateY(-50%) rotate(0deg);
}

.collapse-icon-left:after {
    left: -14px;
}

.collapse-icon-right:after {
    right: 0;
}

@media (min-width: 480px) {
    .collapse-icon-left:after {
        left: -22px;
    }
}

@media (min-width: 1200px) {
    .collapse-icon-left:after {
        opacity: 0;
    }
    .collapse-icon-left:hover:after {
        opacity: 1;
    }
}

.accordion-item {
    padding-bottom: 5px;
}

.accordion-item:last-child {
    padding-bottom: 0;
}

.accordion-heading {
    cursor: pointer;
    color: #253992;
    font-weight: 500;
    transition: all .4s;
    margin-bottom: 8px;
    padding-left: 20px;
    font-size: 1em;
    position: relative;
}

.accordion-heading:before,
.accordion-heading:after {
    position: absolute;
    content: '';
}

.accordion-heading:before {
    left: 0;
    top: 10px;
    height: 1px;
    width: 11px;
    background: #758698;
}

.accordion-heading:after {
    left: 5px;
    top: 5px;
    height: 11px;
    width: 1px;
    background: #758698;
    transform: scaleX(1) scaleY(0);
    transition: all .3s ease;
}

.accordion-heading.collapsed {
    color: #758698;
}

.accordion-heading.collapsed:after {
    transform: scaleX(1) scaleY(1);
}

.accordion-heading:hover {
    color: #253992;
}

.accordion-content {
    padding: 0 0 15px 20px;
}

.accordion-s2 .accordion-heading {
    padding-left: 0;
    padding-right: 20px;
}

.accordion-s2 .accordion-heading:before {
    left: auto;
    right: 0;
}

.accordion-s2 .accordion-heading:after {
    left: auto;
    right: 5px;
}

.accordion-s2 .accordion-content {
    padding: 0 20px 15px 0;
}


/** Common  @Elements */

.bg-primary {
    background: #2c80ff !important;
}

.bg-secondary {
    background: #253992 !important;
}

.bg-alternet {
    background: #74fffa !important;
}

.bg-default {
    background: #495463 !important;
}

.bg-info {
    background: #1babfe !important;
}

.bg-success {
    background: #00d285 !important;
}

.bg-warning {
    background: #ffc100 !important;
}

.bg-danger {
    background: #ff6868 !important;
}

.bg-purple {
    background: #bc69fb !important;
}

.bg-light {
    background: #f7fafd !important;
}

.text-primary {
    color: #2c80ff !important;
}

.text-secondary {
    color: #253992 !important;
}

.text-alternet {
    color: #74fffa !important;
}

.text-default {
    color: #495463 !important;
}

.text-info {
    color: #1babfe !important;
}

.text-success {
    color: #00d285 !important;
}

.text-warning {
    color: #ffc100 !important;
}

.text-danger {
    color: #ff6868 !important;
}

.text-purple {
    color: #bc69fb !important;
}

.text-light {
    color: #758698 !important;
}

.text-exlight {
    color: #6e81a9 !important;
}

.text-dark {
    color: #495463 !important;
}

.badge {
    padding: 2px 10px;
    font-size: 11px;
    line-height: 15px;
    text-align: center;
    border-radius: 3px;
    font-weight: 500;
    color: #fff;
    border: 1px solid;
    min-width: 60px;
}

.badge-sq {
    height: 19px;
    width: 19px;
    min-width: 0;
    padding-left: 2px;
    padding-right: 2px;
}

.badge-sm {
    padding: 4px 12px;
    font-size: 12px;
    line-height: 16px;
    font-weight: 400;
    min-width: 90px;
}

.badge-md {
    padding: 6px 12px;
    font-size: 12px;
    line-height: 16px;
    font-weight: 400;
    min-width: 90px;
}

.badge-md.badge-sq {
    height: 30px;
    width: 30px;
    min-width: 0;
    padding: 6px 0;
}

.badge-lg {
    padding: 6px 15px;
    font-size: 13px;
    font-weight: 600;
    line-height: 20px;
    min-width: 120px;
}

.badge-xl {
    padding: 9px 15px;
    font-size: 13px;
    font-weight: 600;
    line-height: 20px;
    min-width: 120px;
}

.badge-block {
    width: 100%;
}

.badge-auto {
    min-width: 0;
}

.badge-circle {
    border-radius: 50%;
    height: 30px;
    width: 30px;
    padding: 5px 0;
    font-size: 14px;
    line-height: 22px;
    font-weight: 400;
}

.badge-circle.badge-sm {
    height: 20px;
    width: 20px;
    font-size: 11px;
    line-height: 12px;
}

.badge.badge-dim {
    color: #495463;
}

.badge-primary {
    background: #2c80ff;
    border-color: #2c80ff;
}

.badge-primary.badge-dim {
    background: #dfebff;
    border-color: #accdff;
}

.badge-light {
    background: #758698;
    border-color: #758698;
    color: #fff;
}

.badge-light.badge-dim {
    background: #eaecef;
    border-color: #cdd3d9;
}

.badge-lighter {
    color: #495463;
    background: #e6effb;
    border-color: #e6effb;
}

.badge-lighter.badge-dim {
    color: #495463;
    border-color: #a4c5f0;
}

.badge-dark {
    color: #fff;
    background: #495463;
    border-color: #495463;
}

.badge-dark.badge-dim {
    background: #dee2e7;
    border-color: #b2bac6;
}

.badge-secondary {
    background: #253992;
    border-color: #253992;
}

.badge-secondary.badge-dim {
    background: #dadff6;
    border-color: #b1bceb;
}

.badge-success {
    background: #00d285;
    border-color: #00d285;
}

.badge-success.badge-dim {
    background: #c8ffeb;
    border-color: #53ffc0;
}

.badge-info {
    background: #1babfe;
    border-color: #1babfe;
}

.badge-info.badge-dim {
    background: #f0faff;
    border-color: #cdecff;
}

.badge-warning {
    background: #ffc100;
    border-color: #ffc100;
}

.badge-warning.badge-dim {
    background: #fff5d6;
    border-color: #ffe080;
}

.badge-danger {
    background: #ff6868;
    border-color: #ff6868;
}

.badge-danger.badge-dim {
    background: #ffe8e8;
    border-color: #ffb5b5;
}

.badge-purple {
    background: #bc69fb;
    border-color: #bc69fb;
}

.badge-purple.badge-dim {
    background: white;
    border-color: white;
}

.badge-disabled {
    color: #495463;
    background: #d2dde9;
    border-color: #d2dde9;
}

.badge-disabled.badge-dim {
    color: #5f6d80;
    background: #f4f7fa;
    border-color: #e3eaf1;
}

.badge-outline {
    background: none;
    color: #495463;
}

.badge-xs {
    padding: 1px 8px;
    font-size: 10px;
    line-height: 12px;
    font-weight: 400;
    min-width: 48px;
}

.badge-xs.round {
    border-radius: 9px;
}

.badge-xs.badge-sq {
    height: 16px;
    width: 16px;
    min-width: 0;
    padding-left: 2px;
    padding-right: 2px;
}

.status {
    padding: 5px 20px;
    line-height: 22px;
    font-size: 14px;
    display: inline-block;
    border-radius: 4px;
}

.status-primary {
    color: #2c80ff;
    background: rgba(44, 128, 255, 0.15);
}

.status-secondary {
    color: #253992;
    background: rgba(37, 57, 146, 0.15);
}

.status-success {
    color: #00d285;
    background: rgba(0, 210, 133, 0.15);
}

.status-info {
    color: #1babfe;
    background: rgba(27, 171, 254, 0.15);
}

.status-warning {
    color: #ffc100;
    background: rgba(255, 193, 0, 0.15);
}

.status-danger {
    color: #ff6868;
    background: rgba(255, 104, 104, 0.15);
}

.status-purple {
    color: #bc69fb;
    background: rgba(188, 105, 251, 0.15);
}

.icon-90deg {
    transform: rotate(-90deg);
    display: inline-block;
}

.hr {
    border: 0;
    display: block;
    width: 100%;
    border-top: 1px solid #d2dde9;
    margin: 35px 0;
}

.hr:first-child {
    margin-top: 0;
}

.hr:last-child {
    margin-bottom: 0;
}

.hr.hr2 {
    margin-top: 15px;
}

.hr+.card-head {
    margin-top: -5px;
}


/** Tables @Elements */

.table td {
    padding: 10px 0;
    border: none;
    white-space: nowrap;
    vertical-align: middle;
}

.table td .lead {
    font-size: 14px;
    font-weight: 600;
    color: #495463;
    letter-spacing: 0.01em;
    line-height: 1;
    margin-top: 0;
    margin-right: 4px;
}

.table td .sub {
    font-size: 12px;
    font-weight: 400;
    color: #758698;
    letter-spacing: 0.01em;
    line-height: 1;
    padding-top: 7px;
}

.table td .sub-s2 {
    font-size: 13px;
    color: #495463;
    padding-top: 0;
}

.table td .sub:first-child {
    padding-top: 0;
}

.table td>* {
    padding-right: 5px;
}

.table thead th {
    text-transform: uppercase;
    border: none;
    white-space: nowrap;
    font-size: 12px;
    font-weight: 700;
    color: #2c80ff;
}

.table th {
    padding: 5px 0;
}

.table td {
    padding: 10px 0;
}

.table-even-odd tr {
    background: rgba(220, 230, 245, 0.2);
}

.table-even-odd tr:nth-child(even) {
    background: rgba(220, 230, 245, 0.6);
}

.table-even-odd thead tr {
    background: #d4e0f3;
}

.table-bordered {
    border: none;
}

.table-bordered th,
.table-bordered td {
    border: 1px solid #eff5fc;
    padding-left: 12px;
    padding-right: 12px;
}

.table-bordered thead th {
    border: 1px solid #eff5fc;
}

.table-borderless tr {
    border-bottom: none;
}

.table-transparent tr {
    background: transparent;
}

.table-transparent td,
.table-transparent th {
    padding: 15px 20px;
}

@media (min-width: 576px) {
    .table-transparent td,
    .table-transparent th {
        padding: 15px 30px;
    }
}

.table th {
    border-top: none;
}

.table-plain {
    width: 100%;
}

.table-plain-row {
    display: flex;
    flex-wrap: wrap;
}

.table-plain-cell {
    width: 50%;
    padding: 8px 15px 8px 0;
}

.table-plain-3clm .table-plain-cell {
    width: 100%;
}

.table-plain-cell.head {
    font-weight: 500;
}

@media (min-width: 768px) {
    .table-plain-4clm .table-plain-cell {
        width: 25%;
    }
    .table-plain-3clm .table-plain-cell {
        width: 33.33%;
    }
}


/** Cards @Elements */

.card {
    border-radius: 4px;
    margin-bottom: 15px;
    border: none;
    background: #fff;
    transition: all .4s;
    vertical-align: top;
}

.card-shadow {
    box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.05);
}

.card-shadow:hover {
    box-shadow: 0px 15px 50px 0px rgba(0, 0, 0, 0.09);
}

.card-full-height {
    height: calc(100% - 15px);
}

.card-gradient-pri-sec {
    background-image: linear-gradient(45deg, #1c65c9 0%, #2c80ff 100%);
}

.card-innr {
    padding: 16px 20px;
    border-color: #e6effb !important;
}

.card-innr>.card-title {
    padding-bottom: 10px;
}

.card-innr>div:last-child:not(.input-item):not(.row):not(.step-head) {
    margin-bottom: 5px;
}

.account-info .card-innr>div:last-child:not(.input-item):not(.row):not(.step-head) {
    margin-bottom: 0;
}

.card-innr-fix {
    padding-bottom: 20px;
}

.card-title {
    color: #253992;
    font-size: 1.3em;
    font-weight: 500;
    margin: 0;
}

.card-title-lg {
    font-size: 1.6em;
}

.card-title-md {
    font-size: 1.3em;
}

.card-title-sm {
    font-size: 1.1em;
}

.card-title:last-child {
    margin-bottom: 0;
}

.card-title-text {
    width: 100%;
}

.card-title-text:not(:first-child) {
    margin-top: 4px;
}

.card-title+.btn-grp {
    margin-top: -5px;
}

.card-sub-title {
    text-transform: uppercase;
    color: #758698;
    letter-spacing: 0.1em;
    display: block;
    font-size: 12px;
    line-height: 18px;
    font-weight: 500;
    margin-bottom: 4px;
}

.card-head {
    padding-bottom: 18px;
}

.card-head.has-aside {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}

.card-head:last-child {
    padding-bottom: 0;
}

.card-opt {
    position: relative;
}

.card-footer {
    background: #f6f8fc;
}

.card .content:not(:first-child) {
    margin-top: 10px;
}

.card-token {
    background-image: linear-gradient(45deg, #1c65c9 0%, #2c80ff 100%);
    color: #fff;
}

.card-token .card-sub-title {
    color: #74fffa;
    margin-bottom: 4px;
}

.card-calc .note p {
    font-size: 11px !important;
}

.card-text-light {
    color: #fff;
}

.card-text-light .card-title,
.card-text-light .card-sub-title {
    color: #fff;
}

.card-text-light .card-opt>a {
    color: #fff !important;
}

.card-text-light .card-opt>a:after {
    border-top-color: #fff;
}

.card-text-light p {
    color: #fff;
}

.card-dark {
    background: #090d1c;
}

.card-primary {
    background: #2c80ff;
}

.card-secondary {
    background: #253992;
}

.card-success {
    background: #00d285;
}

.card-warning {
    background: #ffc100;
}

.card-info {
    background: #1babfe;
}

.card-danger {
    background: #ff6868;
}

.card-navs .card-innr {
    padding-top: 14px;
    padding-bottom: 14px;
}

.card-timeline .card-innr {
    height: calc(100% - 32px);
}

@media (min-width: 410px) {
    .card-token .token-balance-list li {
        min-width: 25%;
    }
}

@media (min-width: 576px) {
    .card {
        margin-bottom: 30px;
    }
    .card-title {
        font-size: 1.4em;
    }
    .card-title-sm {
        font-size: 1.1em;
        padding-top: 2px;
    }
    .card-innr {
        padding: 25px 30px;
    }
    .card-innr-fix {
        padding-bottom: 30px;
    }
    .card-innr-fix2 {
        padding-bottom: 10px;
    }
    .card-full-height {
        height: calc(100% - 30px);
    }
    .card-timeline .card-innr {
        height: calc(100% - 50px);
    }
}

@media (min-width: 992px) {
    .card-navs .card-innr {
        padding-top: 25px;
        padding-bottom: 25px;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .card-token .token-balance-list li {
        min-width: 84px;
    }
}

@media (min-width: 1200px) {
    .card-token .token-balance-list li {
        min-width: 33.33%;
    }
}

.tile {
    padding: 18px 20px 18px;
    position: relative;
    height: calc(100% - 30px);
}

.tile-nav {
    position: absolute;
    z-index: 2;
    top: 20px;
    right: 20px;
}

.tile-nav li {
    padding: 0 3px;
}

.tile-nav li:last-child {
    padding-right: 0;
}

.tile-nav li a {
    line-height: 17px;
    padding: 2px 13px;
    font-size: 11px;
    font-weight: 500;
    border-radius: 11px;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: #6e81a9;
}

.tile-nav li a.active {
    color: #758698;
    background: rgba(117, 134, 152, 0.15);
}

.tile-header {
    position: relative;
    margin-bottom: 9px;
}

.tile-title {
    font-size: 12px;
    font-weight: 500;
    color: #6e81a9;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    margin-bottom: 0;
}

.tile-title-s2 {
    font-size: 16px;
    color: #495463;
    text-transform: capitalize;
    letter-spacing: normal;
}

.card-gradient-pri-sec .tile-title {
    color: #84fff2;
}

.tile-action {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: -10px;
    z-index: 1;
}

.tile-data {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}

.tile-data-number {
    font-size: 24px;
    line-height: 1;
    color: #495463;
    font-weight: 500;
}

.tile-data-status {
    font-size: 12px;
    font-weight: 400;
    line-height: 18px;
    padding: 3px 24px 3px 12px;
    border-radius: 12px;
    margin: 0 12px;
    position: relative;
}

.tile-data-status:after {
    position: absolute;
    height: 0;
    width: 0;
    right: 9px;
    top: 50%;
    transform: translateY(-50%);
    content: '';
    border-left: 4.5px solid transparent;
    border-right: 4.5px solid transparent;
}

.tile-data-up {
    background: rgba(0, 210, 133, 0.15);
    color: #00d285;
}

.tile-data-up:after {
    border-bottom: 5px solid #00d285;
}

.tile-data-down {
    background: rgba(255, 104, 104, 0.15);
    color: #ff6868;
}

.tile-data-down:after {
    border-top: 5px solid #ff6868;
}

.tile-data-text {
    font-size: 20px;
    line-height: 1;
    font-weight: 500;
    color: #495463;
}

.tile-data-text span {
    font-size: 12px;
    font-weight: 400;
}

.tile-data-text-s2 span {
    font-size: 14px;
    color: #758698;
}

.tile-text-light .tile-data-text {
    color: #fff;
}

.tile-data-s2 {
    justify-content: space-between;
    margin-bottom: 14px;
}

.tile-recent {
    color: #6e81a9;
    line-height: 1;
}

.tile-recent-number {
    font-size: 16px;
    display: inline-block;
    margin-right: 3px;
    font-weight: 700;
}

.tile-recent-text {
    font-size: 13px;
    font-weight: 400;
}

.tile-info-item {
    min-width: 80px;
}

.tile-info-list {
    display: flex;
}

.tile-info-lead {
    font-size: 16px;
    font-weight: 500;
    color: #2c80ff;
    display: block;
    line-height: 1;
}

.tile-text-light .tile-info-lead {
    color: #fff;
}

.tile-info-sub {
    font-size: 12px;
    color: #758698;
    font-weight: 400;
    line-height: 1;
}

.tile-text-light .tile-info-sub {
    color: #fff;
}

.tile-footer {
    padding-top: 8px;
    display: flex;
    justify-content: space-between;
    align-items: baseline;
}

@media (min-width: 576px) {
    .tile {
        padding: 24px 30px 22px;
    }
    .tile-nav {
        top: 24px;
        right: 30px;
    }
    .tile-data-number {
        font-size: 32px;
    }
    .tile-data-status {
        font-size: 14px;
        line-height: 20px;
        padding: 5px 28px 5px 14px;
        border-radius: 15px;
    }
    .tile-data-status:after {
        right: 14px;
    }
    .tile-data-text {
        font-size: 20px;
    }
    .tile-recent-number {
        font-size: 18px;
    }
    .tile-info-lead {
        font-size: 20px;
    }
    .tile-footer {
        padding-top: 14px;
    }
}

.progress-info {
    display: flex;
    justify-content: space-between;
}

.progress-info li {
    font-size: 14px;
    text-transform: uppercase;
    font-weight: 500;
    color: #495463;
    line-height: 1.4;
}

.progress-info li span {
    color: #758698;
    display: block;
    font-size: 12px;
}

.progress-bar {
    display: block;
    color: #758698;
    background: #aebac7;
    height: 6px;
    border-radius: 3px;
    margin: 12px 0 65px;
    position: relative;
}

.progress-hcap,
.progress-scap,
.progress-psale,
.progress-percent {
    position: absolute;
    top: 0;
    left: 0;
    height: 6px;
    border-radius: 3px;
}

.progress-hcap>div,
.progress-scap>div,
.progress-psale>div,
.progress-percent>div {
    position: absolute;
    right: 0;
    transform: translateX(50%);
    width: 120px;
    font-size: 10px;
    line-height: 14px;
    font-weight: 500;
    padding: 25px 0 0 0;
    text-transform: uppercase;
}

.progress-hcap>div:after,
.progress-scap>div:after,
.progress-psale>div:after,
.progress-percent>div:after {
    position: absolute;
    top: 0;
    left: 50%;
    margin-left: -2px;
    width: 2px;
    height: 20px;
    content: '';
    background: rgba(78, 92, 110, 0.3);
}

.progress-hcap>div span,
.progress-scap>div span,
.progress-psale>div span,
.progress-percent>div span {
    display: block;
    color: #495463;
}

.progress-hcap {
    background: #d2dde9;
}

.progress-scap {
    background: #8299d3;
}

.progress-psale {
    background: #8299d3;
}

.progress-percent {
    background: #2c80ff;
}

.progress-percent:after {
    position: absolute;
    content: '';
    right: 0;
    top: 50%;
    height: 18px;
    width: 18px;
    border: 3px solid #2c80ff;
    background: #fff;
    border-radius: 50%;
    transform: translate(50%, -50%);
}


/** 04.0 - ELEMENTS */

.list-check li {
    color: #495463;
    position: relative;
    padding-left: 20px;
}

.list-check li:not(:last-child) {
    padding-bottom: 6px;
}

.list-check li:before {
    position: absolute;
    left: 0;
    top: 2px;
    font-family: Font Awesome;
    content: '\f00c';
    font-weight: 700;
    color: #6e81a9;
    margin-right: 4px;
    font-size: 12px;
}

.status {
    border-radius: 4px;
    text-align: center;
    padding: 24px 10px;
    width: 100%;
}

.status-icon {
    position: relative;
    height: 90px;
    width: 90px;
    background: #fff;
    border-radius: 50%;
    text-align: center;
    margin: 0 auto 20px;
    border: 2px solid #b1becc;
}

.status-icon>.ti {
    color: #b1becc;
    font-size: 36px;
    line-height: 86px;
}

.status-icon-sm {
    position: absolute;
    right: -2px;
    bottom: -2px;
    height: 24px;
    width: 24px;
    border-radius: 50%;
    background: #fff;
    border: 1px solid #ffc7c7;
}

.status-icon-sm>.ti {
    font-size: 12px;
    line-height: 22px;
    color: #ffc7c7;
    display: block;
}

.status-text {
    display: block;
    font-size: 1.29em;
    line-height: 1.6;
    font-weight: 400;
    color: #758698;
    letter-spacing: -0.01em;
    padding-bottom: 13px;
}

.status-text.large {
    font-size: 1.314em;
}

.status .btn {
    margin-top: 20px;
}

.status-empty .status-icon {
    border-color: #b1becc;
}

.status-empty .status-icon>.ti {
    color: #b1becc;
}

.status-thank .status-icon,
.status-verified .status-icon {
    border-color: #06d388;
}

.status-thank .status-icon>.ti,
.status-verified .status-icon>.ti {
    color: #06d388;
}

.status-thank .status-icon-sm,
.status-verified .status-icon-sm {
    border-color: #06d388;
}

.status-thank .status-icon-sm>.ti,
.status-verified .status-icon-sm>.ti {
    color: #06d388;
}

.status-verified .status-text {
    color: #06d388;
}

.status-process .status-icon {
    border-color: #50b3ff;
}

.status-process .status-icon>.ti {
    color: #50b3ff;
}

.status-process .status-icon-sm {
    border-color: #50b3ff;
}

.status-process .status-icon-sm>.ti {
    color: #50b3ff;
}

.status-canceled .status-icon {
    border-color: #ffc7c7;
}

.status-canceled .status-icon>.ti {
    color: #ffc7c7;
}

.status-canceled .status-icon-sm {
    border-color: #ffc7c7;
}

.status-canceled .status-icon-sm>.ti {
    color: #ffc7c7;
}

.status-canceled .status-text {
    color: #ffc7c7;
}

.status-warnning .status-icon {
    border-color: #ffd147;
}

.status-warnning .status-icon>.ti {
    color: #ffd147;
}

.status-warnning .status-icon-sm {
    border-color: #ffd147;
}

.status-warnning .status-icon-sm>.ti {
    color: #ffd147;
}

@media (min-width: 576px) {
    .status {
        padding: 45px 40px;
    }
    .status-text.large {
        font-size: 1.65em;
    }
    .status-sm {
        padding: 20px;
    }
    .status-lg {
        padding: 50px;
    }
}

.copy-wrap {
    position: relative;
}

.copy-wrap>[class*=fa] {
    position: absolute;
    top: 0;
    left: 18px;
    line-height: 20px;
    padding: 12px 0;
    font-size: 14px;
    text-align: center;
    color: #495463;
}

.copy-trigger {
    position: absolute;
    right: 4px;
    top: 4px;
    height: 38px;
    width: 38px;
    line-height: 20px;
    padding: 10px 0;
    text-align: center;
    color: #758698;
    background: #e9eff9;
    border-radius: 4px;
    border: none;
    transition: all .4s;
    cursor: pointer;
}

.copy-trigger:focus,
.copy-trigger:hover {
    color: #fff;
    background: #2c80ff;
    outline: none;
}

.copy-address {
    border: none;
    color: #495463;
    line-height: 20px;
    padding: 12px 50px 12px 40px;
    border-radius: 4px;
    border: 1px solid rgba(211, 224, 243, 0.5);
    width: 100%;
    background: #fff;
}

.copy-address:focus {
    outline: none;
    box-shadow: none;
}

.copy-feedback {
    display: none;
    position: absolute;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
    line-height: 20px;
    padding: 13px 0;
    font-weight: 500;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: .05em;
    text-align: center;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 4px;
    border: 1px solid rgba(211, 224, 243, 0.5);
    color: #2c80ff;
}

.countdown-clock {
    display: flex;
    justify-content: space-between;
    margin: 0 -7px;
    max-width: 320px;
}

.countdown-clock>div {
    border-radius: 4px;
    border: 1px solid #e6effb;
    margin: 0 7px;
    flex-grow: 1;
    text-align: center;
    padding: 10px 0;
}

.countdown-time {
    font-size: 24px;
    color: #495463;
    font-weight: 500;
    line-height: 1;
    letter-spacing: 0.1em;
}

.countdown-text {
    display: block;
    font-weight: 500;
    font-size: 11px;
    color: #758698;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    line-height: 1;
}

.card-dark .countdown-text {
    color: #b9d2f2;
}

[data-toggle="tooltip"] {
    cursor: help;
    color: #758698;
    font-size: 11px;
}

.tooltip-inner {
    background: #758698;
    font-size: 10px;
    color: #fff;
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.07);
}

.tooltip.bs-tooltip-right .arrow:before {
    border-right-color: #758698 !important;
}

.tooltip.bs-tooltip-left .arrow:before {
    border-left-color: #758698 !important;
}

.tooltip.bs-tooltip-bottom .arrow:before {
    border-bottom-color: #758698 !important;
}

.tooltip.bs-tooltip-top .arrow:before {
    border-top-color: #758698 !important;
}

.toggle-tigger {
    cursor: pointer;
}

.toggle-caret {
    position: relative;
    padding-right: 16px;
}

.toggle-caret:after {
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    content: '';
    height: 0;
    width: 0;
    border-left: 4.5px solid transparent;
    border-right: 4.5px solid transparent;
    border-top: 5px solid #b1becc;
}

.toggle-content,
.toggle-class {
    display: none;
}

.toggle-content.active,
.toggle-class.active {
    display: block;
}

.toggle-mobile {
    height: 36px;
    width: 36px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
}

.toggle-mobile-content {
    position: absolute;
}

@media (min-width: 576px) {
    .toggle-content,
    .toggle-class {
        display: none;
    }
    .toggle-content.active,
    .toggle-class.active {
        display: block;
    }
    .toggle-mobile {
        display: none;
    }
    .toggle-mobile-content {
        position: static;
        display: block;
    }
}

.dropdown-content {
    position: absolute;
    top: calc(100% + 10px);
    left: 50%;
    transform: translateX(-50%);
    background: #fff;
    border-radius: 4px;
    z-index: 999;
    box-shadow: 0px 0 35px 0px rgba(0, 0, 0, 0.2);
}

.dropdown-content:after {
    position: absolute;
    content: '';
    top: -6px;
    left: 50%;
    margin-left: -7px;
    height: 0;
    width: 0;
    border-left: 7px solid transparent;
    border-right: 7px solid transparent;
    border-bottom: 7px solid #fff;
}

.dropdown-content-up {
    top: auto;
    bottom: calc(100% + 10px);
}

.dropdown-content-up:after {
    top: auto;
    bottom: -7px;
    border-bottom: none;
    border-top: 7px solid #fff;
}

.dropdown-content-top {
    top: auto;
    bottom: calc(100% + 10px);
}

.dropdown-content-top:after {
    top: auto;
    bottom: -7px;
    border-bottom: none;
    border-top: 7px solid #fff;
}

.dropdown-content-top-left {
    top: 0;
    left: auto;
    right: calc(100% + 10px);
    transform: translateX(0);
}

.dropdown-content-top-left:after {
    top: 8px;
    left: auto;
    right: -14px;
    border-top: 7px solid transparent;
    border-bottom: 7px solid transparent;
    border-left: 7px solid #fff;
}

.dropdown-content-center-left {
    top: 50%;
    left: auto;
    right: calc(100% + 10px);
    transform: translateX(0) translateY(-50%);
}

.dropdown-content-center-left:after {
    top: 50%;
    margin-top: -7px;
    left: auto;
    right: -14px;
    border-top: 7px solid transparent;
    border-bottom: 7px solid transparent;
    border-left: 7px solid #fff;
}

.dropdown-content-right {
    left: auto;
    transform: translateX(0);
    right: 0;
}

.dropdown-arrow-left:after {
    left: 16px;
}

.dropdown-arrow-right:after {
    left: auto;
    right: 16px;
}

.dropdown-list {
    padding: 0 0;
}

.dropdown-list:last-child {
    border-radius: 0 0 4px 4px;
}

.dropdown-list li {
    border-bottom: 1px solid rgba(230, 239, 251, 0.3);
}

.dropdown-list li:last-child {
    border-bottom: none;
}

.dropdown-list li a {
    text-align: left;
    padding: 10px 25px 10px 20px;
    white-space: nowrap;
    color: #495463;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.05em;
    display: flex;
    align-items: center;
}

.dropdown-list li a .ti,
.dropdown-list li a [class*=fa-] {
    margin-right: 10px;
    font-size: 14px;
}

.dropdown-list li a:hover {
    color: #2c80ff;
}

.schedule-item {
    padding: 10px 0 10px;
}

.schedule-item span:not([class]) {
    display: block;
}

.schedule-item+.schedule-item {
    border-top: 1px solid #e0e8f3;
    padding-top: 20px;
}

.schedule-title {
    font-weight: 700;
    display: flex;
    align-items: center;
    margin-bottom: 4px;
}

.schedule-title span {
    display: inline-block;
    margin-right: 12px;
}

.schedule-bonus {
    padding: 8px;
    min-width: 110px;
    text-align: center;
    font-size: 14px;
    font-weight: 700;
    line-height: 20px;
    border-radius: 4px;
    color: #2c80ff;
    display: inline-block;
    border: 2px solid currentColor;
}

.user-dropdown:after {
    border-bottom-color: #253992;
}

.user-welcome {
    display: inline-block;
    margin-right: 10px;
    color: #fff;
}

.user-thumb {
    display: inline-block;
    height: 32px;
    width: 32px;
    line-height: 32px;
    color: #fff;
    border-radius: 50%;
    background: #2c80ff;
    text-align: center;
}

.user-thumb:hover,
.user-thumb:focus {
    color: #fff;
}

.user-status {
    padding: 20px 25px;
    background: #253992;
    border-radius: 4px 4px 0 0;
}

.user-status-title {
    font-size: 11px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: #74fffa;
    margin-bottom: 0;
}

.user-status-balance {
    font-size: 24px;
    color: #fff;
    white-space: nowrap;
    line-height: 1;
    padding-top: 4px;
}

.user-status-balance small {
    font-size: 16px;
}

.user-links {
    padding: 12px 0;
}

.user-links:last-child {
    border-radius: 0 0 4px 4px;
}

.user-links li a {
    display: block;
    padding: 5px 15px;
}

.user-links li a .ti {
    margin-right: 10px;
}

.user-photo {
    height: 36px;
    width: 36px;
    border-radius: 50%;
    overflow: hidden;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1px;
    line-height: 36px;
    color: #fff;
    background: #2c80ff;
    text-align: center;
}

.user-photo.bg-light,
.user-photo.bg-lighter {
    color: #495463;
}

.user-photo:hover,
.user-photo:focus {
    color: #fff;
}

.user-photo img {
    border-radius: 100%;
    vertical-align: baseline;
}

.user-photo+.user-info {
    margin-left: 12px;
}

.user-block {
    display: flex;
    align-items: center;
}

.sap-text {
    padding: 15px 0;
    text-align: center;
}

.sap-text span {
    font-size: 12px;
    line-height: 19px;
    letter-spacing: 0.1em;
    display: inline-block;
    text-transform: uppercase;
    padding: 0 12px;
    position: relative;
}

.sap-text span:before,
.sap-text span:after {
    position: absolute;
    content: '';
    height: 1px;
    width: 40px;
    background: #d2dde9;
    top: 50%;
    margin-top: -1px;
}

.sap-text span:before {
    right: 100%;
}

.sap-text span:after {
    left: 100%;
}

.tnx-table.bdr-tl {
    border-top: 1px solid #e6effb;
}

.tnx-type {
    width: 30px;
}

.tnx-type-text,
.tnx-type-md {
    display: none;
}

@media (min-width: 420px) {
    .tnx-type-sm {
        display: none;
    }
    .tnx-type-text,
    .tnx-type-md {
        display: inline-block;
    }
}

@media (min-width: 992px) {
    .tnx-table.bdr-tl {
        border-left: 1px solid #e6effb;
        border-top: 0;
    }
}

.chart-tokensale {
    height: 190px;
}

.error-text-large {
    font-size: 120px;
    line-height: 1;
    font-weight: 700;
    margin-bottom: 17px;
    background: -webkit-linear-gradient(#2c80ff, #253992);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    opacity: .9;
}

.error-content {
    position: relative;
}

.error-content p {
    margin-bottom: 28px;
    color: #758698;
}

@media (min-width: 576px) {
    .error-text-large {
        font-size: 180px;
    }
}

@media (min-width: 992px) {
    .error-text-large {
        font-size: 250px;
    }
}

.share-links {
    margin: 5px -10px;
    display: flex;
    align-items: center;
}

.share-links:last-child {
    margin-bottom: 0;
}

.share-links li {
    margin: 5px 10px;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: 500;
    line-height: 24px;
    letter-spacing: 0.1em;
    color: #758698;
}

.share-links li a {
    font-size: 18px;
    line-height: 24px;
    display: inline-block;
    color: #495463;
    font-weight: 400;
}

.share-links li a .fab {
    line-height: 24px;
    display: inline-block;
}

.share-links li a:hover {
    color: #2c80ff;
}

.lang-switch-btn {
    display: inline-block;
    color: #758698;
    padding: 5px 13px;
    font-size: 13px;
    line-height: 20px;
    text-transform: uppercase;
    border: 1px solid #b1becc;
    border-radius: 15px;
}

.lang-switch-btn .ti {
    font-size: 10px;
    margin-left: 2px;
}

.lang-switch-btn:hover {
    color: #758698;
}

.lang-switch-btn:focus,
.lang-switch-btn:active {
    color: #2c80ff;
    border-color: #2c80ff;
}

.lang-list {
    padding: 10px 0;
}

.lang-list li a {
    font-size: 12px;
    letter-spacing: 0.1em;
    padding: 0 20px;
    text-transform: uppercase;
    color: #758698;
}

.lang-list li a:hover {
    color: #2c80ff;
}

.footer-bar {
    margin-top: auto;
    padding-bottom: 20px;
}

.footer-links {
    display: flex;
    flex-wrap: wrap;
    margin: 3px -15px;
}

.footer-links li {
    padding: 2px 15px;
    font-size: 13px;
    color: #758698;
}

.footer-links li a {
    color: #758698;
}

.footer-links li a:hover {
    color: #2c80ff;
}

.referral-form {
    margin: 20px 0;
}

.referral-form:first-child {
    margin-top: 0;
}

.referral-form:last-child {
    margin-bottom: 0;
}

.account-info .card-title,
.referral-info .card-title,
.kyc-info .card-title {
    font-size: 1.3em;
}

@media (min-width: 576px) {
    .account-info .card-title,
    .referral-info .card-title,
    .kyc-info .card-title {
        font-size: 1.4em;
    }
}

@media (min-width: 992px) {
    .account-info .card-title,
    .referral-info .card-title,
    .kyc-info .card-title {
        font-size: 1.1em;
    }
}

.kyc-alert {
    margin-top: 20px;
    padding-bottom: 4px;
}

.kyc-status {
    margin-bottom: 20px;
}

.kyc-form-steps {
    margin-bottom: 25px;
}

.form-step-head {
    border-top: 1px solid #e0e8f3;
    border-bottom: 1px solid #e0e8f3;
}

.form-step:first-child .form-step-head {
    border-top: 0;
}

.form-step:last-child .form-step-head {
    border-bottom: 0;
}

.form-step-final {
    border-top: 1px solid #e0e8f3;
    padding-bottom: 5px;
}

.form-step-fields {
    padding: 20px;
}

.form-step.form-step1 .form-step-fields {
    padding-bottom: 1px;
}

.form-step.form-step2 .form-step-fields {
    padding-bottom: 16px;
}

.form-step.form-step3 .form-step-fields {
    padding-top: 15px;
    padding-bottom: 1px;
}

.form-step .note-plane {
    margin-bottom: 10px;
}

.form-step .note-plane [class*=fa] {
    transform: translateY(3px);
}

.form-step .note-plane p,
.form-step .note-plane .note-text {
    font-size: 1em !important;
    line-height: 1.5;
}

.form-step.form-step2 .note-plane {
    margin-bottom: 2px;
}

.step-head {
    display: flex;
    align-items: center;
}

.step-head-text h4 {
    margin-bottom: 0;
    color: #253992;
}

.step-head-text p {
    font-size: 0.95em;
}

.step-head h4,
.step-head h3 {
    font-weight: 500;
}

.step-number {
    flex-shrink: 0;
    height: 48px;
    width: 48px;
    font-size: 16px;
    color: #758698;
    border: 2px solid #b1becc;
    text-align: center;
    line-height: 45px;
    border-radius: 50%;
    margin-right: 12px;
    margin-top: 4px;
    margin-bottom: 4px;
}

@media (min-width: 576px) {
    .kyc-form-steps {
        margin-bottom: 60px;
    }
    .form-step-fields {
        padding: 30px;
    }
    .form-step.form-step1 .form-step-fields {
        padding-bottom: 10px;
    }
    .form-step.form-step2 .form-step-fields {
        padding-bottom: 25px;
    }
    .form-step.form-step3 .form-step-fields {
        padding-top: 15px;
        padding-bottom: 5px;
    }
    .step-head h4,
    .step-head h3 {
        font-weight: 400;
    }
    .step-number {
        font-size: 20px;
        margin-right: 18px;
    }
}

[data-simplebar="init"] {
    height: 100%;
}


/** Tokens @Elements */

.token-info {
    padding: 22px 0;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.token-info.bdr-tl {
    border-top: 1px solid #e6effb;
}

.token-info-icon {
    width: 46px;
    height: auto;
    margin-top: 2px;
}

.token-info-head {
    margin-bottom: 0;
}

.token-info-list {
    padding-bottom: 20px;
}

.token-info-list li {
    color: #2c80ff;
}

.token-info-list li span {
    color: #495463;
    min-width: 110px;
    display: inline-block;
}

.token-rate:not(:last-child),
.token-bonus:not(:last-child),
.token-rate-wrap:not(:last-child) {
    margin-bottom: 18px;
}

.token-sales .card-title-sm {
    padding-top: 2px;
}

.token-sales .sap {
    margin: 4px 0 2px;
}

.token-balance {
    margin: 1px 0 5px;
}

.token-balance.token-balance-with-icon {
    margin-top: 5px;
}

.token-balance:not(:last-child) {
    margin-bottom: 20px;
}

.token-balance-with-icon {
    display: flex;
    align-items: center;
}

.token-balance-icon {
    flex-shrink: 0;
    height: 50px;
    width: 50px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 15px;
}

.token-balance-icon img {
    width: 24px;
    line-height: 50px;
}

.token-balance-list {
    display: flex;
}

.token-balance-list li {
    min-width: 84px;
}

.token-balance .lead {
    color: #fff;
    font-weight: 500;
    font-size: 1.5em;
    line-height: 1;
    letter-spacing: -0.02em;
}

.token-balance .lead span {
    font-weight: 500;
    font-size: .6em;
    letter-spacing: 0.04em;
}

.token-balance-s2 .lead {
    font-size: 1.2em;
}

.token-balance-s2 .lead span,
.token-balance-s2 .sub {
    display: block;
    line-height: .9;
    font-size: 11px;
}

.token-transaction table {
    margin-top: -8px;
    margin-bottom: -5px;
}

.token-sales .countdown-clock:last-child,
.token-sale-graph .chart-tokensale:last-child {
    margin-bottom: 5px;
}

.token-calc {
    display: flex;
    padding-bottom: 10px;
}

.token-pay-amount {
    position: relative;
    align-self: center;
    width: 140px;
}

.token-pay-currency {
    position: absolute;
    right: 0;
    top: 9px;
    transform: translate(0);
    z-index: 1;
    padding: 0 10px;
    border-left: 1px solid #d2dde9;
}

.token-pay-currency .input-hint {
    position: static;
    border: 0;
    padding: 2px;
    font-size: .8em;
}

.token-received {
    display: inline-flex;
    align-items: center;
}

.token-eq-sign {
    color: #758698;
    padding: 0 10px;
    font-size: 20px;
}

.token-amount {
    font-size: 16px;
    margin-bottom: 0;
    font-weight: bold;
}

.token-symbol {
    font-size: 12px;
}

.token-buy {
    margin: 20px 0 5px;
}

.token-currency-choose,
.token-contribute,
.token-overview-wrap {
    margin-top: 20px;
}

.token-currency-choose:not(:last-child),
.token-contribute:not(:last-child),
.token-overview-wrap:not(:last-child) {
    margin-bottom: 20px;
}

.token-bonus-ui {
    padding: 1px 0;
}

.token-overview {
    border-radius: 4px;
    padding: 0 20px;
    border: 2px solid #e6effb;
    overflow: hidden;
}

.token-overview-title {
    font-size: 12px;
    letter-spacing: 0.03em;
    margin-bottom: 0;
    text-transform: uppercase;
}

.token-overview-value {
    font-size: 20px;
    line-height: 1.2;
    font-weight: 600;
    color: #253992;
    display: block;
}

.token-overview-wrap+.card-head {
    margin-top: 35px;
}

.token-bonus,
.token-total {
    position: relative;
    padding: 20px 0;
}

.token-bonus-current {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}

.token-bonus-date {
    text-align: right;
    font-style: italic;
    color: #758698;
    font-weight: 400;
    line-height: 1.3;
    font-size: .8em;
    margin: 0;
    padding-bottom: 2px;
}

.token-bonus:after {
    position: absolute;
    bottom: 0;
    left: -30px;
    width: calc(100% + 60px);
    height: 1px;
    background: #e6effb;
    content: '';
}

.token-bonus-sale:after {
    display: none;
}

@media (max-width: 575px) {
    .token-bonus-amount {
        padding-top: 0;
        margin-top: -5px;
    }
}

@media (min-width: 576px) {
    .token-info {
        padding: 28px 0;
    }
    .token-bonus-sale:after {
        display: block;
    }
    .token-balance {
        margin: 5px 0;
    }
    .token-balance:not(.token-balance-with-icon) {
        margin-top: 1px;
    }
    .token-balance:not(:last-child) {
        margin-bottom: 25px;
    }
    .token-rate:not(:last-child),
    .token-bonus:not(:last-child) {
        margin-bottom: 20px;
    }
    .token-sales .card-title-sm {
        padding-top: 0;
    }
    .token-sales .sap {
        margin: 1px 0 0;
    }
}

@media (min-width: 768px) and (max-width: 991px) {
    .token-rate-wrap .token-rate {
        margin: 0;
    }
    .token-bonus-date {
        text-align: left;
        width: 70%;
    }
}

@media (min-width: 576px) and (max-width: 991px) {
    .token-calculator {
        position: relative;
    }
    .token-calculator .card-innr {
        padding-right: 180px;
    }
    .token-calculator .token-buy {
        position: absolute;
        right: 30px;
        top: 50%;
        transform: translateY(-50%);
        margin: 0;
    }
    .token-calculator .token-buy .btn {
        min-width: 130px;
    }
}

@media (min-width: 768px) {
    .token-info.bdr-tl {
        border-left: 1px solid #e6effb;
        border-top: 0;
    }
    .token-bonus:after {
        display: none;
    }
}

@media (min-width: 992px) {
    .token-buy {
        margin-top: 25px;
    }
}

.bonus-bar {
    font-size: 9px;
    font-weight: 400;
    color: #6e81a9;
    background: #e0e8f3;
    border-radius: 3px;
    height: 16px;
    width: 100%;
    margin: 20px 0;
    display: flex;
}

.bonus-base {
    width: 20%;
    background: #2c80ff;
    border-radius: 2px;
    height: 8px;
    margin: 4px 2px 4px 4px;
    position: relative;
}

.bonus-base-title {
    color: #758698;
    position: absolute;
    left: -4px;
    bottom: 100%;
    line-height: 1;
    margin-bottom: 10px;
}

.bonus-base-amount {
    position: absolute;
    right: 0;
    top: 100%;
    line-height: 1;
    margin-top: 10px;
}

.bonus-base-percent {
    position: absolute;
    right: 0;
    bottom: 100%;
    line-height: 1;
    margin-bottom: 10px;
}

.bonus-extra {
    display: flex;
    width: 80%;
    background: #2c80ff;
    border-radius: 2px;
    height: 8px;
    margin: 4px 4px 4px 2px;
}

.bonus-extra-item {
    position: relative;
}

.bonus-extra-item:after {
    position: absolute;
    content: '';
    right: 0;
    top: -4px;
    width: 1px;
    height: 16px;
    background: rgba(73, 84, 99, 0.1);
}

.bonus-extra-item:before {
    position: absolute;
    content: '';
    right: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: #e0e8f3;
}

.bonus-extra-item.active:before {
    opacity: 0;
}

.bonus-extra-item:last-child:after {
    display: none;
}

.bonus-extra-item:last-child .bonus-extra-amount,
.bonus-extra-item:last-child .bonus-extra-percent {
    left: auto;
    right: -4px;
}

.bonus-extra-amount {
    position: absolute;
    left: 100%;
    top: 100%;
    line-height: 1;
    margin-top: 10px;
    white-space: nowrap;
}

.bonus-extra-percent {
    position: absolute;
    left: 100%;
    bottom: 100%;
    line-height: 1;
    margin-bottom: 10px;
}

@media (min-width: 576px) {
    .bonus-bar {
        font-size: 12px;
    }
}

.pay-option-label {
    width: 100%;
    background: #e6effb;
    border: 2px solid #e6effb;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
    transition: all .4s ease;
    text-align: center;
    margin-bottom: 15px;
}

.pay-option-label:after {
    position: absolute;
    height: 14px;
    width: 14px;
    border-radius: 50%;
    border: 2px solid #fff;
    background: #2c80ff;
    content: '';
    top: 0;
    right: -5px;
    transform: translate(-50%, -50%) scale(0);
    transition: all .4s ease;
}

.pay-option-check {
    position: absolute;
    height: 1px;
    width: 1px;
    opacity: 0;
}

.pay-option-check:checked~label {
    border-color: #2c80ff;
}

.pay-option-check:checked~label:after {
    transform: translate(-50%, -50%) scale(1);
}

.pay-list {
    display: flex;
    flex-wrap: wrap;
}

.pay-item {
    width: 100%;
}

.pay-check {
    position: absolute;
    height: 1px;
    width: 1px;
    opacity: 0;
}

.pay-check-label {
    position: relative;
    padding: 50px 25px 5px;
    border: 2px solid #d2dde9;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    margin-bottom: 20px;
    width: 100%;
    transition: all .4s ease;
}

.pay-check-label:before {
    position: absolute;
    height: 24px;
    width: 24px;
    border-radius: 50%;
    border: 2px solid #d2dde9;
    content: '';
    top: 22px;
    left: 50%;
    transform: translateX(-50%);
    transition: all .4s ease;
}

.pay-check-label:after {
    position: absolute;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #2c80ff;
    content: '';
    top: 26px;
    left: 50%;
    transform: translateX(-50%);
    opacity: 0;
    transition: all .4s ease;
}

.pay-check-label img {
    height: 60px;
}

.pay-check:checked~label {
    border-color: #2c80ff;
}

.pay-check:checked~label:before {
    border-color: #2c80ff;
}

.pay-check:checked~label:after {
    opacity: 1;
}

.pay-amount {
    display: block;
}

.pay-icon {
    padding-right: 10px;
    font-size: 22px;
    line-height: 30px;
    width: 30px;
    text-align: center;
}

.pay-icon.cf-ltc {
    font-size: 18px;
}

.pay-title {
    display: inline-flex;
    align-items: center;
}

.pay-cur {
    font-size: 14px;
    line-height: 30px;
    font-weight: 700;
}

.pay-info-list li {
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.05em;
    text-transform: uppercase;
}

.pay-info-list li span {
    color: #758698;
}

.pay-status .ti {
    display: inline-block;
    height: 90px;
    width: 90px;
    line-height: 82px;
    text-align: center;
    border: 2px solid;
    border-radius: 50%;
    font-size: 36px;
}

.pay-status-success .ti {
    border-color: #00d285;
    color: #00d285;
}

.pay-status-warning .ti {
    border-color: #ffc100;
    color: #ffc100;
}

.pay-status-error .ti {
    border-color: #ff6868;
    color: #ff6868;
}

.pay-button {
    width: 100%;
    padding: 10px 0;
}

.pay-buttons {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    padding: 11px 0;
}

.pay-button:first-child {
    padding-left: 0;
}

.pay-button:last-child {
    padding-right: 0;
}

.pay-button-sap {
    width: 100%;
    text-align: center;
    font-weight: 500;
    color: #758698;
    text-transform: uppercase;
}

.pay-notes {
    margin-top: 14px;
    padding-top: 30px;
    border-top: 1px solid #e0e8f3;
    line-height: 1.5;
    padding-bottom: 5px;
}

@media (min-width: 480px) {
    .pay-option-label {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 20px;
    }
    .pay-item {
        width: 50%;
    }
}

@media (min-width: 576px) {
    .pay-item {
        width: auto;
    }
}

@media (min-width: 768px) {
    .pay-button {
        width: auto;
        padding: 10px 20px;
    }
    .pay-button:first-child {
        padding-left: 0;
    }
    .pay-button:last-child {
        padding-right: 0;
    }
    .pay-button-sap {
        width: auto;
    }
}


/** Chat @Elements */

.simplebar-scrollbar:before {
    background: #dbe4ed;
    transition: all .2s linear;
}

.chat-wrap {
    position: relative;
    display: flex;
    height: calc(100vh - 265px);
    overflow: hidden;
}

.chat-wrap .dropdown-content {
    box-shadow: 0px 0 35px 0px rgba(0, 0, 0, 0.05);
}

.chat-wrap .dropdown-content-top-left {
    top: 0;
}

.chat-wrap .simplebar-track,
.chat-wrap .simplebar-scrollbar {
    visibility: hidden !important;
}

.chat-wrap .simplebar-content {
    display: flex;
    flex-direction: column;
}

.chat-wrap .simplebar-scroll-content {
    padding-right: 0 !important;
    margin-bottom: 0 !important;
}

.chat-wrap:after {
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    content: '';
    background: rgba(0, 0, 0, 0.3);
    visibility: hidden;
    opacity: 0;
    transition: all .4s;
}

.chat-wrap.contact-active:after,
.chat-wrap.information-active:after {
    opacity: 1;
    visibility: visible;
}

.chat-avatar {
    flex-shrink: 0;
}

.chat-avatar img {
    width: 36px;
    border-radius: 6px;
    border: 2px solid #fff;
}

.chat-avatar-xs img {
    width: 18px;
}

.chat-avatar-sm img {
    width: 24px;
}

.chat-avatar-lg img {
    width: 40px;
}

.chat-avatar.circle img {
    border-radius: 50%;
}

.chat-avatar-group {
    position: relative;
    border-radius: 6px;
    overflow: hidden;
    border: 2px solid #fff;
}

.circle>.chat-avatar-group {
    border-radius: 50%;
}

.chat-avatar-group:before,
.chat-avatar-group:after {
    position: absolute;
    content: '';
    background-color: #fff;
    left: 50%;
    z-index: 1;
}

.chat-avatar-group:before {
    height: 100%;
    width: 1px;
}

.chat-avatar-group:after {
    top: 50%;
    width: 50%;
    height: 1px;
}

.chat-avatar-group img {
    border-radius: 0 !important;
    border: none;
}

.chat-avatar-group img:not(:first-child) {
    position: absolute;
    width: 20px;
    right: 0;
}

.chat-avatar-group img:nth-child(2) {
    top: 0;
}

.chat-avatar-group img:nth-child(3) {
    bottom: 0;
}

.chat-name {
    margin-bottom: 0;
    font-weight: 500;
    font-size: 14px;
    color: #495463;
}

.chat-status {
    position: relative;
}

.chat-status:after {
    position: absolute;
    height: 10px;
    width: 10px;
    border-radius: 50%;
    top: -5px;
    right: -5px;
    border: 2px solid #fff;
    content: '';
    background: #758698;
}

.chat-status-idle:after {
    background: #ffc100;
}

.chat-status-active:after {
    background: #00d285;
}

.chat-status.circle:after {
    top: 2px;
    right: 2px;
}

.chat-time {
    font-size: 12px;
    color: #758698;
}

.chat-time .icon {
    font-size: 11px;
    color: #b9d2f2;
}

.chat-time .icon:not(:first-of-type) {
    margin-left: -5px;
}

.chat-time .icon+span {
    margin-left: 2px;
}

.chat-time span+.icon:first-of-type {
    margin-left: 5px;
}

.chat-seen .icon {
    color: #00d285;
}

.chat-lock .icon {
    color: #495463;
    margin-right: 10px;
}

.chat-attachment {
    position: relative;
    max-width: 130px;
    overflow: hidden;
}

.chat-attachment:first-child {
    border-radius: 4px 0 0 0;
}

.self .chat-attachment:first-child {
    border-radius: 0 4px 0 0;
}

.chat-attachment:last-child {
    border-radius: 0 4px 4px 0;
}

.self .chat-attachment:last-child {
    border-radius: 4px 0 0 4px;
}

.chat-attachment:before {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: #000;
    content: '';
    opacity: .4;
    transition: all .4s;
}

.self .chat-attachment:before {
    opacity: .7;
    background: #2c80ff;
}

.chat-attachment:hover:before {
    opacity: 0.6;
}

.self .chat-attachment:hover:before {
    opacity: .9;
}

.chat-attachment-caption {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    color: #fff;
    padding: 7px 15px;
    font-size: 13px;
    opacity: 1;
    transition: all .4s;
}

.chat-attachment-download {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    transition: all .4s;
    color: #fff;
    width: 32px;
    line-height: 32px;
    background: rgba(255, 255, 255, 0.2);
    text-align: center;
}

.chat-attachment-download:hover {
    color: #495463;
    background: #fff;
}

.self .chat-attachment-download:hover {
    color: #2c80ff;
}

.chat-attachment:hover .chat-attachment-caption {
    opacity: 0;
}

.chat-attachment:hover .chat-attachment-download {
    opacity: 1;
}

.chat-attachment-list {
    display: flex;
    margin: -5px;
}

.chat-attachment-list li {
    width: 33.33%;
    padding: 5px;
}

.chat-attachment-item {
    border: 5px solid rgba(230, 239, 251, 0.5);
    height: 100%;
    min-height: 60px;
    text-align: center;
    font-size: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chat-users {
    display: none;
    align-items: center;
}

.chat-users>* {
    padding: 0 10px;
}

.chat-users-stack {
    display: flex;
    flex-direction: row-reverse;
}

.chat-users-stack .chat-avatar:not(:first-child) {
    margin-right: -12px;
}

.chat-users-search {
    display: flex;
    margin: -5px;
}

.chat-users-search>div {
    padding: 5px;
}

.chat-users-add {
    position: relative;
}

.chat-contacts {
    position: absolute;
    left: -100%;
    top: 0;
    width: 350px;
    max-width: 85%;
    flex-shrink: 0;
    transition: all .4s;
    z-index: 1;
    background: #fff;
    height: 100%;
}

.chat-contacts.active {
    left: 0;
}

.chat-contacts-tools {
    padding: 20px;
    position: relative;
    overflow: hidden;
}

.chat-contacts-tools-long {
    transition: all .4s;
}

.chat-contacts-tools-short {
    transition: all .4s;
    position: absolute;
    top: 20px;
    opacity: 0;
}

.chat-contacts-heading {
    background: #d2dde9;
    padding: 5px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.chat-contacts-heading .toggle-tigger {
    color: #758698;
    position: relative;
    top: 2px;
}

.chat-contacts-title {
    font-size: 0.8rem;
    font-weight: 500;
    letter-spacing: 0.1em;
    margin-bottom: 0;
    text-transform: uppercase;
    white-space: nowrap;
}

.chat-contacts-title span {
    color: #758698;
}

.chat-contacts-list {
    height: 100%;
    width: 350px;
    max-width: 100%;
}

.chat-contacts-wrap {
    height: calc(100% - 117px);
    overflow: hidden;
    position: relative;
}

.chat-contacts-wrap:after {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    height: 20px;
    content: '';
    background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, white 100%);
}

.chat-contacts-wrap .simplebar-content {
    padding-bottom: 0 !important;
}

.chat-contacts-item {
    display: flex;
    align-items: center;
    padding: 8px 20px;
    min-height: 96px;
    transition: background .4s;
}

.chat-contacts-item:not(:last-child) {
    border-bottom: 1px solid #e6effb;
}

.chat-contacts-item:hover,
.chat-contacts-item.current,
.chat-contacts-item.active {
    background: #f7fafd;
}

.chat-contacts-item.unseen p {
    font-weight: 500;
    color: #292f37;
}

.chat-contacts-content {
    padding-left: 10px;
    transition: all .4s;
}

.chat-contacts-content .chat-name {
    margin-bottom: 3px;
}

.chat-contacts-content p {
    color: #758698;
    font-size: 12px;
    line-height: 1.34;
    max-width: 85%;
    margin-bottom: 0;
    overflow: hidden;
    height: 18px;
}

.chat-contacts-badges {
    display: flex;
    align-items: center;
    margin: 0 -3px;
    margin-bottom: 2px;
}

.chat-contacts-badges li {
    padding: 0 3px;
    display: inline-flex;
}

.chat-contacts-info {
    justify-content: space-between;
    align-items: center;
}

.chat-contacts-texts {
    position: relative;
}

.chat-contacts-texts .badge {
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}

.chat-messages {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.chat-messages-head {
    position: relative;
    padding: 14px 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #d2dde9;
}

.chat-messages-name {
    font-weight: 500;
    display: inline-flex;
    align-items: center;
}

.chat-messages-name .icon {
    margin-left: 7px;
}

.chat-messages-name-ellipsis {
    width: 80px;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.chat-messages-tools {
    display: flex;
}

.chat-messages-tools>li {
    padding: 0 0;
    display: inline-flex;
}

.chat-messages-tools>li>a {
    display: inline-flex;
    color: #495463;
    border-radius: 50%;
    padding: 7px;
}

.chat-messages-tools>li>a.active {
    color: #2c80ff;
}

.chat-messages-tools>li>a.show-information.active {
    color: #2c80ff;
    background: #e6effb;
}

.chat-messages-search {
    position: absolute;
    top: 100%;
    left: 30px;
    right: 30px;
    bottom: -20px;
    z-index: 4;
    padding: 10px 0 0 0;
    margin-top: 1px;
    background: #fff;
    opacity: 0;
    visibility: hidden;
    transition: all .4s;
}

.chat-messages-search.active {
    transform: translateY(10px);
    opacity: 1;
    visibility: visible;
}

.chat-messages-body {
    height: calc(100% - 165px);
}

.chat-messages-body .simplebar-content {
    padding-top: 15px;
    padding-bottom: 15px;
}

.chat-messages-list {
    padding: 15px 12px 0;
}

.chat-messages-item {
    display: flex;
    align-items: flex-end;
    padding: 5px 0;
}

.chat-messages-item.self {
    flex-direction: row-reverse;
}

.chat-messages-sap {
    position: relative;
    width: 70%;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    padding: 5px 0;
}

.chat-messages-sap span {
    display: inline-block;
    padding: 0 20px;
    background: #fff;
    position: relative;
    z-index: 5;
    color: #758698;
    font-size: 13px;
}

.chat-messages-sap:before {
    position: absolute;
    top: 50%;
    height: 1px;
    left: 0;
    right: 0;
    background: #e6effb;
    content: '';
    transform: translateY(-50%);
}

.chat-messages-content {
    margin: 0 15px;
    flex-grow: 1;
}

.chat-messages-bubble {
    position: relative;
    padding: 16px 20px;
    background: #f7fafd;
    margin: 4px 0;
    display: inline-block;
    border-radius: 4px;
}

.chat-messages-body .chat-messages-bubble {
    border-radius: 4px 4px 4px 0;
    clear: both;
    float: left;
}

.chat-messages-body .self .chat-messages-bubble {
    text-align: right;
    float: right;
    background: #2c80ff;
    color: #fff;
    border-radius: 4px 4px 0 4px;
}

.chat-messages-bubble p {
    margin-bottom: 8px;
}

.chat-messages-bubble p:last-of-type {
    margin-bottom: 0;
}

.chat-messages-bubble:hover .chat-messages-actions {
    opacity: 1;
}

.chat-messages-attachments {
    padding: 4px 0;
    display: flex;
    width: 100%;
    margin: 0 -1px;
}

.chat-messages-attachments>div {
    margin: 0 1px;
}

.self .chat-messages-attachments {
    flex-direction: row-reverse;
}

.chat-messages-actions {
    position: absolute;
    left: 100%;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0;
    transition: all .4s;
    z-index: 2;
}

.self .chat-messages-actions {
    left: auto;
    right: 100%;
}

.chat-messages-actions>a {
    padding: 0 20px;
    color: #495463;
}

.chat-messages-actions>a:hover {
    color: #2c80ff;
}

.chat-messages-badges {
    padding: 4px 0 2px;
    display: flex;
    margin: 0 -5px;
}

.chat-messages-badges>div,
.chat-messages-badges>li {
    padding: 0 5px;
}

.chat-messages-info {
    display: flex;
    margin: 0 -8px;
    padding-top: 2px;
    clear: both;
    flex-wrap: wrap;
}

.self .chat-messages-info {
    flex-direction: row-reverse;
}

.chat-messages-info li {
    font-size: 12px;
    padding: 0 8px;
    position: relative;
}

.chat-messages-info li:not(:last-child):after {
    position: absolute;
    right: 0;
    top: 50%;
    content: '';
    height: 4px;
    width: 4px;
    background: #d2dde9;
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.self .chat-messages-info li:not(:last-child):after {
    right: auto;
    left: 0;
    transform: translate(-50%, -50%);
}

.chat-messages-info li a {
    color: #758698;
}

.chat-messages-info li a:hover {
    color: #2c80ff;
}

.chat-messages-info-name {
    width: 100%;
}

.chat-messages-info-name:after {
    display: none;
}

.chat-messages-field {
    padding: 0 12px 12px;
    margin-top: auto;
    display: flex;
    align-items: center;
}

.chat-messages-field .toggle-mobile-content {
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
}

.chat-messages-input {
    position: relative;
    flex-grow: 1;
    margin-right: 8px;
}

.chat-messages-insert {
    margin: 0 -10px;
    padding: 0 5px;
    background: #fff;
}

.chat-messages-insert li {
    padding: 8px 10px;
}

.chat-messages-icon {
    display: inline-flex;
}

.chat-messages-icon a {
    display: inline-flex;
}

.chat-information {
    width: 350px;
    max-width: 100%;
    padding: 0 30px;
    flex-shrink: 0;
    height: 100%;
    overflow-y: scroll;
}

.chat-information-wrap {
    position: absolute;
    right: -100%;
    top: 0;
    transition: all .4s;
    width: 350px;
    max-width: 85%;
    height: 100%;
    overflow: hidden;
    flex-shrink: 0;
    background: #fff;
    z-index: 1;
    padding: 25px 0;
}

.chat-information-wrap.active {
    right: 0;
}

.chat-information .accordion-content {
    padding-right: 0 !important;
}

.chat-information .accordion-heading {
    text-transform: uppercase;
    color: #495463;
    font-size: 13px;
    font-weight: 500;
    margin-bottom: 16px;
    letter-spacing: 0.03em;
}

.chat-information .accordion-heading span {
    color: #758698;
    display: inline-block;
    margin-left: 4px;
}

.chat-details-item {
    margin-bottom: 15px;
}

.chat-details-title {
    font-weight: 12px;
    color: #758698;
    margin-bottom: 8px;
}

.chat-details-info {
    display: flex;
    align-items: center;
}

.chat-details-info .chat-name {
    margin-left: 8px;
}

.chat-details-drop {
    margin-left: auto;
    position: relative;
    display: inline-flex;
}

.chat-details-drop>a {
    display: inline-flex;
    color: #758698;
}

.chat-details-drop .dropdown-content {
    top: -5px;
}

.chat-member-list {
    margin-left: -10px;
    margin-right: -10px;
    height: 165px;
    margin-top: 15px;
}

.chat-member-item {
    position: relative;
    display: flex;
    align-items: center;
    padding: 4px 10px;
}

.chat-member-item .chat-name {
    margin-left: 5px;
    color: #758698;
}

.chat-member-item>* {
    position: relative;
    z-index: 1;
}

.chat-member-item:before {
    position: absolute;
    content: '';
    background: rgba(230, 239, 251, 0.5);
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 0;
    opacity: 0;
    transition: all .4s;
}

.chat-member-item:hover:before,
.chat-member-item:hover .chat-member-action {
    opacity: 1;
}

.chat-member-item:hover .chat-name {
    color: #495463;
}

.chat-member-action,
.chat-member-position {
    margin-left: auto;
}

.chat-member-action {
    position: relative;
    opacity: 0;
    transition: all .4s;
}

.chat-member-action a {
    position: relative;
    color: #758698;
    top: 2px;
}

.chat-member-action .dropdown-content {
    margin-top: -3px;
}

.chat-member-position {
    color: #758698;
    font-size: 11px;
}

.chat-add-short {
    position: absolute;
    top: 20px;
    left: 20px;
    opacity: 0;
    transition: all .4s;
}

.btn-long {
    display: none;
}

@media (min-width: 480px) {
    .chat-contacts-info {
        display: flex;
    }
    .chat-contacts-content p {
        max-width: 75%;
        height: auto;
    }
    .btn-short {
        display: none;
    }
    .btn-long {
        display: block;
    }
}

@media (min-width: 576px) {
    .chat-messages-head {
        padding: 14px 30px;
    }
    .chat-messages-list {
        padding: 15px 30px 0;
    }
    .chat-messages-name-ellipsis {
        width: auto;
        max-width: 220px;
    }
    .chat-messages-info-name {
        width: auto;
    }
    .chat-messages-info-name:after {
        display: block;
    }
    .chat-messages-body .chat-messages-bubble {
        max-width: 85%;
    }
    .chat-messages-input {
        margin-right: 20px;
    }
    .chat-messages-field {
        padding: 0 30px 30px;
    }
    .chat-messages-field .toggle-mobile-content {
        transform: translateX(0);
    }
    .chat-messages-insert {
        display: flex;
    }
}

@media (min-width: 992px) {
    .chat-wrap {
        overflow: visible;
    }
    .chat-wrap:after {
        display: none !important;
    }
    .chat-contacts {
        position: static;
    }
    .chat-contacts.short {
        width: 80px;
    }
    .chat-contacts-list {
        min-width: 350px;
    }
    .chat-contacts-tools-long {
        opacity: 1;
    }
    .short .chat-contacts-tools-long {
        opacity: 0;
    }
    .chat-contacts-tools-short {
        opacity: 0;
    }
    .short .chat-contacts-tools-short {
        opacity: 1;
    }
    .chat-contacts-heading {
        justify-content: space-between;
    }
    .short .chat-contacts-heading {
        justify-content: center;
    }
    .short .chat-contacts-title {
        display: none;
    }
    .short .chat-contacts-content {
        opacity: 0;
    }
    .chat-users {
        margin: 0 -10px;
    }
    .chat-users-search {
        transition: all .4s;
    }
    .short .chat-users-search {
        opacity: 0;
    }
    .short .chat-add-short {
        opacity: 1;
    }
    .chat-information {
        min-width: 350px;
    }
    .chat-information-wrap {
        position: static;
        width: 0;
        right: 0;
    }
    .chat-information-wrap.active {
        width: 350px;
    }
    .chat-users {
        display: flex;
    }
    .chat-messages {
        border-left: 1px solid #d2dde9;
        border-right: 1px solid #d2dde9;
    }
    .chat-messages-icon {
        display: none;
    }
}


/** TimeLine  @Elements */

.timeline {
    position: relative;
    padding: 15px 0;
}

.timeline-wrap {
    position: relative;
    overflow: hidden;
    height: 100%;
    min-height: 300px;
}

.timeline-wrap .timeline-innr {
    overflow-x: hidden;
    height: 100%;
    position: absolute;
    padding-right: 20px;
    padding-bottom: 30px;
}

.timeline-wrap.loaded .timeline-innr {
    padding-bottom: 0;
}

.timeline-load {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    text-align: center;
    padding: 40px 0 0 0;
    background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, white 65%, white 100%);
}

.timeline-load .link {
    display: block;
    text-transform: uppercase;
    font-weight: 400;
    color: #758698;
}

.timeline-load .link:hover {
    color: #2c80ff;
}

.timeline-line {
    position: absolute;
    height: 100%;
    width: 2px;
    border-radius: 2px;
    background: #e3eaf1;
    top: 0;
    left: 90px;
}

.timeline-item {
    display: flex;
}

.timeline-item.hidden {
    display: none;
}

.timeline-time {
    width: 90px;
    flex-shrink: 0;
    font-weight: 500;
    margin: 10px 0;
    position: relative;
    align-self: flex-start;
}

.timeline-time:after {
    position: absolute;
    height: 14px;
    width: 14px;
    border-radius: 50%;
    border: 2px solid #fff;
    background: #2c80ff;
    content: '';
    top: 5px;
    right: -8px;
}

.light>.timeline-time:after {
    background: #fff;
    border-color: #e3eaf1;
}

.secondary>.timeline-time:after {
    background: #253992;
    border-color: #fff;
}

.success>.timeline-time:after {
    background: #00d285;
    border-color: #fff;
}

.warning>.timeline-time:after {
    background: #ffc100;
    border-color: #fff;
}

.danger>.timeline-time:after {
    background: #ff6868;
    border-color: #fff;
}

.timeline-time span {
    display: block;
    font-size: 12px;
    line-height: 1;
    color: #758698;
    font-weight: 400;
}

.timeline-content {
    flex-grow: 1;
    margin: 10px 0 10px 25px;
}

.timeline-content p,
.timeline-content-title {
    margin-bottom: 0;
}

.timeline-content-info {
    font-size: 12px;
    display: block;
    padding-top: 8px;
    color: #758698;
}

a+.timeline-content-info {
    padding-top: 2px;
}

p+.timeline-content-info {
    padding-top: 5px;
}


/** 05.0 - UTILITY */

.ucap {
    text-transform: uppercase;
}

.cap {
    text-transform: capitalize;
}

.font-bold {
    font-weight: 700;
}

.font-semibold {
    font-weight: 600;
}

.font-mid {
    font-weight: 500;
}

.font-light {
    font-weight: 300;
}

.lh-1 {
    line-height: 1;
}

.lh-1-1 {
    line-height: 1.1;
}

.lh-1-2 {
    line-height: 1.2;
}

.lh-1-3 {
    line-height: 1.3;
}

.lh-1-4 {
    line-height: 1.4;
}

.lh-1-5 {
    line-height: 1.5;
}

.pd-0,
.nopd {
    padding: 0px;
}

.npl {
    padding-left: 0px;
}

.npr {
    padding-right: 0px;
}

.overflow-hidden {
    overflow: hidden;
}

.overflow-x-auto {
    overflow-x: auto;
}

.overflow-x-hidden {
    overflow-x: hidden;
}

.overflow-y-auto {
    overflow-y: auto;
}

.overflow-y-hidden {
    overflow-y: hidden;
}

.height-auto {
    height: auto !important;
}

.sap {
    width: 100%;
    border-bottom: 1px solid #e6effb;
}

.sap-light {
    border-bottom-color: #f3f7fd;
}

.gaps-0-5x {
    height: 5px;
}

.gaps-1-5x {
    height: 15px;
}

.gaps-2-5x {
    height: 25px;
}

.gaps-3-5x {
    height: 35px;
}

.gaps-4-5x {
    height: 45px;
}

.gaps-1x {
    height: 10px;
}

.gaps-2x {
    height: 20px;
}

.gaps-3x {
    height: 30px;
}

.gaps-4x {
    height: 40px;
}

.gaps-5x {
    height: 50px;
}

.gaps-6x {
    height: 60px;
}

.gaps-7x {
    height: 70px;
}

.gaps-8x {
    height: 80px;
}

.gaps-9x {
    height: 90px;
}

.gaps-10x {
    height: 100px;
}

.gaps-11x {
    height: 110px;
}

.gaps-12x {
    height: 120px;
}

.gaps-13x {
    height: 130px;
}

.gaps-14x {
    height: 140px;
}

.gaps-15x {
    height: 150px;
}

.gaps-16x {
    height: 160px;
}

.gaps-17x {
    height: 170px;
}

.gaps-18x {
    height: 180px;
}

.gaps-19x {
    height: 190px;
}

.gaps-20x {
    height: 200px;
}

.gaps-21x {
    height: 210px;
}

.gaps-22x {
    height: 220px;
}

.gaps-23x {
    height: 230px;
}

.gaps-24x {
    height: 240px;
}

.gaps-25x {
    height: 250px;
}

.gaps-26x {
    height: 260px;
}

.gaps-27x {
    height: 270px;
}

.gaps-28x {
    height: 280px;
}

.gaps-29x {
    height: 290px;
}

.gaps-30x {
    height: 300px;
}

.pd-0-5x {
    padding: 5px;
}

.pd-1x {
    padding: 10px;
}

.pd-1-5x {
    padding: 15px;
}

.pd-2x {
    padding: 20px;
}

.pd-2-5x {
    padding: 25px;
}

.pd-3x {
    padding: 30px;
}

.pd-3-5x {
    padding: 35px;
}

.pd-4x {
    padding: 40px;
}

.pd-4-5x {
    padding: 45px;
}

.pd-5x {
    padding: 50px;
}

.pd-5-5x {
    padding: 55px;
}

.pd-6x {
    padding: 60px;
}

.pd-6-5x {
    padding: 65px;
}

.pd-7x {
    padding: 70px;
}

.pd-7-5x {
    padding: 75px;
}

.pd-8x {
    padding: 80px;
}

.pd-8-5x {
    padding: 85px;
}

.pd-9x {
    padding: 90px;
}

.pd-9-5x {
    padding: 95px;
}

.pd-10x {
    padding: 100px;
}

.pd-10-5x {
    padding: 105px;
}

.pd-11x {
    padding: 110px;
}

.pd-11-5x {
    padding: 115px;
}

.pd-12x {
    padding: 120px;
}

.pd-12-5x {
    padding: 125px;
}

.pd-13x {
    padding: 130px;
}

.pd-13-5x {
    padding: 135px;
}

.pd-14x {
    padding: 140px;
}

.pd-14-5x {
    padding: 145px;
}

.pd-15x {
    padding: 150px;
}

.pd-15-5x {
    padding: 155px;
}

.pd-16x {
    padding: 160px;
}

.pd-16-5x {
    padding: 165px;
}

.pd-17x {
    padding: 170px;
}

.pd-17-5x {
    padding: 175px;
}

.pd-18x {
    padding: 180px;
}

.pd-18-5x {
    padding: 185px;
}

.pd-19x {
    padding: 190px;
}

.pd-19-5x {
    padding: 195px;
}

.pd-20x {
    padding: 200px;
}

.pd-20-5x {
    padding: 205px;
}

.pdl-0-5x {
    padding-left: 5px;
}

.pdl-1x {
    padding-left: 10px;
}

.pdl-1-5x {
    padding-left: 15px;
}

.pdl-2x {
    padding-left: 20px;
}

.pdl-2-5x {
    padding-left: 25px;
}

.pdl-3x {
    padding-left: 30px;
}

.pdl-3-5x {
    padding-left: 35px;
}

.pdl-4x {
    padding-left: 40px;
}

.pdl-4-5x {
    padding-left: 45px;
}

.pdl-5x {
    padding-left: 50px;
}

.pdl-5-5x {
    padding-left: 55px;
}

.pdl-6x {
    padding-left: 60px;
}

.pdl-6-5x {
    padding-left: 65px;
}

.pdl-7x {
    padding-left: 70px;
}

.pdl-7-5x {
    padding-left: 75px;
}

.pdl-8x {
    padding-left: 80px;
}

.pdl-8-5x {
    padding-left: 85px;
}

.pdl-9x {
    padding-left: 90px;
}

.pdl-9-5x {
    padding-left: 95px;
}

.pdl-10x {
    padding-left: 100px;
}

.pdl-10-5x {
    padding-left: 105px;
}

.pdl-11x {
    padding-left: 110px;
}

.pdl-11-5x {
    padding-left: 115px;
}

.pdl-12x {
    padding-left: 120px;
}

.pdl-12-5x {
    padding-left: 125px;
}

.pdl-13x {
    padding-left: 130px;
}

.pdl-13-5x {
    padding-left: 135px;
}

.pdl-14x {
    padding-left: 140px;
}

.pdl-14-5x {
    padding-left: 145px;
}

.pdl-15x {
    padding-left: 150px;
}

.pdl-15-5x {
    padding-left: 155px;
}

.pdl-16x {
    padding-left: 160px;
}

.pdl-16-5x {
    padding-left: 165px;
}

.pdl-17x {
    padding-left: 170px;
}

.pdl-17-5x {
    padding-left: 175px;
}

.pdl-18x {
    padding-left: 180px;
}

.pdl-18-5x {
    padding-left: 185px;
}

.pdl-19x {
    padding-left: 190px;
}

.pdl-19-5x {
    padding-left: 195px;
}

.pdl-20x {
    padding-left: 200px;
}

.pdl-20-5x {
    padding-left: 205px;
}

.pdr-0-5x {
    padding-right: 5px;
}

.pdr-1x {
    padding-right: 10px;
}

.pdr-1-5x {
    padding-right: 15px;
}

.pdr-2x {
    padding-right: 20px;
}

.pdr-2-5x {
    padding-right: 25px;
}

.pdr-3x {
    padding-right: 30px;
}

.pdr-3-5x {
    padding-right: 35px;
}

.pdr-4x {
    padding-right: 40px;
}

.pdr-4-5x {
    padding-right: 45px;
}

.pdr-5x {
    padding-right: 50px;
}

.pdr-5-5x {
    padding-right: 55px;
}

.pdr-6x {
    padding-right: 60px;
}

.pdr-6-5x {
    padding-right: 65px;
}

.pdr-7x {
    padding-right: 70px;
}

.pdr-7-5x {
    padding-right: 75px;
}

.pdr-8x {
    padding-right: 80px;
}

.pdr-8-5x {
    padding-right: 85px;
}

.pdr-9x {
    padding-right: 90px;
}

.pdr-9-5x {
    padding-right: 95px;
}

.pdr-10x {
    padding-right: 100px;
}

.pdr-10-5x {
    padding-right: 105px;
}

.pdr-11x {
    padding-right: 110px;
}

.pdr-11-5x {
    padding-right: 115px;
}

.pdr-12x {
    padding-right: 120px;
}

.pdr-12-5x {
    padding-right: 125px;
}

.pdr-13x {
    padding-right: 130px;
}

.pdr-13-5x {
    padding-right: 135px;
}

.pdr-14x {
    padding-right: 140px;
}

.pdr-14-5x {
    padding-right: 145px;
}

.pdr-15x {
    padding-right: 150px;
}

.pdr-15-5x {
    padding-right: 155px;
}

.pdr-16x {
    padding-right: 160px;
}

.pdr-16-5x {
    padding-right: 165px;
}

.pdr-17x {
    padding-right: 170px;
}

.pdr-17-5x {
    padding-right: 175px;
}

.pdr-18x {
    padding-right: 180px;
}

.pdr-18-5x {
    padding-right: 185px;
}

.pdr-19x {
    padding-right: 190px;
}

.pdr-19-5x {
    padding-right: 195px;
}

.pdr-20x {
    padding-right: 200px;
}

.pdr-20-5x {
    padding-right: 205px;
}

.pdt-0-5x {
    padding-top: 5px;
}

.pdt-1x {
    padding-top: 10px;
}

.pdt-1-5x {
    padding-top: 15px;
}

.pdt-2x {
    padding-top: 20px;
}

.pdt-2-5x {
    padding-top: 25px;
}

.pdt-3x {
    padding-top: 30px;
}

.pdt-3-5x {
    padding-top: 35px;
}

.pdt-4x {
    padding-top: 40px;
}

.pdt-4-5x {
    padding-top: 45px;
}

.pdt-5x {
    padding-top: 50px;
}

.pdt-5-5x {
    padding-top: 55px;
}

.pdt-6x {
    padding-top: 60px;
}

.pdt-6-5x {
    padding-top: 65px;
}

.pdt-7x {
    padding-top: 70px;
}

.pdt-7-5x {
    padding-top: 75px;
}

.pdt-8x {
    padding-top: 80px;
}

.pdt-8-5x {
    padding-top: 85px;
}

.pdt-9x {
    padding-top: 90px;
}

.pdt-9-5x {
    padding-top: 95px;
}

.pdt-10x {
    padding-top: 100px;
}

.pdt-10-5x {
    padding-top: 105px;
}

.pdt-11x {
    padding-top: 110px;
}

.pdt-11-5x {
    padding-top: 115px;
}

.pdt-12x {
    padding-top: 120px;
}

.pdt-12-5x {
    padding-top: 125px;
}

.pdt-13x {
    padding-top: 130px;
}

.pdt-13-5x {
    padding-top: 135px;
}

.pdt-14x {
    padding-top: 140px;
}

.pdt-14-5x {
    padding-top: 145px;
}

.pdt-15x {
    padding-top: 150px;
}

.pdt-15-5x {
    padding-top: 155px;
}

.pdt-16x {
    padding-top: 160px;
}

.pdt-16-5x {
    padding-top: 165px;
}

.pdt-17x {
    padding-top: 170px;
}

.pdt-17-5x {
    padding-top: 175px;
}

.pdt-18x {
    padding-top: 180px;
}

.pdt-18-5x {
    padding-top: 185px;
}

.pdt-19x {
    padding-top: 190px;
}

.pdt-19-5x {
    padding-top: 195px;
}

.pdt-20x {
    padding-top: 200px;
}

.pdt-20-5x {
    padding-top: 205px;
}

.pdb-0-5x {
    padding-bottom: 5px;
}

.pdb-1x {
    padding-bottom: 10px;
}

.pdb-1-5x {
    padding-bottom: 15px;
}

.pdb-2x {
    padding-bottom: 20px;
}

.pdb-2-5x {
    padding-bottom: 25px;
}

.pdb-3x {
    padding-bottom: 30px;
}

.pdb-3-5x {
    padding-bottom: 35px;
}

.pdb-4x {
    padding-bottom: 40px;
}

.pdb-4-5x {
    padding-bottom: 45px;
}

.pdb-5x {
    padding-bottom: 50px;
}

.pdb-5-5x {
    padding-bottom: 55px;
}

.pdb-6x {
    padding-bottom: 60px;
}

.pdb-6-5x {
    padding-bottom: 65px;
}

.pdb-7x {
    padding-bottom: 70px;
}

.pdb-7-5x {
    padding-bottom: 75px;
}

.pdb-8x {
    padding-bottom: 80px;
}

.pdb-8-5x {
    padding-bottom: 85px;
}

.pdb-9x {
    padding-bottom: 90px;
}

.pdb-9-5x {
    padding-bottom: 95px;
}

.pdb-10x {
    padding-bottom: 100px;
}

.pdb-10-5x {
    padding-bottom: 105px;
}

.pdb-11x {
    padding-bottom: 110px;
}

.pdb-11-5x {
    padding-bottom: 115px;
}

.pdb-12x {
    padding-bottom: 120px;
}

.pdb-12-5x {
    padding-bottom: 125px;
}

.pdb-13x {
    padding-bottom: 130px;
}

.pdb-13-5x {
    padding-bottom: 135px;
}

.pdb-14x {
    padding-bottom: 140px;
}

.pdb-14-5x {
    padding-bottom: 145px;
}

.pdb-15x {
    padding-bottom: 150px;
}

.pdb-15-5x {
    padding-bottom: 155px;
}

.pdb-16x {
    padding-bottom: 160px;
}

.pdb-16-5x {
    padding-bottom: 165px;
}

.pdb-17x {
    padding-bottom: 170px;
}

.pdb-17-5x {
    padding-bottom: 175px;
}

.pdb-18x {
    padding-bottom: 180px;
}

.pdb-18-5x {
    padding-bottom: 185px;
}

.pdb-19x {
    padding-bottom: 190px;
}

.pdb-19-5x {
    padding-bottom: 195px;
}

.pdb-20x {
    padding-bottom: 200px;
}

.pdb-20-5x {
    padding-bottom: 205px;
}

.mlr-auto {
    margin-left: auto;
    margin-right: auto;
}

.mg-0-5x {
    padding: 5px;
}

.mg-1x {
    padding: 10px;
}

.mg-1-5x {
    padding: 15px;
}

.mg-2x {
    padding: 20px;
}

.mg-2-5x {
    padding: 25px;
}

.mg-3x {
    padding: 30px;
}

.mg-3-5x {
    padding: 35px;
}

.mg-4x {
    padding: 40px;
}

.mg-4-5x {
    padding: 45px;
}

.mg-5x {
    padding: 50px;
}

.mg-5-5x {
    padding: 55px;
}

.mg-6x {
    padding: 60px;
}

.mg-6-5x {
    padding: 65px;
}

.mg-7x {
    padding: 70px;
}

.mg-7-5x {
    padding: 75px;
}

.mg-8x {
    padding: 80px;
}

.mg-8-5x {
    padding: 85px;
}

.mg-9x {
    padding: 90px;
}

.mg-9-5x {
    padding: 95px;
}

.mg-10x {
    padding: 100px;
}

.mg-10-5x {
    padding: 105px;
}

.mg-11x {
    padding: 110px;
}

.mg-11-5x {
    padding: 115px;
}

.mg-12x {
    padding: 120px;
}

.mg-12-5x {
    padding: 125px;
}

.mg-13x {
    padding: 130px;
}

.mg-13-5x {
    padding: 135px;
}

.mg-14x {
    padding: 140px;
}

.mg-14-5x {
    padding: 145px;
}

.mg-15x {
    padding: 150px;
}

.mg-15-5x {
    padding: 155px;
}

.mg-16x {
    padding: 160px;
}

.mg-16-5x {
    padding: 165px;
}

.mg-17x {
    padding: 170px;
}

.mg-17-5x {
    padding: 175px;
}

.mg-18x {
    padding: 180px;
}

.mg-18-5x {
    padding: 185px;
}

.mg-19x {
    padding: 190px;
}

.mg-19-5x {
    padding: 195px;
}

.mg-20x {
    padding: 200px;
}

.mg-20-5x {
    padding: 205px;
}

.mgl-0-5x {
    margin-left: 5px;
}

.mgl-1x {
    margin-left: 10px;
}

.mgl-1-5x {
    margin-left: 15px;
}

.mgl-2x {
    margin-left: 20px;
}

.mgl-2-5x {
    margin-left: 25px;
}

.mgl-3x {
    margin-left: 30px;
}

.mgl-3-5x {
    margin-left: 35px;
}

.mgl-4x {
    margin-left: 40px;
}

.mgl-4-5x {
    margin-left: 45px;
}

.mgl-5x {
    margin-left: 50px;
}

.mgl-5-5x {
    margin-left: 55px;
}

.mgl-6x {
    margin-left: 60px;
}

.mgl-6-5x {
    margin-left: 65px;
}

.mgl-7x {
    margin-left: 70px;
}

.mgl-7-5x {
    margin-left: 75px;
}

.mgl-8x {
    margin-left: 80px;
}

.mgl-8-5x {
    margin-left: 85px;
}

.mgl-9x {
    margin-left: 90px;
}

.mgl-9-5x {
    margin-left: 95px;
}

.mgl-10x {
    margin-left: 100px;
}

.mgl-10-5x {
    margin-left: 105px;
}

.mgl-11x {
    margin-left: 110px;
}

.mgl-11-5x {
    margin-left: 115px;
}

.mgl-12x {
    margin-left: 120px;
}

.mgl-12-5x {
    margin-left: 125px;
}

.mgl-13x {
    margin-left: 130px;
}

.mgl-13-5x {
    margin-left: 135px;
}

.mgl-14x {
    margin-left: 140px;
}

.mgl-14-5x {
    margin-left: 145px;
}

.mgl-15x {
    margin-left: 150px;
}

.mgl-15-5x {
    margin-left: 155px;
}

.mgl-16x {
    margin-left: 160px;
}

.mgl-16-5x {
    margin-left: 165px;
}

.mgl-17x {
    margin-left: 170px;
}

.mgl-17-5x {
    margin-left: 175px;
}

.mgl-18x {
    margin-left: 180px;
}

.mgl-18-5x {
    margin-left: 185px;
}

.mgl-19x {
    margin-left: 190px;
}

.mgl-19-5x {
    margin-left: 195px;
}

.mgl-20x {
    margin-left: 200px;
}

.mgl-20-5x {
    margin-left: 205px;
}

.mgr-0-5x {
    margin-right: 5px;
}

.mgr-1x {
    margin-right: 10px;
}

.mgr-1-5x {
    margin-right: 15px;
}

.mgr-2x {
    margin-right: 20px;
}

.mgr-2-5x {
    margin-right: 25px;
}

.mgr-3x {
    margin-right: 30px;
}

.mgr-3-5x {
    margin-right: 35px;
}

.mgr-4x {
    margin-right: 40px;
}

.mgr-4-5x {
    margin-right: 45px;
}

.mgr-5x {
    margin-right: 50px;
}

.mgr-5-5x {
    margin-right: 55px;
}

.mgr-6x {
    margin-right: 60px;
}

.mgr-6-5x {
    margin-right: 65px;
}

.mgr-7x {
    margin-right: 70px;
}

.mgr-7-5x {
    margin-right: 75px;
}

.mgr-8x {
    margin-right: 80px;
}

.mgr-8-5x {
    margin-right: 85px;
}

.mgr-9x {
    margin-right: 90px;
}

.mgr-9-5x {
    margin-right: 95px;
}

.mgr-10x {
    margin-right: 100px;
}

.mgr-10-5x {
    margin-right: 105px;
}

.mgr-11x {
    margin-right: 110px;
}

.mgr-11-5x {
    margin-right: 115px;
}

.mgr-12x {
    margin-right: 120px;
}

.mgr-12-5x {
    margin-right: 125px;
}

.mgr-13x {
    margin-right: 130px;
}

.mgr-13-5x {
    margin-right: 135px;
}

.mgr-14x {
    margin-right: 140px;
}

.mgr-14-5x {
    margin-right: 145px;
}

.mgr-15x {
    margin-right: 150px;
}

.mgr-15-5x {
    margin-right: 155px;
}

.mgr-16x {
    margin-right: 160px;
}

.mgr-16-5x {
    margin-right: 165px;
}

.mgr-17x {
    margin-right: 170px;
}

.mgr-17-5x {
    margin-right: 175px;
}

.mgr-18x {
    margin-right: 180px;
}

.mgr-18-5x {
    margin-right: 185px;
}

.mgr-19x {
    margin-right: 190px;
}

.mgr-19-5x {
    margin-right: 195px;
}

.mgr-20x {
    margin-right: 200px;
}

.mgr-20-5x {
    margin-right: 205px;
}

.mgt-0-5x {
    margin-top: 5px;
}

.mgt-1x {
    margin-top: 10px;
}

.mgt-1-5x {
    margin-top: 15px;
}

.mgt-2x {
    margin-top: 20px;
}

.mgt-2-5x {
    margin-top: 25px;
}

.mgt-3x {
    margin-top: 30px;
}

.mgt-3-5x {
    margin-top: 35px;
}

.mgt-4x {
    margin-top: 40px;
}

.mgt-4-5x {
    margin-top: 45px;
}

.mgt-5x {
    margin-top: 50px;
}

.mgt-5-5x {
    margin-top: 55px;
}

.mgt-6x {
    margin-top: 60px;
}

.mgt-6-5x {
    margin-top: 65px;
}

.mgt-7x {
    margin-top: 70px;
}

.mgt-7-5x {
    margin-top: 75px;
}

.mgt-8x {
    margin-top: 80px;
}

.mgt-8-5x {
    margin-top: 85px;
}

.mgt-9x {
    margin-top: 90px;
}

.mgt-9-5x {
    margin-top: 95px;
}

.mgt-10x {
    margin-top: 100px;
}

.mgt-10-5x {
    margin-top: 105px;
}

.mgt-11x {
    margin-top: 110px;
}

.mgt-11-5x {
    margin-top: 115px;
}

.mgt-12x {
    margin-top: 120px;
}

.mgt-12-5x {
    margin-top: 125px;
}

.mgt-13x {
    margin-top: 130px;
}

.mgt-13-5x {
    margin-top: 135px;
}

.mgt-14x {
    margin-top: 140px;
}

.mgt-14-5x {
    margin-top: 145px;
}

.mgt-15x {
    margin-top: 150px;
}

.mgt-15-5x {
    margin-top: 155px;
}

.mgt-16x {
    margin-top: 160px;
}

.mgt-16-5x {
    margin-top: 165px;
}

.mgt-17x {
    margin-top: 170px;
}

.mgt-17-5x {
    margin-top: 175px;
}

.mgt-18x {
    margin-top: 180px;
}

.mgt-18-5x {
    margin-top: 185px;
}

.mgt-19x {
    margin-top: 190px;
}

.mgt-19-5x {
    margin-top: 195px;
}

.mgt-20x {
    margin-top: 200px;
}

.mgt-20-5x {
    margin-top: 205px;
}

.mgb-0-5x {
    margin-bottom: 5px;
}

.mgb-1x {
    margin-bottom: 10px;
}

.mgb-1-5x {
    margin-bottom: 15px;
}

.mgb-2x {
    margin-bottom: 20px;
}

.mgb-2-5x {
    margin-bottom: 25px;
}

.mgb-3x {
    margin-bottom: 30px;
}

.mgb-3-5x {
    margin-bottom: 35px;
}

.mgb-4x {
    margin-bottom: 40px;
}

.mgb-4-5x {
    margin-bottom: 45px;
}

.mgb-5x {
    margin-bottom: 50px;
}

.mgb-5-5x {
    margin-bottom: 55px;
}

.mgb-6x {
    margin-bottom: 60px;
}

.mgb-6-5x {
    margin-bottom: 65px;
}

.mgb-7x {
    margin-bottom: 70px;
}

.mgb-7-5x {
    margin-bottom: 75px;
}

.mgb-8x {
    margin-bottom: 80px;
}

.mgb-8-5x {
    margin-bottom: 85px;
}

.mgb-9x {
    margin-bottom: 90px;
}

.mgb-9-5x {
    margin-bottom: 95px;
}

.mgb-10x {
    margin-bottom: 100px;
}

.mgb-10-5x {
    margin-bottom: 105px;
}

.mgb-11x {
    margin-bottom: 110px;
}

.mgb-11-5x {
    margin-bottom: 115px;
}

.mgb-12x {
    margin-bottom: 120px;
}

.mgb-12-5x {
    margin-bottom: 125px;
}

.mgb-13x {
    margin-bottom: 130px;
}

.mgb-13-5x {
    margin-bottom: 135px;
}

.mgb-14x {
    margin-bottom: 140px;
}

.mgb-14-5x {
    margin-bottom: 145px;
}

.mgb-15x {
    margin-bottom: 150px;
}

.mgb-15-5x {
    margin-bottom: 155px;
}

.mgb-16x {
    margin-bottom: 160px;
}

.mgb-16-5x {
    margin-bottom: 165px;
}

.mgb-17x {
    margin-bottom: 170px;
}

.mgb-17-5x {
    margin-bottom: 175px;
}

.mgb-18x {
    margin-bottom: 180px;
}

.mgb-18-5x {
    margin-bottom: 185px;
}

.mgb-19x {
    margin-bottom: 190px;
}

.mgb-19-5x {
    margin-bottom: 195px;
}

.mgb-20x {
    margin-bottom: 200px;
}

.mgb-20-5x {
    margin-bottom: 205px;
}

.mgml-0-5x {
    margin-left: -5px;
}

.mgml-1x {
    margin-left: -10px;
}

.mgml-1-5x {
    margin-left: -15px;
}

.mgml-2x {
    margin-left: -20px;
}

.mgml-2-5x {
    margin-left: -25px;
}

.mgml-3x {
    margin-left: -30px;
}

.mgml-3-5x {
    margin-left: -35px;
}

.mgml-4x {
    margin-left: -40px;
}

.mgml-4-5x {
    margin-left: -45px;
}

.mgml-5x {
    margin-left: -50px;
}

.mgml-5-5x {
    margin-left: -55px;
}

.mgml-6x {
    margin-left: -60px;
}

.mgml-6-5x {
    margin-left: -65px;
}

.mgml-7x {
    margin-left: -70px;
}

.mgml-7-5x {
    margin-left: -75px;
}

.mgml-8x {
    margin-left: -80px;
}

.mgml-8-5x {
    margin-left: -85px;
}

.mgml-9x {
    margin-left: -90px;
}

.mgml-9-5x {
    margin-left: -95px;
}

.mgml-10x {
    margin-left: -100px;
}

.mgml-10-5x {
    margin-left: -105px;
}

.mgml-11x {
    margin-left: -110px;
}

.mgml-11-5x {
    margin-left: -115px;
}

.mgml-12x {
    margin-left: -120px;
}

.mgml-12-5x {
    margin-left: -125px;
}

.mgml-13x {
    margin-left: -130px;
}

.mgml-13-5x {
    margin-left: -135px;
}

.mgml-14x {
    margin-left: -140px;
}

.mgml-14-5x {
    margin-left: -145px;
}

.mgml-15x {
    margin-left: -150px;
}

.mgml-15-5x {
    margin-left: -155px;
}

.mgml-16x {
    margin-left: -160px;
}

.mgml-16-5x {
    margin-left: -165px;
}

.mgml-17x {
    margin-left: -170px;
}

.mgml-17-5x {
    margin-left: -175px;
}

.mgml-18x {
    margin-left: -180px;
}

.mgml-18-5x {
    margin-left: -185px;
}

.mgml-19x {
    margin-left: -190px;
}

.mgml-19-5x {
    margin-left: -195px;
}

.mgml-20x {
    margin-left: -200px;
}

.mgml-20-5x {
    margin-left: -205px;
}

.mgmr-0-5x {
    margin-right: -5px;
}

.mgmr-1x {
    margin-right: -10px;
}

.mgmr-1-5x {
    margin-right: -15px;
}

.mgmr-2x {
    margin-right: -20px;
}

.mgmr-2-5x {
    margin-right: -25px;
}

.mgmr-3x {
    margin-right: -30px;
}

.mgmr-3-5x {
    margin-right: -35px;
}

.mgmr-4x {
    margin-right: -40px;
}

.mgmr-4-5x {
    margin-right: -45px;
}

.mgmr-5x {
    margin-right: -50px;
}

.mgmr-5-5x {
    margin-right: -55px;
}

.mgmr-6x {
    margin-right: -60px;
}

.mgmr-6-5x {
    margin-right: -65px;
}

.mgmr-7x {
    margin-right: -70px;
}

.mgmr-7-5x {
    margin-right: -75px;
}

.mgmr-8x {
    margin-right: -80px;
}

.mgmr-8-5x {
    margin-right: -85px;
}

.mgmr-9x {
    margin-right: -90px;
}

.mgmr-9-5x {
    margin-right: -95px;
}

.mgmr-10x {
    margin-right: -100px;
}

.mgmr-10-5x {
    margin-right: -105px;
}

.mgmr-11x {
    margin-right: -110px;
}

.mgmr-11-5x {
    margin-right: -115px;
}

.mgmr-12x {
    margin-right: -120px;
}

.mgmr-12-5x {
    margin-right: -125px;
}

.mgmr-13x {
    margin-right: -130px;
}

.mgmr-13-5x {
    margin-right: -135px;
}

.mgmr-14x {
    margin-right: -140px;
}

.mgmr-14-5x {
    margin-right: -145px;
}

.mgmr-15x {
    margin-right: -150px;
}

.mgmr-15-5x {
    margin-right: -155px;
}

.mgmr-16x {
    margin-right: -160px;
}

.mgmr-16-5x {
    margin-right: -165px;
}

.mgmr-17x {
    margin-right: -170px;
}

.mgmr-17-5x {
    margin-right: -175px;
}

.mgmr-18x {
    margin-right: -180px;
}

.mgmr-18-5x {
    margin-right: -185px;
}

.mgmr-19x {
    margin-right: -190px;
}

.mgmr-19-5x {
    margin-right: -195px;
}

.mgmr-20x {
    margin-right: -200px;
}

.mgmr-20-5x {
    margin-right: -205px;
}

.mgmt-0-5x {
    margin-top: -5px;
}

.mgmt-1x {
    margin-top: -10px;
}

.mgmt-1-5x {
    margin-top: -15px;
}

.mgmt-2x {
    margin-top: -20px;
}

.mgmt-2-5x {
    margin-top: -25px;
}

.mgmt-3x {
    margin-top: -30px;
}

.mgmt-3-5x {
    margin-top: -35px;
}

.mgmt-4x {
    margin-top: -40px;
}

.mgmt-4-5x {
    margin-top: -45px;
}

.mgmt-5x {
    margin-top: -50px;
}

.mgmt-5-5x {
    margin-top: -55px;
}

.mgmt-6x {
    margin-top: -60px;
}

.mgmt-6-5x {
    margin-top: -65px;
}

.mgmt-7x {
    margin-top: -70px;
}

.mgmt-7-5x {
    margin-top: -75px;
}

.mgmt-8x {
    margin-top: -80px;
}

.mgmt-8-5x {
    margin-top: -85px;
}

.mgmt-9x {
    margin-top: -90px;
}

.mgmt-9-5x {
    margin-top: -95px;
}

.mgmt-10x {
    margin-top: -100px;
}

.mgmt-10-5x {
    margin-top: -105px;
}

.mgmt-11x {
    margin-top: -110px;
}

.mgmt-11-5x {
    margin-top: -115px;
}

.mgmt-12x {
    margin-top: -120px;
}

.mgmt-12-5x {
    margin-top: -125px;
}

.mgmt-13x {
    margin-top: -130px;
}

.mgmt-13-5x {
    margin-top: -135px;
}

.mgmt-14x {
    margin-top: -140px;
}

.mgmt-14-5x {
    margin-top: -145px;
}

.mgmt-15x {
    margin-top: -150px;
}

.mgmt-15-5x {
    margin-top: -155px;
}

.mgmt-16x {
    margin-top: -160px;
}

.mgmt-16-5x {
    margin-top: -165px;
}

.mgmt-17x {
    margin-top: -170px;
}

.mgmt-17-5x {
    margin-top: -175px;
}

.mgmt-18x {
    margin-top: -180px;
}

.mgmt-18-5x {
    margin-top: -185px;
}

.mgmt-19x {
    margin-top: -190px;
}

.mgmt-19-5x {
    margin-top: -195px;
}

.mgmt-20x {
    margin-top: -200px;
}

.mgmt-20-5x {
    margin-top: -205px;
}

.mgmb-0-5x {
    margin-bottom: -5px;
}

.mgmb-1x {
    margin-bottom: -10px;
}

.mgmb-1-5x {
    margin-bottom: -15px;
}

.mgmb-2x {
    margin-bottom: -20px;
}

.mgmb-2-5x {
    margin-bottom: -25px;
}

.mgmb-3x {
    margin-bottom: -30px;
}

.mgmb-3-5x {
    margin-bottom: -35px;
}

.mgmb-4x {
    margin-bottom: -40px;
}

.mgmb-4-5x {
    margin-bottom: -45px;
}

.mgmb-5x {
    margin-bottom: -50px;
}

.mgmb-5-5x {
    margin-bottom: -55px;
}

.mgmb-6x {
    margin-bottom: -60px;
}

.mgmb-6-5x {
    margin-bottom: -65px;
}

.mgmb-7x {
    margin-bottom: -70px;
}

.mgmb-7-5x {
    margin-bottom: -75px;
}

.mgmb-8x {
    margin-bottom: -80px;
}

.mgmb-8-5x {
    margin-bottom: -85px;
}

.mgmb-9x {
    margin-bottom: -90px;
}

.mgmb-9-5x {
    margin-bottom: -95px;
}

.mgmb-10x {
    margin-bottom: -100px;
}

.mgmb-10-5x {
    margin-bottom: -105px;
}

.mgmb-11x {
    margin-bottom: -110px;
}

.mgmb-11-5x {
    margin-bottom: -115px;
}

.mgmb-12x {
    margin-bottom: -120px;
}

.mgmb-12-5x {
    margin-bottom: -125px;
}

.mgmb-13x {
    margin-bottom: -130px;
}

.mgmb-13-5x {
    margin-bottom: -135px;
}

.mgmb-14x {
    margin-bottom: -140px;
}

.mgmb-14-5x {
    margin-bottom: -145px;
}

.mgmb-15x {
    margin-bottom: -150px;
}

.mgmb-15-5x {
    margin-bottom: -155px;
}

.mgmb-16x {
    margin-bottom: -160px;
}

.mgmb-16-5x {
    margin-bottom: -165px;
}

.mgmb-17x {
    margin-bottom: -170px;
}

.mgmb-17-5x {
    margin-bottom: -175px;
}

.mgmb-18x {
    margin-bottom: -180px;
}

.mgmb-18-5x {
    margin-bottom: -185px;
}

.mgmb-19x {
    margin-bottom: -190px;
}

.mgmb-19-5x {
    margin-bottom: -195px;
}

.mgmb-20x {
    margin-bottom: -200px;
}

.mgmb-20-5x {
    margin-bottom: -205px;
}

.wauto {
    width: auto;
}

.hauto {
    height: auto;
}

.height-100 {
    height: 100%;
}

.vh100 {
    height: 100vh;
}

.no-shadow {
    box-shadow: none !important;
}

.level-top {
    border-top-left-radius: 0 !important;
    border-top-right-radius: 0 !important;
}

.level-bottom {
    border-bottom-left-radius: 0 !important;
    border-bottom-right-radius: 0 !important;
}

.guttar-1px {
    margin-left: -0.5px !important;
    margin-right: -0.5px !important;
}

.guttar-1px>li,
.guttar-1px>div {
    padding-left: 0.5px !important;
    padding-right: 0.5px !important;
}

.guttar-2px {
    margin-left: -1px !important;
    margin-right: -1px !important;
}

.guttar-2px>li,
.guttar-2px>div {
    padding-left: 1px !important;
    padding-right: 1px !important;
}

.guttar-3px {
    margin-left: -1.5px !important;
    margin-right: -1.5px !important;
}

.guttar-3px>li,
.guttar-3px>div {
    padding-left: 1.5px !important;
    padding-right: 1.5px !important;
}

.guttar-4px {
    margin-left: -2px !important;
    margin-right: -2px !important;
}

.guttar-4px>li,
.guttar-4px>div {
    padding-left: 2px !important;
    padding-right: 2px !important;
}

.guttar-5px {
    margin-left: -2.5px !important;
    margin-right: -2.5px !important;
}

.guttar-5px>li,
.guttar-5px>div {
    padding-left: 2.5px !important;
    padding-right: 2.5px !important;
}

.guttar-6px {
    margin-left: -3px !important;
    margin-right: -3px !important;
}

.guttar-6px>li,
.guttar-6px>div {
    padding-left: 3px !important;
    padding-right: 3px !important;
}

.guttar-7px {
    margin-left: -3.5px !important;
    margin-right: -3.5px !important;
}

.guttar-7px>li,
.guttar-7px>div {
    padding-left: 3.5px !important;
    padding-right: 3.5px !important;
}

.guttar-8px {
    margin-left: -4px !important;
    margin-right: -4px !important;
}

.guttar-8px>li,
.guttar-8px>div {
    padding-left: 4px !important;
    padding-right: 4px !important;
}

.guttar-9px {
    margin-left: -4.5px !important;
    margin-right: -4.5px !important;
}

.guttar-9px>li,
.guttar-9px>div {
    padding-left: 4.5px !important;
    padding-right: 4.5px !important;
}

.guttar-10px {
    margin-left: -5px !important;
    margin-right: -5px !important;
}

.guttar-10px>li,
.guttar-10px>div {
    padding-left: 5px !important;
    padding-right: 5px !important;
}

.guttar-11px {
    margin-left: -5.5px !important;
    margin-right: -5.5px !important;
}

.guttar-11px>li,
.guttar-11px>div {
    padding-left: 5.5px !important;
    padding-right: 5.5px !important;
}

.guttar-12px {
    margin-left: -6px !important;
    margin-right: -6px !important;
}

.guttar-12px>li,
.guttar-12px>div {
    padding-left: 6px !important;
    padding-right: 6px !important;
}

.guttar-13px {
    margin-left: -6.5px !important;
    margin-right: -6.5px !important;
}

.guttar-13px>li,
.guttar-13px>div {
    padding-left: 6.5px !important;
    padding-right: 6.5px !important;
}

.guttar-14px {
    margin-left: -7px !important;
    margin-right: -7px !important;
}

.guttar-14px>li,
.guttar-14px>div {
    padding-left: 7px !important;
    padding-right: 7px !important;
}

.guttar-15px {
    margin-left: -7.5px !important;
    margin-right: -7.5px !important;
}

.guttar-15px>li,
.guttar-15px>div {
    padding-left: 7.5px !important;
    padding-right: 7.5px !important;
}

.guttar-16px {
    margin-left: -8px !important;
    margin-right: -8px !important;
}

.guttar-16px>li,
.guttar-16px>div {
    padding-left: 8px !important;
    padding-right: 8px !important;
}

.guttar-17px {
    margin-left: -8.5px !important;
    margin-right: -8.5px !important;
}

.guttar-17px>li,
.guttar-17px>div {
    padding-left: 8.5px !important;
    padding-right: 8.5px !important;
}

.guttar-18px {
    margin-left: -9px !important;
    margin-right: -9px !important;
}

.guttar-18px>li,
.guttar-18px>div {
    padding-left: 9px !important;
    padding-right: 9px !important;
}

.guttar-19px {
    margin-left: -9.5px !important;
    margin-right: -9.5px !important;
}

.guttar-19px>li,
.guttar-19px>div {
    padding-left: 9.5px !important;
    padding-right: 9.5px !important;
}

.guttar-20px {
    margin-left: -10px !important;
    margin-right: -10px !important;
}

.guttar-20px>li,
.guttar-20px>div {
    padding-left: 10px !important;
    padding-right: 10px !important;
}

.guttar-21px {
    margin-left: -10.5px !important;
    margin-right: -10.5px !important;
}

.guttar-21px>li,
.guttar-21px>div {
    padding-left: 10.5px !important;
    padding-right: 10.5px !important;
}

.guttar-22px {
    margin-left: -11px !important;
    margin-right: -11px !important;
}

.guttar-22px>li,
.guttar-22px>div {
    padding-left: 11px !important;
    padding-right: 11px !important;
}

.guttar-23px {
    margin-left: -11.5px !important;
    margin-right: -11.5px !important;
}

.guttar-23px>li,
.guttar-23px>div {
    padding-left: 11.5px !important;
    padding-right: 11.5px !important;
}

.guttar-24px {
    margin-left: -12px !important;
    margin-right: -12px !important;
}

.guttar-24px>li,
.guttar-24px>div {
    padding-left: 12px !important;
    padding-right: 12px !important;
}

.guttar-25px {
    margin-left: -12.5px !important;
    margin-right: -12.5px !important;
}

.guttar-25px>li,
.guttar-25px>div {
    padding-left: 12.5px !important;
    padding-right: 12.5px !important;
}

.guttar-26px {
    margin-left: -13px !important;
    margin-right: -13px !important;
}

.guttar-26px>li,
.guttar-26px>div {
    padding-left: 13px !important;
    padding-right: 13px !important;
}

.guttar-27px {
    margin-left: -13.5px !important;
    margin-right: -13.5px !important;
}

.guttar-27px>li,
.guttar-27px>div {
    padding-left: 13.5px !important;
    padding-right: 13.5px !important;
}

.guttar-28px {
    margin-left: -14px !important;
    margin-right: -14px !important;
}

.guttar-28px>li,
.guttar-28px>div {
    padding-left: 14px !important;
    padding-right: 14px !important;
}

.guttar-29px {
    margin-left: -14.5px !important;
    margin-right: -14.5px !important;
}

.guttar-29px>li,
.guttar-29px>div {
    padding-left: 14.5px !important;
    padding-right: 14.5px !important;
}

.guttar-30px {
    margin-left: -15px !important;
    margin-right: -15px !important;
}

.guttar-30px>li,
.guttar-30px>div {
    padding-left: 15px !important;
    padding-right: 15px !important;
}

.guttar-31px {
    margin-left: -15.5px !important;
    margin-right: -15.5px !important;
}

.guttar-31px>li,
.guttar-31px>div {
    padding-left: 15.5px !important;
    padding-right: 15.5px !important;
}

.guttar-32px {
    margin-left: -16px !important;
    margin-right: -16px !important;
}

.guttar-32px>li,
.guttar-32px>div {
    padding-left: 16px !important;
    padding-right: 16px !important;
}

.guttar-33px {
    margin-left: -16.5px !important;
    margin-right: -16.5px !important;
}

.guttar-33px>li,
.guttar-33px>div {
    padding-left: 16.5px !important;
    padding-right: 16.5px !important;
}

.guttar-34px {
    margin-left: -17px !important;
    margin-right: -17px !important;
}

.guttar-34px>li,
.guttar-34px>div {
    padding-left: 17px !important;
    padding-right: 17px !important;
}

.guttar-35px {
    margin-left: -17.5px !important;
    margin-right: -17.5px !important;
}

.guttar-35px>li,
.guttar-35px>div {
    padding-left: 17.5px !important;
    padding-right: 17.5px !important;
}

.guttar-36px {
    margin-left: -18px !important;
    margin-right: -18px !important;
}

.guttar-36px>li,
.guttar-36px>div {
    padding-left: 18px !important;
    padding-right: 18px !important;
}

.guttar-37px {
    margin-left: -18.5px !important;
    margin-right: -18.5px !important;
}

.guttar-37px>li,
.guttar-37px>div {
    padding-left: 18.5px !important;
    padding-right: 18.5px !important;
}

.guttar-38px {
    margin-left: -19px !important;
    margin-right: -19px !important;
}

.guttar-38px>li,
.guttar-38px>div {
    padding-left: 19px !important;
    padding-right: 19px !important;
}

.guttar-39px {
    margin-left: -19.5px !important;
    margin-right: -19.5px !important;
}

.guttar-39px>li,
.guttar-39px>div {
    padding-left: 19.5px !important;
    padding-right: 19.5px !important;
}

.guttar-40px {
    margin-left: -20px !important;
    margin-right: -20px !important;
}

.guttar-40px>li,
.guttar-40px>div {
    padding-left: 20px !important;
    padding-right: 20px !important;
}

.guttar-41px {
    margin-left: -20.5px !important;
    margin-right: -20.5px !important;
}

.guttar-41px>li,
.guttar-41px>div {
    padding-left: 20.5px !important;
    padding-right: 20.5px !important;
}

.guttar-42px {
    margin-left: -21px !important;
    margin-right: -21px !important;
}

.guttar-42px>li,
.guttar-42px>div {
    padding-left: 21px !important;
    padding-right: 21px !important;
}

.guttar-43px {
    margin-left: -21.5px !important;
    margin-right: -21.5px !important;
}

.guttar-43px>li,
.guttar-43px>div {
    padding-left: 21.5px !important;
    padding-right: 21.5px !important;
}

.guttar-44px {
    margin-left: -22px !important;
    margin-right: -22px !important;
}

.guttar-44px>li,
.guttar-44px>div {
    padding-left: 22px !important;
    padding-right: 22px !important;
}

.guttar-45px {
    margin-left: -22.5px !important;
    margin-right: -22.5px !important;
}

.guttar-45px>li,
.guttar-45px>div {
    padding-left: 22.5px !important;
    padding-right: 22.5px !important;
}

.guttar-46px {
    margin-left: -23px !important;
    margin-right: -23px !important;
}

.guttar-46px>li,
.guttar-46px>div {
    padding-left: 23px !important;
    padding-right: 23px !important;
}

.guttar-47px {
    margin-left: -23.5px !important;
    margin-right: -23.5px !important;
}

.guttar-47px>li,
.guttar-47px>div {
    padding-left: 23.5px !important;
    padding-right: 23.5px !important;
}

.guttar-48px {
    margin-left: -24px !important;
    margin-right: -24px !important;
}

.guttar-48px>li,
.guttar-48px>div {
    padding-left: 24px !important;
    padding-right: 24px !important;
}

.guttar-49px {
    margin-left: -24.5px !important;
    margin-right: -24.5px !important;
}

.guttar-49px>li,
.guttar-49px>div {
    padding-left: 24.5px !important;
    padding-right: 24.5px !important;
}

.guttar-50px {
    margin-left: -25px !important;
    margin-right: -25px !important;
}

.guttar-50px>li,
.guttar-50px>div {
    padding-left: 25px !important;
    padding-right: 25px !important;
}

.guttar-vr-1px {
    margin-top: -0.5px !important;
    margin-bottom: -0.5px !important;
}

.guttar-vr-1px>li,
.guttar-vr-1px>div {
    padding-top: 0.5px !important;
    padding-bottom: 0.5px !important;
}

.guttar-vr-2px {
    margin-top: -1px !important;
    margin-bottom: -1px !important;
}

.guttar-vr-2px>li,
.guttar-vr-2px>div {
    padding-top: 1px !important;
    padding-bottom: 1px !important;
}

.guttar-vr-3px {
    margin-top: -1.5px !important;
    margin-bottom: -1.5px !important;
}

.guttar-vr-3px>li,
.guttar-vr-3px>div {
    padding-top: 1.5px !important;
    padding-bottom: 1.5px !important;
}

.guttar-vr-4px {
    margin-top: -2px !important;
    margin-bottom: -2px !important;
}

.guttar-vr-4px>li,
.guttar-vr-4px>div {
    padding-top: 2px !important;
    padding-bottom: 2px !important;
}

.guttar-vr-5px {
    margin-top: -2.5px !important;
    margin-bottom: -2.5px !important;
}

.guttar-vr-5px>li,
.guttar-vr-5px>div {
    padding-top: 2.5px !important;
    padding-bottom: 2.5px !important;
}

.guttar-vr-6px {
    margin-top: -3px !important;
    margin-bottom: -3px !important;
}

.guttar-vr-6px>li,
.guttar-vr-6px>div {
    padding-top: 3px !important;
    padding-bottom: 3px !important;
}

.guttar-vr-7px {
    margin-top: -3.5px !important;
    margin-bottom: -3.5px !important;
}

.guttar-vr-7px>li,
.guttar-vr-7px>div {
    padding-top: 3.5px !important;
    padding-bottom: 3.5px !important;
}

.guttar-vr-8px {
    margin-top: -4px !important;
    margin-bottom: -4px !important;
}

.guttar-vr-8px>li,
.guttar-vr-8px>div {
    padding-top: 4px !important;
    padding-bottom: 4px !important;
}

.guttar-vr-9px {
    margin-top: -4.5px !important;
    margin-bottom: -4.5px !important;
}

.guttar-vr-9px>li,
.guttar-vr-9px>div {
    padding-top: 4.5px !important;
    padding-bottom: 4.5px !important;
}

.guttar-vr-10px {
    margin-top: -5px !important;
    margin-bottom: -5px !important;
}

.guttar-vr-10px>li,
.guttar-vr-10px>div {
    padding-top: 5px !important;
    padding-bottom: 5px !important;
}

.guttar-vr-11px {
    margin-top: -5.5px !important;
    margin-bottom: -5.5px !important;
}

.guttar-vr-11px>li,
.guttar-vr-11px>div {
    padding-top: 5.5px !important;
    padding-bottom: 5.5px !important;
}

.guttar-vr-12px {
    margin-top: -6px !important;
    margin-bottom: -6px !important;
}

.guttar-vr-12px>li,
.guttar-vr-12px>div {
    padding-top: 6px !important;
    padding-bottom: 6px !important;
}

.guttar-vr-13px {
    margin-top: -6.5px !important;
    margin-bottom: -6.5px !important;
}

.guttar-vr-13px>li,
.guttar-vr-13px>div {
    padding-top: 6.5px !important;
    padding-bottom: 6.5px !important;
}

.guttar-vr-14px {
    margin-top: -7px !important;
    margin-bottom: -7px !important;
}

.guttar-vr-14px>li,
.guttar-vr-14px>div {
    padding-top: 7px !important;
    padding-bottom: 7px !important;
}

.guttar-vr-15px {
    margin-top: -7.5px !important;
    margin-bottom: -7.5px !important;
}

.guttar-vr-15px>li,
.guttar-vr-15px>div {
    padding-top: 7.5px !important;
    padding-bottom: 7.5px !important;
}

.guttar-vr-16px {
    margin-top: -8px !important;
    margin-bottom: -8px !important;
}

.guttar-vr-16px>li,
.guttar-vr-16px>div {
    padding-top: 8px !important;
    padding-bottom: 8px !important;
}

.guttar-vr-17px {
    margin-top: -8.5px !important;
    margin-bottom: -8.5px !important;
}

.guttar-vr-17px>li,
.guttar-vr-17px>div {
    padding-top: 8.5px !important;
    padding-bottom: 8.5px !important;
}

.guttar-vr-18px {
    margin-top: -9px !important;
    margin-bottom: -9px !important;
}

.guttar-vr-18px>li,
.guttar-vr-18px>div {
    padding-top: 9px !important;
    padding-bottom: 9px !important;
}

.guttar-vr-19px {
    margin-top: -9.5px !important;
    margin-bottom: -9.5px !important;
}

.guttar-vr-19px>li,
.guttar-vr-19px>div {
    padding-top: 9.5px !important;
    padding-bottom: 9.5px !important;
}

.guttar-vr-20px {
    margin-top: -10px !important;
    margin-bottom: -10px !important;
}

.guttar-vr-20px>li,
.guttar-vr-20px>div {
    padding-top: 10px !important;
    padding-bottom: 10px !important;
}

.guttar-vr-21px {
    margin-top: -10.5px !important;
    margin-bottom: -10.5px !important;
}

.guttar-vr-21px>li,
.guttar-vr-21px>div {
    padding-top: 10.5px !important;
    padding-bottom: 10.5px !important;
}

.guttar-vr-22px {
    margin-top: -11px !important;
    margin-bottom: -11px !important;
}

.guttar-vr-22px>li,
.guttar-vr-22px>div {
    padding-top: 11px !important;
    padding-bottom: 11px !important;
}

.guttar-vr-23px {
    margin-top: -11.5px !important;
    margin-bottom: -11.5px !important;
}

.guttar-vr-23px>li,
.guttar-vr-23px>div {
    padding-top: 11.5px !important;
    padding-bottom: 11.5px !important;
}

.guttar-vr-24px {
    margin-top: -12px !important;
    margin-bottom: -12px !important;
}

.guttar-vr-24px>li,
.guttar-vr-24px>div {
    padding-top: 12px !important;
    padding-bottom: 12px !important;
}

.guttar-vr-25px {
    margin-top: -12.5px !important;
    margin-bottom: -12.5px !important;
}

.guttar-vr-25px>li,
.guttar-vr-25px>div {
    padding-top: 12.5px !important;
    padding-bottom: 12.5px !important;
}

.guttar-vr-26px {
    margin-top: -13px !important;
    margin-bottom: -13px !important;
}

.guttar-vr-26px>li,
.guttar-vr-26px>div {
    padding-top: 13px !important;
    padding-bottom: 13px !important;
}

.guttar-vr-27px {
    margin-top: -13.5px !important;
    margin-bottom: -13.5px !important;
}

.guttar-vr-27px>li,
.guttar-vr-27px>div {
    padding-top: 13.5px !important;
    padding-bottom: 13.5px !important;
}

.guttar-vr-28px {
    margin-top: -14px !important;
    margin-bottom: -14px !important;
}

.guttar-vr-28px>li,
.guttar-vr-28px>div {
    padding-top: 14px !important;
    padding-bottom: 14px !important;
}

.guttar-vr-29px {
    margin-top: -14.5px !important;
    margin-bottom: -14.5px !important;
}

.guttar-vr-29px>li,
.guttar-vr-29px>div {
    padding-top: 14.5px !important;
    padding-bottom: 14.5px !important;
}

.guttar-vr-30px {
    margin-top: -15px !important;
    margin-bottom: -15px !important;
}

.guttar-vr-30px>li,
.guttar-vr-30px>div {
    padding-top: 15px !important;
    padding-bottom: 15px !important;
}

.guttar-vr-31px {
    margin-top: -15.5px !important;
    margin-bottom: -15.5px !important;
}

.guttar-vr-31px>li,
.guttar-vr-31px>div {
    padding-top: 15.5px !important;
    padding-bottom: 15.5px !important;
}

.guttar-vr-32px {
    margin-top: -16px !important;
    margin-bottom: -16px !important;
}

.guttar-vr-32px>li,
.guttar-vr-32px>div {
    padding-top: 16px !important;
    padding-bottom: 16px !important;
}

.guttar-vr-33px {
    margin-top: -16.5px !important;
    margin-bottom: -16.5px !important;
}

.guttar-vr-33px>li,
.guttar-vr-33px>div {
    padding-top: 16.5px !important;
    padding-bottom: 16.5px !important;
}

.guttar-vr-34px {
    margin-top: -17px !important;
    margin-bottom: -17px !important;
}

.guttar-vr-34px>li,
.guttar-vr-34px>div {
    padding-top: 17px !important;
    padding-bottom: 17px !important;
}

.guttar-vr-35px {
    margin-top: -17.5px !important;
    margin-bottom: -17.5px !important;
}

.guttar-vr-35px>li,
.guttar-vr-35px>div {
    padding-top: 17.5px !important;
    padding-bottom: 17.5px !important;
}

.guttar-vr-36px {
    margin-top: -18px !important;
    margin-bottom: -18px !important;
}

.guttar-vr-36px>li,
.guttar-vr-36px>div {
    padding-top: 18px !important;
    padding-bottom: 18px !important;
}

.guttar-vr-37px {
    margin-top: -18.5px !important;
    margin-bottom: -18.5px !important;
}

.guttar-vr-37px>li,
.guttar-vr-37px>div {
    padding-top: 18.5px !important;
    padding-bottom: 18.5px !important;
}

.guttar-vr-38px {
    margin-top: -19px !important;
    margin-bottom: -19px !important;
}

.guttar-vr-38px>li,
.guttar-vr-38px>div {
    padding-top: 19px !important;
    padding-bottom: 19px !important;
}

.guttar-vr-39px {
    margin-top: -19.5px !important;
    margin-bottom: -19.5px !important;
}

.guttar-vr-39px>li,
.guttar-vr-39px>div {
    padding-top: 19.5px !important;
    padding-bottom: 19.5px !important;
}

.guttar-vr-40px {
    margin-top: -20px !important;
    margin-bottom: -20px !important;
}

.guttar-vr-40px>li,
.guttar-vr-40px>div {
    padding-top: 20px !important;
    padding-bottom: 20px !important;
}

.guttar-vr-41px {
    margin-top: -20.5px !important;
    margin-bottom: -20.5px !important;
}

.guttar-vr-41px>li,
.guttar-vr-41px>div {
    padding-top: 20.5px !important;
    padding-bottom: 20.5px !important;
}

.guttar-vr-42px {
    margin-top: -21px !important;
    margin-bottom: -21px !important;
}

.guttar-vr-42px>li,
.guttar-vr-42px>div {
    padding-top: 21px !important;
    padding-bottom: 21px !important;
}

.guttar-vr-43px {
    margin-top: -21.5px !important;
    margin-bottom: -21.5px !important;
}

.guttar-vr-43px>li,
.guttar-vr-43px>div {
    padding-top: 21.5px !important;
    padding-bottom: 21.5px !important;
}

.guttar-vr-44px {
    margin-top: -22px !important;
    margin-bottom: -22px !important;
}

.guttar-vr-44px>li,
.guttar-vr-44px>div {
    padding-top: 22px !important;
    padding-bottom: 22px !important;
}

.guttar-vr-45px {
    margin-top: -22.5px !important;
    margin-bottom: -22.5px !important;
}

.guttar-vr-45px>li,
.guttar-vr-45px>div {
    padding-top: 22.5px !important;
    padding-bottom: 22.5px !important;
}

.guttar-vr-46px {
    margin-top: -23px !important;
    margin-bottom: -23px !important;
}

.guttar-vr-46px>li,
.guttar-vr-46px>div {
    padding-top: 23px !important;
    padding-bottom: 23px !important;
}

.guttar-vr-47px {
    margin-top: -23.5px !important;
    margin-bottom: -23.5px !important;
}

.guttar-vr-47px>li,
.guttar-vr-47px>div {
    padding-top: 23.5px !important;
    padding-bottom: 23.5px !important;
}

.guttar-vr-48px {
    margin-top: -24px !important;
    margin-bottom: -24px !important;
}

.guttar-vr-48px>li,
.guttar-vr-48px>div {
    padding-top: 24px !important;
    padding-bottom: 24px !important;
}

.guttar-vr-49px {
    margin-top: -24.5px !important;
    margin-bottom: -24.5px !important;
}

.guttar-vr-49px>li,
.guttar-vr-49px>div {
    padding-top: 24.5px !important;
    padding-bottom: 24.5px !important;
}

.guttar-vr-50px {
    margin-top: -25px !important;
    margin-bottom: -25px !important;
}

.guttar-vr-50px>li,
.guttar-vr-50px>div {
    padding-top: 25px !important;
    padding-bottom: 25px !important;
}


/** 06.0 - LAYOUTS */

.topbar {
    background: #253992;
    position: relative;
    z-index: 3;
}

.topbar.has-fixed {
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
}

.topbar-wrap {
    background: #fff;
    margin-bottom: 16px;
}

.topbar-logo {
    padding: 13px 0;
}

.topbar-logo img {
    height: 30px;
}

.topbar-nav {
    display: flex;
    align-items: center;
    margin: 0 -10px;
}

.topbar-nav-item {
    display: inline-flex;
    align-items: center;
    padding: 11px 0;
    margin: 0 10px;
}

.topbar-nav-item .dropdown-content {
    right: -8px;
}

@media (max-width: 991px) {
    .topbar .container {
        min-width: 100% !important;
    }
}

.navbar {
    position: fixed;
    left: -290px;
    top: 0;
    height: 100vh;
    width: 260px;
    z-index: 2;
    align-items: flex-start;
    background: #fff;
    box-shadow: 0px 4px 35px 0px rgba(0, 0, 0, 0.1);
    transition: all .5s;
    display: none;
    padding: 0;
}

.navbar-innr {
    justify-content: space-between;
    align-items: center;
    width: 100%;
}

.navbar.active {
    left: 0;
}

.navbar-mobile {
    display: block;
    overflow-y: auto;
}

.navbar-menu {
    margin-bottom: 20px;
    padding-top: 110px;
}

.navbar-menu>li {
    position: relative;
}

.navbar-menu>li>a {
    display: flex;
    align-items: center;
    font-size: 14px;
    line-height: 32px;
    padding: 9px 0;
    position: relative;
    color: #2c80ff;
}

.navbar-menu>li>a:before {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 2px;
    opacity: 0;
    width: 100%;
    content: '';
    background: #2c80ff;
    transition: all .3s;
}

.navbar-menu>li .ikon {
    font-size: 28px;
    margin-right: 6px;
    margin-left: -4px;
}

.navbar-menu>li.active a:before {
    opacity: 1;
}

.navbar-menu>li:hover a:before,
.navbar-menu>li:focus a:before,
.navbar-menu>li:active a:before {
    opacity: 1;
}

.navbar-dropdown {
    position: relative;
    min-width: 215px;
    background: #fff;
    padding: 10px 0;
    display: none;
}

.navbar-dropdown li a {
    padding: 10px 25px 10px 34px;
    line-height: 20px;
    display: block;
    position: relative;
}

.navbar-dropdown li a:before {
    position: absolute;
    left: 20px;
    width: 6px;
    height: 1px;
    background: #2c80ff;
    content: '';
    top: 19.5px;
}

.navbar-dropdown li a .badge {
    padding: 0 7px;
    min-width: 0;
    margin-left: 6px;
    font-size: 10px;
    border-radius: 2px;
    text-transform: uppercase;
}

.navbar-dropdown li.active>a,
.navbar-dropdown li.current>a,
.navbar-dropdown li:hover>a {
    color: #20317e;
}

.navbar-dropdown .navbar-dropdown {
    padding: 0;
}

.navbar-dropdown .navbar-dropdown li a {
    padding: 10px 25px 10px 50px;
}

.navbar-dropdown .navbar-dropdown li a:before {
    left: 34px;
}

.navbar-dropdown .navbar-dropdown:after {
    display: none;
}

.navbar-dropdown:after {
    position: absolute;
    left: 0;
    top: -2px;
    height: 2px;
    width: 100%;
    content: '';
    background: #2c80ff;
}

.navbar-dropdown .has-dropdown>a:after {
    right: 15px;
}

.navbar-btns {
    margin-bottom: 30px;
}

.has-dropdown>a {
    padding-right: 20px !important;
    position: relative;
}

.has-dropdown>a:after {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    content: '\e64b';
    font-family: 'themify';
    font-size: 10px;
    font-weight: 700;
    transition: all .4s ease;
}

.has-dropdown.current>a:after {
    transform: translateY(-50%) rotate(-180deg);
}

@media (min-width: 576px) {
    .topbar {
        padding-left: 20px;
        padding-right: 20px;
    }
    .topbar-wrap {
        margin-bottom: 30px;
    }
}

@media (min-width: 992px) {
    .topbar-wrap {
        margin-bottom: 50px;
    }
    .topbar-logo img {
        height: 40px;
    }
    .topbar-nav-item {
        padding: 17px 0;
    }
    .navbar {
        position: relative;
        left: 0;
        top: 0;
        display: block;
        min-height: auto;
        width: 100%;
        padding: 0;
        transition: all 0s;
        height: auto;
    }
    .navbar-innr {
        display: flex;
    }
    .navbar-menu {
        display: flex;
        margin: 0 -15px;
        padding-top: 0;
    }
    .navbar-menu>li {
        padding: 0 15px;
    }
    .navbar-menu li {
        position: relative;
    }
    .navbar-menu li:hover>.navbar-dropdown {
        visibility: visible;
        opacity: 1;
        z-index: 29;
    }
    .navbar-btns {
        display: flex;
        margin: 0 -10px;
    }
    .navbar-btns li {
        padding: 0 10px;
    }
    .navbar-dropdown {
        position: absolute;
        left: 15px;
        top: 100%;
        background: #fff;
        box-shadow: 0px 4px 35px 0px rgba(0, 0, 0, 0.1);
        visibility: hidden;
        opacity: 0;
        transition: all .3s ease;
        display: block !important;
        z-index: 9;
    }
    .navbar-dropdown li a {
        font-size: 13px;
        padding: 10px 25px;
    }
    .navbar-dropdown li a:before {
        display: none;
    }
    .navbar-dropdown .navbar-dropdown {
        left: 100%;
        top: -10px;
        padding: 10px 0;
    }
    .navbar-dropdown .navbar-dropdown li a {
        padding: 10px 25px;
    }
    .navbar-dropdown .has-dropdown>a:after {
        transform: translateY(-50%) rotate(-90deg);
    }
    .has-dropdown>a:after {
        right: 0;
    }
}

@media (min-width: 992px) and (max-width: 1200px) {
    .navbar-menu li:last-child:not(:nth-child(1)) .navbar-dropdown,
    .navbar-menu li:last-child:not(:nth-child(2)) .navbar-dropdown,
    .navbar-menu li:last-child:not(:nth-child(3)) .navbar-dropdown,
    .navbar-menu li:last-child:not(:nth-child(4)) .navbar-dropdown {
        left: auto;
        right: 15px;
    }
    .navbar-menu li:last-child:not(:nth-child(1)) .navbar-dropdown .navbar-dropdown,
    .navbar-menu li:last-child:not(:nth-child(2)) .navbar-dropdown .navbar-dropdown,
    .navbar-menu li:last-child:not(:nth-child(3)) .navbar-dropdown .navbar-dropdown,
    .navbar-menu li:last-child:not(:nth-child(4)) .navbar-dropdown .navbar-dropdown {
        left: auto;
        right: 100%;
    }
    .navbar-menu li:last-child:not(:nth-child(1)) .navbar-dropdown .has-dropdown>a:after,
    .navbar-menu li:last-child:not(:nth-child(2)) .navbar-dropdown .has-dropdown>a:after,
    .navbar-menu li:last-child:not(:nth-child(3)) .navbar-dropdown .has-dropdown>a:after,
    .navbar-menu li:last-child:not(:nth-child(4)) .navbar-dropdown .has-dropdown>a:after {
        transform: translateY(-50%) rotate(90deg);
    }
    .navbar-menu li a {
        font-size: 13px;
    }
}

.toggle-nav {
    width: 32px;
    height: 32px;
    display: block;
    transition: all .4s;
}

.toggle-nav {
    left: 10px;
}

.toggle-nav.active .toggle-line {
    width: 30px;
}

.toggle-nav.active .toggle-line:nth-last-of-type(1) {
    transform-origin: bottom left;
    transform: rotate(-45deg);
    bottom: -1px;
}

.toggle-nav.active .toggle-line:nth-last-of-type(2) {
    opacity: 0;
}

.toggle-nav.active .toggle-line:nth-last-of-type(3) {
    opacity: 0;
}

.toggle-nav.active .toggle-line:nth-last-of-type(4) {
    transform-origin: top left;
    transform: rotate(45deg);
    top: -1px;
}

.toggle-line {
    position: relative;
    display: block;
    width: 28px;
    height: 1px;
    line-height: 0;
    background: #fff;
    margin: 5.5px 0;
    transition: all .4s;
}

.toggle-line:nth-last-of-type(2) {
    width: 70%;
}

.toggle-line:nth-last-of-type(3) {
    width: 85%;
}

.page-header {
    padding: 10px 0 20px;
}

.page-header-kyc {
    padding-top: 14px;
    padding-bottom: 25px;
}

.page-header-kyc div[class*=col-] {
    padding-left: 30px;
    padding-right: 30px;
}

.page-header-kyc .page-title {
    font-weight: 400;
}

.page-header-kyc p {
    font-size: 1em;
}

.page-title {
    color: #253992;
    font-size: 1.5em;
    font-weight: 300;
    line-height: 1;
    letter-spacing: -0.01em;
    margin-bottom: 7px;
}

.page-user {
    min-height: 100vh;
    position: relative;
    display: flex;
    flex-direction: column;
}

.page-ath-wrap {
    display: flex;
    min-height: 100vh;
}

.page-ath-content {
    background: #fff;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.page-ath-heading {
    font-size: 1.8em;
    font-weight: 300;
    letter-spacing: -0.025em;
    color: #253992;
    line-height: 1.2;
    padding-bottom: 15px;
}

.page-ath-heading small {
    display: block;
    font-weight: 400;
    font-size: 0.66em;
    color: #495463;
    letter-spacing: normal;
    margin-top: 10px;
}

.page-ath-heading span {
    display: block;
    font-weight: 400;
    font-size: 0.61em;
    color: #495463;
    letter-spacing: normal;
    line-height: 1.62;
    padding-top: 15px;
}

.page-ath-form,
.page-ath-header,
.page-ath-footer,
.page-ath-text {
    width: 440px;
    max-width: 100%;
    margin-left: auto;
    margin-right: auto;
    padding: 0 30px;
}

.page-ath-form {
    padding-top: 40px;
    padding-bottom: 50px;
}

.page-ath-header {
    padding-top: 40px;
}

.page-ath-footer {
    padding-bottom: 30px;
}

.page-ath-gfx {
    background: url(../images/ath-gfx.png) #253992 no-repeat;
    background-size: cover;
    background-position: 50% 50%;
    display: none;
}

@media (min-width: 576px) {
    .page-header {
        padding: 15px 0 45px;
    }
    .page-header-kyc .page-title {
        font-weight: 300;
        margin-bottom: 12px;
    }
    .page-header-kyc p {
        font-size: 1.2em;
    }
    .page-title {
        font-size: 2.57em;
    }
    .page-ath-heading {
        padding-bottom: 23px;
        font-size: 2.8em;
    }
    .page-ath-heading small {
        font-size: 0.46em;
    }
    .page-ath-heading span {
        font-size: 0.41em;
    }
}

@media (min-width: 768px) {
    .page-ath-content {
        width: 50%;
    }
    .page-ath-gfx {
        width: 50%;
        display: flex;
        align-items: center;
    }
}

@media (min-width: 992px) {
    .page-header {
        padding: 15px 0 60px;
    }
}

@media (min-width: 1200px) {
    .page-ath-content {
        width: 38%;
    }
    .page-ath-gfx {
        width: 62%;
    }
}

.content-area .card-head {
    padding-bottom: 10px;
}

.sidebar-nav {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -12px;
}

.sidebar-nav li {
    padding: 0 12px;
    width: 50%;
    flex-shrink: 0;
}

.sidebar-nav li a {
    display: flex;
    align-items: center;
    line-height: 28px;
    color: #495463;
    padding: 4px 0;
    font-size: 12px;
}

.sidebar-nav li a:hover,
.sidebar-nav li a.active {
    color: #2c80ff;
}

.sidebar-nav li a .ikon,
.sidebar-nav li a .ti,
.sidebar-nav li a .icon {
    font-size: 24px;
    margin-right: 4px;
    color: #2c80ff;
}

.sidebar-nav li a .ikon {
    font-size: 22px;
}

.sidebar-nav li.active>a {
    color: #2c80ff;
}

@media (min-width: 375px) {
    .sidebar-nav li {
        width: auto;
    }
}

@media (min-width: 576px) {
    .sidebar-nav {
        margin: 0 -20px;
    }
    .sidebar-nav li {
        padding: 0 20px;
    }
    .sidebar-nav li a {
        font-size: inherit;
    }
    .sidebar-nav li a .ikon,
    .sidebar-nav li a .ti,
    .sidebar-nav li a .icon {
        font-size: 30px;
        margin-right: 6px;
    }
    .sidebar-nav li a .ikon {
        font-size: 28px;
    }
}

@media (min-width: 992px) {
    .sidebar-nav {
        display: block;
    }
}


/*! Bootstrap Overide */

.btn-primary:not(:disabled):not(.disabled).active,
.btn-primary:not(:disabled):not(.disabled):active,
.show>.btn-primary.dropdown-toggle {
    background-color: #0059df;
    border-color: #0059df;
}

.btn-dark:not(:disabled):not(.disabled).active,
.btn-dark:not(:disabled):not(.disabled):active,
.show>.btn-dark.dropdown-toggle {
    background-color: #8397ae;
    border-color: #8397ae;
}

.btn-success:not(:disabled):not(.disabled).active,
.btn-success:not(:disabled):not(.disabled):active,
.show>.btn-success.dropdown-toggle {
    background-color: #009f65;
    border-color: #009f65;
}

.btn-light:not(:disabled):not(.disabled).active,
.btn-light:not(:disabled):not(.disabled):active,
.show>.btn-light.dropdown-toggle {
    background-color: #52606e;
    border-color: #52606e;
    color: #fff;
}

.btn-dark:not(:disabled):not(.disabled).active,
.btn-dark:not(:disabled):not(.disabled):active,
.show>.btn-dark.dropdown-toggle {
    background-color: #333b46;
    border-color: #333b46;
}

.btn-secondary:not(:disabled):not(.disabled).active,
.btn-secondary:not(:disabled):not(.disabled):active,
.show>.btn-secondary.dropdown-toggle {
    background-color: #1b2969;
    border-color: #1b2969;
}

.btn-warning:not(:disabled):not(.disabled).active,
.btn-warning:not(:disabled):not(.disabled):active,
.show>.btn-warning.dropdown-toggle {
    background-color: #cc9a00;
    border-color: #cc9a00;
    color: #fff;
}

.btn-danger:not(:disabled):not(.disabled).active,
.btn-danger:not(:disabled):not(.disabled):active,
.show>.btn-danger.dropdown-toggle {
    background-color: #ff1c1c;
    border-color: #ff1c1c;
}

.demo-element .guttar-vr-5px+.hr {
    margin-bottom: 30px;
}

@media (max-width: 575px) {
    .demo-element .btn {
        min-width: 110px;
    }
}


/** END */

        </style>
    </head>



    <body style="background:#fff;;min-width:auto;" class="no-touch">

       
        <div class="container mt-5" id="receipt">
            <header class="w-100 d-flex justify-content-center text-center mt-5 align-items-center pt-2 pb-2" >
             <!------<img src="../upload/<?php echo $web['image']; ?>" srcset="../upload/<?php echo $web['image']; ?> 2x" alt="logo">------>
                <legend class="h1 font-weight-bold"><?php echo $web['name']; ?></legend>
            </header>
            <?php if(isset($_GET['id'])){
                $ref=$_GET['id'];
                
                $chek = mysqli_query($con, "SELECT * FROM transactions WHERE transid='$ref' ");
                      $data = mysqli_fetch_array($chek);
                     $plan=$data['plans'];
                     $number=$data['mobile'];
                     $network=$data['network'];
                     $amount=$data['amount'];
                     $status=$data['status'];
                     $username=$data['username'];
                     $trans=$data['transid'];
                     $date=$data['date'];
                     $oldbal=$data['oldbal'];
                     $newbal=$data['newbal'];
      
                      
            }
            ?>
            <?php 
            if($status == '1'){
                $main="successful";
            }else{
                $main="fail";
            }
            ?>
            <h6 class="card-sub-title">Your Transaction Details are as Follows:</h6>
             
                            <div class="alert alert-success alert-center alert-dismissible fade show">
                    You <?= $main; ?> purchased  <b><? echo $plan; ?> NARIA </b> Airtime to <? echo $number ?>.
                </div>

               
                <ul class="data-details-list">
                    <li>
                        <div class="data-details-head">Service Name</div>
                        <div class="data-details-des"><b><?echo $network; ?></b></div>
                    </li>

                    <li>
                        <div class="data-details-head">Airtime Amount</div>
                        <div class="data-details-des"><b><?echo $plan; ?> NARIA</b></div>
                    </li>
                                    <li>
                        <div class="data-details-head">Previous Balance</div>
                        <div class="data-details-des"><b>₦<? echo number_format($oldbal,2); ?></b></div>
                    </li>

                    <li>
                        <div class="data-details-head">New Balance</div>
                        <div class="data-details-des"><b>₦<? echo number_format($newbal, 2); ?></b></div>
                    </li>

                    <li>
                        <div class="data-details-head">Amount</div>
                        <div class="data-details-des"><b>₦<? echo number_format($amount, 2); ?></b></div>
                    </li>
                          
                    <li>
                        <div class="data-details-head">Phone</div>
                        <div class="data-details-des"><b><?php echo $number; ?></b></div>
                    </li>
                                <li>
                    <div class="data-details-head">Transaction ID</div>
                    <div class="data-details-des"><b><? echo $trans; ?></b></div>
                </li> 
                <li>
                    <div class="data-details-head">Status</div>
                    <div class="data-details-des"><b><? echo $main; ?></b></div>
                </li>
                <li>
                    <div class="data-details-head">Date</div>
                    <div class="data-details-des"><b><? echo $date; ?></b></div>
                </li>

              
            </ul>

            
        </div>

        <center>
            <div style="margin-bottom:20px; padding-top: 15px;">
                   <button class="btn btn-info" onclick="printContent('receipt');">Print</button> <button class="btn btn-info" id="btnPrint">Save</button>
            </div>
        </center>

        <script>
            function printContent(el){
            var restorepage = $('body').html();
            var printcontent = $('#' + el).clone();
            $('body').empty().html(printcontent);
            window.print();
            $('body').html(restorepage);
            }
            </script>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<script type="text/javascript">
     document.getElementById('btnPrint').addEventListener('click',
     Export);

function Export() {
          html2canvas(document.getElementById('receipt'), {
              onrendered: function (canvas) {
                  var data = canvas.toDataURL();
                  var docDefinition = {
                      content: [{
                          image: data,
                          width: 500
                      }]
                  };
                  pdfMake.createPdf(docDefinition).download("receipt.pdf");
              }
          });
      }  </script>


</body>
</html>
<?php }else{
 echo "<script>document.location.href='index.php'; </script>";
}
?>