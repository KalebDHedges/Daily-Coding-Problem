<?php

  class Stack {
    private $elements = array();

    public function push($newElement) {
      if (!preg_match("/^\d+$/", $newElement)) {
        return "False";
      } else {
        array_push($this->elements, $newElement);
        return "Success";  
      }
    }

    public function pop() {
      return array_pop($this->elements);
    }

    public function max() {
      $max = 0;
      foreach ($this->elements as $e) {
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
                  </tr>";
      $count = 0;
      
      foreach($this->elements as $e) {
        $table .= "<tr>";
        $table .= "<td>{$count}</td>";
        $table .= "<td>{$e}</td>";
        $table .= "</tr>";
      }
      $table .= "</table>";
      
      echo "<p>{$table}</p>";
    }
  }

?>