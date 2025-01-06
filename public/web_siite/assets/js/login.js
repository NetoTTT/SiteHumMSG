// Configuração do Firebase
const firebaseConfig = {
    apiKey: "AIzaSyDC2WhGePbcE58oGDIYQAi7zz8qp4FiIls",
    authDomain: "devcareweb.firebaseapp.com",
    projectId: "devcareweb",
    storageBucket: "devcareweb.firebasestorage.app",
    messagingSenderId: "774221694310",
    appId: "1:774221694310:web:07f7fbe7ac0993e1f5f4a7",
    measurementId: "G-HM1HVRF7NS"
  };
  
  // Inicializando o Firebase
  firebase.initializeApp(firebaseConfig);
  
  // Selecionando o formulário
  const loginForm = document.querySelector(".sign-in-form");
  
  // Evento de envio do formulário (Login com email e senha)
  loginForm.addEventListener("submit", async (event) => {
    event.preventDefault(); // Impede o envio padrão do formulário
  
    const email = loginForm.username.value;
    const password = loginForm.password.value;
  
    try {
      const userCredential = await firebase.auth().signInWithEmailAndPassword(email, password);
      console.log("Login bem-sucedido:", userCredential.user);
      window.location.href = "/web_siite/dashboard.php";
    } catch (error) {
      console.error("Erro ao fazer login:", error.message);
      alert("Erro ao fazer login: " + error.message);
    }
  });
  
  // Função de login com Google
  const googleButton = document.querySelector(".social-icon.google");
  googleButton.addEventListener("click", async () => {
    const provider = new firebase.auth.GoogleAuthProvider();
  
    try {
      const result = await firebase.auth().signInWithPopup(provider);
      console.log("Login com Google bem-sucedido:", result.user);
      window.location.href = "/web_siite/dashboard.php";
    } catch (error) {
      console.error("Erro ao fazer login com Google:", error.message);
      alert("Erro ao fazer login com Google: " + error.message);
    }
  });
  
  // Função de login com Facebook
  const facebookButton = document.querySelector(".social-icon.facebook");
  facebookButton.addEventListener("click", async () => {
    const provider = new firebase.auth.FacebookAuthProvider();
  
    try {
      const result = await firebase.auth().signInWithPopup(provider);
      console.log("Login com Facebook bem-sucedido:", result.user);
      window.location.href = "/web_siite/dashboard.php";
    } catch (error) {
      console.error("Erro ao fazer login com Facebook:", error.message);
      alert("Erro ao fazer login com Facebook: " + error.message);
    }
  });
  
  // Função de login com LinkedIn (via OAuth2 no Firebase, customizado)
  const linkedInButton = document.querySelector(".social-icon.linkedin");
  linkedInButton.addEventListener("click", () => {
    alert("Integração com LinkedIn precisa ser configurada manualmente no Firebase Authentication. Consulte a documentação para mais detalhes.");
  });
  