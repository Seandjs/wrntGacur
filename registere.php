<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add User</title>
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
      * {
        margin: 0;
        padding: 0;
        font-family: "Pixelify Sans";
        box-sizing: border-box;
        overflow-y: hidden;
        overflow-x: hidden;
      }

      :root {
        --maincolor: #bf205e;
      }

      body {
        padding: 2rem;
        font-family: "Pixelify Sans";
        color: #fff;
        background: radial-gradient(
          circle at bottom right,
          #411422,
          #000000 60%
        );
        background-repeat:no-repeat;
        background-size: cover;
        background-attachment: fixed;
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
        top: 55%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        animation: slidebawahdariatas 2s ease-out forwards;
      }

      #form h1 {
        position: absolute;
        font-family: "Pixelify Sans";
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

      h1 {
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 4rem;
        color: #ffffff;
        z-index: 10;
        justify-content: center;
        text-align: center;
        animation: infinite 1s alternate;
        animation: glow 1.5s infinite alternate;
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
      .logo img {
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        text-decoration: none;
        height: 5rem;
        filter: drop-shadow(0 0 3px #fd5d8d);
      }

      @keyframes slidebawahdariatas {
        0% {
          transform: translate(
            -50%,
            -150%
          );
          opacity: 0;
        }
        100% {
          transform: translate(-50%, -50%);
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
     <h1>Please meet the Internet cafe operator who is on duty today.</h1>
      </form>
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