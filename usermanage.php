<?php
session_start();
if (!isset($_SESSION['wrntgacur'])) {
  header('Location: loginatmin.php');
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Manage</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Jacquarda+Bastarda+9&family=Pixelify+Sans&display=swap"
    rel="stylesheet" />
  <link rel="icon" href="properties/logo2.png" type="image/x-icon" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Russo+One&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cormorant:ital,wght@0,300..700;1,300..700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Russo One";
      backface-visibility: hidden;
      -webkit-backface-visibility: hidden;
    }

    :root {
      --maincolor: #df5d8d;
    }

    body {
      padding: 2rem;
      margin: 0;
      overflow-x: hidden;
      background-color: #000000;
      background: radial-gradient(circle at bottom right, #411422, #000000 70%);
      min-height: 100vh;
      margin: 0;
    }


    .logo img {
      font-size: 24px;
      font-weight: bold;
      color: #fff;
      text-decoration: none;
      height: 3rem;
    }

    .star {
      position: absolute;
      background: white;
      border-radius: 50%;
      opacity: 0.8;
      animation: float 4s ease-in-out infinite;
    }

    .logo img {
      font-size: 24px;
      font-weight: bold;
      color: #fff;
      text-decoration: none;
      height: 5rem;
      filter: drop-shadow(0 0 3px #fd5d8d);
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

    .search-bar {
      position: relative;
      margin-bottom: 30px;
      display: flex;
      justify-content: center;
    }

    .search-bar input {
      width: 30%;
      padding: 12px 15px 12px 45px;
      border: 2px solid #000000;
      background-color: #212222b0;
      border-radius: 5px;
      font-size: 16px;
      color: #fff;
      box-sizing: border-box;
      outline: none;
      color: #fff;
      transition: all 0.3s;
    }

    .search-bar input:focus {
      border-color: #000000;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .search-bar .search-icon {
      position: absolute;
      left: 36%;
      top: 50%;
      transform: translateY(-50%);
      color: #757575;
      font-size: 18px;
    }

    details {
      border: 2px solid #fd5d8d;
      border-radius: 8px;
      margin-bottom: 1.5rem;
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      z-index: 100;
      position: relative;

    }

    details:hover {
      transform: translateY(-2px);
      border-color: rgba(255, 255, 255, 0.292);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    details[open] {
      backdrop-filter: blur(1px);
      border: 1.5px solid rgba(255, 255, 255, 0.292);
      z-index: 100;
    }

    details[open] summary::after {
      content: "--";
      transform: rotate(180deg);
      z-index: 100;
    }

    .details-container {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94),
        opacity 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      opacity: 0;
      transform: translateZ(0);
      will-change: max-height, opacity;
      backface-visibility: hidden;
    }

    details[open] .details-container {
      opacity: 1;
      transition: max-height 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94),
        opacity 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .details-container>div {
      padding: 1.5rem;
      border-top: 1px solid var(--maincolor);
      transform: translateY(-10px) translateZ(0);
      transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.1s,
        opacity 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.1s;
      opacity: 0;
      will-change: transform, opacity;
      backface-visibility: hidden;
    }

    details[open] .details-container>div {
      transform: translateY(0) translateZ(0);
      opacity: 1;
    }

    .details-container>div:nth-child(1) {
      transition-delay: 0.1s;
    }

    .details-container>div:nth-child(2) {
      transition-delay: 0.15s;
    }

    .details-container>div:nth-child(3) {
      transition-delay: 0.2s;
    }

    .details-container>div>* {
      transform: translateY(-5px) translateZ(0);
      opacity: 0;
      transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94),
        opacity 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      will-change: transform, opacity;
      backface-visibility: hidden;
    }

    details[open] .details-container>div>* {
      transform: translateY(0) translateZ(0);
      opacity: 1;
    }

    .details-container>div>*:nth-child(1) {
      transition-delay: 0.25s;
    }

    .details-container>div>*:nth-child(2) {
      transition-delay: 0.3s;
    }

    .details-container>div>*:nth-child(3) {
      transition-delay: 0.35s;
    }

    .details-container>div>*:nth-child(4) {
      transition-delay: 0.4s;
    }

    summary {
      cursor: pointer;
      font-size: clamp(1.2rem, 4vw, 1.5rem);
      font-weight: bold;
      color: #df5d8d;
      padding: 1.25rem;
      position: relative;
      outline: none;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      z-index: 100;
      backdrop-filter: blur(3px);
      background-color: #4a4a4a35;
    }

    summary:hover {
      background-color: #212222b0;
      color: var(--maincolor);
      color: #fff;
    }

    summary::-webkit-details-marker {
      display: none;
    }

    summary::after {
      content: "+";
      position: absolute;
      right: 1.25rem;
      font-size: 1.5rem;
      transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    p {
      margin-bottom: 0.75rem;
      font-size: 1.25rem;
      position: relative;
      padding-left: 1rem;
      text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    p::before {
      content: " ";
      position: absolute;
      left: 0;
      top: 0.2rem;
      height: 1rem;
      width: 4px;
      background: rgb(0, 0, 0);
      border-radius: 2px;
    }

    .add-balance input[type="number"]::-webkit-input-placeholder {
      color:rgb(70, 70, 70);
    }

    input[type="number"] {
      padding: 0.5rem;
      border: 2px solid #606060;
      background: #4a4a4a;
      border-radius: 4px;
      width: 30%;
      margin-bottom: 1rem;
      font-size: 1rem;
      background-color: #212222b0;
      color: white;
    }

    input[type="number"]:focus {
      outline: none;
      background-color: #212222b0;
      border-color: #4a4a4a;
      box-shadow: 0 0 5px rgba(109, 109, 109, 0.5);
      color: white;
    }

    .add-user-button {
      position: relative;
      width: 100%;
      display: flex;
      justify-content: center;
    }

    .add-user-button a {
      text-decoration: none;
      display: inline-block;
    }

    .add-user-button button {
      background-color: var(--maincolor);
      border: none;
      border-radius: 50px;
      padding: 16px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 64px;
      height: 64px;
      transition: ease-in-out 0.3s;
      filter: drop-shadow(0 0 20px #000000);
      outline: none;
    }

    .add-user-button a button:hover,
    .add-user-button button a:hover,
    .add-user-button button:hover {
      background-color: #212222b0;
      border: var(--maincolor) solid 2px;
      color: var(--maincolor);
      transform: scale(1.1);
      transition: ease-in-out 0.3s;
      outline: none;
      text-decoration: none;
    }

    .add-user-plus i {
      font-size: 22px;
      color: #000;
      transition: ease-in-out 0.3s;
    }

    .add-user-button button:hover .add-user-plus i,
    .add-user-button a:hover .add-user-plus i {
      color: var(--maincolor);
      transform: scale(1.2);
      filter: drop-shadow(0 0 20px var(--maincolor));
    }

    .add-button {
      cursor: pointer;
      background-color: var(--maincolor);
      border: none;
      border-radius: 50px;
      padding: 16px;
      transition: ease-in-out 0.3s;
      outline: none;
    }

    button:hover {
      background-color: #212222b0;
      border: var(--maincolor) solid 2px;
      color: var(--maincolor);
      transform: scale(1.1);
      transition: ease-in-out 0.3s;
    }

    .delete {
      cursor: pointer;
      background-color: var(--maincolor);
      border: none;
      border-radius: 90px;
      padding: 16px;
      float: right;
      transition: ease-in-out 0.3s;
      z-index: 0;
      outline: none;
    }

    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .right {
      float: right;
      color: #fff;
      font-weight: bold;
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
  </style>
</head>

<body>
  <header>
    <div class="background-elements">
      <div class="scanlines"></div>
      <div class="noise"></div>
      <div class="noise noise-moving"></div>
    </div>
    <div class="logo">
      <a href="index.php">
        <img src="properties/logo.png" alt="logo" />
      </a>
  </header>
  <div class="logout">
    <a href="loginatmin.php">
      <button class="logout-button">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
      </button>
    </a>
  </div>
  <div class="search-bar">
    <input type="text" placeholder="Cari..." />
    <i class="fas fa-search search-icon"></i>
  </div>


  <?php
  $pdo = require 'koneksi.php';
  $sql2 = 'SELECT id, username, phone, nik, balance FROM wrntuser';
  $query2 = $pdo->prepare($sql2);
  $query2->execute();
  while ($wrntuser = $query2->fetch()) { ?>
    <div class="ampunbangjarwo">
      <details>
        <summary>
          <span><?php echo htmlentities($wrntuser['username']); ?></span>
          <span>#<?php echo str_pad($wrntuser['id'], 3, '0', STR_PAD_LEFT); ?></span>
        </summary>

        <div class="details-container">
          <div>
            <p>Username: <span class="right"><?php echo htmlentities($wrntuser['username']); ?></span></p>
            <p>Phone Number: <span class="right"><?php echo htmlentities($wrntuser['phone']); ?></span></p>
            <p>NIK User: <span class="right"><?php echo htmlentities($wrntuser['nik']); ?></span></p>
          </div>
          <div>
            <p>Balance: <span class="right"><?php echo htmlentities($wrntuser['balance']); ?></span></p>
            <p>Used: <span class="right">[balanceuseduser]</span></p>
          </div>
          <?php
          $pdo = require 'koneksi.php';

          if (!empty($_POST['id']) && isset($_POST['add_balance'])) {
            $id = $_POST['id'];
            $tambahSaldo = (float) $_POST['add_balance'];

            $sql = "SELECT balance FROM wrntuser WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            $user = $stmt->fetch();

            if ($user) {
              $saldoBaru = (float)$user['balance'] + $tambahSaldo;

              $sqlUpdate = "UPDATE wrntuser SET balance = :balance WHERE id = :id";
              $stmtUpdate = $pdo->prepare($sqlUpdate);
              $stmtUpdate->execute([
                'balance' => $saldoBaru,
                'id' => $id
              ]);

              header("Location: usermanage.php");
              exit;
            } else {
              echo "User tidak ditemukan.";
            }
          } else {
            echo "Data tidak lengkap.";
          }
          ?>
          <div class="add-balance">
            <form method="POST" action="">
              <input
                type="hidden"
                name="id"
                value="<?php echo $wrntuser['id']; ?>" />
              <input
                type="number"
                name="add_balance"
                placeholder="Add Balance"
                oninput="formatMoney(this)" />
              <button type="submit" class="add-button">
                <i class="fa-solid fa-plus"></i>
              </button>
            </form>
            <form method="GET" action="hapus.php" onsubmit="return confirm('Hapus user ini?')">
              <input type="hidden" name="id" value="<?php echo $wrntuser['id']; ?>" />
              <button type="submit" class="delete">
                <i class="fa-solid fa-trash-can"></i>
              </button>
            </form>
          </div>
        </div>
      </details>
    <?php } ?>
    </div>

    <div class="add-user-button">
      <a href="adduser.php" style="text-decoration: none">
        <button class="add-user-plus"><i class="fa-solid fa-plus"></i></button>
      </a>
    </div>

    <script>
      function formatMoney(input) {
        let value = input.value.replace(/\D/g, "");
        let formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        input.value = formattedValue;
      }

      // ULTRA SMOOTH DETAILS ANIMATION - FIXED
      document.addEventListener("DOMContentLoaded", function() {
        const details = document.querySelectorAll("details");

        details.forEach((detail, index) => {
          const container = detail.querySelector(".details-container");
          if (!container) return;

          // State tracking untuk setiap details
          const state = {
            isAnimating: false,
            targetHeight: 0,
            isOpen: false,
            uniqueId: `details-${index}`,
          };

          // Set initial state
          container.style.maxHeight = "0px";
          container.style.opacity = "0";

          // Calculate height dengan method yang lebih robust
          const calculateHeight = () => {
            // Create clone untuk accurate measurement
            const clone = container.cloneNode(true);
            clone.style.cssText = `
              position: absolute;
              visibility: hidden;
              height: auto;
              max-height: none;
              opacity: 1;
              top: -9999px;
              left: -9999px;
              width: ${container.offsetWidth}px;
            `;

            document.body.appendChild(clone);
            const height = clone.scrollHeight;
            document.body.removeChild(clone);

            state.targetHeight = height;
            return height;
          };

          // Custom toggle handler yang lebih reliable
          const handleToggle = (shouldOpen) => {
            if (state.isAnimating) return;

            state.isAnimating = true;
            state.isOpen = shouldOpen;

            if (shouldOpen) {
              // OPENING ANIMATION
              const height = calculateHeight();

              // Set starting state
              container.style.maxHeight = "0px";
              container.style.opacity = "0";

              // Force reflow
              container.offsetHeight;

              // Animate to open
              requestAnimationFrame(() => {
                container.style.maxHeight = height + "px";
                container.style.opacity = "1";
              });

              // Cleanup after animation
              setTimeout(() => {
                if (state.isOpen && detail.open) {
                  container.style.maxHeight = "none";
                }
                state.isAnimating = false;
              }, 900);
            } else {
              // CLOSING ANIMATION
              const currentHeight = container.scrollHeight;

              // Set current height first
              container.style.maxHeight = currentHeight + "px";
              container.style.opacity = "1";

              // Force reflow
              container.offsetHeight;

              // Animate to close
              requestAnimationFrame(() => {
                container.style.maxHeight = "0px";
                container.style.opacity = "0";
              });

              setTimeout(() => {
                state.isAnimating = false;
              }, 900);
            }
          };

          // Override native toggle behavior
          detail.addEventListener("click", function(e) {
            // Prevent default hanya pada summary
            if (e.target.closest("summary")) {
              e.preventDefault();

              // Block clicks saat animating
              if (state.isAnimating) return;

              // Manual toggle logic
              const willOpen = !detail.open;

              if (willOpen) {
                detail.setAttribute("open", "");
              } else {
                detail.removeAttribute("open");
              }

              handleToggle(willOpen);
            }
          });

          // Handle resize untuk recalculate height
          let resizeTimeout;
          const handleResize = () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
              state.targetHeight = 0; // Reset cache

              if (detail.open && state.isOpen) {
                const height = calculateHeight();
                if (!state.isAnimating) {
                  container.style.maxHeight = height + "px";
                }
              }
            }, 250);
          };

          window.addEventListener("resize", handleResize);

          // Initial setup
          if (detail.open) {
            state.isOpen = true;
            const height = calculateHeight();
            container.style.maxHeight = height + "px";
            container.style.opacity = "1";
          }
        });

        // Global performance optimization
        let isTabVisible = true;
        document.addEventListener("visibilitychange", function() {
          isTabVisible = !document.hidden;

          // Pause/resume CSS animations
          const root = document.documentElement;
          if (isTabVisible) {
            root.style.setProperty("--animation-play-state", "running");
          } else {
            root.style.setProperty("--animation-play-state", "paused");
          }
        });

        // Prevent multiple details opening simultaneously (optional)
        const enableAccordionMode = false; // Set true untuk accordion behavior

        if (enableAccordionMode) {
          details.forEach((detail) => {
            detail.addEventListener("click", function(e) {
              if (e.target.closest("summary") && !detail.open) {
                // Close other details
                details.forEach((otherDetail) => {
                  if (otherDetail !== detail && otherDetail.open) {
                    otherDetail.click();
                  }
                });
              }
            });
          });
        }
      });

      const numStars = 150; // jumlah bintang
      for (let i = 0; i < numStars; i++) {
        const star = document.createElement("div");
        star.classList.add("star");

        // Acak ukuran, posisi, dan durasi animasi
        const size = Math.random() * 3 + 1 + "px";
        const top = Math.random() * 100 + "%";
        const left = Math.random() * 100 + "%";
        const delay = Math.random() * 5 + "s";
        const duration = (Math.random() * 3 + 2) + "s";

        star.style.width = size;
        star.style.height = size;
        star.style.top = top;
        star.style.left = left;
        star.style.animationDelay = delay;
        star.style.animationDuration = duration;

        // Add clip-path to create a star shape
        star.style.clipPath = "polygon(50% 0%, 65% 40%, 105% 40%, 75% 65%, 85% 105%, 50% 80%, 25% 105%, 35% 65%, 5% 40%, 45% 40%)";

        document.body.appendChild(star);
      }
    </script>
</body>

</html>