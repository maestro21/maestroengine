:root {
    --highlight-color: wheat;
    --bg-color: rgba(0,0,0,0.6);
    --border-color: rgba(255,255,255,0.5);
}


html {
    font-size: 18px;
    font-family: Roboto;
    font-weight: 100;
    letter-spacing: 1px;
}

h1 {
    text-align: center;
    font-size:5rem;
    line-height: 6rem;
    font-weight: 200;
    color: white;
    text-shadow: 1px 1px 0px black;
}

@media(max-width: 500px) {
    h1 {
        font-size:4rem;
        line-height: 5rem;
    }
}



strong, b {
    font-weight: 400;
}


body {
    background-image:url('bg.jpg');
    background-position: center;
    background-size: cover;
    background-attachment: fixed;
}


header {
    background-color: rgba(0,0,0,0.75);
}
main {
    background-color: rgba(0,0,0,0.3);
}

main .wrap .content{
    background-color: var(--bg-color);
    color: white;
    padding: 25px;
    border-radius: 3px;
}

main .icon {
    color: white;
}

main a {
    color: var(--highlight-color);
}

a {
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.dropdown a:hover,
.btn:hover {
    text-decoration: none;
}

nav .btn {
    background-color: transparent;
}

nav  .dropdown {
    background-color: transparent;
}

.topmenu,
nav  .dropdown ul {
    background-color: rgba(0,0,0,0.8);
}

select, input, textarea {
    border: none;
    padding: 10px 15px;
    border-radius: 0;
    border: none !important;
    border-bottom: 1px rgba(255,255,255,0.5) solid !important;
    background-color: rgba(0,0,0,0.3);
    color: white;
}

main .btn {
    background-color: rgba(0,0,0,0.5);
    border: 1px rgba(255,255,255, 0.5) solid;
}

main .btn:hover {
    background-color: white;
    color: black;
}

.btns .btn {
    border: none;
    color: var(--highlight-color);
}

.btns .btn:hover {
    background-color: transparent;
    color: var(--highlight-color);
}

.box {
    opacity: 0.8;
    margin: 10px;
    display: inline-block;
}

.box:hover {
    opacity: 1;
}

.box,
.popup {
    background-color: black;
    color: white;
    border: 1px var(--border-color) solid;
    border-radius: 3px;
}

.popup h3 {
    margin-top: 0;
}

.btn.nobtn .icon, .icon {
    color: white;
    background-color: transparent;
}

.btn.nobtn .icon:hover,
.icon:hover {
    color: var(--highlight-color);
}


.popup .btns {
    margin-top: -10px;
    margin-right: -10px;
}

.popup .btns {
    background-color: black;
}

::-webkit-scrollbar-track
{
    background: var(--bg-color);;
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

.avatar {
    border: 1px white solid;
    border-radius: 50%;
    padding: 2px;
    opacity: 1;
    height: 30px;
    width: 30px;
}

li {
    list-style-type: none;
}

main li:before {
    color: gold;
    content: "\2605";
    padding-right: 10px;
    position: absolute;
    margin-left: -30px;
}

.footer {
    background-color: rgba(0,0,0,0.6);
    color: white;
    bottom: 0;
    z-index: 999;
    width: 100%;
    bottom: 0;
}



footer {
    background-color: red;
    margin-top: 50px;
    min-height: 50px;
    line-height: 50px;
    text-align: center;
    color: white;
    background-color: var(--bg-color);
}




.logo {
    padding: 0 5px;
    line-height: 50px;
}


.logo img {
    vertical-align: middle;
    padding: 5px;
    height: 40px;
    display: inline-block;
}

.logo img.logo_black {
    display: none;
}


.logo:hover {
    background-color: white;
}

.logo:hover .logo_white {
    display:none;
}

.logo:hover .logo_black {
    display:inline-block;
}

* {
    transition: 1s background-color, color, opacity ease-out;
}

body {
    background-image:url('http://localhost/maestroengine/v1/bg.jpg');
    background-position:center;
    background-size: cover;
    background-attachment: fixed;
}