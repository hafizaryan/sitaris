<!DOCTYPE html>
<html lang="en" manifest="demo.appcache">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOGIN | SITARIS SI</title>
  <link rel="shortcut icon" type="image/png/jpg" href="<?= base_url() ?>/gentelella-master/production/images/HIMASI.png">
  <!-- Bootstrap -->
  <link href="<?= base_url() ?>/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url() ?>/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url() ?>/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?= base_url() ?>/gentelella-master/vendors/animate.css/animate.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="<?= base_url() ?>/gentelella-master/build/css/custom.min.css" rel="stylesheet">
  <script src="gentelella-master/production/js/myscript.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <style>
    .logo {
      text-align: center;
    }

    .logo img {
      max-width: 103px;
      text-align: center;
      margin-right: 15%;
    }

    .error-message {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
      padding: 10px;
      margin-bottom: 20px;
    }

    #container {
      padding: 2px 10px;
    }

    .google {
      position: relative;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease, border-color 0.3s ease;
      width: 100%;
      max-width: 400px;
      min-width: min-content;
      margin-top: none;
    }

    .google:hover {
      background-color: #f0f0f0;
      border-color: #aaa;
    }

    .google svg {
      fill: #EA4335;
      width: 50px;
      height: 30px;
      margin-right: 10px;
      padding-top: 10px;
    }

    .masuk {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background-color: #0078ff;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease, border-color 0.3s ease;
      width: 100%;
      max-width: 400px;
      min-width: min-content;
      color: white;
    }

    .masuk:hover {
      background-color: #f0f0f0;
      border-color: #aaa;
      color: black;
    }

    .masuk svg {
      fill: #EA4335;
      width: 20px;
      height: 20px;
      margin-right: 10px;
    }

    .masuk span {
      font-size: 16px;
    }

    .wrapper {
      position: relative;
      margin-top: 20px;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      transition: all 0.2s ease;
    }

    label {
      position: absolute;
      left: 10px;
      top: 12px;
      padding: 0 4px;
      pointer-events: none;
      transition: all 0.2s ease;
    }

    input:not(:placeholder-shown)+label,
    input:focus+label {
      top: -8px;
      font-size: 13px;
      background: white;
    }

    @media (max-width: 768px) {
      .logo {
        margin-right: 0;
        margin-bottom: 20px;
      }

      .logo img {
        max-width: 80px;
      }

      .login_form {
        padding: 10px;
      }

      .masuk,
      .google {
        max-width: none;
        width: 100%;
      }
    }

    #togglePassword {
      position: absolute;
      top: 20%;
      right: 10px;
      transform: translateY(-30%);
      cursor: pointer;
    }

    * {
      padding: 0;
      margin: 0;
    }

    svg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: block;
    }
  </style>
</head>

<body class="login">
  <div>
    <div class="login_wrapper" style="margin-top: none;">
      <div class="animate form login_form" style="padding-top: none;">
        <div class="logo ">
          <img src="<?= base_url() ?>/gentelella-master/production/images/logo.jpeg" alt="Logo" class="img-circle profile_img">
        </div>
        <section class="login_content no-padding">
          <form action="<?= base_url() ?>login" method="post" onsubmit="return validateUsername()">
            <h1>Selamat Datang!</h1>
            <?php if (session()->has('error')) : ?>
              <div class="form-group error-message">
                <?php echo session('error'); ?>
              </div>
            <?php endif; ?>
            <?php if (session()->has('success')) : ?>
              <div class="form-group success-message">
                <?php echo session('success'); ?>
              </div>
            <?php endif; ?>
            <div class="wrapper">
              <input type="text" id="userInput" class="form-control" maxlength="20" placeholder="" name="username" id="username" required oninput="filterAlphanumeric(this)">
              <label for="userInput">Username</label>
            </div>
            <div class="wrapper">
              <input type="password" class="form-control" maxlength="20" placeholder="" name="password" id="password" required>
              <label for="userInput">Password</label>
              <i id="togglePassword" class="fa fa-eye" onclick="togglePasswordVisibility()"></i>
              <a href="#" onclick="showAlert()" style="text-decoration: none;">Lupa Password?</a>
            </div>
            <input type="hidden" name="recaptcha_response" id="recaptcha_response">
            <br>
            <div>
              <button type="submit" class="masuk">Masuk</button>
            </div>
          </form>
          <div id="google-login-button" class="google" onclick="showAlert2()">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="LgbsSe-Bz112c">
              <g>
                <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                <path fill="none" d="M0 0h48v48H0z"></path>
              </g>
            </svg>
            <span>Lanjutkan dengan Google</span>
          </div>
          </form>
          <div>
            <br>
            <h1> SI<b>TARIS</b> SI</h1>
            <p>Powered by <a style="text-decoration: none;" href="<?= base_url('pengembang'); ?>" target="_blank"><b>Sitaris Dev</b></a><br> Copyright © <?php echo date('Y') ?> <br> Sistem Informasi Inventaris Laboratorium Sistem Informasi</p>
          </div>
        </section>
      </div>
    </div>
  </div>
  <svg version="2.2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
    <defs>
      <linearGradient id="bg">
        <stop offset="0%" style="stop-color:rgba(130, 158, 249, 0.06)"></stop>
        <stop offset="50%" style="stop-color:rgba(76, 190, 255, 0.6)"></stop>
        <stop offset="100%" style="stop-color:rgba(115, 209, 72, 0.2)"></stop>
      </linearGradient>
      <path id="wave" fill="url(#bg)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
	s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
    </defs>
    <g>
      <use xlink:href='#wave' opacity=".3">
        <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="10s" calcMode="spline" values="270 230; -334 180; 270 230" keyTimes="0; .5; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
      </use>
      <use xlink:href='#wave' opacity=".6">
        <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="8s" calcMode="spline" values="-270 230;243 220;-270 230" keyTimes="0; .6; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
      </use>
      <use xlink:href='#wave' opacity=".9">
        <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="6s" calcMode="spline" values="0 230;-140 200;0 230" keyTimes="0; .4; 1" keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
      </use>
    </g>
  </svg>
