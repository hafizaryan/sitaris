// Fungsi untuk menampilkan konfirmasi sebelum menghapus data
function confirmDelete(url) {
  if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
    window.location.href = url;
  }
}

// Fungsi untuk menampilkan gambar dalam tampilan overlay
function showImage(src) {
  // Membuat elemen div overlay
  var overlay = document.createElement("div");
  overlay.id = "overlay";
  overlay.style.position = "fixed";
  overlay.style.top = 0;
  overlay.style.left = 0;
  overlay.style.width = "100%";
  overlay.style.height = "100%";
  overlay.style.backgroundColor = "rgba(0,0,0,0.7)";
  overlay.style.zIndex = 99999;
  overlay.style.display = "flex";
  overlay.style.alignItems = "center";
  overlay.style.justifyContent = "center";

  // Menambahkan event onclick untuk menghapus overlay saat di-klik
  overlay.onclick = function () {
    document.body.removeChild(overlay);
  };

  // Membuat elemen gambar
  var img = new Image();
  img.id = "image-overlay";
  img.src = src;
  img.style.maxWidth = "90%"; // Maksimal lebar 90% dari layar
  img.style.maxHeight = "90vh"; // Maksimal tinggi 90% dari tinggi viewport
  img.style.objectFit = "contain"; // Memastikan gambar sesuai proporsinya

  // Menambahkan gambar ke dalam overlay dan overlay ke dalam body
  overlay.appendChild(img);
  document.body.appendChild(overlay);
}

// Fungsi untuk menampilkan konfirmasi sebelum logout
function confirmLogout() {
  return confirm("Apakah Anda yakin ingin keluar?");
}

// Mendapatkan tombol untuk beralih ke mode layar penuh
const fullscreenButton = document.getElementById("fullscreenButton");
fullscreenButton.addEventListener("click", () => {
  toggleFullScreen();
});

// Fungsi untuk beralih antara mode layar penuh dan normal
function toggleFullScreen() {
  if (
    !document.fullscreenElement && // Mode normal
    !document.mozFullScreenElement &&
    !document.webkitFullscreenElement &&
    !document.msFullscreenElement
  ) {
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
      document.documentElement.msRequestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(
        Element.ALLOW_KEYBOARD_INPUT
      );
    }
  } else {
    // Mode layar penuh
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}

// Fungsi untuk validasi input, hanya mengizinkan huruf dan angka
function validateInput() {
  var userInput = document.getElementById("userInput");
  var sanitizedInput = userInput.value.replace(/[^A-Za-z0-9]/g, ""); // Menghapus karakter selain huruf dan angka
  userInput.value = sanitizedInput;
}

// Fungsi untuk validasi username, memastikan tidak ada spasi dalam username
function validateUsername() {
  var usernameInput = document.getElementById("username");
  var usernameValue = usernameInput.value;
  if (usernameValue.indexOf(" ") !== -1) {
    alert("Username tidak mengandung spasi.");
    return false;
  }

  return true;
}

// Fungsi untuk beralih antara tampilan password tersembunyi dan terlihat
function togglePasswordVisibility() {
  var passwordInput = document.getElementById("password");
  var showPasswordCheckbox = document.getElementById("showPassword");

  if (showPasswordCheckbox.checked) {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}

window.onload = setTodayDate;

function validateImageFile() {
  const fileInput = document.getElementById("gambar_gedung");
  const file = fileInput.files[0];

  const allowedExtensions = /(\.jpeg|\.jpg|\.png)$/i;
  const maxSize = 10 * 1024 * 1024; // 10 MB

  if (!allowedExtensions.exec(file.name)) {
    alert("Gambar harus berupa file dengan format JPEG atau PNG.");
    fileInput.value = "";
    return false;
  } else if (file.size > maxSize) {
    alert("Ukuran file tidak boleh melebihi 10 MB.");
    fileInput.value = "";
    return false;
  }
  return true;
}

// fungsi alert

document.addEventListener("DOMContentLoaded", function () {
  var toast = document.getElementById("custom-toast");

  if (toast) {
    setTimeout(function () {
      toast.classList.add("show-toast");
    }, 100);

    setTimeout(function () {
      toast.classList.remove("show-toast");
    }, 2000);
  }
});
