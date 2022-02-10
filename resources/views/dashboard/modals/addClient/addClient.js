// Open modal
$('#addClient-btn').click(function (e) { 
    $("#addClient").modal("toggle");
    $('#addClient input[name=name]').parent().fadeOut();
    $('#addClient input[name=firstName]').parent().fadeIn();
    $('#addClient input[name=email]').parent().fadeIn();
    $('#addClient input[name=phone]').parent().fadeIn();
    $('#addClient input[name=description]').parent().fadeOut();
    $('#addClient input[name=vat_number]').parent().fadeOut();
});

// Condition according to audience
$('#addClient select[name=audience]').change(function () {
    if ($(this).val() == "B2C") {
        $('#addClient input[name=name]').parent().fadeOut();
        $('#addClient input[name=firstName]').parent().fadeIn();
        $('#addClient input[name=email]').parent().fadeIn();
        $('#addClient input[name=phone]').parent().fadeIn();
        $('#addClient input[name=description]').parent().fadeOut();
        $('#addClient input[name=vat_number]').parent().fadeOut();
    } else if ($(this).val() == "B2B") {
        $('#addClient input[name=name]').parent().fadeIn();
        $('#addClient input[name=firstName]').parent().fadeIn();
        $('#addClient input[name=lastName]').parent().fadeIn();
        $('#addClient input[name=email]').parent().fadeIn();
        $('#addClient input[name=phone]').parent().fadeIn();
        $('#addClient input[name=vat_number]').parent().fadeIn();
    } else {
        $('#addClient input[name=name]').parent().fadeIn();
        $('#addClient input[name=firstName]').parent().fadeIn();
        $('#addClient input[name=email]').parent().fadeIn();
        $('#addClient input[name=phone]').parent().fadeIn();
        $('#addClient input[name=description]').parent().fadeOut();
        $('#addClient input[name=vat_number]').parent().fadeIn();
    }
})