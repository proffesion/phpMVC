function SESSION(session) {
  this.session = session;

  this.put = function (value) {
    return sessionStorage.setItem(this.session, value);
  }

  this.get = function () {
    return sessionStorage.getItem(this.session);
  }

  this.detete = function () {
    return sessionStorage.removeItem(this.session);
  }

  this.clear = function () {
    return sessionStorage.clear();
  }

  this.exists = function () {
    if (this.get() == null) {
      return true;
    } else {
      return false;
    }
  }
}

/**
 *  ID GENERATOR CLASS
 *  s
 */
function UID() {
  // this.session = new SESSION(session);

  /**
   * this will generate the 
   * UNIQUE element
   */
  this.generate = function () {
    var dt = new Date().getTime();
    var uuid = 'xxxxxxxxxxxxxxxxxxxx8xxxyxxxxxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
      var r = (dt + Math.random() * 16) % 16 | 0;
      dt = Math.floor(dt / 16);
      return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });
    return uuid;
    console.log(uuid);
  }


}



function TOKEN(element) {
  this.dom = new DOM(element);
  this.unique = new UID();
  this.session = new SESSION('token_session');
  this.success;



  this.generate = function () {

    /**
     * creae the element once 
     * doesnt found
     */
    if (!this.dom.getId(element)) {
      // create the element
      this.dom.createTokenElem(element);
    }

    let unique = '';

    // check if the element is not empty
    if (this.dom.getId(element).value == '') {

      // generate the unique id
      unique = this.unique.generate();

      // check unique is generated
      if (unique != '') {

        // put the unique into the session
        this.session.put(unique);
        document.getElementById(element).value = unique;
        this.success = 1;

      } else {
        this.success = 0;
      }


    } else {
      this.success = 0;
    }

  }
}