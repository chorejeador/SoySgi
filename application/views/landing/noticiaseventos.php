<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Coming Soon</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    text-align: center;
  }
  .container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  }
  h1 {
    font-size: 36px;
    margin-bottom: 20px;
  }
  p {
    font-size: 18px;
    margin-bottom: 30px;
  }
  #countdown {
    display: flex;
    justify-content: center;
  }
  #countdown p {
    font-size: 23px;
    color: #3f51b5;
    margin: 0 10px;
  }
  .label {
    font-size: 20px;
    color: black;
  }
 .btn {
  display: inline-block;
  font-weight: 400;
  color: #fff;
  text-align: center;
  vertical-align: middle;
  user-select: none;
  background-color: #007bff;
  border: 1px solid #007bff;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s, background-color 0.15s, border-color 0.15s, box-shadow 0.15s;
  cursor: pointer;
}

.btn:hover {
  background-color: #0056b3;
  border-color: #0056b3;
  color: #fff;
}
</style>
</head>
<body>
  <div class="container">
    <h1>Próximamente</h1>
    <p>Estamos trabajando en algo increíble. ¡Mantente al tanto!</p>
    <div id="countdown">
      <p id="days"></p>
      <span class="label">días</span>
      <p id="hours"></p>
      <span class="label">horas</span>
      <p id="minutes"></p>
      <span class="label">minutos</span>
      <p id="seconds"></p>
      <span class="label">segundos</span>
    </div>
    <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-primary btn-md text-uppercase">Regresar</a>
  </div>

  <script>
    // Fecha de lanzamiento (puede ser en formato YYYY-MM-DD HH:MM:SS)
    const launchDate = new Date("2023-09-01 00:00:00").getTime();

    // Actualiza el contador cada segundo
    const interval = setInterval(function() {
      const now = new Date().getTime();
      const timeLeft = launchDate - now;

      const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
      const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

      document.getElementById("days").innerHTML = days;
      document.getElementById("hours").innerHTML = hours;
      document.getElementById("minutes").innerHTML = minutes;
      document.getElementById("seconds").innerHTML = seconds;

      if (timeLeft < 0) {
        clearInterval(interval);
        document.getElementById("countdown").innerHTML = "We're here!";
      }
    }, 1000);
  </script>
</body>
</html>