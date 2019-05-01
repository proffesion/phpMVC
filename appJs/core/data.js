function DATA(url, method, rules, options = 'NULL') {
  this.url = url;
  this.options = options;
  this.tokenInput;
  this._data; // this will store the validated data

  this.sent = 0;



  // send the validation rules
  this.validation = new Validation(rules);

  this.ajax = new AJAX(this.url);


  // check if there is no token name set
  if (options == 'NULL') {
    this.tokenInput = 'token';
  } else {
    this.tokenInput = this.options.token;
  }


  // create the input
  this.token = new TOKEN(this.tokenInput);

  this.tokenInputHidden = new DOM('#' + this.tokenInput);



  this.send = function () {
    this.post();
    // REQUEST THE THE AJAX REQUEST
    return this.ajax.post();
  }


  this.post = function () {
    // generate the element to be used
    if (method == 'POST' || method == 'POST') {


      // validate the data
      this.validation.validate();

      // cehck if the validation has passed
      if (this.validation.passed()) {
        this.token.generate();

        // assign the validation to the validation form
        this._data = this.validation.data();
        this.ajax.setData(this._data);



        // check if the token exist in the data
        if (("token" in this._data)) {
          // add the element to the object
          this._data['token'] = document.getElementById(this.tokenInput).value;
        } else {
          // update the element to the object
          this._data.token = document.getElementById(this.tokenInput).value;
        }



        this.sent = 1;


      } else {
        this.sent = 0;

        console.log('there was a problem with sending the data');

      }

    }
  } // post send






  this.formClear = function (val = true) {
    if (val == true) {
      this.emptyForms = true;
    } else {
      this.emptyForms = false;
    }
  }


  // analyze data function
  this.execute = function (input) {

    this.emptyForms;
    this.json = JSON.parse(input);
    this.data = this.json.data;

    // check if the data has to be cleaned
    if (this.emptyForms == 1 && this.json.token == 1) {
      this.validation.clearData();
        }

    // check if the token has been found
    if (this.json.token == 1) {
      // empty the token element
      this.tokenInputHidden.clearVal();
      console.log('token found!')

    } else {
      console.log('token doesnt found!')
    }
    console.log('token found!')

    // console.log(this.json);
    // console.log(this.emptyForms);
    // console.log(this.data);
  }




  this.errors;



  // send data
}