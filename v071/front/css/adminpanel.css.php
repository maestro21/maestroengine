
.adminpanel{
    background-color:black;
    color: white;
    padding:5px;
    height:25px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.5);
    position: fixed;
    z-index: 10;
    width: 100%;
    top: 0;
    -webkit-box-shadow: 0px 0px 2px 1px #555;
    -moz-box-shadow: 0px 0px 2px 1px #555;
    box-shadow: 0px 0px 2px 1px #555;
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
    position: fixed;
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