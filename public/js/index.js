// Import the functions you need from the SDKs you need
import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.0.0/firebase-app.js';
import { getAuth, RecaptchaVerifier ,signInWithPhoneNumber  } from 'https://www.gstatic.com/firebasejs/9.0.0/firebase-auth.js';

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyDjgDmdv9S_jwFjWe40QPkRqhWS851CHGc",
    authDomain: "vcg-ddd93.firebaseapp.com",
    projectId: "vcg-ddd93",
    storageBucket: "vcg-ddd93.appspot.com",
    messagingSenderId: "1081274223991",
    appId: "1:1081274223991:web:70e73921369464b9852572"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

console.log(app);

const auth = getAuth();
auth.languageCode = 'en';

console.log(auth);

    window.recaptchaVerifier = new RecaptchaVerifier('recaptcha-container', {
        'size': 'normal',
        'callback': (response) => {
            console.log(response);

        },
        'expired-callback': () => {
            console.log('no');

        }
    }, auth);


    recaptchaVerifier.render().then((widgetId) => {
        window.recaptchaWidgetId = widgetId;

        console.log(widgetId);
    });


const phoneNumber = "+963998685421";
const appVerifier = window.recaptchaVerifier;

signInWithPhoneNumber(auth, phoneNumber, appVerifier)
    .then((confirmationResult) => {
        // SMS sent. Prompt user to type the code from the message, then sign the
        // user in with confirmationResult.confirm(code).
        window.confirmationResult = confirmationResult;

        console.log(confirmationResult);

        const code = '123123';
        confirmationResult.confirm(code).then((result) => {
            // User signed in successfully.
            const user = result.user;
            console.log(user);
            // ...
        }).catch((error) => {
            // User couldn't sign in (bad verification code?)
            // ...
        });

        // ...
    }).catch((error) => {
    console.log('error sending sms')
});
