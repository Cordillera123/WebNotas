<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Asignados | Plataforma Educativa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Agrega tus estilos aquí */
    </style>
</head>
<body>
    <div class="courses-container">
        <h2>Cursos Asignados</h2>
        @if (!empty($courses))
            <ul>
                @foreach ($courses as $course)
                    <li>
                        <strong>Carrera:</strong> <a href="{{ route('cursos.estudiantes', ['id' => $course['carrera_id']]) }}">{{ $course['nombre'] }}</a>
                        <ul>
                            @foreach ($course['niveles'] as $nivel)
                                <li>
                                    <strong>Nivel:</strong> {{ $nivel['nombre'] }}
                                    <ul>
                                        @foreach ($nivel['jornadas'] as $jornada)
                                            <li>
                                                <strong>Jornada:</strong> {{ $jornada['nombre'] }}
                                                <ul>
                                                    @foreach ($jornada['paralelos'] as $paralelo)
                                                        <li>
                                                            <strong>Paralelo:</strong> {{ $paralelo['nombre'] }}
                                                            <ul>
                                                                @foreach ($paralelo['materias'] as $materia)
                                                                    <li>
                                                                        <strong>Materia:</strong> {{ $materia['nombre'] }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No se encontraron cursos asignados.</p>
        @endif
    </div>
</body>
</html>