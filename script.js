function login() {
  const email = document.getElementById("loginEmail").value;
  const password = document.getElementById("loginPassword").value;

  fetch("../api/login.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `email=${email}&password=${password}`
  })
  .then(res => res.text())
  .then(data => {
    if (data === "success") {
      window.location.href = "dashboard.php";
    } else {
      alert("Invalid login");
    }
  });
}

function register() {
  const name = regName.value;
  const email = regEmail.value;
  const password = regPassword.value;
  const section = regSection.value;

  fetch("../api/register.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `name=${name}&email=${email}&password=${password}&section=${section}`
  })
  .then(res => res.text())
  .then(data => {
    if (data === "success") {
      window.location.href = "login.html";
    } else {
      alert("Register error");
    }
  });
}
