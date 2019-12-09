function browserHotkeys() {
    $(window).keydown(
        function(e){
            if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
                e.preventDefault();
            }
            Mousetrap.bind(['command+s','ctrl+s'], function() {
                console.log("'ctrl + s' - keystroke registered");
                $('#save').click();
            });

            if(e.ctrlKey && e.keyCode == 'K'.charCodeAt(0)){
                e.preventDefault();
            }
            Mousetrap.bind(['command+k','ctrl+k'], function() {
                console.log("'ctrl + k' - keystroke registered");
                $('#skip')[0].click();
            });
        }
    );
}
