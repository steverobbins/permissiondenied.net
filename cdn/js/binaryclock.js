$(document).ready(function() {

    doTime();

    $(".toggleHints").click(function() {

        $(".hint").toggleClass("active");
    });

    $(".toggleTime").click(function() {

        $(".time").toggleClass("active");
    });

    $(".colorize").click(colorize);
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

    var now = new Date(),
    time = {
        hour: now.getHours(),
        minute: now.getMinutes(),
        sec: now.getSeconds()
    }

    $(".hour.active, .minute.active, .sec.active").removeClass('active');

    for (var thisTime in time) {

        $("." + thisTime).filter('.one').filter(classes[Math.floor(time[thisTime] / 10)]).addClass('active');
        $("." + thisTime).filter('.two').filter(classes[time[thisTime] % 10]).addClass('active');
    }

    $('.time p').text(time.hour + ":" + strpad(time.minute, 2) + ":" + strpad(time.sec, 2));

    setTimeout(doTime, 1000);
}

function strpad(number, length) {
   
    var str = '' + number;

    while (str.length < length) str = '0' + str;
   
    return str;
}

function colorize() {

    $('.hour.active, .minute.active, .sec.active').css("background",  'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')');

    setTimeout(colorize, 50);
}
