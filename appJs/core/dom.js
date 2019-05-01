function DOM(element = 'NULL') {
  this.element = element;


  this.get = function (element) {
    return document.querySelector(element);
  }



  this.getId = function (element) {
    return document.getElementById(element);
  }





  // check  if the element is defigned
  this.set = function () {
    if (this.element != 'NULL') {
      return true;
    } else {
      return false;
    }
  }

  /**
   * this will be used to assign the elements
   * to the value passed ot to the global constructor element
   */
  this.assign = function (varElem) {
    if (varElem == 'NULL') {

      // check if the global element has been set
      if (this.set()) {
        return this.get(this.element);
      } else {
        console.log('There is no defigned elements');
        return '';
      }

    } else {
      return this.get(varElem);
    }
  }



  // add element to the class once is set
  if (this.set()) {
    // this.element = element;
    this.htmlElement = this.get(this.element);
  }



  /**
   * Add class element
   * into a div
   */
  this.addClass = function (item, elemIn = 'NULL') {
    let elem = this.assign(elemIn);

    // // Tedious toggle
    if (!(elem.classList.contains(item))) {
      return elem.classList.add(item);
    }
  }

  /**
   * Remove Class element
   */
  this.removeClass = function (item, elemIn = 'NULL') {
    let elem = this.assign(elemIn);

    if (elem.classList.contains(item)) {
      return elem.classList.remove(item);
    }
  }

  /**
   * Togle class
   */
  this.toogleClass = function (item, elemIn = 'NULL') {
    let elem = this.assign(elemIn);

    if (elem.classList.contains(item)) {
      return elem.classList.toggle(item);
    }
  }


  // hide element
  this.hide = function (elemIn = 'NULL') {

    // rwemove show class
    this.removeClass('show', elemIn);
    this.addClass('hide', elemIn);

    return 0;
  }


  // Show element
  this.show = function (elemIn = 'NULL') {

    // rwemove show class
    this.removeClass('hide', elemIn);
    this.addClass('show', elemIn);

    return 0;
  }

  this.html = function (elemIn = 'NULL') {
    let elem = this.assign(elemIn);
    return elem.innerHTML;
  }

  // Add Html element
  this.addHTML = function (data, elemIn = 'NULL') {
    let elem = this.assign(elemIn);
    htmlVal = `${this.html(elemIn)} ${data}`;

    elem.innerHTML = htmlVal;
  }

  // Clear Html
  this.clearHTML = function (elemIn = 'NULL') {
    let elem = this.assign(elemIn);
    elem.innerHTML = '';
  }

  // new HTML
  this.newHTML = function (data, elemIn = 'NULL') {
    let elem = this.assign(elemIn);
    htmlVal = data;

    elem.innerHTML = htmlVal;
  }


  // Add Text


  // Clear Text
  this.clearVal = function (elemIn = 'NULL') {
    let elem = this.assign(elemIn);
    elem.value = '';
  }

  /**
   * this will generate 
   * the HTML Input=hidden
   */
  this.createTokenElem = function (id) {
    var x = document.createElement("INPUT");
    x.setAttribute("type", "hiden");
    x.setAttribute("id", id);

    return document.body.appendChild(x);
  }

}