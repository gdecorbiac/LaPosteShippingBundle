<?php

namespace Acme\ExampleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

final class GreetingController extends Controller
{
    /**
     * @param string|null $name
     *
     * @return Response
     */
    public function staticallyGreetAction($name)
    {
        return new Response(sprintf('<html><body><div id="greeting">%s</div></body></html>', $this->getGreeting($name)));
    }

    /**
     * @param string|null $name
     *
     * @return Response
     */
    public function dynamicallyGreetAction($name)
    {
        return $this->render('@AcmeExample/dynamic_greeting.html.twig', ['greeting' => $this->getGreeting($name)]);
    }

    /**
     * @param string|null $name
     *
     * @return string
     */
    private function getGreeting($name)
    {
        switch ($name) {
            case null:
                return 'Hello!';

            case 'Lionel Richie':
                return 'Hello, is it me you\'re looking for?';

            default:
                return sprintf('Hello, %s!', $name);
        }
    }
}
