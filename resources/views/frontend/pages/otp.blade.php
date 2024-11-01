<!DOCTYPE html>
  <html lang="en">
  <head>
    <style>
        body {
              font-family: Arial, sans-serif;
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
              margin: 0;
              background-color: #121212;
              color: #e0e0e0;
          }
          .container {
              background-color: #1e1e1e;
              padding: 2rem;
              border-radius: 8px;
              box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
              text-align: center;
          }
          h1 {
              margin-bottom: 1rem;
              color: #ffffff;
          }
          .otp-input {
              display: flex;
              justify-content: center;
              margin-bottom: 1rem;
          }
          .otp-input input {
              width: 40px;
              height: 40px;
              margin: 0 5px;
              text-align: center;
              font-size: 1.2rem;
              border: 1px solid #444;
              border-radius: 4px;
              background-color: #2a2a2a;
              color: #ffffff;
          }
          .otp-input input::-webkit-outer-spin-button,
          .otp-input input::-webkit-inner-spin-button {
              -webkit-appearance: none;
              margin: 0;
          }
          .otp-input input[type=number] {
              -moz-appearance: textfield;
          }
          button {
              background-color: #4CAF50;
              color: white;
              border: none;
              padding: 10px 20px;
              font-size: 1rem;
              border-radius: 4px;
              cursor: pointer;
              margin: 5px;
          }
          button:hover {
              background-color: #45a049;
          }
          button:disabled {
              background-color: #cccccc;
              color: #666666;
              cursor: not-allowed;
          }
          #timer {
              font-size: 1.2rem;
              margin-bottom: 1rem;
              color: #ff9800;
          }
    </style>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>OTP Verification</title>
     
  </head>
  <body>
      <div class="container">
          <h1>OTP Verification</h1>
          <p>Enter the 6-digit code sent to {{$customer->email}}</p>
          <div id="timer">Time remaining: 2:00</div>
          <form action="{{route('otp.submit')}}" method="post">
            @csrf
          <div class="otp-input">
              <input type="number" min="0" max="9" name="a" required>
              <input type="number" min="0" max="9" name="b" required>
              <input type="number" min="0" max="9" name="c" required>
              <input type="number" min="0" max="9" name="d" required>
              <input type="number" min="0" max="9" name="e" required>
              <input type="number" min="0" max="9" name="f" required>
              <input name="email" type="hidden" value="{{$customer->email}}">

          </div>
          <button type="submit">Verify</button>
          <button id="resendButton" onclick="resendOTP()" disabled>Resend Code</button>
          </form>
      </div>

      <script>
          const inputs = document.querySelectorAll('.otp-input input');
          const timerDisplay = document.getElementById('timer');
          const resendButton = document.getElementById('resendButton');
          let timeLeft = 180; // 3 minutes in seconds
          let timerId;

          function startTimer() {
              timerId = setInterval(() => {
                  if (timeLeft <= 0) {
                      clearInterval(timerId);
                      timerDisplay.textContent = "Code expired";
                      resendButton.disabled = false;
                      inputs.forEach(input => input.disabled = true);
                  } else {
                      const minutes = Math.floor(timeLeft / 60);
                      const seconds = timeLeft % 60;
                      timerDisplay.textContent = `Time remaining: ${minutes}:${seconds.toString().padStart(2, '0')}`;
                      timeLeft--;
                  }
              }, 1000);
          }

          function resendOTP() {
              // Here you would typically call your backend to resend the OTP
              alert("New OTP sent!");
              timeLeft = 180;
              inputs.forEach(input => {
                  input.value = '';
                  input.disabled = false;
              });
              resendButton.disabled = true;
              inputs[0].focus();
              clearInterval(timerId);
              startTimer();
          }

          inputs.forEach((input, index) => {
              input.addEventListener('input', (e) => {
                  if (e.target.value.length > 1) {
                      e.target.value = e.target.value.slice(0, 1);
                  }
                  if (e.target.value.length === 1) {
                      if (index < inputs.length - 1) {
                          inputs[index + 1].focus();
                      }
                  }
              });

              input.addEventListener('keydown', (e) => {
                  if (e.key === 'Backspace' && !e.target.value) {
                      if (index > 0) {
                          inputs[index - 1].focus();
                      }
                  }
                  if (e.key === 'e') {
                      e.preventDefault();
                  }
              });
          });

          function verifyOTP() {
              const otp = Array.from(inputs).map(input => input.value).join('');
              if (otp.length === 6) {
                  if (timeLeft > 0) {
                      alert(`Verifying OTP: ${otp}`);
                      // Here you would typically send the OTP to your server for verification
                  } else {
                      alert('OTP has expired. Please request a new one.');
                  }
              } else {
                  alert('Please enter a 6-digit OTP');
              }
          }

          startTimer();
      </script>
  </body>
  </html>