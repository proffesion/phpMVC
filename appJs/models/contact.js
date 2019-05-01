const dom = new DOM();
// document.addEventListener('DOMContentLoaded', function () {

const data = new DATA(
  "http://127.0.0.1/mvcfull/security/datas",
  "POST", {
    name: {
      required: true,
      type: 'text',
      max: 12,
      min: 5,
      label: 'inputLabel'
    },
    email: {
      type: 'email',
      email: true,
      required: true,
      label: 'emailLabel'
    },
    phone: {
      type: 'number',
      max: 14,
      min: 3
    }
  });








const data2 = new DATA(
  "http://127.0.0.1/mvcfull/security/test",
  "POST", {
    username: {
      required: true,
      type: 'text',
      max: 50,
      min: 5,
      label: 'usernameLabel'
    },
    password: {
      required: true,
      label: 'passwordLabel'
    }
  }, {
    token: 'token2'
  });
// });


// the close button
dom.getId('submit').addEventListener('click', () => {
  data.send();
  // data.formClear(true);

  data.ajax.request.onload = function () {
    if (data.ajax.state() && data.validation.passed()) {
      data.execute(data.ajax.request.responseText);

    } else {
      console.log("the value failed!");
    }


  };

});






// the close button
dom.getId('login').addEventListener('click', () => {
  data2.send();
  data2.formClear(true);

  data2.ajax.request.onload = function () {
    if (data2.ajax.state() && data2.validation.passed()) {
      data2.execute(data2.ajax.request.responseText);


    } else {
      console.log("the value failed!");
    }


  };

});









// the close button
// dom.getId('login').addEventListener('click', () => {
//   // data2.validate();
//   data2.send();
//   data2.formClear(true);


//   data2.ajax.request.onload = function () {
//     if (data2.ajax.state() && data2.validation.passed()) {
//       data2.execute(data2.ajax.request.responseText);


//     } else {
//       console.log("the value failed!");
//     }


//   };


// validation.validate();
// if (validation.passed()) {

//   console.log(validation.data());

//   // clear the data
//   validation.clearData();
// }

// validation.clearData();

// });

// });



// const validation = new Validation({});
// validation.setData({
//   name: "janvier hahahha",
//   email: "janvier@gmail.com",
//   phone: "846593745934"
// });