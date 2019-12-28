<div>
    Beste {{ $request->voornaam }} {{ $request->achternaam }}, <br><br>
    Bedankt voor je bericht, we nemen zo snel mogelijk contact met u op.<br><br>

    <b>Kopie van uw bericht:</b> <br><br>

    Onderwerp: {{ $request->onderwerp }}<br><br>

    Bericht: <br>
    {{ $request->bericht }}
</div>