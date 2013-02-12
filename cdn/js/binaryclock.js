$(document).ready(function() {

    doTime();
});

var classes = new Array(
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

    $(".hour, .minute, .sec").removeClass('active');

    for (var thisTime in time) {

        $("." + thisTime).filter('.one').filter(classes[Math.floor(time[thisTime] / 10)]).addClass('active');
        $("." + thisTime).filter('.two').filter(classes[time[thisTime] % 10]).addClass('active');
    });

    setTimeout(doTime, 1000);
}