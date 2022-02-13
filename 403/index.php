<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Please Login First</title>
  <style>
    body {
      width: 100vw;
      height: 100vh;
      display: flex;
      flex-direction: column;
      gap: 2rem;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<body>
  <h1>403 FORBIDDEN</h1>
  <h1>You need to login first</h1>
  <div id="countdown"></div>
  <span>we will bring you back to home</span>

  <script>
    const countdown = document.querySelector("#countdown")
    let count = 5
    setInterval(() => {
      countdown.innerHTML = count
      count--
      if (count < 0) {
        window.location = '../';
      }
    }, 1000)
  </script>
</body>

</html>