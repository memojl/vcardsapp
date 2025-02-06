/**
 <!-- The core Firebase JS SDK is always required and must be listed first -->
 <script src="https://www.gstatic.com/firebasejs/7.15.0/firebase.js"></script>
 <!-- TODO: Add SDKs for Firebase products that you want to use
 https://firebase.google.com/docs/web/setup#available-libraries -->
 <script src="https://www.gstatic.com/firebasejs/7.14.4/firebase-auth.js"></script>
 <script src="https://www.gstatic.com/firebasejs/7.14.4/firebase-firestore.js"></script>
**/
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js";
import { getAuth, signOut } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-auth.js";
import { getFirestore } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-firestore.js";
import { getDatabase, ref, set, onValue, child, get } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-database.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
//import { alertMessage, showMessage } from "../hooks/messages";
console.log('Firebase SDK');

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
export const db = getDatabase(app);//Realtime Database
export const fs = getFirestore(app);//FireStore
