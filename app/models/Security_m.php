<?php

class Security_m 
{
  public $name;
  public $message;

  
  public function generate_token() {
      // echo Token::generate();
      echo '{
          "token": {
            "value": "' . Token::generate() . '",
            "generated": "1"
          },  
          "error": "0"
      }';
  }


  public function token_check($val) {
    // return Token::generate();
    // $this->message = "<hr>this is the STUDENT model<hr>";
    // return $this->message;
    // echo 'hahahhaa this is the token:' . $val;

    echo '{
      "token": {
        "checked": "1",
        "match": "1"
      },  
      "error": "0"
    }';

  }


  public function saveData() {
    // return Token::generate();
    // $this->message = "<hr>this is the STUDENT model<hr>";
    // return $this->message;
    // echo 'hahahhaa this is the token:' . $val;

    echo '
    {
      "data": {
        "ahah": "aaaaaa"
      },
      "message": {
        "errors": {
          "1": "janvier",
          "2": "janvier"
        },
        "success": {
          "1": "janvier",
          "2": "janvier"
        }
      },
      "success": "0",
      "token": "0"
    }
    ';

  }


  public function other() {
    // return Token::generate();
    // $this->message = "<hr>this is the STUDENT model<hr>";
    // return $this->message;
    // echo 'hahahhaa this is the token:' . $val;

    echo '
    {
      "data": {
        "ahah": "aaaaaa"
      },
      "message": {
        "errors": {
          "1": "janvier",
          "2": "janvier"
        },
        "success": {
          "1": "janvier",
          "2": "janvier"
        }
      },
      "success": "0",
      "token": "1"
    }
    ';

  }



}
