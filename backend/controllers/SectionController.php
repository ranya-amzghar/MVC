<?php

require_once dirname(__DIR__) . '/services/SectionService.php';

class SectionController
{
    private SectionService $service;

    public function __construct()
    {
        $this->service = new SectionService();
    }

    public function handleRequest(): void
    {
        header('Content-Type: application/json; charset=utf-8');

        try {

            // GET: SHOW SECTIONS
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {

                echo json_encode(
                    $this->service->listerSections()
                );

                return;
            }

            // POST: ADD SECTION
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $input = json_decode(
                    file_get_contents('php://input'),
                    true
                );

                if (!is_array($input)) {
                    throw new InvalidArgumentException(
                        "Données JSON invalides"
                    );
                }

                http_response_code(201);

                echo json_encode(
                    $this->service->ajouterSection($input)
                );

                return;
            }

            // OTHER METHODS
            http_response_code(405);

            echo json_encode([
                'success' => false,
                'message' => 'Méthode non autorisée'
            ]);

        } catch (InvalidArgumentException $e) {

            http_response_code(400);

            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);

        } catch (PDOException $e) {

            http_response_code(500);

            echo json_encode([
                'success' => false,
                'message' => 'Erreur MySQL'
            ]);

        } catch (Throwable $e) {

            http_response_code(500);

            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}