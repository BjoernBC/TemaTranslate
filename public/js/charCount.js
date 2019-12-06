function charCount() {
    var inputs = $("#create_translation .form-field");
    // console.log(inputs)
    $.each(inputs, function(){
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
    inputs.keyup(function() {
        var input = $('.form-control', this);
        var inputLength = input[0].value.length;
        var counter = $('.inputLength', this);
        counter.html(inputLength);

        inputLength = inputLength * 1;
        counterMax = $('.max', this).html() * 1;

        if (inputLength > counterMax ) {
            counter.css('color', 'red');
            // var inputValue = input[0].value;
            // // inputValue.substring(counterMax);
            // var newInput = inputValue.substring(0, counterMax) + '<span color="red">' + inputValue.substring(counterMax) + '</span>';
            // console.log(newInput);
            // input.val(newInput);
        } else {
            counter.css('color', 'unset');
        }

    });
}

// function name(inputs) {
//     var input = $('.form-control', this);
//     var inputLength = input[0].value.length;
//     var counter = $('.inputLength', this);
//     counter.html(inputLength);

//     inputLength = inputLength * 1;
//     counterMax = $('.max', this).html() * 1;

//     if (inputLength > counterMax ) {
//         counter.css('color', 'red');
//     } else {
//         counter.css('color', 'unset');
//     }
// }
