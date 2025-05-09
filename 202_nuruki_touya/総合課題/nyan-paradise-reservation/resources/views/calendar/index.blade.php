<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>予約カレンダー | NyanParadise</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FCEFD6;
            font-family: sans-serif;
            margin: 0;
            padding: 2rem;
        }
        .calendar-wrapper {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        h1 {
            text-align: center;
            color: #8B5E3C;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div class="calendar-wrapper">
        <h1>ご予約カレンダー</h1>
        <div id="calendar"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'ja',
                events: @json($calendarEvents),
                eventClick: function (info) {
                    if (info.event.extendedProps.clickable && info.event.url) {
                        window.location.href = info.event.url;
                    }
                },
                displayEventTime: false,
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>
