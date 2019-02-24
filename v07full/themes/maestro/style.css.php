* {
    font-family: 'Open Sans';
    color: white;
	font-weight: 300;
}

@font-face {
  font-family: 'Open Sans Light';
  font-style: normal;
  font-weight: 300;
  src: local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTegdm0LZdjqr5-oayXSOefg.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}

body {
	background-image:url('<?php echo bgImg(); ?>');
	background-position:center;
	background-size: cover;
	background-attachment: fixed;
}

.page-wrapper {
	background: rgba(0,0,0,0.3);
}

.content {
    /* color: white; */
    border-radius: 5px;
}

/*
.logo img {
	content:url(<?php echo BASE_URL . tpath(); ?>logo.png);
	padding:0;
	margin: 0;
} */
.submenu ul {
	padding-left: 0;
}

li {
	list-style: none;
}

.contact-us *,
.bss-slides figcaption h1,
.bss-slides figcaption a,
h1,h2,h3,h4,h5,h6,
.menu a, .submenu a
{
	font-family: Roboto;
	font-weight: 100 !important;
    color: white;
}
body {
	font-family: 'Raleway',  sans-serif;
	font-size:15px;
	line-height:23px;
	min-height: 100%;
	overflow-x: hidden;
}
.page-wrapper {
    min-height: calc(100% - 50px);
    margin-bottom: -50px;
}

.mid {
	vertical-align: middle;
}

.contacts .flags img {
	width: 20px;
	height: 20px;
}

.header {
	margin: auto;
	box-shadow: 0 1px 5px rgba(0,0,0,0.1);
    -khtml-box-shadow: 0 1px 5px rgba(0,0,0,0.1);
    -webkit-box-shadow: 0 1px 5px rgba(0,0,0,0.1);
    -moz-box-shadow: 0 1px 5px rgba(0,0,0,0.1);
    -ms-box-shadow: 0 1px 5px rgba(0,0,0,0.1);
    -o-box-shadow: 0 1px 5px rgba(0,0,0,0.1);
    transition: padding 0.35s ease;
    -khtml-transition: padding 0.35s ease;
    -webkit-transition: padding 0.35s ease;
    -moz-transition: padding 0.35s ease;
    -ms-transition: padding 0.35s ease;
    -o-transition: padding 0.35s ease;
    background-color: <?php echo $mainColor;?> !important;
	text-align: center;
	position: fixed;
	z-index: 999;
	width: 100%;
	top: 0;
	height: 50px;
}

.page-wrapper .main .content{
  padding: 50px;
	background-color:rgba(0,0,0,0.3);

}

.header .wrap {
    display: inline-block;
    margin: auto;
	height: auto;
	text-align: left;
}

	.menu {
		height: 50px;
		width: 1200px;
		color: white;
	}


	.menu .fa {
		margin-right: 3px;
		font-family: FontAwesome;
	}

	.menu .phone {
		color: white  !important;
		font-size: 1.3em;
		font-weight: bold;
		margin-left: 20px;
		margin-top: 12px;
         padding-top: 12px;
	}
	.menu .phone * {
		color: white !important;
	}

	.menu a {
		text-transform: uppercase;
		font-size: 15px;
		text-decoration: none;
		padding: 15px;
		display: inline-block;
		font-weight: 300;
		color: white;
	}

	.langs {
		width: auto;
    	float: right;
	}

	.langs a {
		margin:10px;
	}


.menu .logo {
	margin:0;
}

/** DROPDOWN **/


/* Dropdown Content (Hidden by Default) */
.dropdownmenu .topmenu ul {
    visibility: hidden;
    position: absolute;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 99;

	transform: translateY(0);
    transition: all 0.2s ease;
    background-color: <?php echo $mainColor;?>
}

/* Show the dropdown menu on hover */
.dropdownmenu:hover .topmenu ul {
    visibility: visible;
	/*transform: translateY(-5px);
    transition-delay: 0s, 0s, 0.3s; */
}


/* Links inside the dropdown */
.topmenu ul a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
	margin: 0;
	text-transform: none;
}

/* Change color of dropdown links on hover */
.header a:hover,
.topmenu ul a:hover {
  color: white;
	background-color: <?php echo $mainColor;?> !important;
}


/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdownmenu:hover .dropbtn {
    background-color: #3e8e41;
}

.footer,
header,
.bss-slides,
figure img {
	min-width: 1200px;
}

.bss-slides {
	background-color: white;
}

.bss-slides figure {
	opacity: 0;
	transition: opacity 1.2s;
}

.bss-slides figure.bss-show {
	opacity: 1;
	transition: opacity 1.2s;
}

