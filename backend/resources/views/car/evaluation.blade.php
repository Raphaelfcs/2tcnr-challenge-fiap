<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Webmonitors</title>
    <link rel="stylesheet" href="/css/avaliacao.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="container">
    <div class="star-widget">
        <div class="text">Como foi sua experiência?</div>
        <input type="radio" name="rate" id="rate-5">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-3">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-2">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1">
        <label for="rate-1" class="fas fa-star"></label>
        <form action="#">
            <header></header>
            <div class="textarea">
                <textarea cols="30" placeholder="Descreva sua experiência..."></textarea>
            </div>
            <div class="btn">
                <button type="button" onclick="location.href = '{{ route('carEvaluationFinished') }}'">Enviar</button>
            </div>
        </form>
    </div>
</div>
<script>
</script>

</body>
</html>
