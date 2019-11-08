// Función que permite visualizar el calendario 

$(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,'
        },
        events: 'load.php',
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            var title = prompt("Enter Event Title");
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: "insert.php",
                    type: "POST",
                    data: {
                        title: title,
                        start: start,
                        end: end
                    },
                    success: function() {
                        calendar.fullCalendar('refetchEvents');
                        alert("Added Successfully");
                    }
                })
            }
        },
    });
});