.bss-slides figure {
	position: fixed !important;
	width:100%;
	height:100%;
	background-position:center;
	background-size: cover;
	background-attachment: fixed;
}


.bss-slides {
	top: -20px;
}

.bss-slides figcaption {
	top: 2vh;
	background: transparent !important;
	color: #4a4a4a;
	font-size: 30px;
    line-height: 30px;
	position: fixed !important;
	left: auto;
	right: auto !important;
	width: 100%;
}

.bss-slides figcaption .wrap {
	background: transparent;
}

.bss-slides figcaption p {
	margin: 0;
	font-weight: 100;
	margin-bottom: 30px;
}

.bss-slides figcaption h1 {
	text-transform: uppercase;
	font-size: 40px;
    line-height: 40px;
	margin: 0;
	color: <?php echo $mainColor2;?>;
	text-shadow: 0px 1px 1px white;
	text-align: left;
	letter-spacing: 1px;
}

.bss-slides figcaption .btn {
    font-size: 30px;
}

.main {
	padding: 50px 0;
	margin-bottom: 50px;
}

/** front **/
.whiteline {
	width: 100%;
    display: block;
    position: fixed;
    height: 150px;
	background: rgba(0,0,0,0.3);
	bottom: 50px;
    z-index: 99;
	text-align: center;
}

.whiteline .table {
	margin-top: -50px;
	background: transparent;
	width: 1200px;
}

.whiteline .table .td {
	width: 33%;
}

.subtext {
	color: <?php echo $mainColor;?> !important;
}


.whiteline a {
	text-decoration: none;
	color: white !important;
    font-family: roboto;
    font-weight: 300;
}
.whiteline a p {
	color: white !important;
}

.whiteline a i {
    width: 90px;
    height: 90px;
    border: 5px solid white;
    background-color: <?php echo $mainColor2;?>;
    color: #fff;
    font-size: 2.5em;
    text-align: center;
    vertical-align: middle;
    line-height: 85px;
    border-radius: 100%;
    margin-bottom: 5px;
    -webkit-transition: 0.2s ease-in-out;
    -moz-transition: 0.2s ease-in-out;
    -ms-transition: 0.2s ease-in-out;
    -o-transition: 0.2s ease-in-out;
    transition: 0.2s ease-in-out;
	box-shadow: 0 0 1pt 1px <?php echo $mainColor2;?>;
}
.whiteline a i:hover {
	background-color: white;
	color: <?php echo $mainColor2;?>;
	border: 5px solid <?php echo $mainColor2;?>;
}

.first h1, .first .submenu {
	display:none;
}

figure {
	margin: 0;
}

.footer,
header,
.bss-slides,
figure img {
	min-width: 1200px;
	width: 100vw;
}
.bss-next, .bss-prev {
	position: fixed !important;
}



.contact-us i {
    margin-right: 10px;
    font-size: 1.2em;
}

a,
a *{
	color: <?php echo $mainColor; ?>;
	font-weight: normal;
}



.content {
	padding: 50px;
	padding-top: 0;
}
.submenu {
	display: table-cell;
	vertical-align: top;
	padding: 10px 50px;
	border-radius: 5px;
}
/*
.submenu + .content {
    display: table-cell;
} */

.submenu ul {
	padding: 0;
}


.submenu li a {
	padding: 7px 0;
	text-decoration: none;
	display: block;
	color: white;
}

.submenu li a:hover,
.submenu li .selected {
    background-color: white;
    color: black;
    font-weight: 300;
}

.submenu a:before {
	display: inline-block;
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    content: "\f105";
    margin-right: 8px;
	margin-left: 8px;
}

h1 {
    text-transform: uppercase;
    font-size: 50px;
	line-height: 60px;
    font-weight: 300;
    padding: 30px 0;
	text-align: center;
    color: white;
    text-shadow: 1px 1px 1px black;
	font-family: 'Open Sans';
	letter-spacing: 4px;
}

.bigPic {
	width: 800px;
    border-radius: 20px;
}

.main.first {
	position: static;
	height: 100vh;
	display: table-cell;
	vertical-align: middle;
	background-color: #222;
}

.footer {
	background-color: rgba(0,0,0,0.6);
	color: white;
	bottom: 0;
	z-index: 999;
	width: 100%;
	bottom: 0;
}

.footer.first {
	position: fixed;
}
.first .content{
	padding: 0;
}

.footer * {
	color: white;
}

.footer .wrapper {
	width:1200px;
	margin-left: auto;
    margin-right: auto;
	color: white;
	line-height: 50px;
}

.far {
	padding: 0;
}

.faList  {
	margin-top: 10px;
}

