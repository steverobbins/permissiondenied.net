$(document).ready(function() {

    doTime();

    $(".toggleHints").click(function() {

        $(".hint p").toggleClass("active");
    });

    $(".toggleTime").click(function() {

        $(".time p").toggleClass("active");
    });
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
);

function doTime() {

    var now = new Date().getTime() / 1000;

    var time = {
        hour: parseInt(now / 3600) % 24,
        minute: parseInt(now / 60) % 60,
        sec: Math.round(now % 60)
    }

    $(".hour, .minute, .sec").removeClass('active');

    for (var thisTime in time) {

        $("." + thisTime).filter('.one').filter(classes[Math.floor(time[thisTime] / 10)]).addClass('active');
        $("." + thisTime).filter('.two').filter(classes[time[thisTime] % 10]).addClass('active');
    }

    $('.time p').text((time.hour < 10 ? "0" + time.hour : time.hour) + ":" + (time.minute < 10 ? "0" + time.minute : time.minute) + ":" + (time.sec < 10 ? "0" + time.sec : time.sec));

    setTimeout(doTime, 1000);
}