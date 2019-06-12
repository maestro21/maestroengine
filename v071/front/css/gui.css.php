

:root {
    --main-color: black;
}


table td {
    padding: 10px;
}

#form table td {
    padding: 10px 20px;
}

.btn.nobtn .icon,
.icon, a {
    color: var(--main-color);
}

a .icon {
    color: white;
}


.btn {
    background-color: var(--main-color);
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    cursor: pointer;
    display: inline-block;
}


nav .btn {
    padding: 0 20px;
}


input, select, textarea {
    width: calc(100% - 40px);
    padding: 10px 15px;
    font-size: 1rem;
    border: 1px var(--main-color) solid;
}

textarea {
    height: 105px;
}

/** topmenu **/

.topmenu {
    margin: 0;
    background-color: var(--main-color);
    list-style-image: none;
    list-style-type: none;
}
.topmenu ul {
    display:none;
}

.topmenu li:hover > ul {
    display: block;
}

/** DROPDOWN **/

/* Dropdown Content (Hidden by Default) */
.dropdown,
.dropdown ul {
    z-index: 99;
    background-color: var(--main-color);
    margin: 0;
    padding: 0px;
    list-style-image: none;
    list-style-type: none;
    display: inline-block;
}

.dropdown ul {
    visibility: hidden;
    position: absolute;
}

.dropdown > li > ul ul {
    left: 100%;
    /*margin-left: -10px; */
    margin-top: -50px;
}

.dropdown > li {
    display: inline-block;
}

/* Show the dropdown menu on hover */
.dropdown li:hover > ul {
    visibility: visible;
    /*transform: translateY(-5px);
    transition-delay: 0s, 0s, 0.3s; */
}


/* Links inside the dropdown */
.topmenu a,
.dropdown a {
    color: white;
    line-height: 50px;
    text-decoration: none;
    display: block;
    margin: 0;
    text-transform: none;
    white-space: nowrap;
}

/* Change color of dropdown links on hover */
nav a:hover .icon,
.topmenu a:hover,
.dropdown  a:hover {
    color: var(--main-color);
    background-color: white;
}
/** EOF Dropdown **/

@media (min-width: 1300px) {
    nav .cp {
        left: 0;
        position: absolute;
    }
}

@media (max-width:1200px) {
    .langs {
        float: right;
        position: absolute;
        right: 0;
        top: 0;
    }
}

nav .toggleMenu {
    display: inline-block;
}

.lang_short {
    display: none;
}

@media (max-width:600px) {
    .lang_short {
        display: block;
    }
    .lang_long {
        display: none;
    }
}