.faList li {
	margin-left: 25px;
	padding-left: 25px;
	margin-bottom: 10px;
}

.faList li:before {
	font-family: FontAwesome;
	content: "\f111";
	color: <?php echo $markColor; ?>;
	font-size: 0.714em;
	margin: 0px 15px;
	margin-left: -25px;
}

.circle img {
	width:130px;
	height:130px;
	overflow:hidden;
	border-radius:50%;
	display: inline-block;
	margin: 10PX;
}

.info {
	display: inline-block;
	width: 600px;
}
h2 {
    text-transform: uppercase;
    font-size: 25px;
    letter-spacing: 1px;
    line-height: 25px;
    padding: 0;
    margin: 12px;
    /* color: darkgreen; */
    text-shadow: 1px 1px 1px black;
}

.content div div {
	vertical-align: top;
}

.half {
	display:  inline-block;
	width: 49.5%;
	vertical-align: top;
}


.icons li{
	margin-bottom: 40px;
	padding-top: 1px;
	height:60px;
}


.icons .fa.icon {
    float: left;
    width: 60px;
    height: 60px;
	background-color: <?php echo $mainColor2; ?>;
    color: white;
    border: 4px solid white;
    font-size: 2em !important;
    text-align: center;
    vertical-align: middle;
    line-height: 56px;
    border-radius: 100%;
    margin-right: 10px;
	font-family: FontAwesome;
	margin-top:11px;
	box-shadow: 0 0 1pt 1px <?php echo $mainColor2;?>;
}

.icons a {
	text-decoration: none;
	margin-top: 30px;
	display: inline-block;
	width: calc(100% - 100px);
    text-align: left;
}



.mainmenu.responsive {
	top: 50px;
}

.submit {
	width: 300px;
}

form td {
height: 50px;
}

#form textarea {
	width: 500px;
	min-width: 500px !important;
	height: 170px;
}

.lbl {
	width:200px;
}

#form table input {
	width: 300px;
	margin: 0;
 }

 .half2 {
	margin-top: -20px;
 }

 select, input, textarea {
	color: black;
	border: 1px <?php echo $mainColor;?> solid;
 }
 .langs a {
    margin: 0;
    padding: 0 10px;
    /* overflow: hidden; */
    width: 120px;
    white-space: nowrap;
    line-height: 50px;
	text-transform: capitalize;
 }
 .langs .topmenu ul {
	min-width: auto !important;
 }
 .langs .topmenu ul a {
	padding: 0 10px;
	text-transform: capitalize;
 }

 a.curr_lang:after {
	 content: "\23F7";
 }
 .langs .abbr{
	display:none;
	text-transform: uppercase;
 }

 .roundImg {
	width: 450px;
    border-radius: 10px;
 }

.coop {
	margin-bottom: 50px;
	padding-left: 0;
}

.coop  li {
	margin-bottom: 20px;
}

.coop li:before {
	content: "\f00c";
	font-size: 15px;
	margin-left: -30px;
}

.vertical li {
	display: inline-block;
	width: 33%;
}

.left {
	text-align: left;
}


.day {
	width: 50px !important;
}

.month {
	width: 50px !important;
}

.year {
	width: 90px !important;
}

form .half {
	display: inline-block;
	vertical-align: top;
}

label.error {
	position: absolute;
	z-index: 111;
	margin-top: -5px;
}

.contact-us * {
	color: white !important;
}

.tabContent li {
	text-transform: uppercase !important;
}


figure h1 {
	display: block !important;
}

.btn {
    display: inline-block;
    padding: 10px 50px;
    text-decoration: none;
    font-weight: 100;
    font-size: 25px;
    border-radius: 5px;
    color: white;
    cursor: pointer;
	margin: 0;
	box-shadow: 0 0px 1px rgba(0,0,0,1);
}

 .btn  {
	font-size: 15px;
	padding: 5px 10px;
	margin: 5px 0px;
	
    margin-right: 20px;
}



.bss-slides figcaption {
	margin-top: 50px;
	position: fixed;
}

.header .num {
	display: inline-flex;
}


