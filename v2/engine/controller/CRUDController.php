<?php

class CRUDController extends AbstractController {


      function getAction() {
        switch(method()) {
          case GET:
              if(id()) {
                if(in_array(id(), $this->allowedActions)) {
                  return id();
                }
                return 'view';
              }
              return 'list';
            break;

          case POST:
              return 'save';
            break;

          case DELETE:
              return 'del';
        }
      }

      /** Front actions **/

      function listAction() { return 'list'; die();
         $data = $this->model->list();
         return $this->view('list', $data);
      }

      function viewAction() {  return 'view'; die();
        $data = $this->model->get(id());
        return $this->view('view', $data);
      }

      function editAction() {
        $data = $this->model->get(id());
        return $this->addAction($data);
      }

      function addAction($data = []) { return 'form'; die();
        return $this->view('form', $data);
      }


      /** Api actions **/

      function saveAction() {
          // if(!can('admin')) return false;
          $data = $this->model->save(post('form'), id());
          return json($data);
      }

      function delAction() {
        // if(!can('admin')) return false;
        $data = $this->model->del(id());
        return json($data);
      }


}
