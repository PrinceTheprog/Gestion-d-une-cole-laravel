<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        #schedule {
            max-width: 800px;
            margin: auto;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
        }
        #schedule h2 {
            text-align: center;
            color: #0779e4;
        }
        .day {
            margin: 10px 0;
        }
        .day h3 {
            background: #0779e4;
            color: #fff;
            padding: 5px;
            margin: 0;
        }
        .events {
            padding: 10px;
        }
        .event {
            background: #f4f4f4;
            border-left: 3px solid #0779e4;
            margin: 5px 0;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div id="schedule">
        <h2>Planning de la Semaine</h2>
        <div class="day">
            <h3>Lundi</h3>
            <div class="events" id="monday-events">
                <!-- Événements du lundi seront ajoutés ici par JavaScript -->
            </div>
        </div>
        <div class="day">
            <h3>Mardi</h3>
            <div class="events" id="tuesday-events">
                <!-- Événements du mardi seront ajoutés ici par JavaScript -->
            </div>
        </div>
        <div class="day">
            <h3>Mercredi</h3>
            <div class="events" id="Wednesday-events">
                <!-- Événements du mardi seront ajoutés ici par JavaScript -->
            </div>
        </div>
        <div class="day">
            <h3>Jeudi</h3>
            <div class="events" id="Thursday-events">
                <!-- Événements du mardi seront ajoutés ici par JavaScript -->
            </div>
        </div>
        <div class="day">
            <h3>Vendredi</h3>
            <div class="events" id="Friday-events">
                <!-- Événements du mardi seront ajoutés ici par JavaScript -->
            </div>
        </div>
        <div class="day">
            <h3>Samedi</h3>
            <div class="events" id="Thurday-events">
                <!-- Événements du mardi seront ajoutés ici par JavaScript -->
            </div>
        </div>
        <div class="day">
            <h3>Dimanche</h3>
            <div class="events" id="Sunday-events">
                <!-- Événements du mardi seront ajoutés ici par JavaScript -->
            </div>
        </div>

        <!-- Ajoutez plus de jours ici -->
    </div>

    <script>
        const schedule = {
            monday: [
                { time: "08:00", description: "Réunion de projet" },
                { time: "10:00", description: "Cours de mathématiques" }
            ],
            tuesday: [
                { time: "09:00", description: "Cours de physique" },
                { time: "14:00", description: "Atelier de programmation" }
            ],
            Wednesday: [
                { time: "09:00", description: "Cours de physique" },
                { time: "14:00", description: "Atelier de programmation" }
            ],
            Thursday: [
                { time: "09:00", description: "Cours de physique" },
                { time: "14:00", description: "Atelier de programmation" }
            ],
            Friday: [
                { time: "09:00", description: "Cours de physique" },
                { time: "14:00", description: "Atelier de programmation" }
            ],
            Saturday: [
                { time: "09:00", description: "Cours de physique" },
                { time: "14:00", description: "Atelier de programmation" }
            ],
            Sunday: [
                { time: "09:00", description: "" },
                { time: "14:00", description: "" }
            ],
            // Ajoutez plus d'événements pour chaque jour ici
        };

        function displayEvents(day, events) {
            const container = document.getElementById(`${day}-events`);
            events.forEach(event => {
                const eventDiv = document.createElement('div');
                eventDiv.classList.add('event');
                eventDiv.innerHTML = `<strong>${event.time}</strong>: ${event.description}`;
                container.appendChild(eventDiv);
            });
        }

        displayEvents('monday', schedule.monday);
        displayEvents('tuesday', schedule.tuesday);
        displayEvents('Wednesday', schedule.Wednesday);
        displayEvents('Thursday', schedule.Thursday);
        displayEvents('Friday', schedule.Friday);
        displayEvents('Saturday', schedule.Saturday);
        displayEvents('Sunday', schedule.Sunday);
        // Ajoutez des appels pour d'autres jours ici
    </script>
</body>
</html>