@media(max-width: 1200px) {
    .footer, header, .bss-slides, figure img {
        min-width: 0 !important;
    }

    .icons .fa.icon {
        font-size: 3vw !important;
    }

	.header .num {
		display: none;
	}



	.main.first {
		 padding-top: 0;
		 position: static;
	}


	.menu > a,
	.header .wrap div.hamburger {
		display: inline-flex !important;
	}

	.mainmenu li:first-child {
		display: none;
	}


	.submenu {
		width: auto;
		width: 280px;
		display: inline-block;
		vertical-align: top;
		padding: 10px;
		border-radius: 5px;
	}


	.hoverform {
		left: 0 !important;
	}


	.tabContent {
		margin-top: 0px !important;
	}

    .footer .wrapper,
    .wrap {
        width: auto;
        padding-left: 3vw;
        padding-right: 3vw;
    }

    .header .wrap {
        width: 100%;
        text-align: left;
    }

    .content {
        width: auto;
        /* max-width: calc(100% - 350px - 4vw); */
		max-width: 100vw;
        padding: 2vw;
    }

    .roundImg,
    .bigPic {
        width: 100%;
    }

    #form textarea {
        width: 100% !important;
        min-width: 0 !important;
        max-width: 450px;
    }
    .lbl {
        width: auto !important;
    }


    .bss-slides figcaption,
    .bss-slides figcaption * {
        font-size: 3vw !important;
        line-height: 3vw !important;
    }
}

img {
	max-width: 100vw;
}

@media(max-device-width:1100px)and (orientation: landscape) {
	.page-wrapper  .first .services {
		display: none !important;
	}
	.whiteline a i {
		width: 10vw;
		height: 10vw;
		line-height: 10vw;
		font-size: 5vw;
	}
}


@media(max-width: 950px) {
	.menu .num {
		display: inline-flex;
	}
	.vertical li {
		display: block;
		width: 100%;
		/* margin: 10px 0; */
		padding-bottom: 20px;
	}
	.vertical li p,
	.vertical li h2 {
		margin: 0;
	}
}


@media(max-width: 800px),(max-device-width:1100px)and (orientation: portrait) {

	.bss-slides figure{
		height: 50vh;
		position: absolute;
		background-size: contain;
	}

	.content {
		font-size: 2.5vw;
		line-height: 4vw;
	}

	.half {
		display: block;
		width: 100%;
	}
	.contacts .half,
	.first .tabContent .half {
		display: inline-block;
		width: 49%;
	}

	.main.first {
		padding-top: 50px;
        vertical-align: top !important;
	}

	/*
	.first .services {
		display: block !important;
	} */

	.whiteline {
		position: fixed;
		/* margin-top: -20px; */
		bottom: 0;
		height: 60vh;
		/*    border-top: 2px black solid; */
		background: transparent;
	}

	.whiteline .table {
		bottom: 100px;
    	position: absolute;
	}

	.whiteline .table .td {
		display: block !important;
		width: 100%;
	}
	.subtext,
	.bss-slides figcaption h1 {
		color: white !important;
		text-align: center !important;
		text-shadow: none !important;
		font-size: 4vw !important;
	}

	.whiteline a i {
		width: 10vw;
		height: 10vw;
		line-height: 10vw;
		font-size: 5vw;
	}


	.bss-slides figcaption {
		position: absolute !important;
		margin-top: 0 !important;
	}



	/** my changes */

	.bss-slides figcaption {
		position: absolute !important;
		font-family: sans-serif;
		bottom: auto;
		right: auto;
		padding: 0 !important;
		top: 0;
		border-radius: 2px;
		opacity: 0;
		-webkit-transition: opacity 1.2s;
		transition: opacity 1.2s;
		text-align: center;
		margin: 0;
	}

	.bss-slides figcaption .wrap {
		padding: 20px;
		top: 40vh;
		position: relative;
		margin-top: -250px;
		background-color: rgba(0,0,0,0.3);
		height: 210px;
	}

	.bss-slides figure {
		height: 40vh;
		position: relative;
		background-size: cover;
		background-position-y: bottom !important;
		background-position-x: 80%;
		top: 0;
		position: fixed !important;
		background-repeat: no-repeat;
		position: absolute;
		top: 0;
		width: 100%;
		display: table-cell;
		vertical-align: middle;
		background-attachment: scroll;
	}




}

.header .wrap div.hamburger {
    color: white !important;
}

.contacts i{
	color: <?php echo $markColor;?>;
}

.num,
.contacts .num b{
	font-family: arial;
}



.contacts .fab:before,
.contacts .fas:before {
text-align: center;
display: inline-block;
width: 20px;
height: 20px;
}

.contacts .fa-viber:before {
	background-color: #59267c;
	color: white;
	border-radius: 10px;
	height: 17px;
	padding-top: 3px;
}

.contacts .fa-whatsapp:before {
	background-color: #25D366;
	color: white;
	border-radius: 10px;
	height: 18px;
	padding-top: 2px;
}

.fa-skype:before {
	color: #00aff0
}


.contacts .half {
	vertical-align: middle;
	padding: 4px 0px;
}

.contacts .table .td {
	padding: 4px 0;
}

