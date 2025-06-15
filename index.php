<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>wrntGacur</title>
    <link rel="stylesheet" href="style.css" />
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
      @import url("https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Russo+One&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cormorant:ital,wght@0,300..700;1,300..700&display=swap");
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Russo One", sans-serif;
      }

      :root {
        --maincolor: #bf205e;
        --dark: #270245;
        --light: #fd5d8d;
        --white: #fff;
      }

      body {
        padding: 2rem;
      }

      h1 {
        position: absolute;
        top: 50%;
        left: 20%;
        transform: translate(-50%, -50%);
        font-size: 5rem;
        color: #ffffff;
        z-index: 2;
        font-weight: 400;
        font-style: normal;
        filter: drop-shadow(0 0 3px #ffeeee);
        animation: glowindedak 1.5s ease-out forwards;
        opacity: 0;
      }

      .logo img {
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        text-decoration: none;
        height: 5rem;
        filter: drop-shadow(0 0 3px #fd5d8d);
      }

      /* Animations */
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

      .background-elements {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        overflow: hidden;
        pointer-events: none;
      }

      button {
        background-color: #fd5d8d;
        font-size: 25px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 150px;
        height: 50px;
        position: absolute;
        left: 12%;
        translate: -50%;
        top: 75%;
        z-index: 1000;
        transition: ease-in-out 0.3s;
        filter: drop-shadow(0 0 10px #fd5d8d);
      }

      button:hover {
        background-color: #212222b0;
        border: var(--maincolor) solid 2px;
        color: var(--maincolor);
        transform: scale(1.2);
        transition: ease-in-out 0.3s;
      }

      .menu-btn {
        position: absolute;
        top: 7%;
        left: 97%;
        transform: translate(-50%, -50%);
        font-size: 2.5rem;
        color: #000000;
        z-index: 1000;
        background-color: var(--maincolor);
        padding: 8px;
        padding-left: 14px;
        padding-right: 14px;
        border-radius: 20px;
        filter: drop-shadow(0 0 20px #000000);
        transition: ease-in-out 0.3s;
        cursor: pointer;
      }

      .menu-btn:hover {
        background-color: #212222b0;
        border: var(--maincolor) solid 2px;
        color: var(--maincolor);
        transition: ease-in-out 0.3s;
      }

      nav {
        position: fixed;
        right: -10%;
        top: 4.5%;
        z-index: 999;
        transition: ease-in-out 0.5s;
        opacity: 0%;
        cursor: pointer;
      }

      nav.active {
        right: 6%;
        transition: ease-in-out 0.5s;
        opacity: 100%;
      }

      nav a {
        font-size: 35px;
        color: #000000;
        z-index: 1000;
        background-color: var(--maincolor);
        padding: 12px;
        padding-right: 18px;
        padding-left: 18px;
        border-radius: 50px;
        filter: drop-shadow(0 0 px #ffffff);
        text-decoration: none;
        transition: ease-in-out 0.3s;
        cursor: pointer;
      }

      nav a:hover {
        background-color: #212222b0;
        border: var(--maincolor) solid 2px;
        color: var(--maincolor);
        transition: ease-in-out 0.3s;
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

      @keyframes floatRotate {
        0% {
          transform: translateY(0px) rotate(0deg);
        }
        25% {
          transform: translateY(-10px) rotate(1.5deg);
        }
        50% {
          transform: translateY(0px) rotate(0deg);
        }
        75% {
          transform: translateY(10px) rotate(-1.5deg);
        }
        100% {
          transform: translateY(0px) rotate(0deg);
        }
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
      @keyframes floatImage2 {
        0% {
          transform: translateY(0);
        }
        50% {
          transform: translateY(1rem);
        }
        100% {
          transform: translateY(0);
        }
      }

      .clove img {
        position: absolute;
        top: 10%;
        left: 28%;
        filter: drop-shadow(0 0 10px #6b293d);
        width: 100rem;
        z-index: 100;
        animation: slideatasdaribawah 2s ease-in-out forwards,
          floatImage1 5s ease-in-out infinite 2.6s;
        transform: translateY(100vh);
        opacity: 0;
      }

      #vct {
        position: absolute;
        top: 20%;
        left: 55%;
        filter: drop-shadow(0 0 10px #6b293d);
        width: 3rem;
        z-index: 100;
        animation: slidebawahdariatas 2.1s ease-out forwards,
          floatImage2 8s ease-in-out infinite 2.5s;
      }

      #spike {
        position: absolute;
        top: 30%;
        left: 90%;
        filter: drop-shadow(0 0 10px #6b293d);
        width: 3rem;
        z-index: 100;
        animation: slidebawahdariatas 2s ease-out forwards,
          floatImage2 7s ease-in-out infinite 2.5s;
        transform: rotate(30deg);
      }
      #logo1 {
        position: absolute;
        top: -40%;
        left: 30%;
        filter: drop-shadow(0 0 10px #6b293d);
        width: 100rem;
        z-index: 1;
        animation: floatImage2 8s ease-in-out infinite;
        transform: rotate(30deg);
      }

      @keyframes glowindedak {
        0% {
          opacity: 0;
          filter: drop-shadow(0 0 3px #ffeeee) drop-shadow(0 0 2px transparent);
          transform: translate(-50%, -50%) scale(0.8);
        }
        100% {
          opacity: 1;
          filter: drop-shadow(0 0 3px #ffeeee) drop-shadow(0 0 1px #ffffff);
          transform: translate(-50%, -50%) scale(1);
        }
      }

      @keyframes slideatasdaribawah {
        0% {
          transform: translateY(100vh);
          opacity: 0;
        }
        50%{
          opacity: 0.3;
        }
        100% {
          transform: translateY(0);
          opacity: 1;
        }
      }

      @keyframes slidebawahdariatas {
        0% {
          transform: translateY(-100vh);
          opacity: 0;
        }
        100% {
          transform: translateY(0);
          opacity: 1;
        }
      }
    </style>
  </head>
  <body>
    <header>
      <div class="logo">
        <img src="properties/logo.png" alt="logo" />
      </div>
    </header>

    <div class="background-elements">
      <div class="scanlines"></div>
      <div class="noise"></div>
      <div class="noise noise-moving"></div>
    </div>

    <h1>
      QONQUER <br />
      WITHOUT <br />
      LIMIT<br />
      WITH US<br />
    </h1>

    <div class="clove">
      <img src="properties/clove.png" alt="clove" />
    </div>

    <div class="decor">
      <img src="properties/spike.png" alt="decor1" id="spike" />
      <imhg src="properties/kill.png" alt="decor1" id="kill" />
      <img src="properties/vct.png" alt="decor1" id="vct" />
    </div>

    <div class="menu-btn">
      <i class="fas fa-bars"></i>
    </div>

    <nav>
      <a href="loginatmin.php"><i class="fa-solid fa-user-tie"></i> Admin</a>
    </nav>

    <a href="loginuser.php">
      <button class="arrow-button">
        <p>LOGIN</p>
      </button>
    </a>

    <script>
      const menuBtn = document.querySelector(".menu-btn");
      const nav = document.querySelector("nav");

      if (menuBtn) {
        menuBtn.addEventListener("click", function () {
          nav.classList.toggle("active");
          this.querySelector("i").classList.toggle("fa-bars");
          this.querySelector("i").classList.toggle("fa-times");
        });
      }

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
  </body>
</html>