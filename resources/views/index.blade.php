<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page | Firebase</title>
    <link rel="stylesheet" href="./styles.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container{
            width: 90%;
            height: 60vh;
            padding: 20px;
            border-radius: 20px;
            box-shadow:  0px 5px 25px rgba(0,0,0,0.2);
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;
        }

        .container form{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-direction: column;
        }

        .inputBox{
            width: 100%;
            margin: 10px 0;
            border-radius: 5px;
            overflow: hidden;
        }

        .inputBox input[type="text"], .inputBox input[type="email"]{
            width: 100%;
            height: 50px;
            border-radius: 5px;
            border: none;
            outline: none;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.2);
            padding: 0px 10px;
            font-size: 16px;
            color: #444;
        }

        .inputBox textarea{
            width: 100%;
            height: 120px;
            border-radius: 5px;
            border: none;
            outline: none;
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.2);
            padding: 0px 10px;
            font-size: 16px;
            color: #444;
        }

        .inputBox button{
            width: 100%;
            padding: 10px 20px;
            border: none;
            outline: none;
            background: rgb(0, 119, 255);
            color: #FFF;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;

        }

        .inputBox button:hover{
            background: rgb(0, 17, 255);
            transition: all 0.3s ease;
        }

        ::placeholder{
            font-size: 16px;
        }

        .alert{
            width: 100%;
            background: rgb(0, 255, 106);
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
            font-weight: 900;
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="{{ Route('sendMSG') }}" id="loginForm" method="post">
            @csrf
            <div class="alert">Your message sent</div>

            <div class="inputBox">
                <input type="text" name="name" id="name" placeholder="Your name...." />
            </div>

            <div class="inputBox">
                <input type="email" name="email" id="email" placeholder="Your Email....." />
            </div>

            <div class="inputBox">
                <input type="text" name="mobile" id="mobile" placeholder="Your Mobile number....." />
            </div>

            <div class="inputBox">
                <input type="text" name="address" id="address" placeholder="Your Address....." />
            </div>

            <div class="inputBox">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script>
    <script>
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

        function submitForm() {
            var name = getElementVal("name");
            var email = getElementVal("email");
            var mobile = getElementVal("mobile");
            var address = getElementVal("address");

            saveForm(name, email, mobile , address);
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
    </script>
</body>

</html>