.contacts b,
.contacts a b {
	font-weight: 500;
	color: white;
}

.contacts b.main {
	font-weight: 600;
}

.socicons i:before {
	/*color: white;
	background-color: <?php echo $mainColor; ?>; */
	display: table-cell !important;
	vertical-align: middle;
	width: 30px !important;
	height: 30px !important;
	border-radius: 50%;
}

.flag,
.langs img,
.flags img {
	width: 28px;
	height: 28px;
	margin-right: 10px;
	border-radius: 50%;
}

.hoverform {
	width: 600px;
	max-width: 600px;
	position: absolute;
	z-index: 998;
	background-color: #76C142;
	left: 50vw;
	top: -700px;
	padding: 3px;
	transition: top 2s;
}
.hoverform.show {
	top: 50px;
}

.hoverform .contact-us {
	width: 50px !important;
	text-align: right;
	background-color: #76C142;
	cursor: pointer;
	vertical-align: middle;
}

.menu a.contactlink {
	display: inline-flex !important;
}


.header  * {
	color: white;
}
.fa {
	font-family: FontAwesome !important;
}

.contact-us {
	position: fixed;
	top: 50%;
	right: -80px;
	transform: rotate(90deg);
	-ms-transform: rotate(90deg);
	-webkit-transform: rotate(90deg);
	-moz-transform: rotate(90deg);
	-o-transform: rotate(90deg);
	background-color:  <?php echo $mainColor2; ?>;
	color: #ffffff;
	border-radius: 3px;
	font-weight: 600;
	display: block;
	/* width: 189px; */
	/* height: 55px; */
	text-align: center;
	line-height: 3em;
	padding: 0 5vh;
	z-index: 100;
	text-decoration: none;
	transition: 0.3s all ease;
	right: -16vh;
	margin-right: -1vh;
	font-size: 3vh;
	box-shadow: 0 0px 1px rgba(0,0,0,1);
}
.contact-us:hover {
	margin-right: 0;
}

@media(orientation: portrait) {
	.contact-us {
		margin-right: -1vw;
		font-size: 3vw;
		padding: 0 5vw;
		right: -16vw;
	}
}


.hoverform .div2 {
	padding: 10px 20px;
}

.hoverform > div {
	background-color: white;
	display: table-cell;
}
i.fas.fa-phone {
	transform: rotate(100deg);
	top: 1px;
	position: relative;
}

.hoverform:hover {
	right: -10px;
}


.services {
	text-align: center;
	width: 100vw;
}

.first h2 {
	text-align: center;
}


.contactlink {
	font-size: 1.3em !important;
}


@media (max-device-width: 800px) and (orientation: portrait) {


	.header {
		height: 6vw;
		background: <?php echo $mainColor;?>
	}


	.hamburger
	{
		position: static !important;
        font-size: 3vw !important;
        line-height: 6vw !important;
	}

	.footer {
		font-size: 3vw;
		line-height: 6vw;
	}

	.menu .logo img {
        margin: 0 !important;
		height: 6vw !important;
    }

    .menu a {
		font-size: 3vw !important;
		line-height: 6vw !important;
		margin: 0 2vw;
		top: 0;
		padding: 0 15px;
    }



}

@media (max-device-width: 800px) {
	.vertical li {
		display: block;
		width: 100%;
		/* margin: 10px 0; */
		padding-bottom: 20px;
	}
	.vertical li p,
	.vertical li h2 {
		margin: 0;
	}

	form .half {
		display: block;
		width: 100%;
	}
	form .btn,
	body {
        font-size: 1.5em;
		line-height: 1.5em;
    }

	.footer {
		font-size: 18px;
	}

	select, input, textarea {
		font-size: 1.5em;
		width: 100% !important;
		max-width:100% !important;
	}


	.hoverform {
        width: 100vw;
        right: calc(60px - 100%);
        max-width: none;
		font-size: 3vw;
		line-height: 5vw;
    }
    .hoverform .contact-us {
        width: 3em !important;
    }
    .hoverform    .contact-us a {
        margin-left: -3.9em;
    }


	.whiteline {
		line-height: 1em;
	}
	    .header .wrap {
        text-align: left;
        width: 100%;
        padding: 0;
    }


	.contactlink {
		font-size: 0.9em !important;
	}
}

}

.langs img {
    border: 1px white solid;
}

