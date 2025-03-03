<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes del Curso | Plataforma Educativa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Agrega tus estilos aquí */
    </style>
</head>
<body>
    <div class="students-container">
        <h2>Estudiantes del Curso</h2>
        <div class="course-details">
            <p><strong>Materia:</strong> {{ $curso['materia'] }}</p>
            <p><strong>Jornada:</strong> {{ $curso['jornada'] }}</p>
            <p><strong>Paralelo:</strong> {{ $curso['paralelo'] }}</p>
            <p><strong>Nivel:</strong> {{ $curso['nivel'] }}</p>
            <p><strong>Carrera:</strong> {{ $curso['carrera'] }}</p>
        </div>
        <div class="professor-details">
            <p><strong>Profesor:</strong> {{ $profesor['nombres'] }} {{ $profesor['apellidos'] }}</p>
            <p><strong>Cédula:</strong> {{ $profesor['cedula'] }}</p>
            <p><strong>Correo:</strong> {{ $profesor['correo'] }}</p>
        </div>
        @if (!empty($students))
            <ul>
                @foreach ($students as $student)
                    <li>{{ $student['nombres'] }} {{ $student['apellidos'] }} - {{ $student['cedula'] }} - {{ $student['correo'] }}</li>
                @endforeach
            </ul>
        @else
            <p>No se encontraron estudiantes en este curso.</p>
        @endif
    </div>
</body>
</html>