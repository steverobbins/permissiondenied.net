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
time = {},
times = new Array('.hour', '.minute', '.sec');

function doTime() {

    var now = new Date().getTime() / 1000;

    time = {
        hour: parseInt(now / 3600) % 24,
        minute: parseInt(now / 60) % 60,
        sec: Math.round(now % 60)
    }

    $(".hour, .minute, .sec").removeClass('active');

    $(time).each(function(i) {

        var t = $(this);

        $(times[i]).filter('.one').filter(classes[Math.floor(t / 10)]).addClass('active');
        $(times[i]).filter('.two').filter(classes[t % 10]).addClass('active');
    });

    setTimeout(doTime, 1000);
}