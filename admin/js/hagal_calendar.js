/* [ ---- Hagal Admin - calendar ---- ] */

    $(function() {
        //* events from google 
        hagal_calendar.google();
        //* json data source
        hagal_calendar.jsonEvents();
    });

    //* fullcalendar
    hagal_calendar = {
        google: function() {
            if($('#calendar_google').length) {
                $('#calendar_google').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    aspectRatio: 1.8,
                    firstDay: 1, // 0 - Sunday, 1 - Monday
                    events: {
                        url:'http://www.google.com/calendar/feeds/usa__en%40holiday.calendar.google.com/public/basic',
                        title: 'US Holidays'
                    },
                    eventClick: function(event) {
                        // opens events in a popup window
                        window.open(event.url, 'gcalevent', 'width=400,height=200');
                        return false;
                    }
                    
                })
            }
        },
        jsonEvents: function() {
            if($('#calendar_json').length) {
                $('#calendar_json').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    editable: true,
                    firstDay: 1, // 0 - Sunday, 1 - Monday
                    events: "http://tzd-themes.com/hagal_admin/js/pages/php_helpers/json-events.php",
                    eventDrop: function(event, delta) {
                        alert(event.title + ' was moved ' + delta + ' days\n' +
                            '(should probably update your database)');
                    }
                });
            }
        }
    };