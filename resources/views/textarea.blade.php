<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: sans-serif;
}

#container {
  width: 100vw;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  border: 10px solid #0065a3;
  background: hsla(203, 100%, 78%, 1);
}

#title {
  margin-bottom: 20px;
  color: #0065a3;
}

#textbox {
  margin-bottom: 20px;
  font-size: 16px;
  letter-spacing: 0.8px;
  padding: 10px;
}

#charCount {
  font-size: 20px;
  color: #0065a3;
  font-weight: bold;
}
    </style>
</head>
<body>
<div id="container">
  <h1 id="title">Count Your Characters</h1>
  <textarea id="textbox" cols="80" rows="15"></textarea>
  <p id="charCount">Character Count: <span id="count">0</span></p>
</div>
</body>
</html>

<script>
    let textbox = document.getElementById("textbox");
let count = document.getElementById("count");

function updateCount() {
  count.innerHTML = textbox.value.length;
}

textbox.oninput = updateCount;
</script>