<?php auth(1);
    $requete = $bdd->query("SELECT * FROM lessons WHERE id_e = ".$_SESSION['id_u']);
    $lessons = $requete->fetchAll();

    $events = [];

    foreach($lessons as $lesson)
    {
        $events[] =  "{
                        title: '".$lesson['titre']."',
                        start: '".$lesson['date_l']."',
                        end: '".$lesson['date_fin']."'
                    }";
    }
    $events = implode($events,",");
?>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialDate: '2021-04-14',
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                height: 'auto',
                navLinks: true,
                editable: true,
                selectable: true,
                selectMirror: true,
                nowIndicator: true,
                events: [<?php echo $events; ?>]
            });
            calendar.render();
        });
</script>

<div id="calendar" class="mt-5"></div>

