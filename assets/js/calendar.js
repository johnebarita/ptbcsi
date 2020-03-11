var events = json_encode($data);

var date = new Date()
var d    = date.getDate(),
    m    = date.getMonth(),
    y    = date.getFullYear()

$('#calendar').fullCalendar({
    header    : {
        left  : '',
        center: 'title',
        right : 'prev,next today'
    },
    buttonText: {
        today: 'today',
        month: 'month'
    },
    events    : events
})

$(function() {
    $("#dob").datepicker();
});