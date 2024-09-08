<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fil d'Actualité et Événements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        .main {
            padding: 20px;
            background: #fff;
            margin-top: 20px;
        }
        .news, .events {
            margin-bottom: 40px;
        }
        .news h2, .events h2 {
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            color: #333;
        }
        .news-item, .event-item {
            border-bottom: 1px solid #e4e4e4;
            padding: 10px 0;
        }
        .news-item:last-child, .event-item:last-child {
            border-bottom: none;
        }
        .news-item h3, .event-item h3 {
            color: #0779e4;
        }
        .news-item p, .event-item p {
            margin: 5px 0;
        }
        .date {
            color: #777;
            font-size: 0.9em;
        }
        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Fil d'Actualité et Événements</h1>
        </div>
    </header>

    <div class="container main">
        <section class="news">
            <h2>Actualités</h2>
            <div id="news-container">
                <!-- Les éléments d'actualité seront ajoutés ici par JavaScript -->
            </div>
        </section>

        <section class="events">
            <h2>Événements</h2>
            <div id="events-container">
                <!-- Les éléments d'événement seront ajoutés ici par JavaScript -->
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Mon Site Web. Tous droits réservés.</p>
    </footer>

    <script>
        // Exemple de données d'actualités et d'événements
        const news = [
            {
                title: "Titre de l'actualité 1",
                date: "29 Mai 2024",
                content: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae."
            },
            {
                title: "Titre de l'actualité 2",
                date: "28 Mai 2024",
                content: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae."
            }
        ];

        const events = [
            {
                title: "Titre de l'événement 1",
                date: "1 Juin 2024",
                content: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae."
            },
            {
                title: "Titre de l'événement 2",
                date: "5 Juin 2024",
                content: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae."
            }
        ];

        // Fonction pour afficher les actualités
        function displayNews() {
            const newsContainer = document.getElementById('news-container');
            news.forEach(item => {
                const newsItem = document.createElement('div');
                newsItem.classList.add('news-item');
                newsItem.innerHTML = `
                    <h3>${item.title}</h3>
                    <p class="date">${item.date}</p>
                    <p>${item.content}</p>
                `;
                newsContainer.appendChild(newsItem);
            });
        }

        // Fonction pour afficher les événements
        function displayEvents() {
            const eventsContainer = document.getElementById('events-container');
            events.forEach(item => {
                const eventItem = document.createElement('div');
                eventItem.classList.add('event-item');
                eventItem.innerHTML = `
                    <h3>${item.title}</h3>
                    <p class="date">${item.date}</p>
                    <p>${item.content}</p>
                `;
                eventsContainer.appendChild(eventItem);
            });
        }

        // Appeler les fonctions pour afficher les actualités et les événements
        displayNews();
        displayEvents();
    </script>
</body>
</html>
