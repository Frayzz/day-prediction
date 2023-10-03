function getPrediction() {
    const request = new XMLHttpRequest();
    const url = "app/main.php";
    const predictionBlock = document.getElementById('prediction_text');

    request.open('GET', url);
    request.setRequestHeader('Content-Type', 'application/x-www-form-url');

    request.addEventListener("readystatechange", () => {
	
    if (request.readyState === 4 && request.status === 200) {
            // выводим в консоль то что ответил сервер
            predictionBlock.textContent = request.responseText;
        }
    });
    
    request.send();
}