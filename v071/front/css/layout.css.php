
html {
    font-size: 18px;
    font-family: Arial;
}


body {
    margin: 0;
}

header {
    height: 50px;
    background-color: black;
    line-height: 50px;
    display: block;
    position: fixed;
    width: 100%;
    top: 0;
    color: white;
    z-index: 999;
}

header a {
    color: white;
    text-decoration: none;
    padding:0 15px;
    display: inline-block;
}

header a:hover {
    color: black;
    background-color: white;
}

.right {
    float: right;
}

.wrap {
    max-width: 1200px;
    margin: auto;
}

/*
main {
    width: 100vw;
    min-height: calc(100vh - 50px);
    position: absolute;
    top: 0;
    padding-top: 50px;
} */

main {
    width: 100vw;
    height: calc(100vh - 50px);
    position: fixed;
    top: 50px;
    overflow-y: auto;
}
table,
form {
    width: 100%;
}


.half {
    width: 49.5%;
}
.third {
    width: 32%;
}

.half,
.third {
    height: 100%;
    vertical-align: top;
    display: inline-flex;
}


@media(max-width: 800px) {
    .half {
        width: 100%;
    }

    .third {
        width: 49.5%;
    }
}

@media(max-width: 500px) {
    .third {
        width: 100%;
    }

}



.cover {
    width: 100vw;
    height: 100vh;
    background-color: rgba(0,0,0,0.5);
    z-index: 3;
    position:fixed;
    top: 0;
    left: 0;
    display: none;
}

.popup {
    position: absolute;
    z-index: 6;
    position: fixed;
    left:50%;
    top:50%;
    background-color: white;
}

.box .btns {
    float: right;
}

.box {
    display: table-cell;
    border: 1px black solid;
    vertical-align: bottom;
    background-size: cover;
    background-position: center;
    position: relative;
}

.box .text {
    padding: 10px;
    position: absolute;
    bottom: 0;
    width: calc(100% - 20px);
}

.box .text,
.box .btns .nobtn .icon {
    background-color: rgba(0,0,0,0.5);
    color: white;
}

.boxlink {
    display: block;
    width: 100%;
    height: 100%;
}

.btns {
    top: 0;
    position: absolute;
    right: 0;
}

.btn.nobtn {
    padding: 0;
    background-color: transparent;
}

.block {
    margin: 10px;
}

.tmcn {
    display: inline-block;
}

.popup {
    padding: 20px;
}

main > .wrap {
    min-height: calc(100% - 160px);
}