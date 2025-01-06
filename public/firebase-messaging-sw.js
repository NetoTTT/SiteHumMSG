// firebase-messaging-sw.js
importScripts('https://www.gstatic.com/firebasejs/9.17.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/9.17.2/firebase-messaging.js');

const firebaseConfig = {
  apiKey: "AIzaSyDC2WhGePbcE58oGDIYQAi7zz8qp4FiIls",
  authDomain: "devcareweb.firebaseapp.com",
  projectId: "devcareweb",
  storageBucket: "devcareweb.appspot.com",
  messagingSenderId: "774221694310",
  appId: "1:774221694310:web:07f7fbe7ac0993e1f5f4a7",
  measurementId: "G-HM1HVRF7NS"
};

// Inicializando o Firebase no Service Worker
firebase.initializeApp(firebaseConfig);

// Obtenção da instância do Firebase Messaging
const messaging = firebase.messaging();

// Configurar o que fazer quando a notificação for recebida em segundo plano
messaging.onBackgroundMessage(function(payload) {
  console.log("Mensagem recebida em segundo plano: ", payload);
  
  const notificationTitle = 'Hora de desacelerar!';
  const notificationOptions = {
    body: 'Dê uma pausa de 5 minutos. Isso vai te ajudar a melhorar a produtividade e manter o desempenho.',
    icon: '/icons/icon-192x192.png'
  };

  // Mostrar a notificação no navegador
  self.registration.showNotification(notificationTitle, notificationOptions);
});
