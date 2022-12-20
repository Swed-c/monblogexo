<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DetailsController extends AbstractController
{
    #[Route('/', name: 'app_details')]
    public function index(ArticleRepository $articleRepository): Response
    {
        /* $list = $articleRepository->findAll(); */
        $list = $articleRepository->findBy(['title' =>  'Symfony pour les nuls']);
        /* $list = $articleRepository->findOneBy(['title' =>  'Symfony pour les nuls']); */



        return $this->render('details/index.html.twig', [
            'controller_name' => 'DetailsController',

            'articles' => $list
        ]);
    }


    #[Route('/titi', name: 'app_details_page2')]
    public function page2(): Response
    {
        return $this->render('details/page2.html.twig');
    }


    #[Route('/insert', name: 'app_details_insert')]
    public function insert(ArticleRepository $articleRepository)
    {
        $article = new Article();
        $article->setTitle('Le rechauffement climatique');
        $article->setDescription('Le climat');
        $article->setCreatedAt(new DateTimeImmutable());


        $articleRepository->add($article, true);
        /* return $this->render('details/page2.html.twig'); */
    }

    #[Route('/update', name: 'app_details_update')]
    public function update(ArticleRepository $articleRepository)
    {
        $article = $articleRepository->findOneById(5);
        $article->setTitle('Le futur du climatique');
        $article->setDescription('Le climat');



        $articleRepository->add($article, true);
        /* return $this->render('details/page2.html.twig'); */
    }

    #[Route('/delete', name: 'delete')]
    public function delete(ArticleRepository $articleRepository)
    {
        $article = $articleRepository->findOneById(6);


        $articleRepository->remove($article, true);


        /* return $this->render('details/page2.html.twig'); */
    }
    #[Route('/form', name: 'app_details_form')]

    public function form()
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);
        return $this->renderForm('details/form.html.twig', [
            'form' => $form,
        ]);
    }
}
