<?php

use PHPUnit\Framework\TestCase;

class RegistrationFormSecurityTest extends TestCase
{
    public function testCsrfTokenPresence()
    {
        // Créez une requête POST vers le formulaire d'inscription
        $response = $this->submitPostRequest('index.php?action=register', []);

        // Vérifiez que le jeton CSRF est présent dans le formulaire
        $this->assertStringContainsString('<input type="hidden" name="csrf_token"', $response);
    }

    public function testFormValidation()
    {
        // Créez une requête POST vers le formulaire d'inscription avec des données valides
        $formData = [
            'nom' => 'John',
            'prenom' => 'Doe',
            'adresse' => '123 Rue de Test',
            'email' => 'john.doe@example.com',
            'password' => 'Password123',
            'confirm_password' => 'Password123',
        ];
        $response = $this->submitPostRequest('index.php?action=register', $formData);

        // Vérifiez que le formulaire a été soumis avec succès et qu'il n'y a pas d'erreurs
        $this->assertStringNotContainsString('error-message', $response);
    }

    // Ajoutez d'autres méthodes de test pour vérifier d'autres aspects de la sécurité du formulaire...

    private function submitPostRequest($url, $data)
    {
        // Créez une requête POST avec cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
