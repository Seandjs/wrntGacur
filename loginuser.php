<?php
session_start();
$pdo = require 'koneksi.php';

$hasil = true;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $sql = 'SELECT * FROM wrntuser WHERE username = :username LIMIT 1';
  $query = $pdo->prepare($sql);
  $query->execute(['username' => $username]);
  $user = $query->fetch();

  if (!$user) {
    $hasil = false;
    $error = 'Username tidak ditemukan.';
  } else if ($password !== $user['password']) {
    $hasil = false;
    $error = 'Password salah.';
  } else {
    $_SESSION['wrntgacur'] = [
      'id' => $user['id'],
      'username' => $user['username'],
    ];
    header('Location: dashboarduser.php');
    exit;
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    />
    <link rel="icon" href="properties/logo2.ico" type="image/x-icon" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Russo+One&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cormorant:ital,wght@0,300..700;1,300..700&display=swap");

      * {
        margin: 0;
        padding: 0;
        font-family: "Russo One";
        box-sizing: border-box;
      } 

      :root {
        --maincolor: #bf205e;
      }

      body {
        margin: 0;
        padding: 2rem;
        overflow: hidden;
        background-color: #000000;
        background: radial-gradient(
          circle at bottom right,
          #411422,
          #000000 60%
        );
        min-height: 100vh;
        margin: 0;
      }

      .star {
        position: absolute;
        background: white;
        border-radius: 50%;
        opacity: 0.8;
        animation: float 4s ease-in-out infinite;
        z-index: 1000;
      }

      .logo img {
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        z-index: 1000000;
        text-decoration: none;
        position: absolute;
        top: 32px;
        height: 5rem;
        filter: drop-shadow(0 0 3px #fd5d8d);
      }

      .navbar a {
        text-decoration: none;
        color: #333;
        font-size: 1.2rem;
        margin: 0 1rem;
        transition: color 0.3s ease-in-out;
      }

      #form {
        position: absolute;
        top: 60%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        z-index: 999;
        animation: slideatasdaribawah 2s ease-out forwards;
      }

      #form h1 {
        position: absolute;
        font-family: "Russo One";
      }

      #form input {
        width: 300px;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #cccccc60;
        border-radius: 300px;
        font-size: 16px;
        z-index: 100;
        border-radius: 20px;
      }

      button {
        background-color: var(--maincolor);
        border: none;
        border-radius: 16px;
        padding: 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 64px;
        position: absolute;
        left: 50%;
        translate: -50%;
        transition: ease-in-out 0.3s;
      }

      .arrow-button i {
        font-size: 24px;
        color: #000;
      }

      button:hover {
        background-color: #212222b0;
        border: var(--maincolor) solid 2px;
        color: var(--maincolor);
        transform: scale(1.1);
        transition: ease-in-out 0.3s;
      }

      .arrow-button:hover i {
        color: var(--maincolor);
        transform: scale(1.1);
        filter: drop-shadow(0 0 20px var(--maincolor));
      }

      @keyframes ngambang {
        0%,
        100% {
          transform: translateY(0);
        }
        50% {
          transform: translateY(-20px);
        }
      }
      form h1 {
        font-size: 2.9rem;
        position: absolute;
        left: 50%;
        transform: translate(-50%, -129%);
        color: white;
        text-align: center;
        justify-content: center;
      }

      form {
        background: #cfcfcf00;
        padding-top: 190px;
        padding-bottom: 100px;
        padding-right: 50px;
        padding-left: 50px;
        border-radius: 3%;
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(4px);
        border: 1.5px solid rgba(255, 255, 255, 0.292);
      }

      input {
        background-color: rgba(255, 255, 255, 0);
        border-radius: 10%;
      }

      input::placeholder {
        color: white;
      }

      input i {
        color: white;
      }

      .input-group i {
        position: absolute;
        right: 70px;
        margin-top: 23px;
      }

      .input-group input {
        color: white;
      }

      .register a {
        position: absolute;
        top: 95%;
        left: 59%;
        transform: translate(20%, -50%);
        color: var(--maincolor);
      }

      @keyframes noise {
        0%,
        100% {
          background-position: 0 0;
        }
        10% {
          background-position: -5% -10%;
        }
        20% {
          background-position: -15% 5%;
        }
        30% {
          background-position: 7% -25%;
        }
        40% {
          background-position: 20% 25%;
        }
        50% {
          background-position: -25% 10%;
        }
        60% {
          background-position: 15% 5%;
        }
        70% {
          background-position: 0 15%;
        }
        80% {
          background-position: 25% 35%;
        }
        90% {
          background-position: -10% 10%;
        }
      }

      @keyframes opacity {
        0% {
          opacity: 0.6;
        }
        20% {
          opacity: 0.3;
        }
        35% {
          opacity: 0.5;
        }
        50% {
          opacity: 0.8;
        }
        60% {
          opacity: 0.4;
        }
        80% {
          opacity: 0.7;
        }
        100% {
          opacity: 0.6;
        }
      }

      @keyframes scanlines {
        from {
          background: linear-gradient(
            to bottom,
            transparent 50%,
            rgba(0, 0, 0, 0.5) 51%
          );
          background-size: 100% 4px;
        }
        to {
          background: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0.5) 50%,
            transparent 51%
          );
          background-size: 100% 4px;
        }
      }
      @keyframes float {
        0% {
          transform: translateY(0px);
        }
        50% {
          transform: translateY(-10px);
        }
        100% {
          transform: translateY(0px);
        }
      }
      .logo img {
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        text-decoration: none;
        height: 5rem;
        filter: drop-shadow(0 0 3px #fd5d8d);
      }

      #bg {
        position: absolute;
        top: -256px;
        right: 850px;
        width: 120%;
        z-index: -1;
        animation: floatImage1 12s linear infinite,
          slidekanandarikiri 2s ease-out forwards;
      }

      #changli {
        position: absolute;
        top: 0px;
        right: -79px;
        width: 50%;
        z-index: 800;
        filter: drop-shadow(0 0 10px #6b293d);
        animation: slidekiridarikanan 2s ease-out forwards,
          floatImage1 8s ease-in-out infinite 2.1s;
      }

      @keyframes floatImage1 {
        0% {
          transform: translateY(0);
        }
        50% {
          transform: translateY(-1rem);
        }
        100% {
          transform: translateY(0);
        }
      }

      @keyframes slideatasdaribawah {
        0% {
          transform: translateY(100vh);
          transform: translateX(-25vh);
          opacity: 0;
        }
        100% {
          transform: translateY();
          transform: translateX();
          opacity: 1;
        }
      }

      @keyframes slidebawahdariatas {
        0% {
          transform: translateY(-100vh);
          opacity: 0;
        }
        100% {
          transform: translateY();
          opacity: 1;
        }
      }

      @keyframes slidekanandarikiri {
        0% {
          transform: translateX(-100vw);
          opacity: 0;
        }
        100% {
          transform: translateX();
          opacity: 1;
        }
      }

      @keyframes slidekiridarikanan {
        0% {
          transform: translateX(100vw);
          opacity: 0;
        }
        100% {
          transform: translateX();
          opacity: 1;
        }
      }
    </style>
  </head>
  <body>
    <div class="background-elements">
      <div class="scanlines"></div>
      <div class="noise"></div>
      <div class="noise noise-moving"></div>
    </div>
    <header>
        <div class="logo">
        <a href="index.php">
          <img src="properties/logo.png" alt="logo" />
        </a>
      </div>
    </header>
    <div class="login-form">
      <form action="" id="form" method="post">
        <h1>
          USER<br />
          LOGIN<br />
        </h1>
        <div class="input-group">
          <input
            type="text"
            id="username"
            name="username"
            placeholder="Username"
          />
          <i class="fas fa-user"></i>
        </div>
        <div class="input-group">
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Password"
          />
          <i class="fas fa-lock"></i>
        </div>

        <button class="arrow-button">
          <i class="fas fa-arrow-right"></i>
        </button>
        <div class="register">
          <a href="registere.php"> don't have an account yet? </a>
        </div>
      </form>
    </div>

    <div class="bg">
      <img src="properties/logo1.png" alt="background" id="bg" />
      <img src="properties/changli.png" alt="" id="changli" />
    </div>
  </body>
  <script>
    const numStars = 150; // jumlah bintang
    for (let i = 0; i < numStars; i++) {
      const star = document.createElement("div");
      star.classList.add("star");

      // Acak ukuran, posisi, dan durasi animasi
      const size = Math.random() * 3 + 1 + "px";
      const top = Math.random() * 100 + "%";
      const left = Math.random() * 100 + "%";
      const delay = Math.random() * 5 + "s";
      const duration = Math.random() * 3 + 2 + "s";

      star.style.width = size;
      star.style.height = size;
      star.style.top = top;
      star.style.left = left;
      star.style.animationDelay = delay;
      star.style.animationDuration = duration;

      // Add clip-path to create a star shape
      star.style.clipPath =
        "polygon(50% 0%, 65% 40%, 105% 40%, 75% 65%, 85% 105%, 50% 80%, 25% 105%, 35% 65%, 5% 40%, 45% 40%)";

      document.body.appendChild(star);
    }
  </script>
</html>