
* {
	font-family: 'Open Sans';
	color: <?php echo $textColor; ?>
}

h1,h2,h3,h4,h5,h6 {
	color: <?php echo $mainColor; ?>;
}

h1,h2,h3,h4,h5,h6,
.footer a, .header a {
	font-family: 'PT Serif';
}

.fa {
/*	font-family: FontAwesome !important;*/
}

body, html {
	height: 100%;
	padding: 0px;
	margin: 0px;
}

body.admin {
	padding-top:35px;
}


.page-wrapper {
    min-height: 100%;
    margin-bottom: -50px;
}
* html .page-wrapper {
    height: 100%;

}
.page-buffer {
    height: 80px;
}


a {
 color: <?php echo $mainColor2; ?>;
 font-weight:bold;
 cursor:pointer;
 text-decoration: none;
}


.wrap {
	width:1200px;
	margin:auto auto;
	display: block;
}


.header,
.header a,
.footer,
.footer .wrap,
.footer a {
	background-color: <?php echo $mainColor; ?>;
	color: <?php echo $bgColor; ?>;
}
	.header a:hover {
		color: <?php echo $mainColor; ?>;
		background-color: <?php echo $bgColor; ?>;
	}

.header .wrap {
	height:70px;
}

.header .wrap div {
	display: table-cell;
    vertical-align: top;
}

	.menu {
		height:70px;
	}

	.menu a{
		font-size:18px;
		line-height:20px;
		padding:25px 20px;
		display:table-cell;
		font-weight:bold;
	}

		.logo img{
			margin: 10px;
		}

		.topmenu {
			margin: 0 50px;
		}

		@media (max-width: 1200px) {
			.topmenu {
				max-width: 850px;
			}
		}

		.langs {
            width:150px;
		}

        .curr_lang {
            width: 100%;
        }

        .header .wrap div.hamburger {
            /* width: 200px; */
            height: 50px;
            line-height: 50px;
            font-size: 21px;
            color: white;
            cursor: pointer;
            display:none;

        }


    .first .services,
    .hamburger {
        display: none !important;
    }

        @media(max-width: 950px),(max-device-width:1100px) {

            .hamburger {
                display: inline-flex !important;
            }

            .mainmenu li:first-child {
                display: none;
            }

            .mainmenu {
                position: absolute !important;
                z-index: 999;
                background-color: <?php echo $mainColor; ?>;
                left: -100%;
                transition: 1s left ease;
                top: 50px;
            }
            .mainmenu.responsive {
                left: 0;
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
        }

.content {
	padding-bottom:30px;
	font-size:15px;
	text-align:justify;
}


	.item {
		padding:5px 20px;
		text-align:justify;
	}

.footer {
	height: 50px;
}

.footer .wrap {
	padding-left: 300px;
	padding-top: 15px;
	font-size: smaller;
}


.login .center {
	text-align: center;
	margin-top: 10%;
}


.i18nform {
	padding-left: 0 !important;
}

 #form.i18nform input,
 #form.i18nform textarea,
 #form.i18nform select
{
	min-width: 250px  !important;
	width: 250px  !important;
}

.message {
	padding: 10px;
	margin: 10px;
    border: 1px black solid;
    display: inline-block;
}


.thumb {
		max-width: 200px;
		max-height: 200px;
}
