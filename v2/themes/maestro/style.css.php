<?php header("Content-type: text/css");?>
.v-content ul {
  padding-left: 40px;
}

.icons button{
  padding:0;
  margin:0;
}


.v-toolbar__content,
.wrap {
    max-width: 1200px;
    width: 100%;
    margin: auto;
}

.v-toolbar__content {
  height:50px !important;
}

.v-toolbar__content .v-btn__content {
  font-size: 20px;
  font-family: Roboto;
  text-transform: capitalize;
   font-weight: 100 !important;
}

main {
  margin-top: 50px;
  margin-bottom: 36px;
  position: fixed;
  width: 100%;
  height: calc(100vh - 86px);
  overflow: auto;
}

.icon {
  min-width: 50px;
}

.settings {
  margin-left: -50px;
      position: absolute;
}

.application {
  background: url('img/bg.jpg') fixed !important;
  background-size: cover !important;
  background-position: center;
}

.v-navigation-drawer>.v-list .v-list__tile,
* {
  color: white;
  font-weight: 100;
}

.application--wrap,
.langs.v-list,
.application .v-toolbar,
.application .v-footer,
.application .v-card,
.v-table,
.v-btn:not(.v-btn--flat) {
  background: rgba(0,0,0,0.3) !important;
}

.v-table tbody tr:hover:not(.v-datatable__expand-row) {
  background:rgba(255,255,255,0.3) !important;
}

.application .v-card {
  padding: 25px;
  margin-bottom: 25px;
}

html, body {
  overflow: hidden;
  font-size:2vmin; /*1.5vmax; */
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: rgba(0,0,0,0.5);
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: rgba(0,0,0,0.7);
}


h1 {
    display: block;
    color: white;
    text-shadow: 1px 1px 0px black;
    display: block;
    text-align: center;
    font-size: 5em;
    line-height: 2.5em;
    margin: 0;
    padding: 0;
    font-weight: 100;
    font-family: Roboto;
}

.home img{
  width: 50px;
  height: 50px;
}

.langs .v-list__tile__title {
  height: 50px;
  line-height: 50px;
}
.langs img {
  width: 40px;
}

.langs img {
    width: 32px;
    height: 32px;
    margin-right: 10px;
    border-radius: 50%;
    padding:3px;
}
.langs.v-list {
  padding: 1px 0;
}

.langs .v-list__tile__title:hover img,
.langs .v-menu__activator img {
      border: 1px white solid;
      padding: 2px;
}
.caesar {
    padding: 0.3em;
    background-image: url(caesar.png);
    background-size: contain;
    background-position: 0 0.20em;
    background-repeat: no-repeat;
    font-style: normal;
	font-family: times;
}
.v-card li:before {
    color: wheat;
    content: "\2605";
    padding-right: 10px;
    position: absolute;
    margin-left: -30px;
}
.v-card li {
    list-style-type: none;
}

.application aside.v-navigation-drawer {
  background-color: #222;
}

a {
  color: wheat;
}

.center {
  text-align:center;
}

aside h1 {
  margin: 0.1em auto;
}

.v-list--dense .v-list__tile {
  font-size: inherit;
}

.v-avatar img {
  border: 1px white solid;
    padding: 1px;
}

.cpmenu .v-list__tile__title{
  margin-left: 20px;
}

.half {
  width: 50%;
}

.left {
  text-align:left;
}

.right {
  text-align: right;
}


.v-content .wrap {
  padding: 50px;
  background: rgba(0,0,0,0.3);
  min-height: 100%;
}

.v-btn:not(.v-btn--flat) {
  border: 1px rgba(255,255,255, 0.5) solid;
}

.v-content {
  padding: 0 !important;
}

.v-footer {
  line-height: 36px;
}

.application .v-toolbar,
.application .v-footer,
.v-content button,
thead {
  background: rgba(0,0,0,0.5) !important;
}

table.v-table thead th {
  font-size: 1.1em;
  font-weight: 200;
  font-family: Roboto;  
}