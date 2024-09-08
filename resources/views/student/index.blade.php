<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte d'Étudiant</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
            background-color: #f4f4f4;
        }
        .card { 
            width: 400px; 
            border: 1px solid #000; 
            padding: 20px; 
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .header { 
            text-align: center; 
            margin-bottom: 20px; 
        }
        .header img { 
            max-width: 100px; 
        }
        .header h2, .header h3 { 
            margin: 0; 
        }
        .header h2 { 
            font-size: 20px; 
            margin-bottom: 5px; 
        }
        .header h3 { 
            font-size: 18px; 
            color: #555; 
        }
        .content { 
            margin-bottom: 20px; 
        }
        .content p { 
            margin: 8px 0; 
            font-size: 14px; 
        }
        .content .photo { 
            text-align: center; 
            margin-bottom: 20px; 
        }
        .photo img {
            border: 1px solid #000;
            padding: 3px;
            max-width: 120px;
            height: 150px;
            object-fit: cover;
        }
        .footer { 
            text-align: center; 
            font-size: 12px; 
        }
        .signature { 
            margin-top: 20px; 
            display: flex; 
            justify-content: space-between;
        }
        .signature div { 
            width: 45%; 
        }
        .print-button {
            margin-top: 10px;
            text-align: center;
        }
        .print-button a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            
                <img src="{{ URL::to('assets/img/log.png') }}" alt="Logo" width="50" height="60">
            
            
            <h2>ETUDIA</h2>

            <h3>Carte d'Étudiant</h3>
        </div>
        
        <div class="content">
            <div class="photo">
                <img src="{{ URL::to('images/student-photos/'.$student->upload ?? 'images/photo_defaults.jpg') }}" alt="Photo d'Étudiant">

            </div>
            <p><strong>Nom :</strong> {{ $student->first_name }}</p>
            <p><strong>Prénom :</strong> {{ $student->last_name  }}</p>
            <p><strong>ID Étudiant :</strong> {{ $student->admission_id }}</p>
            <p><strong>Date de Naissance :</strong> {{ $student->date_of_birth }}</p>
            <p><strong>Classe :</strong> {{ $student->class }}</p>
            <p><strong>Année Académique :</strong> 2024 - 2025</p>
            <p><strong>Adresse :</strong> {{ $student->roll }}</p>
            <p><strong>Téléphone :</strong> {{ $student->phone_number }}</p>
            <p><strong>Email :</strong> {{ $student->email }}</p>
           
            <p><strong>Date d'Expiration :</strong> {{ $student->created_at }}</p>
        </div>
        <div class="footer">
            <div class="signature">
                <div class="student">Signature de l'Étudiant: ______________________</div>
                <div class="admin">Signature de l'Administrateur: ______________________</div>
            </div>
            <p>Cette carte doit être présentée lors de tout contrôle ou pour accéder aux services étudiants.</p>
        </div>
        <div class="print-button">
            <a id="btn" onclick="window.print();"><i class="fas fa-print"></i> Imprimer</a>
        </div>
    </div>
</body>
</html>
