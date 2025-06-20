<?php
session_start();
if (!isset($_SESSION['wrntgacur'])) {
  header('Location: loginuser.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard User</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Jacquarda+Bastarda+9&family=Pixelify+Sans&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="properties/logo2.png" type="image/x-icon" />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Pixelify Sans";
      }

      :root {
        --maincolor: #bf205e;
      }

      body {
        margin: 0;
        overflow: hidden;
        background-color: #000000;
        background: radial-gradient(
          circle at bottom right,
          #411422,
          #000000 70%
        );
        min-height: 100vh;
        margin: 0;
        padding: 2rem;
      }

      .logo img {
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        text-decoration: none;
        height: 5rem;
        filter: drop-shadow(0 0 3px #fd5d8d);
        z-index: 2345678;
      }

      .logout-button {
        background-color: var(--maincolor);
        border: none;
        border-radius: 50px;
        padding: 16px;
        cursor: pointer;
        position: absolute;
        top: 35px;
        right: 32px;
        transition: ease-in-out 0.3s;
        z-index: 1111;
      }

      button:hover {
        background-color: #212222b0;
        border: var(--maincolor) solid 2px;
        color: var(--maincolor);
        transform: scale(1.1);
        transition: ease-in-out 0.3s;
      }

      .right {
        float: right;
      }

      .profile {
        flex-direction: column;
        height: 50vh;
        width: 57vh;
        background: #cfcfcf00;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding-top: 10px;
        padding-bottom: 10px;
        padding-right: 50px;
        padding-left: 50px;
        border-radius: 3%;
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(4px);
        border: 1.5px solid rgba(255, 255, 255, 0.292);
        animation: slideatasdaribawah 2.5s ease-out forwards,
          floatImage1 5s ease-in-out infinite 2.6s;
      }

      .profile h2,
      h3 {
        font-family: "Pixelify Sans";
        margin-bottom: 1rem;
        line-height: 1.5rem;
        color: #fff;
      }

      h2 {
        font-size: 2.5rem;
        margin-top: 4rem;
        margin-bottom: 3rem;
        color: #fff;
      }

      .wow {
        font-size: 1.5rem;
        color: rgb(184, 168, 168);
        text-align: center;
        margin-bottom: 1rem;
      }

      .star {
        position: absolute;
        background: white;
        border-radius: 50%;
        opacity: 0.8;
        animation: float 4s ease-in-out infinite;
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

      @keyframes slideatasdaribawah {
        0% {
          transform: translate(
            -50%,
            150%
          );
          opacity: 0;
        }
        100% {
          transform: translate(-50%, -50%);
          opacity: 1;
        }
      }

      @keyframes floatImage1 {
        0%,
        100% {
          transform: translate(-50%, -50%) translateY(0px);
        }
        25% {
          transform: translate(-50%, -50%) translateY(-10px);
        }
        50% {
          transform: translate(-50%, -50%) translateY(-5px);
        }
        75% {
          transform: translate(-50%, -50%) translateY(-15px);
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
    <div class="logout">
      <a href="loginuser.php">
        <button class="logout-button">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </button>
      </a>
    </div>
      <?php
  $pdo = require 'koneksi.php';
  $sql2 = 'SELECT id, username, phone, nik, balance, usedbalance FROM wrntuser';
  $query2 = $pdo->prepare($sql2);
  $query2->execute();
  while ($wrntuser = $query2->fetch()) { ?>
    <div class="profile">
      <h2>Welcome <span class="wow"><?php echo htmlentities($wrntuser['username']); ?>#<?php echo htmlentities($wrntuser['id']); ?></span></h2>
      <h3>NIK : <span class="right"><?php echo htmlentities($wrntuser['nik']); ?></span></h3>
      <h3>Balance : <span class="right"><?php echo htmlentities($wrntuser['balance']); ?></span></h3>
      <h3>Used Balance : <span class="right"><?php echo htmlentities($wrntuser['usedbalance']); ?></span></h3>
    </div>
<?php } ?>
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