const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

// manejo de PASSWORDS en registro
const regPass = document.getElementById("regPassword");
const toggleReg = document.getElementById("togglePassReg");

toggleReg.addEventListener("click", () => {
    if (regPass.type === "password") {
        regPass.type = "text";
        toggleReg.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        regPass.type = "password";
        toggleReg.classList.replace("fa-eye-slash", "fa-eye");
    }
});

// manejo de PASSWORDS en login
const logPass = document.getElementById("logPass");
const toggleLog = document.getElementById("togglePassLog");

toggleLog.addEventListener("click", () => {
    if (logPass.type === "password") {
        logPass.type = "text";
        toggleLog.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        logPass.type = "password";
        toggleLog.classList.replace("fa-eye-slash", "fa-eye");
    }
});

// ======== VALIDACIÓN REGISTRO ==========
document.getElementById("btnReg").addEventListener("click", (e) => {
    

    const name = document.getElementById("regName").value.trim();
    const email = document.getElementById("regEmail").value.trim();
    const password = document.getElementById("regPassword").value.trim();

    // validar nombre
    if (name.length < 3) {
        e.preventDefault();
        alert("El nombre debe tener mínimo 3 letras");
        return;
    }

    // validar email
    const emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailReg.test(email)) {
        alert("Correo electrónico inválido");
        return;
    }

    // validar contraseña 
    if (password.length < 5) {
        alert("La contraseña debe tener al menos 5 caracteres.");
        return;
    }
    if (!/[A-Z]/.test(password)) {
        alert("La contraseña debe tener al menos una letra mayúscula.");
        return;
    }
    if (!/[0-9]/.test(password)) {
        alert("La contraseña debe tener al menos un dígito.");
        return;
    }
    if (!/[^a-zA-Z0-9\s]/.test(password)) {
        alert("La contraseña debe tener un carácter especial (#, $, %, etc.)");
        return;
    }

    alert("Registro exitoso ✔");
});

// VALIDACIÓN LOGIN 
document.getElementById("btnLog").addEventListener("click", (e) => {
    

    const email = document.getElementById("logEmail").value.trim();
    const pass = document.getElementById("logPass").value.trim();

    if (email === "" || pass === "") {
        e.preventDefault(); // SOLO si hay error
        alert("Todos los campos son obligatorios");
    }

});