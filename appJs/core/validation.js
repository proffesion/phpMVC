function Validation(data) {

  // Initialize the Ajax object
  this.ajax = new AJAX('post');
  this.dom = new DOM();
  this.errors;
  this.data;
  this.checked = false;

  this.error = {
    count: 0,
    message: ''
  };



  this.validateItem = function (input, rule, value, label) {
    let element = this.dom.assign(input);

    // check for the required
    if (rule == 'required') {
      if (value) {
        // check if the element is not empty
        if (element.value == '') {

          // report error
          this.error.count = 1;
          this.dom.newHTML(label + ' Required', '.' + label + '_error');
        } else {
          this.dom.clearHTML('.' + label + '_error');
          this.error.count = 0;
        }
      }
    }


    // check for the required
    if (rule == 'min') {
      if (value) {
        // check if the element is not empty
        if (element.value.length < value) {

          // report error
          this.error.count = 1;
          this.dom.newHTML(label + ' must be at least ' + value + ' characters long.', '.' + label + '_error');
        } else {
          this.error.count = 0;
          this.dom.clearHTML('.' + label + '_error');

        }
      }
    }


    /**
     * check for the required
     */
    if (rule == 'max') {
      if (value) {
        // check if the element is not empty
        if (element.value.length > value) {

          // report error
          this.error.count = 1;
          this.dom.newHTML(label + ' must have maximum of ' + value + ' characters long.', '.' + label + '_error');
        } else {
          this.error.count = 0;
          this.dom.clearHTML('.' + label + '_error');
        }
      }
    }



    // check for the required
    if (rule == 'type') {

      if (value == 'email') {
        // check if the element is not empty
        var x = element.value;
        var atposition = x.indexOf("@");
        var dotposition = x.lastIndexOf(".");

        if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {
          this.error.count = 1;
          this.dom.newHTML('please enter the valid email', '.' + label + '_error');

        } else {
          this.error.count = 0;
          this.dom.clearHTML('.' + label + '_error');

        }


        /**
         * check it the input is the number
         */
      } else if (value == 'number') {
        if (isNaN(element.value)) {

          this.error.count = 1;
          this.dom.newHTML(label + '  numbers only', '.' + label + '_error');

        } else {

          this.error.count = 0;
          this.dom.clearHTML('.' + label + '_error');

        }




        /**
         * check if the input is the character
         */
      } else if (value == 'text') {
        if (!isNaN(element.value)) {
          this.error.count = 1;
          this.dom.newHTML(label + ' characters only', '.' + label + '_error');
        } else {
          this.error.count = 0;
          this.dom.clearHTML('.' + label + '_error');

        }
      }


    }
  }



  this.validate = function () {

    let x = 0;
    for (const elem in data) {
      if (data.hasOwnProperty(elem)) {
        const element = data[elem];
        let input = Object.keys(data)[x];


        let i = 0;
        for (const rule in element) {
          if (element.hasOwnProperty(rule)) {
            const ol = element[rule];
            let condition = Object.keys(element)[i];
            let value = ol;

            // 
            this.validateItem('#' + input, rule, value, input);

            // stop the loop once we have an error
            if (this.error.count != 0) {
              break;
            }


          }
          i++;
        }

        if (this.error.count != 0) {
          break;
        }

      }
      x++;
    }

  }

  /**
   * check if the validation is checked
   */
  this.passed = function () {
    if (this.error.count == 0) {
      return true;
    } else {
      return false;
    }
  }



  /**
   * return the form data
   */
  this.data = function () {
    if (this.passed()) {


      /**
       * loop throuh the input element
       * in order to get the input value 
       */

      // define the data object
      let dataObject = {};

      let x = 0;
      for (const elem in data) {
        if (data.hasOwnProperty(elem)) {
          const element = data[elem];

          // define the input and their values
          let input = Object.keys(data)[x];
          let value = this.dom.get('#' + input).value;

          // add elements to the data object
          dataObject[input] = value;

        }
        x++;
      }

      // return the element
      return dataObject;


    } else {
      return 'you must get have all the rulel to be true in order to have the value';
    }
  }


  /**
   * input the data into the forms
   * 
   */
  this.setData = function (inData) {

    let x = 0;
    for (const elem in inData) {
      if (inData.hasOwnProperty(elem)) {
        const element = inData[elem];

        // define the input and their values
        let input = Object.keys(inData)[x];
        let value = Object.values(inData)[x];

        // reset the input
        this.dom.get('#' + input).value = value;

      }
      x++;
    }

  }



  /**
   * this will be used to reset the 
   * data fuction
   */
  this.clearData = function () {


    let x = 0;
    for (const elem in data) {
      if (data.hasOwnProperty(elem)) {
        const element = data[elem];

        // define the input and their values
        let input = Object.keys(data)[x];

        // reset the input
        this.dom.get('#' + input).value = '';

      }
      x++;
    }

  }


} // end of class