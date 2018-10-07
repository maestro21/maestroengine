<?php

class CacheModel extends AbstractModel {

  const AI = '__ai';

  /**
   * Set signle element and save it
   */
  function set($key, $value) {
    $data = $this->list();
    $data[$key] = $value;
    $this->save($data);
    $data = null;
  }

  
  /**
   * Get all data
   */
  function list($start = null, $length = null) {  
    $data = cache($this->name);
    if($start !== null) {
      $data = array_slice($data, (int)$start, $length);
    }
    return $data;
  }

  /**
   * Save all data
   */
  function save($data) {
      cache($this->name, $data);
  }

  /**
   * Get single item
   */
  function get($key) {
    $data = $this->list();
    $ret = $data[$key] ?? NULL;
    $data = NULL;
    return $ret;
  }

  /**
   * Delete single item
   */
  function del($key) {
    $data = $this->list();
    unset($data[$key]);
    $this->save($data);
    $data = NULL;
    return $ret;
  }

  /**
   * Cache list methods
   */

  /**
   * Add row to array; to be used as list
   */
  function add($row) {
    $key = $this->ai();
    $this->set($key, $row);
  }

  /**
   * Get or set ai; always increment
   */
  function ai($ai = null) {
    if($ai) {
      $this->set(self::AI, $ai);
    }
    $data = $this->list();
    $ai = $data[self::AI] ?? 0;
    $ai++;
    return $ai;
  } 

}
