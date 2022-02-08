<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kameo Bikes</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

    <h1></h1>

    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" >Deconnexion</button>
    </form>

</body>

</html>

<script>
    $("body").ready(function() {
        $.ajax({
            type: "get",
            url: "retrieve-home-data",
            dataType: "json",
            success: function(response) {
                $("h1").html('Bonjour ' + response.data.firstname + ' !')
            }
        });
    });
</script>