@media (max-device-width: 400px) {

	.langs .fullname {
		display: none;
	}
	.langs .abbr {
		display: inline;
	}

	.bss-slides figure,
	.whiteline {
		height: 50vh;
	}

	.bss-slides figcaption .wrap {
		top: 50vh;
	}

	.menu .logo img {
		content:url(<?php echo BASE_URL . tpath(); ?>logo_sml.png);
	}

	.langs img {
		width: 6vw;
		height: 6vw;
	}
	.langs {
		right: 3vw !important;
	}
	.curr_lang {
		width: 100% !important;
	}
	.curr_lang:after {
		content: none !Important;
	}

    .langs .topmenu ul a {
		padding: 0 3vw;
		width: auto;
	}

	.topmenu.mainmenu.responsive {
		top: 10vw;
		margin-left:0px !important;
		left: 0;
		width: 100%;
	}

	.menu .num {
		display: none !important;
	}
    .menu a {
        font-size: 6vw !important;
        line-height: 10vw !important;
        padding: 0 3vw;
		margin: 0;
    }

    .menu a.hamburger
	{
		position: static !important;
		font-size: 0 !important;
	}
	.hamburger:before {
		content: "☰";
		display: block;
		font-size: 6vw !important;
		line-height: 10vw !important;
	}

    .header,
    .header .menu .logo img {
        height: 10vw  !important;
    }



    /*
	.bss-slides figcaption, .bss-slides figcaption * {
		font-size: 4vw !Important;
		line-height: 4vw !Important;
	} */

	h1 {
		font-size:1.4em !important;
		line-height: 2em !important;;
	}

	h2 {
		font-size:1.2em !important;
		line-height: 1.5em;
	}

	.content,
	.footer {
		font-size: 3vw;
		line-height: 6vw;
	}




	.half {
		display: block;
		width: 100%;
	}


}


.header .wrap div {
	display: inline-flex !important;
	vertical-align: top;
	/* float: none !important; */
	position: static;
}


.table {
	display: table;
}

.td {
	display: table-cell;
}


.first .tabContent {
	margin-top: 0;
}


.adminpanel {
	z-index: 9999;
	line-height: 1em;
}

.admin .header {
	top: 35px;
}


.contactiframe {
	width: 100%;
	height: 50vw;
	max-height: 600px;
	border: 5px  <?php echo $markColor;?> solid;
	border-radius: 5px;
}

.partners img {
	display: inline-flex;
	padding: 10px;
}

.header {
	background-color: black;
}

.dropdownmenu .topmenu ul {
	border-bottom-color: <?php echo $mainColor2; ?> ;
}

a, b, .icons h2,
.contacts b, .contacts a b {
	color: white ;
}


.header .wrap,
.header a {
	background: transparent;
}

a.home {
	padding: 5px;
}

a.home img {
    height: 40px;
}

a.home .logo_hover {
	display:none;
}
a.home:hover img{
	display:none !important;
}

a.home:hover .logo_hover {
	display: inline-block !important;
}


@media(max-width: 1200px),(max-device-width:1200px) {

	.menu li a {
		display: block;
	}

	.menu > a,
	.header .wrap div.hamburger {
		display: inline-flex !important;
	}

	.mainmenu li:first-child {
		display: none;
	}

	.langs {
		position: absolute !important;
    	right: 10px;
	}

	.mainmenu {
		position: absolute !important;
		z-index: 999;
		background-color: black;
		margin-left: -100% !important;
		transition: 1s all ease-out;
		top: 50px;
		background: rgba(0,0,0,0.6);
	}
	.mainmenu.responsive {
		margin-left: -150px !important;
		transition: 1s all ease-out;
		left: auto;
	}


	.mainmenu li:first-child {
		display: none;
	}

	.mainmenu li:not(:first-child) {display: block;}
	.mainmenu.responsive {position: relative;}
	.mainmenu li {
	  float: none !important;
	  display: block;
	  text-align: left;
	}
	.mainmenu .fa-home {
		width:250px;
		text-align:left;
	}
	.header .wrap div.hamburger {
	   display: block;
		position: absolute;
		top: 0;
		margin-left: 40px;
		z-index: 2;
	}

	.dropdownmenu .mainmenu ul {
		left: 250px;
		width: 250px;
		top: 20px;
	}

	.whiteline .table {
		width: 100%;
    	padding: 0;
	}
}

.partners {
	background-color: rgba(255,255,255,0.7);
    text-align: center;
}


/*** demo site **/

.header {
    position: fixed;
    z-index: 20;
    width: 100%;
    height: 50px;
    top: 0;
}


.btn {
  border: 1px rgba(255,255,255,0.7) solid;
  border-radius: 1px;
}

.filenode * {
  color: black;
}


hr {
  color: rgba(255,255,255,0.5) !important;
background-color:  rgba(255,255,255,0.5) !important;
border: 0.5px  rgba(255,255,255,0.5) solid !important;
}


