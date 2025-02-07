/**
 <!-- The core Firebase JS SDK is always required and must be listed first -->
 <script src="https://www.gstatic.com/firebasejs/7.15.0/firebase.js"></script>
 <!-- TODO: Add SDKs for Firebase products that you want to use
 https://firebase.google.com/docs/web/setup#available-libraries -->
 <script src="https://www.gstatic.com/firebasejs/7.14.4/firebase-auth.js"></script>
 <script src="https://www.gstatic.com/firebasejs/7.14.4/firebase-firestore.js"></script>
**/
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
import { onAuthStateChanged, signInWithEmailAndPassword, GoogleAuthProvider, signInWithPopup , getAuth, signOut } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-auth.js";
import { getFirestore } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-firestore.js";
import { getDatabase, ref, set, onValue, child, get } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-database.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
//import { alertMessage, showMessage } from "../hooks/messages";
console.log('Firebase SDK',typeof URL,URL);
// Your web app's Firebase configuration
var firebaseConfig = {
  apiKey: "AIzaSyDeX81H_K8AsV2KjQgEbwxte6yVdSYqFXk",
  authDomain: "vcardapp-js.firebaseapp.com",
  databaseURL: "https://vcardapp-js.firebaseio.com",
  projectId: "vcardapp-js",
  storageBucket: "vcardapp-js.appspot.com",
  messagingSenderId: "420720513571",
  appId: "1:420720513571:web:f072eeda6cd3cfa1429796",
  measurementId: "G-LDPZ4BZ1GV",
};

// Initialize Firebase
//analytics();
export const app = initializeApp(firebaseConfig);
export const auth = getAuth(app);
export const db = getDatabase(app); //Realtime Database
export const fs = getFirestore(app); //FireStore

//
onAuthStateChanged(auth, async (user) => {
  if (user) {
    console.log('log',user);
    loginCheck(user);
    getUserSesion(user);
  } else {
    loginCheck(user);
  }
});

// SingIn form (Login)
const signInForm = document.querySelector("#login-form");
if (signInForm) {
  signInForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const email = signInForm["login-email"].value;
    const pass = signInForm["login-password"].value;
    try {
      const userCredentials = await signInWithEmailAndPassword(
        auth,
        email,
        pass
      );
      console.log(userCredentials);
      // reset the form
      signInForm.reset();
      // show welcome message
      //showMessage("Welcome " + userCredentials.user.email, "success");
    } catch (error) {
      /*if (error.code === "auth/wrong-password") {
        showMessage("Wrong password", "error");
      } else if (error.code === "auth/user-not-found") {
        showMessage("User not found", "error");
      } else {
        showMessage("Something went wrong", "error");
      }*/
    }
  });
}

const googleButton = document.querySelector("#googleLogin"); //console.log(googleButton)
if (googleButton) {
  googleButton.addEventListener("click", async (e) => {
    e.preventDefault();
    const provider = new GoogleAuthProvider();
    //try {
      
      const credentials = await signInWithPopup(auth, provider);
      console.log(credentials);/*
      console.log("google sign in");
      localStorage.setItem("Token", credentials.user.accessToken); //localStorage.setItem("Token", JSON.stringify(data.token));
      let token = localStorage.getItem("Token");
      console.log("Res-Token:" + token);*/
      // show welcome message
      //alertMessage("Welcome " + credentials.user.displayName, 'success');
      //showMessage("Welcome " + credentials.user.displayName, "success");
    //} catch (error) {
      //console.log(error);
    //}
  });
}


const loginCheck = (user) => {
  const formRegis = document.querySelector('.registro-page');
  const formLogin = document.querySelector('.login-page');
  const dash = document.querySelector('.dashboard');
  if (user) {    
    formLogin.style.display = 'none';
    formRegis.style.display = 'none';
    dash.style.display = 'block';
    //if(btnLogout){btnLogout.style.display = "block";}
  } else{
    formLogin.style.display = 'block';
    //formRegis.style.display = 'block';
    dash.style.display = 'none';
  }
}