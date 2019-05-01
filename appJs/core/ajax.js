/**
 *
 */

function AJAX(url) {
  this.data = '';

  this.binded = "";

  this.url = url;

  this.setData = function (data) {
    this.data = data;
  }
  /**
   * check the state of the function
   */
  this.state = function () {
    var _this = this;
    if (_this.request.readyState > 3 && _this.request.status == 200) {
      return true;
    } else {
      return false;
    }
  };

  // the request object
  this.request = window.XMLHttpRequest ?
    new XMLHttpRequest() :
    new ActiveXObject("Microsoft.XMLHTTP");

  // biding the data or changing the datat into the post form
  this.bind = function () {
    var _this = this;
    _this.binded =
      typeof _this.data == "string" ?
      _this.data :
      Object.keys(_this.data)
      .map(function (k) {
        return (
          encodeURIComponent(k) + "=" + encodeURIComponent(_this.data[k])
        );
      })
      .join("&");
  };

  /**
   * this will send the data from the ajax
   */
  this.get = function () {
    var _this = this;
    let url;

    // check if there is something in the data to be sent
    if (_this.data != "") {
      _this.bind();
      url = _this.url + _this.binded;
    } else {
      url = _this.url;
    }

    _this.request.open("GET", url, true);
    _this.request.send();
  };

  /**
   * SEND THE DATA WITH THE POST METHOD
   */

  this.post = function () {
    var _this = this;
    // check if there is something in the data to be sent
    if (_this.data != "") {
      // bind the object or values sent
      _this.bind();

      // get the binded data
      var params = _this.binded;

      _this.request.open("POST", url);
      _this.request.setRequestHeader("X-Requested-With", "XMLHttpRequest");
      _this.request.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
      );

      // send the data
      _this.request.send(params);
    } else {
      console.log("You must send some data to the post method");
    }
  };
} // end of the class

/*
 * exampple
 * of post method
 
 let ajax = new AJAX("http://127.0.0.1/mvcfull/security/test", {
   names: "janvier",
   email: "janviermuhawenimana",
   phone: 978698698768
  });
  
  ajax.post();
  
  
  ajax.request.onload = function() {
    if (ajax.state()) {
      console.log("the result: " + ajax.request.responseText);
    } else {
      console.log("the value failed!");
    }
  };
  
  */