function browserHotkeys() {
    $(window).keydown(
        function(e){
            if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
                e.preventDefault();
            }
            Mousetrap.bind('ctrl+s', function() {
                console.log("'ctrl + s' - keystroke registered");
                $('#save').click();
            });

            if(e.ctrlKey && e.keyCode == 'K'.charCodeAt(0)){
                e.preventDefault();
            }
            Mousetrap.bind('ctrl+k', function() {
                console.log("'ctrl + k' - keystroke registered");
                $('#skip')[0].click();
            });
        }
    );

    $('.form-control').keydown(
        function(e){
            if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
                e.preventDefault();
                console.log('Default for "CTRL + s" prevented')
            }
            Mousetrap.bind('ctrl+s', function() {
                console.log("'ctrl + s' - keystroke registered");
                $('#save').click();
            });

            if(e.ctrlKey && e.keyCode == 'K'.charCodeAt(0)){
                e.preventDefault();
                console.log('Default for "CTRL + k" prevented')
            }
            Mousetrap.bind('ctrl+d', function() {
                console.log("'ctrl + k' - keystroke registered");
                $('#skip')[0].click();
            });
        }
    );
}

// function browserHotkeys() {
//     document.onkeydown = function(e){
//         if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
//             e.preventDefault();
//         }

//         if(e.ctrlKey && e.keyCode == 'D'.charCodeAt(0)){
//             e.preventDefault();
//         }

//         Mousetrap.bind('ctrl+s', function() {
//             console.log("'ctrl + s' - keystroke registered");
//             document.getElementById('save').click();
//         });

//         Mousetrap.bind('ctrl+d', function() {
//             console.log("'ctrl + d' - keystroke registered");
//             document.getElementById('skip').click();
//         });
//     }
// }
