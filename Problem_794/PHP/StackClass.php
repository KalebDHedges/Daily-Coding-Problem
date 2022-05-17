<?php

  class Stack {
    private $elements = array();

    public Stack() {}

    public function push($newElement) {
      if (preg_match("/^\d+$/", $data)) {
        array_push($newElement);
        return "Success";  
      } else {
        return "Failure";
      }
    }

    public function pop() {
      return array_pop($elements);
    }

    public function max() {
      $max = 0;
      foreach ($elements as $e) {
        if ($e > $max) {
          $max = $e;
        }
      }
      return $max;
    }

    public function printTable() {
      $table = "<table><tr>
                    <th>Element Position</th>
                    <th>Element Value</th>
                  </tr><tr>";
      $count = 0;
      
      foreach($elements as $e) {
        $table .= "<td>{$count}</td>";
        $table .= "<td>{$e}</td>";
      }
    
      $table .= "</tr></table>";
    }
  }

?>