.message {
  border: 0 !important;
  padding: 0 !important;
}


#contacts .contacttext table{
	margin-top:0;
}

#contacts * {
	color: white;
}
.contacttext span {
	color: wheat !important;
}

.center {
      text-align: center;
}
.center div {
    display: inline-block;
    width: auto;
    text-align: left;
}
.contacttext td {
	padding-left: 20px;
  padding-right: 0;
}


.productlist div,
.productcategories div {
  display: inline-flex;
  margin: 10px 20px;
  text-align: center;
  opacity: 0.8;
}

.productlist td {
  text-align:left;
}

.productlist .btn {
  margin: 0;
}

.productlist * {
  color: white;
}


.productcategories div:hover {
  opacity: 1;
}

.productcategories div .img {
  border: 1px white solid;
}


.productlist img {
  height: 250px;
  width: 65px;
}


.galleries div {
    display: inline-block !important;
    width: auto;
    margin: 10px;
    opacity: 0.8;
}

.galleries img {

  border: 1px white solid;
}

.galleries h3 {
  margin: 0;
    color: white;
}


.gallery .img {
    width: 341px;
    height: 200px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    display: inline-block;
    margin: 10px;
    opacity: 0.8;
    border: 1px white solid;
}

.gallery .img div {
  width: 341px;
  height: 200px;
}

.galleries div:hover,
.gallery div:hover {
  opacity: 1;
  cursor:pointer;
}


.gallery .admBtns{
  float: right;
  margin-top: -15px;
  margin-right: -15px;
}

.admBtns .fa.icon {
  border-color: white;
  background-color: black;
}

.admBtns .fa.icon:hover {
  color: black;
  background-color: white;
}


.gallery h3 {
    margin: 0;
    padding-top: 150px;
}

.gallery h3 p {
      margin: 0;
    line-height: 50px;
    text-align: center;
    color: white;
    background-color: rgba(0,0,0,0.5);
    font-size: 30px;
    font-weight: 200;
}

.productcategories {
      text-align: center;
}


.productcategories p.admBtns {
    position: absolute;
    margin-top: -10px;
}

.productcategories img.logo {
    max-height: 30px;
}

.products  p.admBtns{
  position: absolute;
      margin-left: 150px;
}

.productlist {
  text-align: center;
}

.productlist table {
    width: 300px;
}

.btn.sml {
    font-size: 12px;
    padding: 5px 25px;
}

.productimg {
  max-width: 150px;
  max-height: 640px;
}

.content h1 {
    margin-top: 0;
    padding: 0;
}


* {
  font-size: 1.8vmin;
}

.menu a {
  font-size: 20px;
  font-family: Roboto;
  text-transform: capitalize;
}

.menu a.active, .menu a:hover {
    background-color: white !important;
    color: black;
    transition: background-color 2000ms linear;
}

 h1 {
    display: block;
    color: white;
    text-shadow: 1px 1px 0px black;
    display: block;
    text-align: center;
    font-size: 5em;
    margin: 0.3em auto;
    font-weight: 100;
    text-transform: capitalize;
    font-family: Roboto;
}

*, a *, a, .adminpanel a {
  font-family: Roboto;
  font-weight: 100;
}

.langs * {
  font-weight: 100 !important;
}

.langs .topmenu a:hover {
    background-color: white !important;
    color: black !important;
    transition: background-color 500ms linear;
}
.langs .topmenu a:hover * {
  color: black !important;
}

.langs img {
  padding: 3px;
}

.langs a:hover img, .langs .curr_lang img {
    border: 1px white solid;
    border-radius: 50%;
    padding: 2px;
    opacity: 1;
}


.message p.admBtns {
      position: absolute;
}

select, input, textarea {
    color: rgba(255,255,255,0.7);
    border: 1px rgba(255,255,255,0.7) solid;
    background-color: rgba(0,0,0,0.3);
    padding: 5px 10px;
}

.productinfo {
  vertical-align: middle !important;
  font-weight: 100;
}
.productinfo * {
    font-weight: 100 !important
}
.product {
  margin-top: -150px;
}

.product p {
  font-size: 1.5em;
  line-height: 1.5em;
}
input[type="checkbox"]  {
  width: 25px !important;
}

input[type="checkbox"] + label:before {
  display: none !important;
}


.adminpanel {
	width: auto;
	height:100%;
	background-color: white;
	color: black;
	left: 0;
	margin-left: -240px;
	width: 240px;
	transition:  0.3s;
	padding:0;
}

.adminpanel.open {
	margin-left: 0;
}

.adminpanel .close {
	float:right;
	color: black;	
	cursor: pointer;
}

