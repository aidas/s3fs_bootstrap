<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\ClientInterface;

class DefaultController extends Controller
{

    private $guzzle;

    public function __construct(ClientInterface $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function indexAction(Request $request)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)
          ->find(1);

        var_dump($product->getCategory()->getName());

        // replace this example code with whatever you need
        return $this->render('@App/default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'guzzle_conf' => $this->guzzle->getConfig()
        ]);
    }
}
