//config
const firebaseConfig = {
    apiKey: "AIzaSyCGvnlQWQOY-OkLcu_WUHNjAv44V8_nddg",
    authDomain: "loginpage-89611.firebaseapp.com",
    databaseURL: "https://loginpage-89611-default-rtdb.firebaseio.com",
    projectId: "loginpage-89611",
    storageBucket: "loginpage-89611.appspot.com",
    messagingSenderId: "279508542463",
    appId: "1:279508542463:web:2eff7c9610c6a69135bdca"
  };

  //initialize
  firebase.initializeApp(firebaseConfig);

  //reference
  var loginFormDB = firebase.database().ref("loginForm");

  document.getElementById("loginForm").addEventListener("submit", submitForm);

  function submitForm(e) {
    e.preventDefault();

    var name = getElementVal("name");
    var email = getElementVal("email");
    var mobile = getElementVal("mobile");
    var address = getElementVal("address");

    saveForm(name, email, mobile , address);

    //alert
    document.querySelector(".alert").style.display = "block";

    setTimeout(() => {
        document.querySelector(".alert").style.display = "none";
    }, 3000);

    //send message
    // var message = 'Hi ' + name + ', we received your data';
    // sendSMS(mobile, message);

    document.getElementById("loginForm").reset();
  }

  const saveForm = (name, email, mobile, address) => {
    var newLoginForm = loginFormDB.push();

    newLoginForm.set({
        name : name,
        email : email,
        mobile : mobile,
        address : address,
    });
  };

  const getElementVal = (id) => {
    return document.getElementById(id).value;
  }