.admingear {
	position: absolute;
	line-height: 50px !important;
	font-size: 20px;
	left: 20px;
	z-index:99;
	cursor: pointer;
	transition:  0.3s;
}

.admingear.open {
	left: 260px;
}


body {	
	transition: 0.3s;
	background-position-y:top;
}

body.open {
	padding-left: 240px;
	background-position-x:240px;
}


.adminpanel,
.adminpanel * {
	background-color: #111;
	color: white;
	font-weight: normal;
}

.adminpanel > div {
	border-bottom: 1px #666 solid;
	padding:20px 10px;
	margin: 0;
	text-align: center;
	line-height: 20px;
}

.adminpanel ul {	
    text-align: left;
    line-height: 50px;
    padding: 0;
}

.adminpanel ul li {
	background-color: transparent;
}

.adminpanel ul a {
	color: white;
    display: block;
    padding-left: 30px;
	line-height: 50px;
	transition: 0.3s;
}

.adminpanel ul a:hover {
	background-color: white;
	color: black;
}

.adminpanel .nopadding {
	padding: 20px 0;
}



#form .translations {
  height: 1000px;
}


.table.ok,
.table.far,
.table.not {
	padding-left: 20px;
	border: none;
	background:transparent;	
}

.table.ok,
.table.ok h2 a,
.table.ok .status {
	color: rgb(120,255,120);
	font-weight: 300;
}

.table.far,
.table.far h2 a,
.table.far .status {
	color: white;
	font-weight: 300;
}


.table.not,
.table.not h2 a,
.table.not .status {
	color: darkgray;
	font-weight: 300;
	font-style:italic;
}

.fa.icon,
thead td a {
	border: none;
	background: none;
}

.status.td {
    width: 150px;
}

.btn-active {
	background-color:#3f51b5;
}
.btn-active:hover {
	color: #3f51b5;
	border-color: #3f51b5;
}

.btn {
	font-style: normal;
	line-height: 25px;
	padding: 5px 15px;
	border-radius: 2px;
}


/** dd fix **/
.borderRadiusTp { 
	border-radius: 2px 2px 0 0;
}

.ddcommon input.text,
.dd .ddChild,
.dd .ddChild li,
.dd .ddTitle {
	background: rgba(0,0,0,0.3) !important;
}

.dd .ddChild {
	background: black !important;
}

.dd .ddChild li{
	padding: 7px !important;
	border-bottom: none !important;
	text-align:left;
}

.ddcommon .ddTitle .ddTitleText {
	text-align: left;
}

.dd .ddChild li img,
.dd .ddTitle .ddTitleText img {
	height: 28px !important;
}

.dd .ddChild li .ddlabel {
	color: white  !important;
	border-bottom: none !important;
}

.dd .divider {
	display: none !important;
}

.dd .ddArrow:before {
	content: "\25BC"
}

::-webkit-scrollbar-track
{
	background: transparent;
}

::-webkit-scrollbar
{
	width: 10px;
	background-color: transparent;
}

::-webkit-scrollbar-thumb
{
	background-color: white;
}


.modal {
	transform: none;
	width: 500px;
	margin-left: -250px;
}

.modal-body {
	overflow: unset;
}


.modal2 {
  background: rgba(0, 0, 0, .6);
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  position: fixed;
  text-align: center; /* Center horizontally */
}
.modal2:before { /* Center vertically, part 1 */
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
}
.modal-dialog2 {
  background-color: black;
  display: inline-block;
  vertical-align: middle !important; /* Center vertically, part 2 */
  padding: 1em;
  border-radius: 5px;
}

.modal-dialog2 .modal-close{
	position: relative;
    left: 100%;
    top: -37px;
    border: 1px rgba(255,255,255,0.5) solid;
}

.toast-top-center {
	top: 25px !important;
}

.toast-bottom-center {
	bottom: 50px !important;
}


.content {
	overflow: auto;
}

.fa, .fas {
    font-weight: 900;
    color: white;
    margin-right: 10px;
    line-height: 25px;
}

.btn:hover,
.btn:hover * {
    color: rgba(0,0,0,0.7);
}



table .btn {
	color: rgba(255,255,255,0.7);
	border: none;
    background: transparent;
    /* width: 25px; */
    /* height: 25px; */
    line-height: 25px;
    box-shadow: none;
    padding: 0;
    margin-right: 0;
}
table .btn:hover {
	background-color: transparent;
}

table .btn * {
	color: rgba(255,255,255,0.7);
}
table .btn:hover * {
	color: white;	
	font-size: 20px;
}


.logout {
	cursor: pointer;
}