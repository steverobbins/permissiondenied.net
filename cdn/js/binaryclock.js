$(document).ready(function() {

    var classes = new array(
        '',
        '.first',
        '.second',
        '.first, .second',
        '.third',
        '.first, .third',
        '.second, .third',
        '.first, .second, .third',
        '.fourth',
        '.first, .fourth'
    ),
    time = {};

    function doTime() {

        var now = new Date().getTime() / 1000;

        time = {
            hour: parseInt(now / 3600) % 24,
            minute: parseInt(now / 60) % 60,
            sec: Math.round(now % 60)
        }

        console.log(time);

        setTimeout(doTime, 1000);
    }
});