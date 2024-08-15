<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.5/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.12.5/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAgtYoHRsJHBpl3gqh68K5bEMJqkSQRuKs",
    authDomain: "starlight-7b08b.firebaseapp.com",
    projectId: "starlight-7b08b",
    storageBucket: "starlight-7b08b.appspot.com",
    messagingSenderId: "448099606332",
    appId: "1:448099606332:web:71c1a026fe4c70e2e88839",
    measurementId: "G-VWJGKPQRM4"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>