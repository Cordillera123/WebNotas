<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    $client = new Client();
    $loginUrl = "http://localhost/WebServicesNotas/api/login";
    $coursesUrl = "http://localhost/WebServicesNotas/api/cursos";

    try {
        $response = $client->post($loginUrl, [
            'json' => [
                "cedula" => $request->cedula,
                "password" => $request->password
            ]
        ]);

        $data = json_decode($response->getBody(), true);

        if (isset($data['mensaje']) && $data['mensaje'] === 'Inicio de sesión exitoso') {
            // Aquí puedes manejar el inicio de sesión exitoso, por ejemplo, guardando los datos del usuario en la sesión
            $cedula = $data['cedula'];

            // Consultar los cursos asignados al usuario
            $coursesResponse = $client->get($coursesUrl, [
                'query' => ['cedula' => $cedula]
            ]);

            $coursesData = json_decode($coursesResponse->getBody(), true);

            // Redirigir a la vista de cursos con los datos obtenidos
            return view('cursos', ['courses' => $coursesData]);
        } else {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }
    } catch (\GuzzleHttp\Exception\ClientException $e) {
        $response = $e->getResponse();
        $responseBodyAsString = $response->getBody()->getContents();
        $data = json_decode($responseBodyAsString, true);

        if (isset($data['error']) && $data['error'] === 'Usuario no encontrado') {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        return redirect()->back()->with('error', 'CREDENCIALES INCORRECTAS.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error inesperado: ' . $e->getMessage());
    }
}

public function showStudents($id)
{
    $client = new Client();
    $studentsUrl = "http://localhost/WebServicesNotas/api/cursos/{$id}/estudiantes";

    try {
        $studentsResponse = $client->get($studentsUrl);
        $studentsData = json_decode($studentsResponse->getBody(), true);

        return view('estudiantes', [
            'curso' => $studentsData['curso'],
            'profesor' => $studentsData['profesor'],
            'students' => $studentsData['estudiantes']
        ]);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error al obtener los estudiantes: ' . $e->getMessage());
    }
}

}