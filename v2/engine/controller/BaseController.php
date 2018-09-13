<?php

class BaseController extends AbstractController {


    function getAction() {
      if(method() == POST) {
        return 'save';
      }
      return 'index';
    }

    function indexAction() {
        return 'Called index action';
    }

    function saveAction() {

    }

}
