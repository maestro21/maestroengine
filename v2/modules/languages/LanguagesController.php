<?php

class LanguagesController extends FormController {


    function indexAction() {
        $languages =  $this->listAction();

        $i18n = c('languages/i18n')->indexAction();

        return $this->view('index', [ 'tabs' => [
            'languages' => $languages,
            'i18n' => $i18n,
        ]]);
    }

    function extend() {
        $this->setFormFields([
            'img' => [
                'type' => WIDGET_SELECT,
                'options' => $this->getCountryOptions(),
                'class' => 'langs'
            ]
        ]);
        $this->setDefvalues();
    }

    function listAction() { 
        return $this->view('languages', [
            'decode' => false,
            'headers' => $this->listHeaders,
            'newItem' => $this->defValues,
            'form'  => $this->formFields,
            'data' => $this->model()->list(),
            'endpoint' => API_URL . $this->cl,
            'prelanglist' => $this->getWorldLanguages()
        ]);
    }

    /**  **/
    function getCountryOptions() {
        $data = json_decode(file_get_contents(s('lang_url') . 'api.php'), true);
        $return = []; $i = 0;

        foreach($data as $_img => $countryname) { $i++;
            $img = S('lang_url') . 'flags/' . $_img;    
            $return[] =[
                'value' => $_img,
                'img' => $img,
                'text' => safestring($countryname)
            ];
        }
        return $return;
    }
  

    function getLanguages($option) {
        $content = json_decode(file_get_contents('http://localhost/langselect/api.php?do=' . $option), true);
        foreach($content as $k => $row) {
            $content[$k]['img'] = S('lang_url') . 'flags/' . $row['img'];
        }
        return $content;
    }

    function getWorldLanguages() {
        return $this->getLanguages('getWorldLanguages');
    }

    function getEuroLanguages() {
        return $this->getLanguages('getEuroLanguages');
    }

    function getEuroWorldLanguages() {

    }

}
