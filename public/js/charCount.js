$(function(){
    init();
});

function init() {
    loadInputs();
    // key();
}

function loadInputs() {
    var inputs = $("#create_translation .form-field");
    // console.log(inputs)
    inputs.keyup(function() {
        var input = $('.form-control', this);
        var inputLength = input[0].value.length;
        var counter = $('.inputLength', this);
        counter.html(inputLength);

        inputLength = inputLength * 1;
        counterMax = $('.max', this).html() * 1;

        if (inputLength > counterMax ) {
            counter.css('color', 'red');
        } else {
            counter.css('color', 'unset');
        }
    });
}
