<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Photo;
use App\Form\Photo\CommentType;
use App\Form\Photo\NewPhotoType;
use App\Repository\PhotoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class PhotoController extends AbstractController
{
    #[Route('/', name: 'photo.list')]
    public function list(PhotoRepository $photoRepository): Response
    {
        $photos = $photoRepository->findAll();

        return $this->render('photo/list.html.twig', [
            'photos' => $photos,
        ]);
    }

    #[Route('/photo/show/{id}', name : 'photo.show')]
    public function show(Photo $photo, Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        if ($user) {
            $comment = new Comment();
            $form = $this->createForm(CommentType::class, $comment);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $comment->setUser($user)
                        ->setPhoto($photo)
                        ->setCreateAt(new \DateTimeImmutable());
                $entityManager->persist($comment);
                $entityManager->flush();

                return $this->redirectToRoute('photo.show', ['id' => $photo->getId()]);
            } else {
                return $this->render('photo/show.html.twig', [
                    'photo' => $photo,
                    'commentForm' => $form->createView(),
                ]);
            }
            
        }
        return $this->render('photo/show.html.twig', [
            'photo' => $photo,
        ]);
    }

    #[Route('/photo/manage', name : 'photo.manage')]
    public function manage(): Response
    {
        $user = $this->getUser();
        $photos = $user->getPhotos();

        return $this->render('photo/manage.html.twig', [
            'photos' => $photos,
        ]);
    }

    #[Route('/photo/delete/{id}', name : 'photo.delete', condition: "context.getMethod() in ['DELETE']")]
    public function delete(Photo $photo, EntityManagerInterface $entityManager): JsonResponse
    {
        $idPhoto = $photo->getId();

        $entityManager->remove($photo);
        $entityManager->flush();

        return new JsonResponse(['success' => 'Votre photo à bien été supprimée',
                                 'id' => $idPhoto]);

        // return $this->redirectToRoute('photo.manage');
    }

    #[Route('/photo/new', name : 'photo.new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $photo = new Photo();
        $form = $this->createForm(NewPhotoType::class, $photo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $photo->setUser($this->getUser());
            $photo->setPostAt(new \DateTimeImmutable());
            $entityManager->persist($photo);
            $entityManager->flush();
            $this->addFlash(
                'success',
                'Votre photo à été uploadée'
            );
    
            return $this->redirectToRoute('photo.manage');
        }

        return $this->render('photo/new.html.twig', [
            'newForm' => $form->createView(),
        ]);
    }

}

