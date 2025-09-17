<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controller\admin;

use App\Entity\Environnement;
use App\Repository\EnvironnementRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Description of AdminEnvironnementController
 *
 * @author Thomas
 */
class AdminEnvironnementController extends AbstractController {
       /**
    * 
    * @var EnvironnementRepository
    */
    private $repository;
    /**
    * @param EnvironnementRepository $repository
    */
    public function __construct(EnvironnementRepository $repository){
        $this->repository = $repository;
    }
    #[Route('/admin/environnements', name: 'admin.environnements')]
    public function index(): Response {
        $environnements = $this->repository->findAll(); // récupère toutes les visites
        return $this->render("admin/admin.environnements.html.twig", [
            "environnements" => $environnements
        ]);

    }
    #[Route('/admin/environnement/suppr/{id}', name: 'admin.environnement.suppr')]
    public function suppr(int $id): Response {
        $environnement = $this->repository->find($id);
        $this->repository->remove($environnement);
        return $this->redirectToRoute('admin.environnements');

    }
        #[Route('/admin/environnement/ajout', name: 'admin.environnement.ajout')]
    public function ajout(Request $request): Response {
            $nomEnvironnement = $request->get("nom");
            $environnement =new Environnement();
            $environnement-> setNom($nomEnvironnement);
            $this->repository->add($environnement);
            return $this->redirectToRoute('admin.environnements');
    }
}
