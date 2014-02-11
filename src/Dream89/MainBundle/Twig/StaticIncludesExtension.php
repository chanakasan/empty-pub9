<?php
namespace Dream89\MainBundle\Twig;

use Symfony\Component\HttpKernel\KernelInterface;

class StaticIncludesExtension extends \Twig_Extension {
    /**
     * @var KernelInterface
     */
    protected $kernel;

    public function __construct(KernelInterface $kernel) {
        $this->kernel = $kernel;
    }

    /**
     * {@inherit-Doc}
     */
    public function getFunctions()
    {
        return array(
            'includeFile' => new \Twig_Function_Method($this, 'includeFile')
        );
    }

    /**
     * Returns the contents of a file to the template.
     *
     * @param string $path    A logical path to the file (e.g '@AcmeFooBundle:Foo:resource.txt').
     *
     * @return string         The contents of a file.
     */
    public function includeFile($path)
    {
        $path = $this->kernel->locateResource($path, null, true);

        return file_get_contents($path);
    }

    public function getName()
    {
        return 'StaticIncludesExtension';
    }
} 