</body>
<!-- Custom JS -->
<script src="https://www.google.com/recaptcha/api.js?render=6LdFjE8oAAAAAORk5aKHi1UkwcH5UXkIO7gPI0tU"></script>
<script src="https://apis.google.com/js/platform.js?onload=startApp" async defer></script>
<script>
  // Fungsi untuk menyaring karakter non-alphanumeric dari input
  function filterAlphanumeric(input) {
    let sanitizedValue = input.value.replace(/[^a-zA-Z0-9]/g, '');
    input.value = sanitizedValue;
  }

  // Fungsi untuk memunculkan notifikasi hubungi admin untuk mengubah password
  function showAlert() {
    alert("Silahkan hubungi admin untuk mengubah password Anda");
  }

  function showAlert2() {
    alert("Maaf, fitur sedang dalam pengembangan :)");
  }

  // Fungsi untuk validasi username
  function validateUsername() {
    var userInput = document.getElementById("userInput").value;
    if (userInput.length < 3) {
      alert("Username harus memiliki setidaknya 3 karakter.");
      return false;
    }
    return true;
  }

  // Fungsi untuk menghapus spasi dari kata sandi
  function removeSpaces() {
    var passwordInput = document.getElementById("password");
    passwordInput.value = passwordInput.value.replace(/\s/g, ''); // Menghapus semua spasi
  }

  // Fungsi untuk mengganti visibilitas kata sandi
  function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var toggleIcon = document.getElementById("togglePassword");

    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleIcon.classList.remove("fa-eye");
      toggleIcon.classList.add("fa-eye-slash");
    } else {
      passwordInput.type = "password";
      toggleIcon.classList.remove("fa-eye-slash");
      toggleIcon.classList.add("fa-eye");
    }
  }

  // Fungsi yang akan dipanggil setelah reCAPTCHA v3 memverifikasi pengguna
  function recaptchaCallback(token) {
    document.getElementById("recaptcha_response").value = token;
  }

  // Menjalankan reCAPTCHA v3
  grecaptcha.ready(function() {
    grecaptcha.execute('6LdFjE8oAAAAAORk5aKHi1UkwcH5UXkIO7gPI0tU', {
      action: 'login'
    }).then(function(token) {
      recaptchaCallback(token);
    });
  });

  // Memulai aplikasi setelah memuat API Google
  // function startApp() {
  //   gapi.load('auth2', function() {
  //     gapi.auth2.init({
  //       client_id: '472090822050-p1ohteogqqgdin6gc080dcq3cvvh5ggb.apps.googleusercontent.com', // Ganti dengan ID Klien Google Anda
  //     });
  //   });
  // }

  // Menambahkan event listener untuk tombol login Google
  // document.getElementById('google-login-button').addEventListener('click', function() {
  //   var auth2 = gapi.auth2.getAuthInstance();

  //   auth2.signIn().then(function(googleUser) {
  //     var idToken = googleUser.getAuthResponse().id_token;

  //     // Redirect ke URL callback Google CodeIgniter Anda dengan id_token
  //     window.location.href = "?code=" + idToken;
  //   }).catch(function(error) {
  //     console.log('Sign-in error:', error);
  //   });
  // });
</script>

</html>