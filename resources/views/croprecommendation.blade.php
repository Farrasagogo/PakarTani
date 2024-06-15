@extends('layouts.app')

@section('content')
<div class="container mt-5 d-flex flex-column align-items-center">
    <h1 class="text-center mb-4">Crop Recommendation</h1>
    <form id="cropForm" class="w-75">
        <div class="form-group">
            <label for="N">Nitrogen (N)</label>
            <input type="number" class="form-control" id="N" required>
        </div>
        <div class="form-group">
            <label for="P">Phosphorus (P)</label>
            <input type="number" class="form-control" id="P" required>
        </div>
        <div class="form-group">
            <label for="K">Potassium (K)</label>
            <input type="number" class="form-control" id="K" required>
        </div>
        <div class="form-group">
            <label for="temperature">Temperature (°C)</label>
            <input type="number" step="0.01" class="form-control" id="temperature" required>
        </div>
        <div class="form-group">
            <label for="humidity">Humidity (%)</label>
            <input type="number" step="0.01" class="form-control" id="humidity" required>
        </div>
        <div class="form-group">
            <label for="ph">pH</label>
            <input type="number" step="0.01" class="form-control" id="ph" required>
        </div>
        <div class="form-group">
            <label for="rainfall">Rainfall (mm)</label>
            <input type="number" step="0.01" class="form-control" id="rainfall" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
    <div class="mt-5 w-75">
        <h2>Recommendation</h2>
        <pre id="result" class="bg-light p-3 border"></pre>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Custom JavaScript -->
<script>
    document.getElementById('cropForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const url = 'http://127.0.0.1:5000/predict';
        const data = [{
            N: parseFloat(document.getElementById('N').value),
            P: parseFloat(document.getElementById('P').value),
            K: parseFloat(document.getElementById('K').value),
            temperature: parseFloat(document.getElementById('temperature').value),
            humidity: parseFloat(document.getElementById('humidity').value),
            ph: parseFloat(document.getElementById('ph').value),
            rainfall: parseFloat(document.getElementById('rainfall').value)
        }];

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.predictions && data.predictions.length > 0) {
                document.getElementById('result').textContent = `Recommended Crop: ${data.predictions[0]}`;
            } else {
                document.getElementById('result').textContent = 'No recommendation available.';
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            document.getElementById('result').textContent = 'An error occurred. Please try again.';
        });
    });
</script>
@endsection
